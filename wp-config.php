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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'socca_hungary_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '2&z|Y/RsR;G-iBsTj:U#&^-a=U.Y|OzY))mCJt75qA0=,j>J-LTWE0_0E6xWcBDe' );
define( 'SECURE_AUTH_KEY',  'R0,!n[/0O,$Y tBu1*YO0DIB6SM9:HsH}.BY,=o2 :t`; 83tB<;>_{LNsI=g;aX' );
define( 'LOGGED_IN_KEY',    'e<_;)=6H-_.~/l|pJhv:L|0`sKi=Uo|hb3FouIK&nAVtH%M.{BMigh+lUHa>PdXn' );
define( 'NONCE_KEY',        '!pth]H90rfsr88^Vd{EO&}Lh!2Vw=&P3>ihq+5Frn|ibxk2+)ob^X7v9tu/4y]=N' );
define( 'AUTH_SALT',        '+<Ph{I`eJ9LSCBNL_6YB{Hz;&_PFI?higJ(#+(uunOl#32:+{#%;3&G1.sXCc8jX' );
define( 'SECURE_AUTH_SALT', '_/e3L0Y+M|<lfCq9K!Jg?cei<j/^|}%(Q/z-Fjoa=9Tb*)((tlC=Q|o;-hp?~.3l' );
define( 'LOGGED_IN_SALT',   '9R%tA2/C{y*}y)((!;h@RoU#U,(Zm%Cj_Rk)Tx@Fio`i_wVu6>_b8cm {}p;J8sS' );
define( 'NONCE_SALT',       'n)ei;;>b?#>7BY@cRU{J2G W)P@.zRut{iAdz{) =!I1HSg1X_|b|A|6SC%Nid+w' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
