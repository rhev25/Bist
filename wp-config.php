<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'biston_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '@IAUFY&5-%]b/%#6aLj>6WarL*Nz2ELo0&N!IzulIV2} {6vi+=!Q*a)sR,]I^ j');
define('SECURE_AUTH_KEY',  '_RQHS?^.!oh&QWVWU063k;hD(J8a-XfTdMAfdeaAQKb26Qz8E9+T|+@[*:xN4nNw');
define('LOGGED_IN_KEY',    '9~v6BG;Pw.CetnjP}x8:}b.?Ud,VbyS =j!Te+xJT=A_71 [ygEX,czb7n/~P8S|');
define('NONCE_KEY',        'Q@>F?nb4A^;hS]TtHnPt4O`Nb7o2(F0Ip@NFmCMh?|W^;SIAI(%7$U:W[;:8b=N ');
define('AUTH_SALT',        'bE^fN`}pWNiEHR]|`x),l:@RX.~j1Vp7Q[2kXce6f2qqcLv>166@+y&3m%][_=_:');
define('SECURE_AUTH_SALT', 'd8d2KLh_Ozmm^c*y!jnu~Ss~>UdETpCxNSL3(IsQUp&w#69F%od4SHi;r/xf`0Pj');
define('LOGGED_IN_SALT',   ' d]z;*yhyA!Zj_[Id@&x81D}d-R~op[tR3nrmkRy]0!;+a{I !{</j,3!44G3QO>');
define('NONCE_SALT',       'z{kL1Um>@C=o4$jlPFoHke&SqglgBB~Q4nbI8`NZYdoA.QK0WOt@IpTHE#VtBQ<6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
