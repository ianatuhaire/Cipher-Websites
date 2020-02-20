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
define( 'DB_NAME', 'mambo_unas' );

/** MySQL database username */
define( 'DB_USER', 'mambo_unas' );

/** MySQL database password */
define( 'DB_PASSWORD', '6S*q?KtrUa$$' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':6IUKUH}r^MR?{RKe{{6a`(I3lfKJ)SKW?n@re]/FDk;7xX29H`,TnKci*.WR70^' );
define( 'SECURE_AUTH_KEY',  'cpQ<YKEIG]rX=hEMTRb[*[M$Po9TXi#5BwK{dD<dr/1!H`/^p(-G-la:vSut=j9T' );
define( 'LOGGED_IN_KEY',    's$rW*;0(Q1]oJC6nbzn<El3)jY?%Hv0/N;Ra8e(L9<{nhu2.{r,CQra[!wHzGW,1' );
define( 'NONCE_KEY',        'KkOM[0u8)^px8@0oFBbF[c99mv5,pMrcc1YtIS]YDH>w=+.{xl?io G< 5Q>Ey~)' );
define( 'AUTH_SALT',        'CL&lMY7iu^4Z=hYgP$5p-mh+~G8PLB{]w$ao.0IEq,CcKL!:-Mpp><X6u#kEg9|M' );
define( 'SECURE_AUTH_SALT', 'O}CIK<Af)V;~uD.f+6Sw|_V|IsHY9Y8|;%ygH!a00ngW_%/3Tnt$|d6E#,DI.%uH' );
define( 'LOGGED_IN_SALT',   'pq`YxsKW ,q4yBKI5_s{Td+?d,U#i7-?/=e$Z{moE`DG/tu;{`:c4$PTc%[ZgZq.' );
define( 'NONCE_SALT',       'wrO$ Z27|gP$qr4ZM?&!5]-_kCUv2aF7lv{)4NDj[.Y(RY$r#[@LL b[}))59>0X' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
