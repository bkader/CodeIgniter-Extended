<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Part of CodeIgniter
 *
 * @package 	CodeIgniter-Extended
 * @subpackage 	Helpers
 * @author 		Kader Bouyakoub
 * @link 		@bkader <github>
 * @link 		@KaderBouyakoub <twitter>
 */

/**
 * Add order suffix to numbers ex. 1st 2nd 3rd 4th 5th
 *
 * @param   int
 * @return  string
 * @link    http://snipplr.com/view/4627/a-function-to-add-a-prefix-to-numbers-ex-1st-2nd-3rd-4th-5th/
 */
if ( ! function_exists('ordinalize'))
{
	function ordinalize($num)
	{
		if ( ! is_numeric($num))
		{
			return $num;
		}
		if (in_array(($num % 100), range(11, 13)))
		{
			return $num . 'th';
		}
		else
		{
			switch ($num % 10)
			{
				case 1:
					return $num . 'st';
					break;
				case 2:
					return $num . 'nd';
					break;
				case 3:
					return $num . 'rd';
					break;
				default:
					return $num . 'th';
					break;
			}
		}
	}
}

/**
 * Translate string to 7-bit ASCII
 * Only works with UTF-8.
 *
 * @param   string
 * @param   boolean
 * @return  string
 */
if ( ! function_exists('ascii'))
{
	function ascii($str, $allow_non_ascii = false)
	{
		// Translate unicode characters to their simpler counterparts
		require_once APPPATH.'config/foreign_chars.php';
		$str = preg_replace(
			array_keys($foreign_characters),
			array_values($foreign_characters),
			$str
		);
		return ( ! $allow_non_ascii) ? preg_replace('/[^\x09\x0A\x0D\x20-\x7E]/', '', $str) : $str;
	}
}

/* End of file MY_inflector_helper.php */
/* Location: ./application/helpers/MY_inflector_helper.php */