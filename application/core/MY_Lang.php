<?php
/**
 * Language Class extension.
 *
 * Adds language fallback handling.
 *
 * When loading a language file, CodeIgniter will load first the english version,
 * if appropriate, and then the one appropriate to the language you specify.
 * This lets you define only the language settings that you wish to over-ride
 * in your idiom-specific files.
 *
 * This has the added benefit of the language facility not breaking if a new
 * language setting is added to the built-in ones (english), but not yet
 * provided for in one of the translations.
 *
 * To use this capability, transparently, copy this file (MY_Lang.php)
 * into your application/core folder.
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Language
 * @author      EllisLab Dev Team
 * @link        http://codeigniter.com/user_guide/libraries/language.html
 */
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Lang extends CI_Lang
{
    /**
     * @var string
     */
    public $fallback = 'english';

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    // --------------------------------------------------------------------

    /**
     * Load a language file, with fallback to english.
     *
     * @param   mixed   $langfile   Language file name
     * @param   string  $idiom      Language name (english, etc.)
     * @param   bool    $return     Whether to return the loaded array of translations
     * @param   bool    $add_suffix Whether to add suffix to $langfile
     * @param   string  $alt_path   Alternative path to look for the language file
     *
     * @return  void|string[]   Array containing translations, if $return is set to true
     */
    public function load($langfile, $idiom = '', $return = false, $add_suffix = true, $alt_path = '')
    {
        if (is_array($langfile))
        {
            foreach ($langfile as $value)
            {
                $this->load($value, $idiom, $return, $add_suffix, $alt_path);
            }

            return;
        }

        $langfile = str_replace('.php', '', $langfile);

        if ($add_suffix === true)
        {
            $langfile = preg_replace('/_lang$/', '', $langfile).'_lang';
        }

        $langfile .= '.php';

        if (empty($idiom) or ! preg_match('/^[a-z_-]+$/i', $idiom))
        {
            $config = & get_config();
            $idiom = empty($config['language']) ? $this->fallback : $config['language'];
        }

        if ($return === false && isset($this->is_loaded[$langfile]) && $this->is_loaded[$langfile] === $idiom)
        {
            return;
        }

        // load the default language first, if necessary
        // only do this for the language files under system/
        $basepath = SYSDIR.'language/'.$this->fallback.'/'.$langfile;
        if (($found = file_exists($basepath)) === true)
        {
            include($basepath);
        }

        // Load the base file, so any others found can override it
        $basepath = BASEPATH.'language/'.$idiom.'/'.$langfile;
        if (($found = file_exists($basepath)) === true)
        {
            include($basepath);
        }

        // Do we have an alternative path to look in?
        if ($alt_path !== '')
        {
            $alt_path .= 'language/'.$idiom.'/'.$langfile;
            if (file_exists($alt_path))
            {
                include($alt_path);
                $found = true;
            }
        }
        else
        {
            foreach (get_instance()->load->get_package_paths(true) as $package_path)
            {
                $package_path .= 'language/'.$idiom.'/'.$langfile;
                if ($basepath !== $package_path && file_exists($package_path))
                {
                    include($package_path);
                    $found = true;
                    break;
                }
            }
        }

        if ($found !== true)
        {
            show_error('Unable to load the requested language file: language/'.$idiom.'/'.$langfile);
        }

        if (!isset($lang) or ! is_array($lang))
        {
            log_message('error', 'Language file contains no data: language/'.$idiom.'/'.$langfile);

            if ($return === true)
            {
                return array();
            }
            return;
        }

        if ($return === true)
        {
            return $lang;
        }

        $this->is_loaded[$langfile] = $idiom;
        $this->language = array_merge($this->language, $lang);

        log_message('info', 'Language file loaded: language/'.$idiom.'/'.$langfile);
        return true;
    }

    public function line($line, $default = false, $log_errors = true)
    {
        $value = $this->dot($this->language, $line, $default);
        if ($value === null and $default === false and $log_errors === true)
        {
            log_message('error', 'Could not find the language line "'.$line.'"');
        }
        return $value;
    }

    /**
     * Access multidimensional array using
     * dot-notation method.
     *
     * @param   array
     * @param   string
     * @param   mixed
     * @return  mixed
     */
    private function dot(&$arr, $path = null, $default = null)
    {
        if ( ! $path)
        {
            user_error("Missing array path for array", E_USER_WARNING);
        }
        $parts = explode(".", $path);
        $path  =& $arr;
        foreach ($parts as $e)
        {
            if ( ! isset($path[$e]) or empty($path[$e]))
            {
                return $default;
            }
            $path =& $path[$e];
        }
        return $path;
    }
}

/* End of file MY_Lang.php */
/* Location: ./application/core/MY_Lang.php */