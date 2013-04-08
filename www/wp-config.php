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
define('DB_NAME', 'jadobe_wp');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

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
define('AUTH_KEY',         'l?-_Tq=l1F1i0ckO_+*g9E[b*?uIdAU)p(@8?&K^IG8-:UUmuaJe&m@+]}C]BfhJ');
define('SECURE_AUTH_KEY',  '(= -dg135I(~CZ/]34nfeI.]HIkp5G&]re3]n&|i>HYA,eB{ml+-E(Id9Bl`|~l}');
define('LOGGED_IN_KEY',    'n2OjU.CN{(?07t!Ze;L;-6qU*aZ1Z2DG~1I|/&J/-@bJt]@*)o:lf!4AKfW]B[J3');
define('NONCE_KEY',        '7HifaR~:),PzG{p-W[<%Np.>YwI2Bp#Y%~7Wpzm#s3<; i|c%[pj2Im|}>2#z9iD');
define('AUTH_SALT',        '@8$T+p_O-$Da)|oCl-d_ndCLL&zmFB.0b7{(PX7BD1L(rd>-{;*t,5hwU2]ADo+B');
define('SECURE_AUTH_SALT', '^cbes|w7V)2pZ^JsNj&7d>8RA>_sk<byDVo8,fNgMl-,gGJwTjJG{5AGKt]UJ y6');
define('LOGGED_IN_SALT',   'W5t]]6</+h^~X_|>X6M,;sH{8e#;?tKkn+ELC>2Ty<RclbyC`Dcb`1=bT9Xdb[VU');
define('NONCE_SALT',       '^M(KoV6?DjKTJc;_NlFb9 a-J,B|fO.{`<g#Z:&|.k`F21:3/Bvoce9$q&cm{%kD');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
