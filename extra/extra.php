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
