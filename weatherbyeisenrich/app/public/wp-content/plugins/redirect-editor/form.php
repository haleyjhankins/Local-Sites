<div id="banner">
<script>
	var planet_zuda_host="https://planetzuda.com/airtight/index.php";
	</script>
	<style>
	.hidden-p{
		display: none;
	}
	td.details-control {
	text-align:center;
	color:forestgreen;
cursor: pointer;
}
tr.shown td.details-control {
text-align:center;
color:red;
}
	</style>
<div class='wrap'>

     <?php settings_errors(); ?>
	<h2>Security and features control </h2>
	 <b> Your security has been upgraded!</b><pr>
	  You have http headers that add some protection against xss, certain ways of hiding malicious code, and privacy to not send what site you came from to the next site you go to if it isn't https.
	  We also removed your wordpress version, help block against certain types of attacks, and have a scanner that checks against publicly known vulnerabilities to see if you are vulnerable.

	 <h2>Check out our new site security scanner!</h2>
	<br><button id="startScan"  class="button button-primary" >Start scan</button><br>
	<p id="startScanProgress" class="hidden-p">Scan started...</p>
<?php
$utils=new RedirectEditorUtils();

echo '  <input id="components" type="hidden" value="'.$utils->getComponents().'" />';
echo '  <input id="subscrid" type="hidden" value="'.$this->get_setting('subscrid').'" />';
echo '  <input id="instance_id" type="hidden" value="'.$this->get_setting('instance_id').'" />';
echo '  <input id="scan_id" type="hidden" value="'.$this->get_setting('scan_id').'" />';

if ($this->is_supporter) {
    try {
        echo "<h2> Results </h2>";
        $this->supFunctions->printTable();
        $this->supFunctions->printJS(); ?>
		<h2> Thanks for upgrading to premium!</h2>


	<?php
//	$supporterUtils=new Redirect_Editor_SupporterFunctions();
    } catch (Exception $e) {
    // nothing here. 
    }
} else {
    ?>




		<!-- Remote call -->
  <div id="noResFound" class="hidden-p">
  <h2>Light scan results</h2>
     <p id="noResFoundText">Good news, we have found no vulnerable code on your site!  </p></div>
	<div id="lightScanResults" class="hidden-p">
  <h2>Light scan results</h2>
	<p id="lightScanResultsText"></p>
	<p id="lightScanResultsText2">If you want to know the details, go premium today!</p>
 </div>

	<h2>Support us</h2>
  <a href="https://planetzuda.com/why-subscription">Read to find out what awesome stuff premium subscribers get.</a>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="9KU53A7DD9WWU">
<table>
<tr><td><input type="hidden" name="on0" value="Payment options">Payment options</td></tr><tr><td><select name="os0">
	<option value="Level 1">Level 1 : $4.99 USD - monthly</option>
	<option value="Level 2">Level 2 : $9.99 USD - monthly</option>
	<option value="Level 3">Level 3 : $14.99 USD - monthly</option>
	<option value="Level 4">Level 4 : $19.99 USD - monthly</option>
	<option value="Level 5">Level 5 : $59.99 USD - yearly</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

	<h2>I want to activate my premium-only features </h2>
	<form method='post' name='<?php echo $this->_redirectEditorActivateActionName ?>'>
		<?php wp_nonce_field($this->_redirectEditorActivateActionName, $this->_redirectEditorActivateActionNonceName); ?>

		<p><input type="text" name="subscrid" placeholder="Enter PayPal Subscription Id" value="<?php echo $this->get_setting('subscrid')?>"></p>
		<p><input type="hidden" name="instance_id" placeholder="Enter PayPal transaction number" value="<?php echo $this->get_setting('instance_id')?>"></p>

		<p><button type='submit' name='function' class='button button-primary' value='<?php echo $this->_redirectEditorActivateActionName ?>'>Activate</button></p>				<br/>

	</form>
	</div>
	<script>
	jQuery(document).ready(function() {
	//try to load result with instanceId
	load_scan_results(jQuery("#scan_id").val());
			});
			</script>
<?php
}
?>

	 Your WordPress is automatically defended against certain attacks for normal installs. This is a new feature that will continue to develop and add more security abilities.
	  site  redirects
	<form method='post' name='redirect-editor' >

		<?php wp_nonce_field( $this->_redirectEditorSaveActionName, $this->_redirectEditorSaveActionNonceName ); ?>

		    <br/>
			Using the redirect feature is simple as one, two , three. You simply enter the url of a page where something used to be and then the url of where you want it to redirect and it works.
			Make sure to write it using the relative domain name, like so http://www.example.com/2012/09/new-post/ .
			 Followed by the absolute URL of  destination separated by a space . Every redirect has to be on their own line. You can add comments using the # symbol.
			 You can add comments by going # at the beginning and that line will be ignored. </p>

			 <br/> here is how an example of a redirect would look
		<p><pre><code>/2018/09/old-post/ http://www.example.com/2012/09/new-post/</code></pre></p>
                <br/>

<p><textarea name='redirects' style='width:100%;height:15em;white-space:pre;font-family:Consolas,Monaco,monospace;'><?php print esc_textarea($redirects); ?></textarea></p>

		<p><button type='submit' name='function' class='button button-primary' value='redirect-editor-save'>Save redirect</button></p>				<br/>
			</form>
	<form method='post' name='<?php echo $this->_redirectEditorSaveExperimentalActionName ?>' >
	<?php wp_nonce_field( $this->_redirectEditorSaveExperimentalActionName, $this->_redirectEditorSaveExperimentalActionNonceName ); ?>

	<h2>New features</h2>
	<p>Disable /wp-json/ api. <input type="checkbox" name="disable_api" value="" <?php print $disable_api_state?> ></p>
	<p><button type='submit' name='function' class='button button-primary' value='<?php echo $this->_redirectEditorSaveExperimentalActionName ?>'>Save</button></p>				<br/>

</form>
