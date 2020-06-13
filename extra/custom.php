<?php
/**
 * WPI Custom Setup
 * by DimaMinka (https://dima.mk)
 * https://github.com/wpi-pw/app
 */

use Roots\WPConfig\Config;
use function Env\env;

// Changing the Number of Revisions to Save for Posts
Config::define('WP_POST_REVISIONS', env('WP_POST_REVISIONS'));
// Change the Autosave Interval
Config::define('AUTOSAVE_INTERVAL', env('AUTOSAVE_INTERVAL'));
// Increasing the PHP Memory Limit
Config::define('WP_MEMORY_LIMIT', env('WP_MEMORY_LIMIT'));
// Increase Wordpress Memory Limit
Config::define('WP_MAX_MEMORY_LIMIT', env('WP_MAX_MEMORY_LIMIT'));

if (env('WP_ENV') == 'production') {
    // Enabling the "Trash" Feature for Media Files
    Config::define('MEDIA_TRASH', true);
    // The length of days before items are permanently delete
    Config::define('EMPTY_TRASH_DAYS', 10);
}
