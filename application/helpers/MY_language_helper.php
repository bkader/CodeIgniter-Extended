<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Get instance of CI
 *
 * @access  public
 * @param   void
 * @return  object
 */
if ( ! function_exists('_ci'))
{
    function _ci()
    {
        $CI =& get_instance();
        return $CI;
    }
}

/**
 * Remplacing CodeIgniter lang function
 *
 * @param   string
 * @param   array
 * @return  string
 */
if ( ! function_exists('lang'))
{
    function lang($str, $args = array())
    {
        $line = _ci()->lang->line($str);
        $line or $line = $str;
        return ( ! empty($args)) ? vsprintf($line, (array) $args) : $line;
    }
}

/**
 * Get current language data
 *
 * @param   string
 * @return  mixed
 */
if ( ! function_exists('current_lang'))
{
    function current_lang($return = FALSE)
    {
        class_exists('I18n') or _ci()->load->library('i18n');
        return _ci()->i18n->get_current($return);
    }
}

/**
 * Get a single phrase by name and index
 *
 * @access  public
 * @param   string
 * @param   string
 * @param   array
 * @return  string
 */
if ( ! function_exists('line'))
{
    function line($name, $args = null, $default = false)
    {
        $line = _ci()->lang->line($name);
        $line or $line = ( ! $default) ? $name: $default;
        return ($args !== null) ? vsprintf($line, (array) $args): $line;
    }
}

/**
 * Echo a single phrase
 *
 * @access  public
 * @param   string
 * @param   array
 * @param   string
 * @return  string
 */
if ( ! function_exists('_e'))
{
    function _e($str, $args = null, $default = false)
    {
        echo line($str, $args, $default);
    }
}

/**
 * Access multidimensional array
 *
 * @param   string
 * @return  mixed
 */
if ( ! function_exists('dot'))
{
    function dot(&$arr, $path = null, $default = null)
    {
        if ( ! $path)
            user_error("Missing array path for array", E_USER_WARNING);
        $parts = explode(".", $path);
        $path  =& $arr;
        foreach ($parts as $e)
        {
            if ( ! isset($path[$e]) or empty($path[$e]))
                return $default;
            $path =& $path[$e];
        }
        return $path;
    }
}

/* End of file MY_language_helper.php */
/* Location: ./application/helpers/MY_language_helper.php */