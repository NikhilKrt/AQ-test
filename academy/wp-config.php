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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', '@dm1nPassw0rd' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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

define('AUTH_KEY',         '7{Qnz$AWZUWhU;`P+e)d^`x{UHH:ABcGFNw|`/w%y{z)|)!3&z4RB&}dWpfS2id7');
define('SECURE_AUTH_KEY',  'qgW2vDynT?=1iE}zrS,Y302$+ 73,k>)H1mH<LG7Y2Be65G,-D3j`7`YE+j|Q=Co');
define('LOGGED_IN_KEY',    '8U_?ut }IV 9?dvO&~NcdC&sI0Du~bwJN3@gV$ rSVE#|Q9kbWc[j<PLC|EQs[&+');
define('NONCE_KEY',        '2PGlXo0~>4zds`?Q#-|Hnd9U0`RcM`9zzymyD8TI{m&NHet81p3mmT4;M[+d!2Sj');
define('AUTH_SALT',        'xS+H7/wT)].|~0=5hjv@{O[kdMD-#<HEDx3Ldre-vD5cYDcFj|r->Q!qYw_}$%|T');
define('SECURE_AUTH_SALT', 'M_77ys,HBj,sBxF67y6!x#^K+5,Un4GsM90%+:>DWZu)/_+_s>:97HlRZ3oW]M=S');
define('LOGGED_IN_SALT',   '!C$+gm:-UpOu6JQf1zWVcnMRQ-nf!HJF8RU;L1DLi Qd0JO(7HavWwW-.b,JlYZG');
define('NONCE_SALT',       '`yeK wq/|0k~$#-m|(FQ:;G{d<ji(*&uSn0!0]k>bc8A!fc=ZZ%.G7U8x|pLeOKJ');
/**define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );**/

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
