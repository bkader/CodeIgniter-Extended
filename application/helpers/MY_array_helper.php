<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Extend CodeIgniter Array Helper
 *
 * @package     CodeIgniter
 * @subpackage  Helpers
 * @category    Array Helper
 * @author      Kader Bouyakoub <bkader@mail.com>
 * @link        @KaderBouyakoub
 */

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
/**
 * Use of PHP : array_change_key_case
 *
 * @param   object
 * @param   string
 * @return  object
 */
if ( ! function_exists('object_change_key_case ')) {
    function object_change_key_case($object, $case = null) {
        is_array($object) or $object = (array) $object;
        // You can use alias: 'lower', 'lowercase', 'upper', 'uppercase'
        switch ($case) {
            // case of lowercased
            case CASE_LOWER:
            case 'lower':
            case 'lowercase':
                $case = CASE_LOWER;
            break;
            // case of uppercased
            case CASE_UPPER:
            case 'upper':
            case 'uppercase':
                $case = CASE_UPPER;
            break;
            // By default and in case the passed parameter
            // is not one of the aliases or the PHP ones
            default:
                $case = CASE_LOWER;
            break;
        }
        return (object) array_change_key_case($object, $case);
    }
}

/**
 * Use of PHP : array_chunk
 *
 * @param   object
 * @param   string
 * @return  array
 */
if ( ! function_exists('object_chunk')) {
    function object_chunk($object, $size = 1, $preserve_keys = false) {
        is_array($object) or $object = (array) $object;
        is_bool($preserve_keys) or $preserve_keys = (bool) $preserve_keys;
        return array_chunk($object, $size, $preserve_keys);
    }
}

/**
 * Use of PHP : array_column
 *
 * (PHP 5 >= 5.5.0, PHP 7)
 *
 * @param   object
 * @param   string
 * @return  array
 */
if ( ! function_exists('object_column')) {
    function object_column($object, $column_key, $index_key = null) {
        is_array($object) or $object = (array) $object;
        foreach ($object as &$child) {
            $child = (array) $child;
        }
        return array_column($object, $column_key, $index_key);
    }
}

/**
 * Use of PHP : array_combine
 *
 * (PHP 5, PHP 7)
 *
 * @param   object
 * @param   string
 * @return  object
 */
if ( ! function_exists('object_combine')) {
    function object_combine($keys, $values) {
        is_array($keys) or $keys = (array) $keys;
        is_array($values) or $values = (array) $values;
        return (object) array_combine($keys, $values);
    }
}

/**
 * Use of PHP : array_merge
 *
 * @param   object
 * @param   string
 * @return  object
 */
if ( ! function_exists('object_merge')) {
    function object_merge($obj1, $obj2) {
        if ( ! $obj1 or ! $obj2) return false;
        return (object) array_merge((array) $obj1, (array) $obj2);
    }
}

/**
 * Use of PHP : array_key_exists
 *
 * @param   string
 * @param   object
 * @return  boolean
 */
if ( ! function_exists('object_key_exists')) {
    function object_key_exists($key, $search) {
        is_array($search) or $search = (array) $search;
        return array_key_exists($key, $search);
    }
}

/**
 * Use of PHP : array_keys
 *
 * @param   object
 * @param   string
 * @param   boolean
 * @return  array
 */
if ( ! function_exists('object_keys')) {
    function object_keys($object, $search_value = null, $strict = false) {
        is_array($object) or $object = (array) $object;
        return array_keys($object, $search_value, $strict);
    }
}

/**
 * Use of PHP : array_map
 *
 * @param   object
 * @param   mixed
 * @return  array
 */
if ( ! function_exists('object_map')) {
    function object_map($object, $callback) {
        is_array($object) or $object = (array) $object;
        return array_map($callback, $object);
    }
}

/**
 * Use of PHP : array_pop
 *
 * @param   object
 * @return  array
 */
if ( ! function_exists('object_pop')) {
    function object_pop($object) {
        is_array($object) or $object = (array) $object;
        return array_pop($object);
    }
}

/**
 * Use of PHP : array_rand
 *
 * @param   object
 * @param   integer
 * @return  array
 */
if ( ! function_exists('object_rand')) {
    function object_rand($object, $num = 1) {
        is_array($object) or $object = (array) $object;
        return array_rand($object, $num);
    }
}

/**
 * Use of PHP : array_search
 *
 * @param   object
 * @param   integer
 * @return  array
 */
if ( ! function_exists('object_search')) {
    function object_search($needle, $haystack, $strict = false) {
        is_array($haystack) or $haystack = (array) $haystack;
        return array_search($needle, $haystack, $strict);
    }
}

/**
 * Use of PHP : array_shift
 *
 * @param   object
 * @return  array
 */
if ( ! function_exists('object_shift')) {
    function object_shift($object) {
        is_array($object) or $object = (array) $object;
        return array_shift($object);
    }
}

/**
 * Use of PHP : array_slice
 *
 * @param   object
 * @return  array
 */
if ( ! function_exists('object_slice')) {
    function object_slice($object, $offset = 0, $length = null, $preserve_keys = false) {
        is_array($object) or $object = (array) $object;
        return array_slice($object, $offset, $length, $preserve_keys);
    }
}

/* End of file MY_array_helper.php */
/* Location: ./application/helpers/MY_array_helper.php */