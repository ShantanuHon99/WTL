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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '~aAR(m<7.|U8q7djPKPughF4S*=Z^*w7?G%%8GXvyJ-sMb]:K$tOID6 Gld+vlh5' );
define( 'SECURE_AUTH_KEY',  '@v4wO^*@ID]!ehK3:}h7pgzsJFt6XAzVB)Zf+48DjiI[fhE()T=5wtbctOO.lJjx' );
define( 'LOGGED_IN_KEY',    '+XB9|8ZA4*F8Mi68j?>+%`uW#kDKLxXVP^V)PZ4^!D7,]DLW3uTh%-@[Kd`%-j.[' );
define( 'NONCE_KEY',        'qHhz/7Ae;*zr=Fpah:lRk.@BBY~W$>`iLHlnQK%63$2Rf1J5PAz3xCz6K|lRRi?4' );
define( 'AUTH_SALT',        'LH1<8;t>j0-I UGOl34f9 `+B*cchi w3Z&S]]A|o`D/uJ,2/]D4`H_^K@>re;%,' );
define( 'SECURE_AUTH_SALT', 'kzh#5+2F=p,UInHY,%CU}%A4b9-y_x1I[XA~ Co7-D))D~5zuyO~]ILnRu%B6Xb:' );
define( 'LOGGED_IN_SALT',   '&B0?l/N#bL)jPrJ~:][7]i&[{}thL{6vGh^<JThAj+,:<_sb.Nhq]IMjVtpBhE+l' );
define( 'NONCE_SALT',       ':rH*C`a_$CSH_~]0J _xt6_NIL+dAa=$X{)L/w0`9^_:Vuj+Ab*) n>#t/Dpv%pr' );

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
