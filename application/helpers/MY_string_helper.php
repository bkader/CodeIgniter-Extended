<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Masks a string with a give char
 *
 * @access 	public
 * @param 	string
 * @param 	integer
 * @param 	integer
 * @param 	string
 * @return 	string
 */
if ( ! function_exists('mask_string'))
{
	function mask_string($str = null, $start = 3, $end = 3, $mask = '*')
	{
		// Prepare the length of the string
		$length = strlen($str);

		// We then prepare the array that will holds all of chars
		$chars = array();

		foreach(str_split($str) as $index => $char)
		{
			if ($char === ' ')
			{
				$chars[$index] = ' ';
			}
			else
			{
				$chars[$index] = ($index <= ($start - 1) or $index >= ($length - $end))
									? $char : $mask;
			}
			//$chars[$index] = ($char === ' ') ? ' ' : $mask;
		}
		return implode('', $chars);
	}
}

/* End of file MY_string_helper.php */
/* Location: ./application/helpers/MY_string_helper.php */