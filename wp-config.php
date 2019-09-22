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
define( 'DB_NAME', 'icequeen' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mysql' );

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
define( 'AUTH_KEY',         'b4zBs%i7D,SkIzY|OcM|AvUHT3ji,^K*RN[)+5K..QCb7XZLhDkA3f5.]hH%I6W2' );
define( 'SECURE_AUTH_KEY',  ']EL_rP00z?0y>uMc>N7d+_v ~k0b(+V6(su5Fn{GET/%BQ1J_x^?jHmv sh1m/tm' );
define( 'LOGGED_IN_KEY',    'Wix]N7v|6{Ts*uy.-*.PzSRo[,K4+z~_D;6/()u+:-*?^iZ^vbgDvuD?zp%gV<J?' );
define( 'NONCE_KEY',        'r{<;!Jjbl7}WrGLJ.i0^-{ZDEtR;n5o!2_#sP~07@r{Ib4%qnlbA*!c6wfN4 ]k|' );
define( 'AUTH_SALT',        'Z9%Xe4Yo(JI]VVU/To#/mICwDCZx<LZ<a5oDXsE(F=>MC51cs2^:PvGMb?7JH3.d' );
define( 'SECURE_AUTH_SALT', ',pvJ1{`E`%VC,!_#`DH>izIVhWhrt|vVbeOY@=(,`b;KV?*Cm-0:~yW@^Ctuayry' );
define( 'LOGGED_IN_SALT',   '[=G$>}T=RSOBP?y o%oGg*~<PR}7M2yE0`;^Kd? EEAzg^yP;RrOwWUy}+-Fd0.&' );
define( 'NONCE_SALT',       '%@R}2/j]?ZQ3h3yz7eLOq9S03gXqZmp-8J8; k51FWED=fBu;,5 vCY(vdH:Vo`+' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'iq_';

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
