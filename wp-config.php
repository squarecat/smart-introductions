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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'q3IUMHib');

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
define('AUTH_KEY',         'm6[%1F>MQ[KCB|hlx8x*2LM;L9q6=dLu5i^=I<||AOq3f>fL@z;edP@tyRJaDyZ]');
define('SECURE_AUTH_KEY',  '!Y@>SI:EK};r#Q5z[^[<}Tzx[GrAGMFb)f0JRB]FL(ghIB9(}j[FDwuG__,M6tZ^');
define('LOGGED_IN_KEY',    'p?2YWg+-|P<m1BvN_>7cWCbbR.AmrU8Wj#)}#%r[?;Jn}Me.&7xi:8}!K+{r=RE@');
define('NONCE_KEY',        'L9(T/^i*@gk;Q>+T}-w0@,6?>*mZk_(pWENRA7oK$.83R{kituRpw~,/@e#*NnlM');
define('AUTH_SALT',        'gD:z[sast83|ex2c2V~}Fn**e%ky,B90diGnsTT*u9.*e}EXG*2Rby8z5Z5spBE~');
define('SECURE_AUTH_SALT', '}akNmiRr.!cp}yWFWC}9g<DtS>SaR7 1mv!_+d#4o}=BO`n|H>%8;H)$n{Os6|d/');
define('LOGGED_IN_SALT',   '&g`wP P^J:5:utR-ABqX7PkgEJM&?bS,%KzojbF#JYL7/+aSJ68]Do|f6ij,mz1=');
define('NONCE_SALT',       'S@kWA9bKZPxfk$cW@9*$%EqYevhE?.[^OAP`Co5tWe(Tv<nB2%.BZT>{Py$5-_fR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sd_';

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
