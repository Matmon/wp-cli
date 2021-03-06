<?php

// Can be used by plugins/themes to check if wp-cli is running or not
define( 'WP_CLI', true );

define( 'WP_CLI_VERSION', '0.8.0-alpha' );

define( 'WP_CLI_ROOT', __DIR__ . '/' );

include WP_CLI_ROOT . 'utils.php';
include WP_CLI_ROOT . 'dispatcher.php';
include WP_CLI_ROOT . 'class-wp-cli.php';
include WP_CLI_ROOT . 'class-wp-cli-command.php';
include WP_CLI_ROOT . 'man.php';

\WP_CLI\Utils\bootstrap();

WP_CLI::before_wp_load();

// Load WordPress, in the global scope
define( 'ABSPATH', WP_ROOT );

eval( \WP_CLI\Utils\get_wp_config_code() );

require WP_CLI_ROOT . 'wp-settings-cli.php';

// Fix memory limit. See http://core.trac.wordpress.org/ticket/14889
@ini_set( 'memory_limit', -1 );

// Load all admin utilities
require ABSPATH . 'wp-admin/includes/admin.php';

WP_CLI::after_wp_load();

WP_CLI::run();

