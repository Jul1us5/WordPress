<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{cps?ux>+w*rbq&9jaOBn)VKk2QJ~Nhvb^K9CGDlKjJV BQ%+d6_qW}iYky4#Fc<' );
define( 'SECURE_AUTH_KEY',  'Q(!Vp`PuVPn306b{?UP z#Wq18-bl:Z-P}u$[#2;Ti=2ej)FPagf#dd[`)0uj~%*' );
define( 'LOGGED_IN_KEY',    'Ejpe3NSZ`G3YCvVUI>>V4+Z]PZ2^i~A+=&[<=#NDz3NT]oy$&p[UW{1/Gt]kfKQ]' );
define( 'NONCE_KEY',        '-@iG?!81 Khx}Y@M?kH8W`}FL= 5 m`Ef%{87dU 6gVo|T~Rh; Z&N6OBS9:0]nD' );
define( 'AUTH_SALT',        '>Sj5SDrf0$i4sI+S>94y-rw/7IXb5:;.8isj+E;E-dt>F1(a>n^^e5oc%Mv-O8bP' );
define( 'SECURE_AUTH_SALT', 'CPnyB/VJy`w~w%fOk1(x[=Tp#MIrGrjn$pErNQ|^H+&Nns<|*~u@CgV&?,k)ZTu/' );
define( 'LOGGED_IN_SALT',   'h?uEQzq)}u]nUa}p~ChK?2DR4(:4V~P3`;2/eiChCfh[910nD(@:qIqTbOKQ8m3(' );
define( 'NONCE_SALT',       'wc8ZS6maNmNAO@YU6=GD+CI[vZYR7sxd0n>>t}eLkqV OXgu^x5>zpcJ]b7*mUrK' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
