<?php
  require_once('utils.php');
/*
Plugin Name: airtight security formerly redirect editor
Version: 2.2.3
Plugin URI: https://planetzuda.com
Description: Airtight security helps make your site more secure and provides the redirect editor, so if you have a  broken 404 link you can redirect it to any page.  We provide wordpress security, a vulnerability scanner and protect you against popular SEO plugins which is damaging your rankings by making your sitemap invisible to Google's bots by telling them to not index it, which is a free and automatically applied feature. We have a premium scanner to check for publicly known exploits that can be used to hack your WordPress site. 
We provide state of the art WordPress security analyzing all your plugins against known threats(premium), securing your WordPress against issues that are built into WP for free and against plugins we detect with damaging code that from our analysis acts in a malicious manner.
Author: Planet Zuda
Author URI: https://planetzuda.com
LICENSE
Copyright 2012-2016 Justin Watt
 Copyright 2018-present Planet Zuda  sales@planetzuda.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
$redirectEditorPlugin = new Redirect_Editor_Plugin();

class Redirect_Editor_Plugin
{

    const NOTICES_OPTION_KEY = 'airtight_notices';

    // UI components names
    public $_redirectEditorSaveActionNonceName = "redirect-editor-nonce";

    public $_redirectEditorSaveActionName = "redirect-editor";

    public $_redirectEditorSaveActionFunctionName = "redirect-editor-save";

    public $_redirectEditorSaveExperimentalActionNonceName = "redirect-editor-experimental-nonce";

    public $_redirectEditorSaveExperimentalActionName = "redirect-editor-experimental";

    public $_redirectEditorActivateActionNonceName = "redirect-editor-activate-nonce";

    public $_redirectEditorActivateActionName = "redirect-editor-activate";

    public $_SaveScanIdActionName = "save-scan-id";

    public $supFunctions = null;

    public $is_supporter = false;

    public function erase_header_junk()
    {
        echo "";
    }

    public function __construct()
    {

        // TODO:Check for instanceId if it is not present, generate one and save it to settings.
        $this->get_instance_id();

        add_action('admin_init', array(
            $this,
            'save_data'
        )); // for researchers, we adopted this code and secured the use of admin_init by requiring an admin to be logged in within function save_data. Before Planet Zuda took over, this was not required.
        add_action('admin_menu', array(
            $this,
            'add_admin_menu'
        ));
        add_action('init', array(
            $this,
            'PZ_security_protection'
        ));
        add_action('send_headers', array(
            $this,
            'airtight_headers'
        ));
        add_action('wp_ajax_save_scan_id', array(
            $this,
            'save_scan_id'
        ));
        add_action('admin_notices', array(
            $this,
            'output_notices'
        ));
        // Yoast fix
        if (version_compare(PHP_VERSION, '5.4.0') >= 0) {

            header_register_callback(function () {
                $request_uri = esc_url($_SERVER['REQUEST_URI']);

                if (strpos($request_uri, '.xml') !== false) {
                    foreach (headers_list() as $header) {

                        if (strpos($header, 'X-Robots-Tag:') !== false) {
                            header_remove('X-Robots-Tag');
                        }
                    }
                }
            });
        }

        // this says all of the links below can not appear if you are not logged in as an admin or editor.
        // In this situation, we need to judge intent. The intent here is to make sure the user has enough authority to make such calls. Having these logged out makes no sense.
        remove_action('wp_head', 'wp_generator'); // remove the generator from putting version out there. Is this only obfuscating? Yes. However, with strong enough security obfuscation also helps, but obfuscation is not a replacement for security. They can go hand in hand.
        remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
        remove_action('wp_head', 'wlwmanifest_link'); // removes windows live writer link
        remove_action('wp_head', 'wp_shortlink_wp_head', 10);
        remove_action('the_generator', 'erase_header_junk'); // removes it
    }

    // closing construct bracket
    public function airtight_headers()
    {
        // add in a notification telling users security is put in place, when other plugins force the users to understand what they're clicking.
        if (! headers_sent()) {
            header("X-XSS-Protection: 1; mode=block"); // header xss protection is better than nothing.
            header("X-Content-Type-Options: nosniff", false); // attempts to stop malicious code from being malicious. If it is jpg, it is served only as jpg which in theory should make malicious php inside a jpg hidden using steganography not ran, therefore in theory this header provides a sense of protection against this attack. false ensures that both headers will be sent and not the last header will be sent. If the second param false is not there only one header will be sent.
            header("Referrer-Policy: no-referrer-when-downgrade", false); // referrer will not be sent to a site that is less secure than the site being used. So if you are https, the referrer will not be sent to http.
        }
    }

    // closing bracket for public function airtight_headers
    public static function output_notices()
    {
        $notices = self::get_notices();
        if (empty($notices)) {
            return;
        }
        // Iterate over stored notices and output them.
        foreach ($notices as $type => $messages) {
            foreach ($messages as $message) {
                printf('<div class="notice notice-%1$s is-dismissible">
                       <p>%2$s</p>
                   </div>', esc_attr($type), esc_html($message));
            }
        }
        // All stored notices have been output. Update the stored array of notices to be an empty array.
        self::update_notices([]);
    }

    private static function get_notices()
    {
        $notices = get_option(self::NOTICES_OPTION_KEY, []);
        return $notices;
    }

    private static function update_notices(array $notices)
    {
        update_option(self::NOTICES_OPTION_KEY, $notices);
    }

    /**
     * Adds a notice to the stored notices to be displayed the next time the admin_notices action runs.
     *
     * @param
     *            $message
     * @param string $type
     */
    private static function add_notice($message, $type = 'success')
    {
        $notices = self::get_notices();
        $notices[$type][] = $message;
        self::update_notices($notices);
    }

    /**
     * Success messages are green
     *
     * @param
     *            $message
     */
    public static function add_success($message)
    {
        self::add_notice($message, 'success');
    }

    /**
     * Errors are red
     *
     * @param
     *            $message
     */
    public static function add_error($message)
    {
        self::add_notice($message, 'error');
    }

    /**
     * Warnings are yellow
     *
     * @param
     *            $message
     */
    public static function add_warning($message)
    {
        self::add_notice($message, 'warning');
    }

    /**
     * Info is blue
     *
     * @param
     *            $message
     */
    public static function add_info($message)
    {
        self::add_notice($message, 'info');
    }

    public function PZ_security_protection()
    {
        $disable_api = $this->get_setting('disable_api');
        $_req_uri = esc_url($_SERVER["REQUEST_URI"]);
       
        if (preg_match('/^.*\/wp-json*/', $_req_uri) && $disable_api === 1) {
           
            wp_redirect(get_home_url(), 301);
            exit();
        }
        

        add_action('pre_get_posts', array(
            $this,
            'redirect'
        ));

        if (current_user_can('edit_posts')) {
            add_action('wp_head', 'rsd_link'); // add really simple discovery link
            add_action('wp_head', 'wlwmanifest_link'); // add windows live writer link
            add_action('wp_head', 'wp_shortlink_wp_head', 10);

            add_action('the_generator', 'erase_header_junk'); // add it
        }
    }
/* will be available in next version disables auto-security 
public function off()
{
	            add_action('wp_head', 'rsd_link'); // add really simple discovery link
            add_action('wp_head', 'wlwmanifest_link'); // add windows live writer link
            add_action('wp_head', 'wp_shortlink_wp_head', 10);

            add_action('the_generator', 'erase_header_junk'); // add it

}
*/

    public function checkSupporterUtils()
    {
        if (! $this->is_supporter) {
            $this->is_supporter = false;
            $_is_included = @include "supporter-utils.php";
            // TODO:Check if the file is the correct one by __consturct method or by file hash check
            if ($_is_included === false) {
             } else {
                $this->is_supporter = true;
                $this->supFunctions = new RedirectEditorSupporterFunctions();
            }
 
        }
    }

    public function save_scan_id()
    {
        global $wpdb; // this is how you get access to the database

        if (! check_ajax_referer($this->_SaveScanIdActionName, 'nonce')) {
            wp_send_json_error('Invalid security token sent.');
            wp_die();
        }
        if (isset($_POST['scan_id'])) {
            $scanId = esc_html($_POST['scan_id']);
            $settings = $this->get_saved_settings();
            $settings['scan_id'] = $scanId;
            update_option('redirect_editor', $settings);

            $res = new RedirectEditorScan();
            $res->status = "ok";
            $res->scan_id = $scanId;
            wp_send_json($res);
        }
        wp_die(); // this is required to terminate immediately and return a proper response
    }

    public function add_admin_menu()
    {
        add_options_page('Redirect Editor', 'Redirect Editor', 'manage_options', 'redirect-editor', array(
            $this,
            'admin_page'
        ));
    }

    public function admin_page()
    {
        $redirects = $this->get_setting('redirects_raw');
        $disable_api = $this->get_setting('disable_api');
        
        if (! isset($disable_api) || $disable_api == 0) {
            $disable_api_state = "";
        } else {
            $disable_api_state = "checked";
        }

        $this->checkSupporterUtils();

        wp_enqueue_script('ajax-security', plugin_dir_url(__FILE__) . 'plugin.js', [
            'jquery'
        ], false, true);
        wp_enqueue_script('datatables', 'data-tables.css', array(
            'jquery'
        ));
        wp_enqueue_style('datatables-style', 'jquery-datatables.css');
        wp_enqueue_style('font-awesome', 'font-awesome.css');

        wp_localize_script('ajax-security', 'ajax_object', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce($this->_SaveScanIdActionName)
        ]);

        require_once ('form.php');
    }

    public function get_setting($name, $default = '')
    {
        $settings = get_option('redirect_editor', array());

        if (! is_array($settings)) {
            $settings = array();
        }

        if (array_key_exists($name, $settings)) {
            $setting = $settings[$name];
            if (empty($setting)) {
            // currently no response if empty
            }
            if ($name === 'redirects') {
                return $setting;
            }
            return htmlspecialchars($setting, ENT_QUOTES, 'UTF-8');
        } else {
            return $default;
        }
    }

    // closing bracket for function get_setting
    public function get_saved_settings()
    {
        $settings = get_option('redirect_editor', array());
        
        if (! is_array($settings)) {
            $settings = array();
        }

        return $settings;
    }

    public function checkNonce($nonceName, $actionName)
    {
        $_nonceExists = isset($_POST[$nonceName]);
        $_nonceValid = wp_verify_nonce($_POST[$nonceName], $actionName);

        
        return ! $_nonceExists || ! $_nonceValid;
    }

    public function save_data()
    {
        // since this gets called in the admin_init action, we only want it to

        // run if we're actually processing data for the redirect_editor. Researchers we secured this, if you do find a flaw, please let us know. Also we did not write the original code. We made a security update, adopted it, fixed it, released security update.
        if (current_user_can('manage_options')) {
            if (! isset($_POST['function']) || $_POST['function'] != $this->_redirectEditorSaveActionFunctionName) {
                if (isset($_POST['function']) && $_POST['function'] == $this->_redirectEditorSaveExperimentalActionName) {
                    if ($this->checkNonce($this->_redirectEditorSaveExperimentalActionNonceName, $this->_redirectEditorSaveExperimentalActionName)) {
                        print 'Sorry, your nonce did not verify.';
                        exit();
                    } else {
                        $this->save_experimental();
                    }
                }
                // edirect-editor-activate
                if (isset($_POST['function']) && $_POST['function'] == $this->_redirectEditorActivateActionName) {
                    if ($this->checkNonce($this->_redirectEditorActivateActionNonceName, $this->_redirectEditorActivateActionName)) {
                        print 'Sorry, your nonce did not verify.';
                        exit();
                    } else {
                        $this->activate();
                    }
                }
                return;
            }

            if ($this->checkNonce($this->_redirectEditorSaveActionNonceName, $this->_redirectEditorSaveActionName)) {
                print 'Sorry, your nonce did not verify.';
                exit();
            } else {
                if (isset($_POST['redirects'])) {
                    // updated this to manage_options instead of the legacy code check_admin_referer for a more modern current_user_can.
                    $redirects_rawed = $_POST['redirects'];
                    // $allowed_html - https://codex.wordpress.org/Function_Reference/wp_kses_allowed_html
                    $allowed_html = wp_kses_allowed_html();
                    // $allowed_protocols
                    $allowed_protocols = wp_allowed_protocols();
                    $redirects_raw = wp_kses($redirects_rawed, $allowed_html, $allowed_protocols);
                    // explode textarea on newline
                    $redirect_lines = explode("\n", $redirects_raw);

                    $redirects = array();
                    foreach ($redirect_lines as $redirect_line) {
                        // clean up any extraneous spaces
                        $redirect_line = preg_replace('/\s+/', ' ', trim($redirect_line));

                        // skip lines that begin with '#' (hash), treat a comments
                        if (substr($redirect_line, 0, 1) == '#') {
                            continue;
                        }

                        // explode each line on space (there should only be one:
                        // between the path to match and the destination url)
                        $redirect_line = explode(" ", $redirect_line);

                        // skip lines that aren't made up of exactly 2 strings, separated by a space
                        // other than this, we don't do any validation
                        if (count($redirect_line) != 2) {
                            continue;
                        }
                        $redirects[$redirect_line[0]] = $redirect_line[1];
                    }

                    $settings = $this->get_saved_settings();
                    $settings['redirects_raw'] = $redirects_raw;
                    $settings['redirects'] = $redirects;
                    update_option('redirect_editor', $settings);
                    Redirect_Editor_Plugin::add_success("Redirects saved!");
                }
            }
        }
    }

    /* currently only allowing text, but will be adding in more support in the future. */
    public function redirect($query)
    {
        if ($query->is_main_query() && ! current_user_can('manage_options') || $query->is_main_query() && current_user_can('manage_options')) {
            $request_url = esc_url($_SERVER["REQUEST_URI"]);

            $redirects = $this->get_setting('redirects', array());
            
            $key_exists = array_key_exists($request_url, $redirects);
        
            if ($key_exists) {
                wp_redirect($redirects[$request_url], 301);
                exit();
            }
        }
    }

    public function save_experimental()
    {
        
        $_disableApi = 0;
        if (isset($_POST['disable_api'])) {
            $_disableApi = 1;
        }
        
        $settings = $this->get_saved_settings();
        $settings['disable_api'] = $_disableApi;
        update_option('redirect_editor', $settings);
    }

    public function activate()
    {
       
        // Activete url https://planetzuda.com/
        $url = "https://planetzuda.com/airtight/index.php?action=getSupporterUtils";
        if (isset($_POST['subscrid']) && isset($_POST['instance_id'])) {
            $_subscrid=$_POST['subscrid']; 
            $_instance_id=$_POST['instance_id'];

            $activation_url = $url;
            

            $response = wp_remote_post($activation_url, array(
                'method' => 'POST',
                'timeout' => 50,
                'redirection' => 5,
                'httpversion' => '1.1',
                'body' => array(
                    'subscrid' => $_subscrid,
                    'instance_id' => $_instance_id
                )
            ));
            if (is_wp_error($response)) {
                $error_message = $response->get_error_message();
              Redirect_Editor_Plugin::add_error("Something went wrong: $error_message");
            } else {

                if (strpos($response['body'], 'Error') !== false) {
                    // error during activation
                    Redirect_Editor_Plugin::add_error("Subscription invalid or expired");
             
                } else {
                    $this->save_to_file($response['body']);

                    $this->save_subscrid($_subscrid);
                }
            }
        }
    }

    public function save_to_file($output)
    {
        $file = base64_decode($output);
        $dir = plugin_dir_path(__FILE__);
        file_put_contents($dir . '/supporter-utils.php', $file);
        // $this->checkSupporterUtils();
    }

    public function save_subscrid($subscrid)
    {
        $settings = $this->get_saved_settings();
        $settings['subscrid'] = $subscrid;
        update_option('redirect_editor', $settings);
        return $subscrid;
    }

    public function get_subscrid()
    {
        return $this->get_setting('subscrid');
    }

    public function uuid()
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function get_instance_id()
    {
        $settings = $this->get_saved_settings();

        if (isset($settings['instance_id'])) {
            $instance_id = $settings['instance_id'];
             return $instance_id;
        } else {
            
            $instance_id = $this->uuid();
            $settings['instance_id'] = $instance_id;
            update_option('redirect_editor', $settings);

             return $instance_id;
        }
    }
}
