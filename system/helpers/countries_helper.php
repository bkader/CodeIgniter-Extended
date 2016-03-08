<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Countries Helper
 *
 * @package 	CodeIgniter
 * @subpackage 	Helpers
 *
 * @author 		Kader Bouyakoub
 * @link 		@bkader <github>
 * @link 		@KaderBouyakoub <twitter>
 */


if ( ! function_exists('countries_menu'))
{
	/**
	 * Generates a html select with all countries
	 *
	 * @access 	public
	 * @param 	string
	 * @param 	string
	 * @param 	string
	 * @param 	mixed
	 * @return 	string
	 */
	function countries_menu($default = 'DZ', $class = '', $name = 'countries', $attributes = '')
	{
		$CI =& get_instance();
		
		$default or $default = 'DZ';

		$menu = '<select name="'.$name.'"';
		if ($class !== '')
		{
			$menu .= ' class="'.$class.'"';
		}

		$menu .= _stringify_attributes($attributes).">\n";
		
		//foreach (timezones() as $key => $val)
		foreach (countries() as $key => $val)
		{
			$selected = ($default === $key) ? ' selected="selected"' : '';
			$menu .= '<option value="'.$key.'"'.$selected.'>'._dgettext("system", $val['name'])."</option>\n";
		}

		return $menu.'</select>';
	}
}

if ( ! function_exists('countries'))
{
	/**
	 * List all countries or only one
	 *
	 * @access 	public
	 * @param 	string
	 * @return 	array
	 */
	function countries($single = '', $return = false)
	{
		include_once BASEPATH.'vendor/countries.php';
		if ($single and array_key_exists(strtoupper($single), $countries))
		{
			$single = strtoupper($single);
			return ($return and array_key_exists($return, $countries[$single]))
					? $countries[$single][$return]
					: $countries[$single];
		}
		return $countries;
	}
}
/* End of file countries_helper.php */
/* Location: ./system/helpers/countries_helper.php */