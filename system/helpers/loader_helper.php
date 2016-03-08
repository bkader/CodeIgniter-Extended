<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Part of CodeIgniter-Extended
 *
 * @package 	CodeIgniter-Extended
 * @subpackage 	Helpers
 * @author 		Kader Bouyakoub
 * @link 		@bkader <github>
 * @link 		@KaderBouyakoub <twitter>
 */

/**
 * NOTICE:
 *
 * This helper is not really necessary, it only shorten
 * the way to load CodeIgniter loadable files
 */

if ( ! function_exists('load_config'))
{
	/**
	 * Loads a configuration file.
	 *
	 * @access 	public
	 * @param 	mixed
	 * @param 	boolean
	 * @param 	boolean
	 * @return 	void
	 */
	function load_config($file, $use_sections = false, $fail_gracefully = false)
	{
		$CI =& get_instance();
		return $CI->config->load($file, $use_sections, $fail_gracefully);
	}
}

if ( ! function_exists('load_helper'))
{
	/**
	 * Load a helper
	 *
	 * @access 	public
	 * @param 	mixed
	 * @return 	void
	 */
	function load_helper($helpers)
	{
		$CI =& get_instance();
		return $CI->load->helper($helpers);
	}
}

if ( ! function_exists('load_lang'))
{
	/**
	 * Loads a language file
	 *
	 * @access 	public
	 * @param 	mixed
	 * @param 	string
	 * @return 	void
	 */
	function load_lang($files, $lang = '')
	{
		$CI =& get_instance();
		return $CI->lang->load($files, $lang);
	}
}

if ( ! function_exists('load_library'))
{
	/**
	 * Loading CodeIgniter library and use it right away
	 *
	 * Example:
	 *		$bcrypt = load_library('bcrypt');
	 *		echo $bcrypt->hash('PASSWORD');
	 *
	 * @access 	public
	 * @param 	mixed
	 * @param 	mixed
	 * @param 	string
	 * @return 	object
	 */
	function load_library($library, $params = null, $object_name = null)
	{
		$CI =& get_instance();
		if (is_array($library))
		{
			return $CI->load->library($library);
		}
		else
		{
			$CI->load->library($library, $params, $object_name);
			return $CI->{$library};
		}
	}
}

if ( ! function_exists('load_model'))
{
	/**
	 * Loads a model an use it right away
	 *
	 * @access 	public
	 * @param 	mixed
	 * @param 	string
	 * @param 	string
	 */
	function load_model($model, $name = '', $db_conn = false)
	{
		$CI =& get_instance();
		if (is_array($model))
		{
			return $CI->load->model($model);
		}
		else
		{
			$CI->load->model($model, $name, $db_conn);
			return $CI->{$model};
		}
	}
}

if ( ! function_exists('load_view'))
{
	/**
	 * Loading view file
	 *
	 * @access 	public
	 * @param 	string
	 * @param 	array
	 * @param 	boolean
	 * @return 	void
	 */
	function load_view($view, $data = array(), $return = false)
	{
		if ( ! function_exists('render'))
		{
			$CI =& get_instance();
			return $CI->load->view($view, $data, $return);
		}
		return render($view, $data, $return);
	}
}

if ( ! function_exists('load_vars'))
{
	/**
	 * Takes an associative array as input and generates
	 * variables using PHP extract() function.
	 *
	 * @access 	public
	 * @param 	mixed
	 * @param 	mixed
	 * @return 	void
	 */
	function load_vars($vars, $val = '')
	{
		$CI =& get_instance();
		return $CI->load->vars($vars, $val);
	}
}

if ( ! function_exists('load_file'))
{
	/**
	 * This is a generic file loading method.
	 *
	 * @access 	public
	 * @param 	string
	 * @param 	boolean
	 * @return 	void
	 */
	function load_file($path, $return = false)
	{
		$CI =& get_instance();
		return $CI->load->file($path, $return);
	}
}

/* End of file loader_helper.php */
/* Location: ./system/helpers/loader_helper.php */