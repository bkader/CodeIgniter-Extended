<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter I18n Config File
 *
 * @package     CodeIgniter
 * @author      Kader Bouyakoub
 * @link        @bkader <github>
 * @link        @KaderBouyakoub <twitter>
 */

$config['i18n'] = array(

    // Website default language
    // Before settings this, make sure the language
    // exists in the 'languages' array
    'default' => 'english',

    // Files to be autoloaded
    'files' => array(
        // Main application lang file
        //'main',
    ),

    // Website available languages
    'languages' => array(

        // Please follow the example below:
        //
        // 'english' => array(
        //      'name'      => 'English',
        //      'folder'    => 'english',
        //      'code'      => 'en',
        //      'locale'    => 'en-US',
        //      'charset'   => 'UTF-8',
        //      'flag'      => 'us',
        //      'direction' => 'ltr'
        // )
        //
        // To enable a language, simply uncomment
        // its lines.

        // English
        'english' => array(
            'name'      => 'English',
            'folder'    => 'english',
            'code'      => 'en',
            'locale'    => 'en_US',
            'charset'   => 'UTF-8',
            'direction' => 'ltr',
            'flag'      => 'us',
        ),

        // French
        'french' => array(
            'name'      => 'Français',
            'folder'    => 'french',
            'code'      => 'fr',
            'locale'    => 'fr_FR',
            'charset'   => 'UTF-8',
            'direction' => 'ltr',
            'flag'      => 'fr',
        ),

        // Arabic
        'arabic' => array(
            'name'      => 'العربية',
            'folder'    => 'arabic',
            'code'      => 'ar',
            'locale'    => 'ar_DZ',
            'charset'   => 'UTF-8',
            'direction' => 'rtl',
            'flag'      => 'dz',
        ),

        // French
        'italian' => array(
            'name'      => 'Italiano',
            'folder'    => 'italian',
            'code'      => 'it',
            'locale'    => 'it_IT',
            'charset'   => 'UTF-8',
            'direction' => 'ltr',
            'flag'      => 'it',
        ),

        // Spanish
        'spanish' => array(
            'name'      => 'Español',
            'folder'    => 'spanish',
            'code'      => 'es',
            'locale'    => 'es_ES',
            'charset'   => 'UTF-8',
            'direction' => 'ltr',
            'flag'      => 'es',
        ),

        // Portuguese
        'portuguese' => array(
            'name'      => 'Português',
            'folder'    => 'portuguese',
            'code'      => 'pt',
            'locale'    => 'pt_PR',
            'charset'   => 'UTF-8',
            'direction' => 'ltr',
            'flag'      => 'pt',
        ),

        // German
        'german' => array(
            'name'      => 'Deutsche',
            'folder'    => 'german',
            'code'      => 'de',
            'locale'    => 'de_DE',
            'charset'   => 'UTF-8',
            'direction' => 'ltr',
            'flag'      => 'de',
        ),
    ),

    // Language session name (default: lang)
    'session' => null,

    // Language cookie name (default: lang)
    'cookie' => null,
);

/* End of file i18n.php */
/* Location: ./application/config/i18n.php */