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

/**
 * Generates a random password
 *
 * @return string
 */
if ( ! function_exists('generate_random_password'))
{
    function generate_random_password()
    {
        $characters = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alpha_length = strlen($characters) - 1;

        for ($i = 0; $i < 8; $i++)
        {
            $n = rand(0, $alpha_length);
            $pass[] = $characters[$n];
        }

        return implode($pass);
    }
}

/* End of file functions_helper.php */
/* Location: ./application/helpers/functions_helper.php */