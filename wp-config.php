<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'db_wp_mahmuds_pachal');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Q8?rj_yUj*GPc%@?<d|ka,5hSV4ybRgpCdUW_YbV_]-7!ATYa2<16|:Yr-IZ$1I=');
define('SECURE_AUTH_KEY',  'SvXlN`#Va^;Zv#e/pPo!AUzceZ88)Cw/)}:VbVW:SdUMB;4GR{}i6H1<v cM@8@P');
define('LOGGED_IN_KEY',    'r+Bck|NQL%tf ?{5IwB]h}%DzHw_@JYr+XtUY0b[fDCGX#FlE7xJz-Ud&-<mDP~1');
define('NONCE_KEY',        '2m1jpK3nX.qJJDS0#+PI2Pf:P}uUn(NuK_Q{ ;yJ,,45M7Lh5ySTx$o{$`.e<7^,');
define('AUTH_SALT',        ' -_~h,Co3F#Agt$w}srij%qe`;_ackeX*7$%GzM#P*EE!vGzJ*A9<:!`uqC+fNj+');
define('SECURE_AUTH_SALT', 'jXbsP)1mAK&Fz8>|g2y%eJ7|YkH|soav>WpYNESWo`b2?vk>F)a*H77`f>M;LNVu');
define('LOGGED_IN_SALT',   'J3G^.8vc??RX}%;Y-,i|9-;eL1${TchUV*`}i;C9=qq0)Xgb];1reR?*|Y]^*ce9');
define('NONCE_SALT',       'aPD<l7kZj1rwc5-ZV Ej1,g*J:#8t~L@f;:.JIV3r^V?f[;c!+?=d!U&4jiF1gbn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tbl_';

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
