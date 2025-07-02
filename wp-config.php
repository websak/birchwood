<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'birchwood' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '<@f$8T,liQ1/e./F&_9bd;IN;g=fg2yc!T[hv}j!fT@Ec&1}h,3ck:@j-?I5_GRE' );
define( 'SECURE_AUTH_KEY',   'hmCM K8l*P&;sFW`Q<7cx9Z<Q5:]@l]`pn!3drG`8` MU/LMl!/Smsc?Vi:j[5m(' );
define( 'LOGGED_IN_KEY',     '(^`T`kQSZqX}-h6{[=54TNYg8Pkm?r5dt<x+.01dT6crR6Q$yHFnr!1WmXwEG5g_' );
define( 'NONCE_KEY',         'uAx)<XlvJh) yUm`5}ijQ_m8{}gut6YTVEAK^m$<fc,o3aMB=*@.<@IkLuY[`bEC' );
define( 'AUTH_SALT',         ';4re$i:P;3ZPl:V0wf(H!feLDr*=g;mnV>n62ns.up8Lu2Lj$^U4@t5n)*EkttlG' );
define( 'SECURE_AUTH_SALT',  '=rr2b|R@*y~k4A)$#Y6A9fwCB0X?USY3c).C/<Em8<9,Ti?exJ27f=)6tyD|mVkW' );
define( 'LOGGED_IN_SALT',    'i?c>su&[H.9B|IF~Z!yON=T~>Xp;%^rVBK>,_{j@(z+Uf}1f:x+$Gok[z^Z(eL8t' );
define( 'NONCE_SALT',        '8y&_@fTt~gKqDae9ZlnC/na(X1f}at@TksYeE={yq09Ik$60Ju[fl0hlZ_c-s_(x' );
define( 'WP_CACHE_KEY_SALT', '_.:+Pu-=kABUzQEt6iQfdTx5~%NW#Gmq<zo~<SeS{%^4W2l)00g[sPC_$d!:8I;p' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'birw_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

define ('WP_CONTENT_FOLDERNAME', 'birchwood_system');
define ('WP_CONTENT_DIR', ABSPATH . WP_CONTENT_FOLDERNAME) ;
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('WP_CONTENT_URL', WP_SITEURL . WP_CONTENT_FOLDERNAME);

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
