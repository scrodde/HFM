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
define('DB_NAME', 'helsinginmiekkailijat');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'o4gK~P( sbC5XkI?o1m.b]m0hJts1q&9_{8@Q.;t*7J.,_`P9:{|Z]?^#%d]o@Z4');
define('SECURE_AUTH_KEY',  's7Ihwjw.v+gBA}&6~J#,A_?Z_cx,#4#:ia$-:n8og.}3lM=9]nD+G<;8}Xk2riC(');
define('LOGGED_IN_KEY',    'YFv0*Qvm~=&s2^bI)0<*X[ZGg_jibu0^lDfR<~OFgu*3}<rli$*Hv8k{)u|K7Q1~');
define('NONCE_KEY',        'X|SMdgKgu]iE@Qx@XO!u%1lQhpW%Zwn{qiz71vagu$oooLi;ZZhGUtXp+b@)$SS/');
define('AUTH_SALT',        'dkjdF!;=@wbY,-J,=qKpjM7KLW`%m^YEo4uW)-[6zsz55ZVo*IQ4(*=B)y/P-SO<');
define('SECURE_AUTH_SALT', 'X9UE<QmE@a:1cHToe*[i9RCQv|P!f=B~mM?wkR!i%^DC$)ET1~SiZ8IZ=4Hgx,7 ');
define('LOGGED_IN_SALT',   '>XqTt>iFg`9[r/bgfypHF_UFtd*Z-[,x..9V1iX-{p4@k`K/-%i|] K,CMWc#*[0');
define('NONCE_SALT',       '_n&BWrQ/0PS;d/w?P~]H]RH3)Ct1IU3z!.L#)EU8M/w{DQpQQO)`lmH+emFKKh1b');

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
