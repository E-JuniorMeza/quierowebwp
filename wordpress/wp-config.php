<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'quieroweb_wp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'HcQn9??q8!0' );

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
define( 'AUTH_KEY',         '#p};32n2=Gu e+Z)lekk #@WazcDR9ZsBB!>E3Z2th`oQ&f;?Ez-e`,anQ 3!NLF' );
define( 'SECURE_AUTH_KEY',  'N_:~wvs49Os7Dq(Q]r8!-oZ^)3;T3inA}Rm5^GJarFw9+yjnBQy:@tS^#IRD/mCT' );
define( 'LOGGED_IN_KEY',    'Ta,-a#<pVPc&!0e#`#m%]nPU9?1$P|g7[~)FEitB`Kxpszu,3chQ:KN~1 :D+NCf' );
define( 'NONCE_KEY',        'lHo@}bxc>)mK:JV[DK*?Z]/vDEPCEVTGh%?`(CP|PpAv6dTK8)cs~U[G<[dfacu:' );
define( 'AUTH_SALT',        '|4#$50RU~[#0yoqc}Gs~,@a:y2mJsln9x):]^^=,R<paOcrs&M<=0ZE=1;,C7C64' );
define( 'SECURE_AUTH_SALT', '+`_[ps+2@[+Kg,s1mYBif~>6~?Zi*%v[8!lttkt5~<|bh+)m:MAoc8@r`lQ6glZc' );
define( 'LOGGED_IN_SALT',   '0}U,FIJjq~J)WkPv~wQQN.AHVR%IB$(>KZ|jqBa5Ck/59ukM}xz!*D+6SEB6Y?wL' );
define( 'NONCE_SALT',       't]-7S@evk4Q&0`U,d~=vKmF4/d6KLpsn}9rK<]{ZlZ-n;J_~4%_>(bRUa)xK,u<P' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
