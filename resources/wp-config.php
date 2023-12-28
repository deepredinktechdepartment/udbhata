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
define( 'DB_NAME', 'udbhata' );

/** MySQL database username */
define( 'DB_USER', 'udbhata' );

/** MySQL database password */
define( 'DB_PASSWORD', 'udbhata123$$' );

/** MySQL hostname */
define( 'DB_HOST', 'insynergyorg.ipagemysql.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('DISALLOW_FILE_EDIT', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WtN@(oy6#:{lm^%xG_4%&B/xpl5`*CoyRBKHY(|2J ^4UE^|W-/^9odg|pv2V 63');
define('SECURE_AUTH_KEY',  'J5p1Jqdue9<L@c5!O$h|*Dq=j,BfSm@rt&93]^x]j1NXj+/V>E TN%{iWt~{Av~b');
define('LOGGED_IN_KEY',    'OW-[4Z(?^y_Tk;!+R3xHY|T-woc#A{z,Xjx|{(MFYv!W|M+0j`=&2G-iL*hR{LV)');
define('NONCE_KEY',        '!=-::)q/8M%Xi<,BHno$Z7SXbf~^m(F/24{sR$9VvjV]mOvY^gULu^Ks>pk;!]=E');
define('AUTH_SALT',        '+oU+khBb<a-{,Gk-jzfwJf,+T}B~>@x=-Rxq4qx.s_TwYZc`Bx(^u ]~j6sg,,$1');
define('SECURE_AUTH_SALT', '>eJe/k/e2Ap>%>0Q,3+<I X;:1|@G)P^3J3i!*B0s8VAtSkO-yykWyvMHuuC>wI!');
define('LOGGED_IN_SALT',   ']K9R/!FP{e_x.B~&ktKFOF*T]B-3`ilV Y-=O[`5.ed6OW]_WG1(`(V)!t.4?sS/');
define('NONCE_SALT',       'Wa/eSbPDX~,bB}_(QXLBuhnV=U1.-n= ^uNOvE>*Sa#pq/31q3<MZQw_Z?v1A4gG');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'udbhata_';

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
define('WP_HOME','https://udbhata.com/resources');
define('WP_SITEURL','https://udbhata.com/resources');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

