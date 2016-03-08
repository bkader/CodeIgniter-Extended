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

if ( ! function_exists('assets_url'))
{
    /**
     * Generates the URL to assets folder
     *
     * @access  public
     * @param   string
     * @return  string
     */
    function assets_url($uri = '')
    {
        return base_url('assets/'.$uri);
    }
}

// ------------------------------------------------------------------------

if ( ! function_exists('css_url'))
{
    /**
     * Direct link to a CSS file
     *
     * @access  public
     * @param   string
     * @return  string
     */
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

if ( ! function_exists('css'))
{
	/**
	 * Generates a link tag
	 *
	 * @access  public
	 * @param   string
	 * @param   string
	 * @return  string
	 */
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

// ------------------------------------------------------------------------

if ( ! function_exists('js_url'))
{
    /**
     * Direct link to a JS file
     *
     * @access  public
     * @param   string
     * @param   boolean  (disable extension: for require.js)
     * @return  string
     */
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

if ( ! function_exists('js'))
{
	/**
	 * Generates a link tag
	 *
	 * @access  public
	 * @param   string
	 * @param   string
	 * @return  string
	 */
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

// ------------------------------------------------------------------------

if ( ! function_exists('img_url'))
{
    /**
     * Direct link to an image file
     * (image extension is necessary)
     *
     * @access  public
     * @param   string
     * @return  string
     */
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

if ( ! function_exists('img'))
{
	/**
	 * Generates an html img tag
	 *
	 * @access  public
	 * @param   string
	 * @param   mixed
	 * @return  string
	 */
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


if ( ! function_exists('img_alt'))
{
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

/* End of file asset_helper.php */
/* Location: ./application/helpers/asset_helper.php */