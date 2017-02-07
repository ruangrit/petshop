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
define('DB_NAME', 'petshop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '3}iE~K/(CHU$Lc:6/pKGy2qi`5X|z[NsF729Cbze:X XE4,aH{xiQwej]YPgfalh');
define('SECURE_AUTH_KEY',  's&(8[z]T+}p~M olC5Q?f}*Rk]8B=}jy1 |xI/lqCly .j%Ler#f67g&p~(K9+LI');
define('LOGGED_IN_KEY',    ': _qy;AC3A6h.8?Yt(kq<ZGNT0c8V3[qOip+=&GKe-3dEW&WsI&&o<&m]W~?yOY7');
define('NONCE_KEY',        'h.ynk^EEQ_1=EGSt?17~=x;Rb3w!cMOST0Fh{h#- eVIH^Pc4qx@_#?n{;zaY5P9');
define('AUTH_SALT',        'z}4Bv#|z+RuF0Oez!FJpP=R7~nkm5W(JT`#?Sl)tD)ImNG@0/Bj87&b^FbhyhXqi');
define('SECURE_AUTH_SALT', '&E pI{1%Y$M~7>Hhn1qv%gglrF&0S][ta!PG}_[/%wv/N+1}Y;FH7/]N@X CbEn]');
define('LOGGED_IN_SALT',   'r|e%_!Rq$<tVTR)*{a@^jeYHUDCjMknjZ/uWEA1qn.J{$8)zDi$$bKyRp;)_Q1yc');
define('NONCE_SALT',       'JB%.*9X#L;M;.T]+{J?2{q_SUzNr[@2#V__UvyqT.jdBA&[#v)>hoy kB#?xK9,d');

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
