<?php
defined('BASEPATH') or exit('No direct script access allowed');

if ( ! function_exists('_ci'))
{
    /**
     * Get instance of CI
     *
     * @access   public
     * @param    void
     * @return   instance
     */
	function _ci()
	{
		$CI =& get_instance();
		return $CI;
	}
}

if ( ! function_exists('return_json'))
{
    /**
     * Outputs anything in JSON format
     *
     * @access   public
     * @param    mixed
     * @param    boolean
     * @return   string
     */
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

if ( ! function_exists('beautify_json'))
{
    /**
     * Makes the json encoded string human-readable
     *
     * @access 	public
     * @param 	mixed
     * @return 	string
     */
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
            if ($char == '"' and $prev_char != '\\')
            {
                $out_of_quotes = !$out_of_quotes;
            }
            // if this character is the end of an element, output a new line and indent the next line
            elseif (($char == '}' or $char == ']') and $out_of_quotes)
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
            if (($char == ',' or $char == '{' or $char == '[') and $out_of_quotes)
            {
                $result .= $new_line;

                if ($char == '{' or $char == '[')
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
        return $result.$new_line;
    }
}

if ( ! function_exists('render'))
{
    /**
     * Using $this->load->view()
     *
     * @access   public
     * @param    string
     * @param    array
     * @param    boolean
     * @return   void
     */
    function render($view, $data = array(), $return = false)
    {
        return _ci()->load->view($view, $data, $return);
    }
}

if ( ! function_exists('e'))
{
    /**
     * Uses php htmlentities
     *
     * @param   string
     * @return  string
     */
    function e($str)
    {
        return htmlentities($str, ENT_QUOTES, 'UTF-8');
    }
}

if ( ! function_exists('str_to_bool'))
{
    /**
     * Coverts a string boolean representation to a true boolean
     *
     * @access  public
     * @param   string
     * @param   boolean
     * @return  boolean
     */
    function str_to_bool($str, $strict = false)
    {
        // If no string is provided, we return 'false'
        if (empty($str))
        {
            return false;
        }

        // If the string is already a boolean, no need to convert it
        if (is_bool($str))
        {
            return $str;
        }

        $str = strtolower(@ (string) $str);
        
        if (in_array($str, array('non', 'no', 'n', 'false', 'off')))
        {
            return false;
        }

        if ($strict)
        {
            return in_array($str, array('oui', 'yes', 'y', 'true', 'on', '1'));
        }
        return true;
    }
}

if ( ! function_exists('is_str_to_bool'))
{
    /**
     * Checks whether a given value can be a strict string
     * representation or a true boolean
     *
     * @access  public
     * @param   string
     * @param   boolean
     * @return  boolean
     */
    function is_str_to_bool($str, $strict = false)
    {
        if ( ! $strict)
        {
            $str_test = @ (string) $str;
            if (is_numeric($str_test))
            {
                return true;
            }
        }
        return ( ! str_to_bool($str) or str_to_bool($str, true) );
    }
}


if ( ! function_exists('is_https'))
{
    /**
     * Detects HTTPS
     *
     * @access  public
     * @param   void
     * @return  boolean
     */
    function is_https()
    {
        return
            ( ! empty($_SERVER['HTTPS']) and strtolower($_SERVER['HTTPS']) !== 'off')
            ? true
            : (
                (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === '')
                ? true
                : (
                    ( ! empty($_SERVER['HTTP_FRONT_END_HTTPS']) and strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off')
                    ? true
                    : false
                )
            );
    }
}

if ( ! function_exists('get_host'))
{
    /**
     * Returns server's name
     *
     * @access  public
     * @param   void
     * @return  string
     */
    function get_host()
    {
        if (isset($_SERVER['SERVER_NAME']))
        {
            return $_SERVER['SERVER_NAME'];
        }
        elseif (isset($_SERVER['HOSTNAME']))
        {
            return $_SERVER['HOSTNAME'];
        }
        elseif (isset($_SERVER['SERVER_ADDR']))
        {
            return strpos($_SERVER['SERVER_ADDR'], '::') === false
                    ? $_SERVER['SERVER_ADDR']
                    : '['.$_SERVER['SERVER_ADDR'].']';
        }
        else
        {
            return 'localhost';
        }
    }
}

if ( ! function_exists('urlinfo'))
{
    /**
     * Returns an array of URL and URI data
     *
     * @access  public
     * @param   void
     * @return  array
     */
    function urlinfo() 
    {
        $is_https        = is_https();
        $server_protocol = is_https() ? 'https' : 'http';
        $server_name     = get_host();

        if (isset($_SERVER['SERVER_PORT']) and !(strpos($server_name, '::') === false ? strpos($server_name, ':') === false : strpos($server_name, ']:') === false)
                and (($server_protocol == 'http'
                and $_SERVER['SERVER_PORT'] != 80 ) || ($server_protocol == 'https' and $_SERVER['SERVER_PORT'] != 443)))
        {
            $server_name_extra = $server_name.':'.$_SERVER['SERVER_PORT'];
            $port = (int) $_SERVER['SERVER_PORT'];

        }
        else
        {
            $server_name_extra = $server_name;
            $port = $is_https ? 443 : 80;
        }
        $server_url = $server_protocol.'://'.$server_name_extra;

        $script_name = $_SERVER['SCRIPT_NAME'];
        $script_path = str_replace(basename($script_name), '', $script_name);

        if (defined('FCPATH'))
        {
            $base_url = $server_url.rtrim(preg_replace('/'.preg_quote(str_replace(FCPATH, '', path_merge(FCPATH, $script_path).'/'), '/').'$/', '', $script_path), '/').'/';

        }
        else
        {
            $base_url = $server_url.'/';
        }

        $base_uri = parse_url($base_url, PHP_URL_PATH);

        if (substr($base_uri, 0, 1) != '/')
        {
            $base_uri = '/'.$base_uri;
        }

        if (substr($base_uri, -1, 1) != '/')
        {
            $base_uri .= '/';
        }
        $current_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
        $current_url = $server_url.$current_uri;
        $server_url .= '/';

        $current_uri_string   = parse_url($current_url, PHP_URL_PATH);
        $current_query_string = parse_url($current_url, PHP_URL_QUERY);

        return compact(
            'base_url',
            'base_uri',
            'current_url',
            'current_uri',
            'current_uri_string',
            'current_query_string',
            'server_url',
            'server_name',
            'server_protocol',
            'is_https',
            'script_name',
            'script_path',
            'port'
        );
    }

}

/* End of file functions_helper.php */
/* Location: ./application/helpers/functions_helper.php */