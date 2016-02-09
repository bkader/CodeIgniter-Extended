<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * DinaEngine
 *
 * A Social Network Script built on CodeIgniter with love
 *
 * @package 	DinaEngine
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
		 * Default description
		 * (used if there is no description set)
		 */
		'description' => 'PHP Framework',

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
		 * Folder holding images and uploaded files
		 */
		'datafolder'  => APPPATH.'appdata/',

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
		'use_cdn' => false,
		'cdn_url' => null,

		/**
		 * Google Analytics ID & Google Site Verification
		 *
		 * Set one of the to null to disable it
		 */
		'google' => array(
			'analytics'    => null,
			'verification' => null,
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
		 * Different System Emails
		 */
		'emails' => array(
			'noreply' => 'noreply@ianhub.com',
			'admin'   => 'admin@ianhub.com',
			'contact' => 'contact@ianhub.com',
			'support' => 'support@ianhub.com',
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

	/**
	 * Website Images Settings
	 */
	'image' => array(

		/**
		 * Enable/Disable Image Cropping
		 */
		'crop' => true,

		/**
		 * Different images sizes (square)
		 */
		'topbar' => 20,
		'tiny'   => 32,
		'small'  => 50,
		'medium' => 100,
		'large'  => 200,
	),

	/**
	 * Accounts Settings
	 */
	'account' => array(

		/**
		 * Minimum age required
		 */
		'min_age' => 13,

		/**
		 * Different Lengths
		 */
		'min_length' => array(
			'username'  => 5,
			'password'  => 8,
			'firstname' => 3,
			'lastname'  => 3,
		),
		'max_length' => array(
			'username'  => 32,
			'password'  => 20,
			'firstname' => 14,
			'lastname'  => 14,
		),

		/**
		 * Account Activation Config
		 */
		'activation' => array(

			// Enable/Disable account activation
			'enabled'    => true,

			// For how long the account is held before
			// it gets wiped out of the system.
			'key_expire' => 172800,
		),

	),

);

/* End of file default.php */
/* Location: ./application/config/default.php */