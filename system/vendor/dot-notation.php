<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

/* End of file dot-notation.php */
/* Location: ./system/vendor/dot-notation.php */