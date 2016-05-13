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
define('DB_NAME', 'wingnet_blog2015');


/** MySQL database username */
define('DB_USER', 'wingnet_admin15');


/** MySQL database password */
define('DB_PASSWORD', 'pR;MCw4a9RNf');


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
define('AUTH_KEY',         'rq%`9A@np9}T3T+!gA+]BW8Iw]kS0-=&L8l}X`Fay(i$Dg%,V3=#E(`H+-|=@|z5');

define('SECURE_AUTH_KEY',  'v!AyHPz)Np-nI}mlnH_~/Lm7;z=y+ODk9M%|0$gk$P5g)Y1vY2i4^Qzn;USc;OD ');

define('LOGGED_IN_KEY',    'BFlb1JE+7k)w951X&sT|$-s&rwv#-aBYYz+*^(e<~)I9P!7Pl#<b+$~PTn]TfXl+');

define('NONCE_KEY',        'GeivC[SAqFm)^a:I!6FjxWv*nt9Y7LZW1^0`d(,Q9vHh5qwGx>c)|Wt+@?!gxx(N');

define('AUTH_SALT',        'GjU3Sj,:XK ^S^{8_D*;B4g8,F|:/p;Ekn]j%=dP8q+&997Ws.}h6q9S-3!88T//');

define('SECURE_AUTH_SALT', '(W2jp)oOaN5:Z=+<=,SUqP:gR 8UP%(r~w`j+[ Ni&45AB;I!,HSo4Z?[r@A#,!%');

define('LOGGED_IN_SALT',   'hn i_(PS5Yp+}qa]LWgDYio&^[HT408-panDDs&Us.Dp~~fG8`#=_-y(diVC|3J-');

define('NONCE_SALT',       '&hCT?i@5h;E.=N7z~+[D==[}!=a=Ex^Y=e8Xo--<;(t?_5llzW7*]`)C#}W55y[6');


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
