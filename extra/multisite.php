<?php
/**
 * WPI Multisite Setup
 * by DimaMinka (https://dima.mk)
 * https://github.com/wpi-pw/app
 */

use Roots\WPConfig\Config;
use function Env\env;

/**
 * Cookie settings
 *
 * Resolving The WordPress Multisite Redirect Loop
 *
 * @link https://tommcfarlin.com/resolving-the-wordpress-multisite-redirect-loop/
 */
if (env('EXTRA_MULTISITE') == 'subdomain' || env('EXTRA_MULTISITE') == 'subdirectory') {
    if (filter_var(env('WP_MULTISITE_SUBDOMAIN_INSTALL'), FILTER_VALIDATE_BOOLEAN)) {
        Config::define('COOKIE_DOMAIN', env('WPI_HOST'));
        Config::define('ADMIN_COOKIE_PATH', '/');
    }

    Config::define('WP_ALLOW_MULTISITE', true);
    Config::define('MULTISITE', true);

    if (env('EXTRA_MULTISITE') == 'subdomain') {
        Config::define('SUBDOMAIN_INSTALL', true);
    }

    Config::define('DOMAIN_CURRENT_SITE', env('WPI_HOST'));
    Config::define('PATH_CURRENT_SITE', '/');
    Config::define('SITE_ID_CURRENT_SITE', 1);
    Config::define('BLOG_ID_CURRENT_SITE', 1);
}
