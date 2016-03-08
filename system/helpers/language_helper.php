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
 * CodeIgniter Language Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/language_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('lang'))
{
	/**
	 * Lang
	 *
	 * Fetches a language variable and optionally outputs a form label
	 *
	 * @param	string	$line		The language line
	 * @param	string	$for		The "for" value (id of the form element)
	 * @param	array	$attributes	Any additional HTML attributes
	 * @return	string
	 */
	function lang($line, $for = '', $attributes = array())
	{
		$line = get_instance()->lang->line($line);

		if ($for !== '')
		{
			$line = '<label for="'.$for.'"'._stringify_attributes($attributes).'>'.$line.'</label>';
		}

		return $line;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('line'))
{
	/**
	 * Get a single phrase by name and index
	 *
	 * @access  public
	 * @param   string
	 * @param   string
	 * @param   array
	 * @return  string
	 */
    function line($name, $args = null, $default = false)
    {
        $line = _ci()->lang->line($name);
        $line or $line = ( ! $default) ? $name: $default;
        return ($args !== null) ? vsprintf($line, (array) $args): $line;
    }
}

if ( ! function_exists('_e'))
{
	/**
	 * Echo a single phrase
	 *
	 * @access  public
	 * @param   string
	 * @param   array
	 * @param   string
	 * @return  string
	 */
    function _e($str, $args = null, $default = false)
    {
        echo line($str, $args, $default);
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists('languages'))
{
	function languages($single = false)
	{
		$CI =& get_instance();
		if ( ! class_exists('CI_I18n'))
			$CI->load->library('i18n');
		$languages = $CI->i18n->languages();
        return ($single and array_key_exists($single, $languages))
                ? $languages[$single] : $languages;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('current_lang'))
{
	/**
	 * Get current language data
	 *
	 * @param   string
	 * @return  mixed
	 */
    function current_lang($return = FALSE)
    {
    	$CI =& get_instance();
		if ( ! class_exists('CI_I18n'))
			$CI->load->library('i18n');
        return $CI->i18n->get_current($return);
    }
}

/* End of file language_helper.php */
/* Location: ./system/helpers/language_helper.php */