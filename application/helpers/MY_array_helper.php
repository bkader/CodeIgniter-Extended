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



if ( ! function_exists('object_change_key_case '))
{
    /**
     * Use of PHP : array_change_key_case
     *
     * @param   object
     * @param   string
     * @return  object
     */
    function object_change_key_case($object, $case = null)
    {
        is_array($object) or $object = (array) $object;
        // You can use alias: 'lower', 'lowercase', 'upper', 'uppercase'
        switch ($case)
        {
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

if ( ! function_exists('object_chunk'))
{
    /**
     * Use of PHP : array_chunk
     *
     * @param   object
     * @param   string
     * @return  array
     */
    function object_chunk($object, $size = 1, $preserve_keys = false)
    {
        is_array($object) or $object = (array) $object;
        is_bool($preserve_keys) or $preserve_keys = (bool) $preserve_keys;
        return array_chunk($object, $size, $preserve_keys);
    }
}

if ( ! function_exists('object_column'))
{
    /**
     * Use of PHP : array_column
     *
     * (PHP 5 >= 5.5.0, PHP 7)
     *
     * @param   object
     * @param   string
     * @return  array
     */
    function object_column($object, $column_key, $index_key = null)
    {
        is_array($object) or $object = (array) $object;
        foreach ($object as &$child)
        {
            $child = (array) $child;
        }
        return array_column($object, $column_key, $index_key);
    }
}

if ( ! function_exists('object_combine'))
{
    /**
     * Use of PHP : array_combine
     *
     * (PHP 5, PHP 7)
     *
     * @param   object
     * @param   string
     * @return  object
     */
    function object_combine($keys, $values)
    {
        is_array($keys) or $keys = (array) $keys;
        is_array($values) or $values = (array) $values;
        return (object) array_combine($keys, $values);
    }
}

if ( ! function_exists('object_merge'))
{
    /**
     * Use of PHP : array_merge
     *
     * @param   object
     * @param   string
     * @return  object
     */
    function object_merge($obj1, $obj2)
    {
        if ( ! $obj1 or ! $obj2) return false;
        return (object) array_merge((array) $obj1, (array) $obj2);
    }
}

if ( ! function_exists('object_key_exists'))
{
    /**
     * Use of PHP : array_key_exists
     *
     * @param   string
     * @param   object
     * @return  boolean
     */
    function object_key_exists($key, $search)
    {
        is_array($search) or $search = (array) $search;
        return array_key_exists($key, $search);
    }
}

if ( ! function_exists('object_keys'))
{
    /**
     * Use of PHP : array_keys
     *
     * @param   object
     * @param   string
     * @param   boolean
     * @return  array
     */
    function object_keys($object, $search_value = null, $strict = false)
    {
        is_array($object) or $object = (array) $object;
        return array_keys($object, $search_value, $strict);
    }
}

if ( ! function_exists('object_map'))
{
    /**
     * Use of PHP : array_map
     *
     * @param   object
     * @param   mixed
     * @return  array
     */
    function object_map($object, $callback)
    {
        is_array($object) or $object = (array) $object;
        return array_map($callback, $object);
    }
}

if ( ! function_exists('object_pop'))
{
    /**
     * Use of PHP : array_pop
     *
     * @param   object
     * @return  array
     */
    function object_pop($object)
    {
        is_array($object) or $object = (array) $object;
        return array_pop($object);
    }
}

if ( ! function_exists('object_rand'))
{
    /**
     * Use of PHP : array_rand
     *
     * @param   object
     * @param   integer
     * @return  array
     */
    function object_rand($object, $num = 1)
    {
        is_array($object) or $object = (array) $object;
        return array_rand($object, $num);
    }
}

if ( ! function_exists('object_search'))
{
    /**
     * Use of PHP : array_search
     *
     * @param   object
     * @param   integer
     * @return  array
     */
    function object_search($needle, $haystack, $strict = false)
    {
        is_array($haystack) or $haystack = (array) $haystack;
        return array_search($needle, $haystack, $strict);
    }
}

if ( ! function_exists('object_shift'))
{
    /**
     * Use of PHP : array_shift
     *
     * @param   object
     * @return  array
     */
    function object_shift($object)
    {
        is_array($object) or $object = (array) $object;
        return array_shift($object);
    }
}

if ( ! function_exists('object_slice'))
{
    /**
     * Use of PHP : array_slice
     *
     * @param   object
     * @return  array
     */
    function object_slice($object, $offset = 0, $length = null, $preserve_keys = false)
    {
        is_array($object) or $object = (array) $object;
        return array_slice($object, $offset, $length, $preserve_keys);
    }
}

/* End of file MY_array_helper.php */
/* Location: ./application/helpers/MY_array_helper.php */