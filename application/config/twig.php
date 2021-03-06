<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Twig Config File
 *
 * @package     CodeIgniter
 * @author      Kader Bouyakoub
 * @link        @bkader <github>
 * @link        @KaderBouyakoub <twitter>
 */

$config['twig'] = array(

    // File extension
    'ext' => '.html.twig',

    // Paths to view files
    'paths' => array(VIEWPATH),

    // Path to cache folder (set to 'false' to disable)
    'cache' => APPPATH.'cache/twig',

    // Add as many functions as you want
    'functions_asis' => array(
    ),
    'functions_safe' => array(

        // URL
        'base_url',
        'site_url',
        'current_url',

        // config
        'config',

        //
        'assets_url',
        'css_url', 'css',
        'js_url', 'js',
        'img_url', 'img',
        'meta',

        // Language Functions
        'languages', 'current_lang', 'lang', 'line', '_e', '__', '_dgettext',

        // Debug functions
        'debug', 'debug_last_query', 'debug_query_result', 'debug_session', 'debug_log',
    ),
);

/* End of file twig.php */
/* Location: ./application/config/twig.php */