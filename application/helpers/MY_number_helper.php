<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Converts a number into a more readable human-type number.
 *
 * @param   integer
 * @param   integer
 * @return  string
 */
if ( ! function_exists('quantity'))
{
	function quantity($num, $decimals = 0)
	{
		if ($num >= 1000 && $num < 1000000)
		{
			$num = sprintf('%01.'.$decimals.'f', (sprintf('%01.0f', $num) / 1000)).'K';
		}
		elseif ($num >= 1000000 && $num < 1000000000)
		{
			$num = sprintf('%01.'.$decimals.'f', (sprintf('%01.0f', $num) / 1000000)).'M';
		}
		elseif ($num >= 1000000000 && $num < 1000000000000)
		{
			$num = sprintf('%01.'.$decimals.'f', (sprintf('%01.0f', $num) / 1000000000)).'B';
		}
		elseif ($num >= 1000000000000)
		{
			$num = sprintf('%01.'.$decimals.'f', (sprintf('%01.0f', $num) / 1000000000000)).'T';
		}

		return $num;
	}
}

/* End of file MY_number_helper.php */
/* Location: ./application/helpers/MY_number_helper.php */