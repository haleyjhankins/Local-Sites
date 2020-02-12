# Infinite Mailchimp

Provides an endpoint in Wordpress to subscribe email addresses to a Mailchimp list.

## Installation

1. Enable the plugin in wordpress
2. Go to `Settings > Mailchimp Subscribe`
3. Enter your Mailchimp API Key, if you do not have one, generate it under `Account > Extras > API Keys`.
4. Enter the Datacenter found in the URL after logging into Mailchimp. Ex. `us5`
5. Enter the ID for the list you'd like contacts to be subscribed to. Find the ID by going to your List: `Settings > List name and campaign defaults`.

## Usage

1. You will need to generate a nonce for your subscription form in `functions.php` to be accessible from your JS file.
```php
$nonceData = array(
	'nonce' => wp_create_nonce('mailchimp')
);
wp_localize_script('bowtie_appjs', 'php_vars', $nonceData);
```

2. You will then be able to access the nonce from your JS file using `php_vars.nonce`
3. Add the string to a hidden input field named `nonce`
4. Name the email input field as `email_address`
5. POST the form data to `/wp-json/bowtie/v1/mailchimp/subscribe`
