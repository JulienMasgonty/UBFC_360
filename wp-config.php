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
define('DB_NAME', 'ubfc');

/** MySQL database username */
define('DB_USER', 'ubfc');

/** MySQL database password */
define('DB_PASSWORD', 'vp8B8hvZe5jfSp2x');

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
define('AUTH_KEY',         'J&( YIppCf&35!E3r71Hy^V02;Y%wI<C_|!ACH@I|{vVk{kERX$9FW9TF F8bf.d');
define('SECURE_AUTH_KEY',  'k1JJSM1`OwL[^T}0B+rLKhRKm_f5?8EWte$%~`_!W.8$8|W|FABC%O6=%y5m/.nG');
define('LOGGED_IN_KEY',    'd7k!h)!_EbU-Ps _ic^m*RAuur+^lK$YrB|8t()t?_t_ kO%C4]Af}*.])i=?:X0');
define('NONCE_KEY',        'PjRw9MbAC>hzCmtyY 4ffLbIU0H-.RLo9Ip!8<v^N5B*A~+~|)uB3*W+A7~LvmK.');
define('AUTH_SALT',        '=t1w/4#|j3VlBuuJ7+_n91`fq f+uW$8S,1Tbh9@qtXb_6VLN#X#)F)YtHuc8~it');
define('SECURE_AUTH_SALT', 'QU8r<g:k4,4!^L59#!9<9Fc^DLM=sEO%;jD}*3@jseBOB)JJ<ZY.i^haf2@}f6^B');
define('LOGGED_IN_SALT',   'sg2mRplFbZHcUWNMP=ufum8>_K>]LkG.ddM/R;{6pW=fNpF ~bBb<,l.#fPXdm(=');
define('NONCE_SALT',       'w5wbyTwbnf`W)=n*Ok-rVdl1~RnJHF3q@_BA_9!n)5WDsNOlqw<;~z]<v@R2{*3s');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
