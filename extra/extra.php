<?php
/**
 * WPI Extra Features
 * by DimaMinka (https://dima.mk)
 * https://github.com/wpi-pw/app
 */

use Roots\WPConfig\Config;
use function Env\env;

// WP Mail SMTP by WPForms setup
Config::define('WPMS_ON', env('WPMS_ON') ?: false);
Config::define('WPMS_SMTP_PASS', env('WPMS_SMTP_PASS') ?: false);

// WP Rocket license
Config::define('WP_ROCKET_EMAIL', env('WP_ROCKET_EMAIL'));
Config::define('WP_ROCKET_KEY', env('WP_ROCKET_KEY'));

// Google Tag Manager
Config::define('WP_GTM', env('WP_GTM'));

//Amazon S3 Settings
Config::define('AS3CF_SETTINGS', serialize( array(
	'provider' => env('S3_PROVIDER') ?: false,
	'access-key-id' => env('S3_ACCESS-KEY-ID') ?: false,
	'secret-access-key' => env('S3_SECRET-ACCESS-KEY') ?: false,
) ) );
