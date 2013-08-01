<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/* SETTINGS: Could be used by root relative functions later on if you are on a staging or local server, replace the items in all caps. */

// PRODUCTION SETTINGS
$database = 'DATABASE';					/** MySQL database */
$database_user =  'USERNAME';		/** MySQL database username */
$database_password = 'PASSWORD';		/** MySQL database password */
$domain = 'DOMAIN';									/* domain of website, without TLD (.com) */
$domain_tld = 'com';

// STAGING AND LOCAL DATABASE SETTINGS
$staging_domain = 'STAGING.COM'; /* domain of staging server, with TLD (.com) */
$staging_database = 'staging_' . 'USER';		/** Database name and username  */

// define('RELOCATE',true); // may be needed, hopefully not

/* -----------------------------------------------------------------------------*/

$servers = array(
	'current' => $_SERVER['SERVER_NAME'],

	// EXAMPLE: project.com
	// Production server
	'production' => $domain.'.'.$domain_tld,

	// EXAMPLE: project.testingserver.com
	// Staging server
	'staging' => $domain.'.'.$staging_domain,

	// EXAMPLE: domain.dev
	// Local development server
	'local' => $domain. '.dev',

	// EXAMPLE: domain.dev.10.0.10.91.xip.io
	// Dyanmic DNS, great for tablet and phone testing the local machine
	'xip.io' => $domain . '.dev' . '.' . $_SERVER['SERVER_ADDR'] . '.xip.io'
);

// test if it's one of the non-production servers, except the production server
if($servers['current'] == $servers['staging'] || 
	$servers['current'] == $servers['local'] ||
	$servers['current'] == $servers['xip.io']) {	

	// ** MySQL settings ** //
	// set database setting if not production server
	$database = $staging_database;
	$database_user = $staging_database;

	// set URL to staging address
	if($servers['current'] == $servers['staging']) {	
		$site_url = 'http://' . $servers['staging'];
	}
	else {
		//set whatever is currently hitting the site
		$site_url = 'http://' . $servers['current'];
	}

	// Hard code site URLs if staging or local, otherwise use database
	// Note: Set the site_url and home in the database to the production server
	define('WP_SITEURL', $site_url);
	define('WP_HOME', $site_url );
}

/** The name of the database for WordPress */
define('DB_NAME', $database);
// echo ' DB_NAME '.DB_NAME;

/** MySQL database username */
define('DB_USER', $database_user );
// echo ' DB_USER '.DB_USER;

/** MySQL database password */
define('DB_PASSWORD', $database_password );
// echo ' DB_PASSWORD '.DB_PASSWORD;


/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '-((]OW+aLb5Ew<n-qKtI7ua*u.M#w1wc/S#T*uPMAT)U!RI(DeL7!WI_JN%Gjw&Q');
define('SECURE_AUTH_KEY',  '-O`>=|p[t:V?l{6~r}L2%dP?B^:Iu>k3_fc@-m|0.Gz}8vpBW)W<AWm q|93*dyS');
define('LOGGED_IN_KEY',    'og`=6YD+QOa&?2!p4ka,^SNJ;t3v#tfNOzAkO9eG,RF{<}i|A+TI+4t$/-MlkjB}');
define('NONCE_KEY',        '{j#wQ7L8Ch$jTDdq^bCT+2Vim,)c5O0{Qq,x;S#m&5}Y:sA5PS;5N2Po&}tJ,[pn');
define('AUTH_SALT',        'hG-w-+9K-:i%[:<7E5kU|MC4e/bf2bk$/Fid9io_kw^?R`+N#/s/Rq|GdRxnUu G');
define('SECURE_AUTH_SALT', '/Eq#:4bkN9E~3w*Sq.Inkj$4kW,d|2wf62eq(|<oL2vB~u[j^)k+UEjeHk#s;XB,');
define('LOGGED_IN_SALT',   'T.<`C+q/Lr&hn/=Ul}+o4fcK(`=Kf1tT7(SiNR@tK1VrO>fd*.Q7Ww|BAEsA+aB5');
define('NONCE_SALT',       'QIP+:+KrE[G])]N(.(#.Y!&#HqAGTS4Z+}ROFHJI<AdDZ(+q3lg0iAKiD*ZeC@|/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');