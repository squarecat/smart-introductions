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
define('DB_NAME', 'si');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:8889');

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
define('AUTH_KEY',         '4T3eW4D+%HsB3RH;g^mN%?m2Xj84q5??FsAORG]-,H(A>mc{p14]2HH-N5MX0|K%');
define('SECURE_AUTH_KEY',  'vKX{upF7dE~aknye||PQ<Ib42{Iyb.Xr@vACi.]eVUT2 UkU0#X#X?.Yj;go!4Mo');
define('LOGGED_IN_KEY',    'eV(AuiI8a)^b1r68/AY4I0UN/LW|dM]bhA@_9=R&NR=5Ti](36(gz%StX`;?Swv>');
define('NONCE_KEY',        '<L{DjGU?G94S^mrc,18@-R:1xm:_.)[~`~$Q~99;#w> !l`rZLeEa) S73J+LN3Q');
define('AUTH_SALT',        '5u[-TOl>E0x<d|CI<e2HRK=i)jHj5-r`o2heqirxho}20qqKBiCaBRlTU{n1bYuK');
define('SECURE_AUTH_SALT', 'CfUsb|f a(G=A~jJc2f`k7GJ&/n{-]k}}s|{Uh?qKdq`[|[Lx6yB2jC*]kOF/>7X');
define('LOGGED_IN_SALT',   'd@v/TZp^KL,CPDL?<vBf*B/IHe)vv9Ta/W_c18qlds$|ejbm!H=%hEfd0C@T~jW_');
define('NONCE_SALT',       'yq^edt:QIPS7XEg[.HvMR;zp{bs(<g!hh8qQp Wq+*FD1@6v_H-&on HOgJ{:@kt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'si_wp_';

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
