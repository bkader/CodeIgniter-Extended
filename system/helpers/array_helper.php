<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/array_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('element'))
{
	/**
	 * Element
	 *
	 * Lets you determine whether an array index is set and whether it has a value.
	 * If the element is empty it returns NULL (or whatever you specify as the default value.)
	 *
	 * @param	string
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function element($item, array $array, $default = NULL)
	{
		return array_key_exists($item, $array) ? $array[$item] : $default;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('random_element'))
{
	/**
	 * Random Element - Takes an array as input and returns a random element
	 *
	 * @param	array
	 * @return	mixed	depends on what the array contains
	 */
	function random_element($array)
	{
		return is_array($array) ? $array[array_rand($array)] : $array;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('elements'))
{
	/**
	 * Elements
	 *
	 * Returns only the array items specified. Will return a default value if
	 * it is not set.
	 *
	 * @param	array
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function elements($items, array $array, $default = NULL)
	{
		$return = array();

		is_array($items) OR $items = array($items);

		foreach ($items as $item)
		{
			$return[$item] = array_key_exists($item, $array) ? $array[$item] : $default;
		}

		return $return;
	}
}

// ------------------------------------------------------------------------

/* [ADDED] */

if ( ! function_exists('dot'))
{
    /**
     * Access multidimensional array
     *
     * @author 	Kader Bouyakoub
     * @link 	@bkader <github>
     * @link 	@KaderBouyakoub <twitter>
     * @link 	http://www.bkader.com/
     *
     * @param   string
     * @return  mixed
     */
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

if ( ! function_exists('array_divide'))
{
    /**
     * Divides an array into two, one with keys ad the other with values.
     *
     * @author 	Kader Bouyakoub
     * @link 	@bkader <github>
     * @link 	@KaderBouyakoub <twitter>
     * @link 	http://www.bkader.com/
     *
     * @access  public
     * @param   array
     * @return  array
     */
    function array_divide($array)
    {

        return array(array_keys($array), array_values($array));
    }
}

if ( ! function_exists('array_subset'))
{
    /**
     * Extract elements from a given array into a new array
     *
     * @author 	Kader Bouyakoub
     * @link 	@bkader <github>
     * @link 	@KaderBouyakoub <twitter>
     * @link 	http://www.bkader.com/
     *
     * @access  public
     * @param   array
     * @param   array
     * @return  array
     */
    function array_subset($array, $keys)
    {
        return array_intersect_key($array, array_flip((array) $keys));
    }
}

/**
 * Get all of the given array except for a specified array of items.
 *
 * @param  array  $array
 * @param  array  $keys
 * @return array
 */
if ( ! function_exists('array_remove'))
{
    /**
     * Returns a new array from a given one after removing
     * the specified elements
     *
     * @author 	Kader Bouyakoub
     * @link 	@bkader <github>
     * @link 	@KaderBouyakoub <twitter>
     * @link 	http://www.bkader.com/
     *
     * @access  public
     * @param   array
     * @param   array
     * @return  array
     */
    function array_remove($array, $keys)
    {

        return array_diff_key($array, array_flip((array) $keys));
    }

}

/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */