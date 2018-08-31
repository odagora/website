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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'servital_servita1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eJ<+8J>dh=vj/I%St+b<<>y.4YbtA3r!5=_$,g*F2pv[YD0~{YML>?+(UFw!Z_oH');
define('SECURE_AUTH_KEY',  's2bZ>d[emm5@G32_g4<IU-6!7wd11eu[<W./3%J4,czv_F7AKKgdkV^3pMOmYd!*');
define('LOGGED_IN_KEY',    'v!g!)yZ*{6JYSw$wNZ9lQc<:hCZ!gMJ}sm<@Mx]0}rM#cFKVFDI,]uGy7QT7!<KR');
define('NONCE_KEY',        'Oqaj4xJG1oJqoO)04M[dq_jS g@;Bf!^_s2aoS/u(P7C^3=!Jy84GPnzVveSq~>9');
define('AUTH_SALT',        'CB!Zl+4x}merC9HWX5:ouTZAv+qHjYQA~Ys9kPYY.g1lQpjW1A_k[Vu7Bof8=LBK');
define('SECURE_AUTH_SALT', 'lEBq{R0a]Nl[<b`4lwt/[@E[Y-t-ourm1*k5q$5@~OX4vv?8#YmiRi3wDc77WA9~');
define('LOGGED_IN_SALT',   'U>bb_f]P.5a0J!?yC7O3vzS`%ZKm.fM%m2/$V[Iw1Y*(w~csj;3*d+xlo=g>nv!I');
define('NONCE_SALT',       'tf}>WCP #(9cb#g%nm.J6R+,CZC8.-mIlU71<1*M+EJ(wv.^=uz#`(p6iXX:[~Kj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define ('WPLANG', 'es_CO');
/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/website/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/*
Allow json and unfiltered uploads
 */
define( 'ALLOW_UNFILTERED_UPLOADS', true );