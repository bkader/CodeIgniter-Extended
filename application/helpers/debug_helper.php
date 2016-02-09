<?php
defined('BASEPATH') or exit('No direct script access allowed');

if ( ! function_exists('_ci'))
{
	function _ci()
	{
		$CI =& get_instance();
		return $CI;
	}
}

if ( ! function_exists('_before'))
{
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
	function debug_last_query()
	{
		echo _before();
		echo _ci()->db->last_query();
		echo _after();
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('debug_query_result'))
{
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
	function debug_session()
	{
		echo _before();
		print_r(_ci()->session->all_userdata());
		echo _after();
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
/* Location: ./application/helpers/debug_helper.php */