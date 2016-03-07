<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Config File
 *
 * A Social Network Script built on CodeIgniter with love
 *
 * @package 	CodeIgniter
 * @author 		Kader Bouyakoub
 * @link 		@KaderBouyakoub
 * @copyright 	Copyright (c) 2011 - 2016, Ian Dev Team
 * @license 	http://opensource.org/licenses/MIT    The MIT License
 * @since 		version 1.0
 */

$config = array(

	/**
	 * Website General Settings
	 */
	'site' => array(

		/**
		 * Website name (Used for page title)
		 */
		'name'        => 'CodeIgniter',

		/**
		 * Site Version (CodeIgniter)
		 */
		'version'     => '3.0.4',

		/**
		 * Default description
		 * (used if there is no description set)
		 */
		'description' => 'CodeIgniter 3.0.4 - PHP Framework',

		/**
		 * Website keywords (for search engine ;)
		 */
		'keywords'    => 'codeigniter, php, framework',

		/**
		 * Used as title delimiter.
		 */
		'title_delim' => ' | ',

		/**
		 * Website Theme and Default Layout
		 */
		'theme'  => 'default',

		/**
		 * Server default timezone
		 */
		'timezone'    => 'UP1',

		/**
		 * Enable/Disable the use of CDN
		 *
		 * For external libraries like jquery and other
		 * you can provide the full URL
		 *
		 * For internal scripts, you can fill the 'cdn_url'
		 * so instead of :
		 *	example.com/assets/(css|js|img)
		 * you will have :
		 *	cdn.example.com/(css|js|img)
		 */
		'use_cdn' => true,
		'cdn_url' => null,

		/**
		 * Different System Emails
		 */
		'emails' => array(
			'noreply' => 'noreply@localhost',
			'admin'   => 'admin@localhost',
			'contact' => 'contact@localhost',
			'support' => 'support@localhost',
			),

		/**
		 * Form Settings
		 */
		'form' > array(
			'l_delim' => '<span class="alert alert-danger">', // Left error delimiter
			'r_delim' => '</span>', 							// Right error delimiter
		),

		/**
		 * SALT Prefix and suffix
		 */
		'salt_pref' => '$2a$',
		'salt_suff' => '$2a$',

	),

	/**
	 * Google Analytics ID & Google Site Verification
	 *
	 * Set one of the to null to disable it
	 */
	'google' => array(
		// put yours of course
		'analytics'    => 'UA-73564021-2',
		// set it to null or put yours
		'verification' => "uMA5E-9EddgLSn2Da6zFp8M4Rl2xQ7Jnt5yLFBwYn4o",
	),

	/**
	 * Facebook Settings
	 */
	'facebook' => array(
		'app_id' => null,
		'image'  => null, // File name with extension or a full URL

		/**
		 * Facebook API
		 */
		'api_key' => null,	// API Key
		'sec_key' => null,	// API secret key
	),

	/**
	 * Site Cache System
	 */
	'cache' => array(
		'enabled' => false,
		'adapter' => 'apc',
		'backup'  => 'file',
		'expire'  => 300,
	),

	/**
	 * Different Useful Formats
	 */
	'format' => array(
		'date'     => 'Y-m-d',
		'time'     => 'H:i',
		'datetime' => 'Y-m-d H:i'
	),

);

/* End of file default.php */
/* Location: ./application/config/default.php */