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
 * Instance of CI
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
 * Creates a HTML tag
 *
 * @access 	public
 * @param 	string
 * @param 	mixed
 * @param 	mixed
 * @return 	string
 */
if ( ! function_exists('html_tag'))
{
	function html_tag($tag, $attr = array(), $content = false)
	{
		// list of void elements (tags that can not have content)
		static $void_elements = array(
			// html4
			"area","base","br","col","hr","img","input","link","meta","param",
			// html5
			"command","embed","keygen","source","track","wbr",
			// html5.1
			"menuitem",
		);

		// construct the HTML
		$html = '<'.$tag;
		if ( ! empty($attr))
			$html .= ' '.(is_array($attr)) ? _stringify_attributes($attr) : $attr;

		// a void element?
		if (in_array(strtolower($tag), $void_elements))
			$html .= ' />';
		else
			$html .= '>'.$content.'</'.$tag.'>';

		return $html;
	}
}

/**
 * Generates a link tag
 *
 * @access  public
 * @param   string
 * @param   string
 * @return  string
 */
if ( ! function_exists('css'))
{
    function css($file = null, $media = false)
    {
    	// Load functions_helper if not loaded
    	if ( ! function_exists('css_url'))
    	{
    		_ci()->load->helper('functions');
    	}

        if ($file)
        {
            $tag = '<link rel="stylesheet" type="text/css" href="'.css_url($file).'"';
            if ($media) {
                $tag .= ' media="'.$media.'"';
            }
            $tag .= ' />';
            return $tag;
        }
        return false;
    }
}

/**
 * Generates a link tag
 *
 * @access  public
 * @param   string
 * @param   string
 * @return  string
 */
if ( ! function_exists('js'))
{
    function js($file = false)
    {
    	// Load functions_helper if not loaded
    	if ( ! function_exists('js_url'))
    	{
    		_ci()->load->helper('functions');
    	}

        if ($file)
        {
            $tag = '<script type="text/javascript" src="'.js_url($file).'"></script>';
            return $tag;
        }
        return false;
    }
}

/**
 * Generates an html img tag
 *
 * @access  public
 * @param   string
 * @param   mixed
 * @return  string
 */
if ( ! function_exists('img'))
{
    function img($file = null, $attr = null)
    {
    	// Load functions_helper if not loaded
    	if ( ! function_exists('img_url'))
    	{
    		_ci()->load->helper('functions');
    	}

        if (strlen($file) > 0)
        {
            $tag = '<img src="'.img_url($file).'"'.($attr ? _stringify_attributes($attr):'').' />';
            return $tag;
        }
        return null;
    }
}


/**
 * Generates an image using placehold.it
 *
 * @access  public
 * @param   mixed
 * @param   integer
 * @param   string
 * @param   string
 * @param   string
 * @param   mixed
 * @return  string
 */
if ( ! function_exists('img_alt'))
{
    function img_alt($width, $height = null, $text = null, $background = null, $foreground = null, $attr = null)
    {

        if (is_array($width))
        {
            $params = $width;
        }
        else
        {
            $params = array();
            $params['width']      = $width;
            $params['height']     = $height;
            $params['text']       = $text;
            $params['background'] = $background;
            $params['foreground'] = $foreground;
            $params['attr']       = $attr;
        }

        $params['height']       = (empty($params['height'])) ? $params['width'] : $params['height'];
        $params['text']         = (empty($params['text'])) ? $params['width'].' x '. $params['height'] : $params['text'];
        $params['background']   = (empty($params['background'])) ? 'CCCCCC' : $params['height'];
        $params['foreground']   = (empty($params['foreground'])) ? '969696' : $params['foreground'];

        return '<img src="http://placehold.it/'. $params['width'].'x'. $params['height'].'/'.$params['background'].'/'.$params['foreground'].'&text='. $params['text'].'" alt="Placeholder"'.(isset($params['attr']) ? _stringify_attributes($params['attr']):'').' />';
    }
}

/**
 * Creates a mailto link.
 *
 * @param	string	The email address
 * @param	string	The text value
 * @param	string	The subject
 * @return	string	The mailto link
 */
if ( ! function_exists('mail_to'))
{
	function mail_to($email, $text = null, $subject = null, $attr = null)
	{
		$text or $text = $email;
		$subject and $subject = '?subject='.$subject;
		$tag = '<a href="mailto:'.$email.$subject.'"';
		if ($attr)
			$tag .= _stringify_attributes($attr);
		$tag .= '>'.$text.'</a>';
		return $tag;
	}
}

/**
 * Creates a mailto link with Javascript to prevent bots from picking up the
 * email address.
 *
 * @param	string	the email address
 * @param	string	the text value
 * @param	string	the subject
 * @param	array	attributes for the tag
 * @return	string	the javascript code containg email
 */
if ( ! function_exists('mail_to_safe'))
{
	function mail_to_safe($email, $text = null, $subject = null, $attr = null)
	{
		$text or $text = str_replace('@', '[at]', $email);
		$email = explode("@", $email);
		$subject and $subject = '?subject='.$subject;

		$attr = _stringify_attributes($attr);
		$attr = ($attr == '' ? '' : ' ').$attr;

		$output = '<script type="text/javascript">';
		$output .= '(function() {';
		$output .= 'var user = "'.$email[0].'";';
		$output .= 'var at = "@";';
		$output .= 'var server = "'.$email[1].'";';
		$output .= "document.write('<a href=\"' + 'mail' + 'to:' + user + at + server + '$subject\"$attr>$text</a>');";
		$output .= '})();';
		$output .= '</script>';
		return $output;
	}
}

/**
 * Generates a html meta tag
 *
 * @param	string|array	multiple inputs or name/http-equiv value
 * @param	string			content value
 * @param	string			name or http-equiv
 * @return	string
 */
function meta($name = '', $content = '', $type = 'name')
{
	if (is_array($name))
	{
		$output = '';
		foreach ($name as $key => $val)
		{
			$output[] = meta($key, $val);
		}
		return implode("\n", $output);
	}
	$meta = '<meta ';
	$meta .= (strpos($name, 'og:') === 0 or strpos($name, 'fb:') === 0) 
			? 'property="'.$name.'"'
			: 'name="'.$name.'"';
	$meta .= ' content="'.$content.'" />';
	return $meta;
}

/**
 * Generates a html5 audio tag
 * It is required that you set html5 as the doctype to use this method
 *
 * @param	mixed 	one or multiple audio sources
 * @param	mixed 	tag attributes
 * @return	string
 */
if ( ! function_exists('audio'))
{
	function audio($src = '', $attr = null)
	{
		if (is_array($src))
		{
			$output = '';
			foreach ($src as $elem)
			{
				$output[] = audio($elem);
			}
			return implode("\n", $output);
		}
		return '<source src="'.$src.'"'.($attr ? _stringify_attributes($attr) : '').' />';
	}
}

/* End of file MY_html_helper.php */
/* Location: ./application/helpers/MY_html_helper.php */