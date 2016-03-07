<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Get instance of CI
 *
 * @access   public
 * @param    void
 * @return   instance
 */
if ( ! function_exists('_ci'))
{
	function _ci()
	{
		$CI =& get_instance();
		return $CI;
	}
}

/**
 * Returns config item using dot-notation
 *
 * @access  public
 * @param   string
 * @param   mixed
 * @return  mixed
 */
if ( ! function_exists('config'))
{
    function config($item, $default = false)
    {
        return _ci()->config->get($item, $default);
    }
}

/**
 * Outputs anything in JSON format
 *
 * @access   public
 * @param    mixed
 * @param    boolean
 * @return   string
 */
if ( ! function_exists('return_json'))
{
	function return_json($str, $b = false)
	{
        // If b (beautify is set to true)
        $str = ($b === true) ? beautify_json($str) : json_encode($str);
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo $str;
	}
}

/**
 * Makes the json encoded string human-readable
 *
 * @access 	public
 * @param 	mixed
 * @return 	string
 */
if ( ! function_exists('beautify_json'))
{
    function beautify_json($str = false)
    {
        // make sure array is provided
        if ( ! $str or empty($str))
        	return null;

        //Encode the string
        $json = json_encode($str);

        $result        = '';
        $pos           = 0;
        $str_len       = strlen($json);
        $indent_str    = '  ';
        $new_line      = "\n";
        $prev_char     = '';
        $out_of_quotes = true;

        for ($i = 0; $i <= $str_len; $i++)
        {
            // grab the next character in the string
            $char = substr($json, $i, 1);

            // are we inside a quoted string?
            if ($char == '"' && $prev_char != '\\')
            {
                $out_of_quotes = !$out_of_quotes;
            }
            // if this character is the end of an element, output a new line and indent the next line
            elseif (($char == '}' OR $char == ']') && $out_of_quotes)
            {
                $result .= $new_line;
                $pos--;

                for ($j = 0; $j < $pos; $j++)
                {
                    $result .= $indent_str;
                }
            }

            // add the character to the result string
            $result .= $char;

            // if the last character was the beginning of an element, output a new line and indent the next line
            if (($char == ',' OR $char == '{' OR $char == '[') && $out_of_quotes)
            {
                $result .= $new_line;

                if ($char == '{' OR $char == '[')
                {
                    $pos++;
                }

                for ($j = 0; $j < $pos; $j++)
                {
                    $result .= $indent_str;
                }
            }

            $prev_char = $char;
        }

        // return result
        return $result . $new_line;
    }
}

/* ============================================================
 * ASSETS FUNCTIONS
 * ============================================================ */

/**
 * Generates the URL to assets folder
 *
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('assets_url'))
{
    function assets_url($uri = '')
    {
        return base_url('assets/'.$uri);
    }
}

/**
 * Direct link to a CSS file
 *
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('css_url'))
{
    function css_url($file = null)
    {
        if ($file)
        {
            if (filter_var($file, FILTER_VALIDATE_URL))
            {
                return $file;
            }
            $file = preg_replace('"\.css$"', '', $file).'.css';
            return assets_url('css/'.$file);

        }
        return false;
    }

}

/**
 * Direct link to a JS file
 *
 * @access  public
 * @param   string
 * @param   boolean  (disable extension: for require.js)
 * @return  string
 */
if ( ! function_exists('js_url'))
{
    function js_url($file = null, $ext = true)
    {
        if ($file)
        {
            if (filter_var($file, FILTER_VALIDATE_URL))
            {
                return $file;
            }
            $file = preg_replace('"\.js$"', '', $file).($ext === true ? '.js' : '');
            return assets_url('js/'.$file);

        }
    }
}

/**
 * Direct link to an image file
 * (image extension is necessary)
 *
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('img_url'))
{
    function img_url($file = null)
    {
        if ($file)
        {
            if (filter_var($file, FILTER_VALIDATE_URL))
            {
                return $file;
            }
            return assets_url('img/'.$file);
        }
        return false;
    }
}

/**
 * Using $this->load->view()
 *
 * @access   public
 * @param    string
 * @param    array
 * @param    boolean
 * @return   void
 */
if ( ! function_exists('render'))
{
    function render($view, $data = array(), $return = false)
    {
        return _ci()->load->view($view, $data, $return);
    }
}

/**
 * Uses php htmlentities
 *
 * @param   string
 * @return  string
 */
if ( ! function_exists('e'))
{
    function e($str)
    {
        return htmlentities($str, ENT_QUOTES, 'UTF-8');
    }
}

/* End of file functions_helper.php */
/* Location: ./application/helpers/functions_helper.php */