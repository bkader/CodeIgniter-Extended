<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Debug functions
 *
 * @package 	CodeIgniter
 * @subpackage 	Helpers
 *
 * @author 		Kader Bouyakoub 	<bkader.com>
 * @link 		@bkader 			<github>
 * @link 		@KaderBouyakoub 	<twitter>
 */

if ( ! function_exists('_before'))
{
	/**
	 * Print some styling before debugging
	 *
	 * @access 	public
	 * @param 	void
	 * @return 	void
	 */
	function _before()
	{
		$before = '<div style="padding:10px 20px;background-color:#fbe6f2;border:1px solid #d893a1;color:#000;font:12px/1.4 Tahoma, Arial, sans-serif;">'."\n";
		$before .= '<h5 style="font-family:verdana,sans-serif; font-weight:bold; font-size:18px;">Debug Helper Output</h5>'."\n";
		$before .= '<pre>'."\n";
		return $before;
	}
}

if ( ! function_exists('_after'))
{
	/**
	 * Print closing tags
	 *
	 * @access 	public
	 * @param 	void
	 * @return 	void
	 */
	function _after()
	{
		$after = '</pre>'."\n";
		$after .= '</div>'."\n";
		return $after;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('debug'))
{
	/**
	 * Debug general variables
	 *
	 * @access 	public
	 * @param 	mixed
	 * @return 	boolean 	If set, if uses exit;
	 */
	function debug($var = '', $exit = false)
	{
		echo _before();
		if (is_array($var) or is_object($var))
		{
			print_r($var);
		}
		else
		{
			echo $var;
		}
		echo _after();
		if ($exit === true) exit;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('debug_last_query'))
{
	/**
	 * Debug last query
	 *
	 * @access 	public
	 * @param 	void
	 * @return 	string
	 */
	function debug_last_query()
	{
		$CI =& get_instance();
		echo _before();
		echo $CI->db->last_query();
		echo _after();
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('debug_query_result'))
{
	/**
	 * Debug last query's result
	 *
	 * @access 	public
	 * @param 	void
	 * @return 	string
	 */
	function debug_query_result($query = '')
	{
		echo _before();
		print_r($query->result_array());
		echo _after();
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('debug_session'))
{
	/**
	 * Debug session variables
	 *
	 * @access 	public
	 * @param 	void
	 * @return 	string
	 */
	function debug_session($exit = false)
	{
		$CI =& get_instance();
		echo _before();
		print_r($CI->session->all_userdata());
		echo _after();
		if ($exit === true) exit;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('debug_log'))
{
	function debug_log($message = '')
	{
		is_array($message) ? log_message('debug', print_r($message)) : log_message('debug', $message);
	}
}

/* End of file debug_helper.php */
/* Location: ./system/helpers/debug_helper.php */