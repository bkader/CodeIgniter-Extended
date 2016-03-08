<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Path Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/path_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('set_realpath'))
{
	/**
	 * Set Realpath
	 *
	 * @param	string
	 * @param	bool	checks to see if the path exists
	 * @return	string
	 */
	function set_realpath($path, $check_existance = FALSE)
	{
		// Security check to make sure the path is NOT a URL. No remote file inclusion!
		if (preg_match('#^(http:\/\/|https:\/\/|www\.|ftp)#i', $path) OR filter_var($path, FILTER_VALIDATE_IP) === $path )
		{
			show_error('The path you submitted must be a local server path, not a URL');
		}

		// Resolve the path
		if (realpath($path) !== FALSE)
		{
			$path = realpath($path);
		}
		elseif ($check_existance && ! is_dir($path) && ! is_file($path))
		{
			show_error('Not a valid path: '.$path);
		}

		// Add a trailing slash, if this is a directory
		return is_dir($path) ? rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR : $path;
	}
}

/* [ADDED] */

if ( ! function_exists('real_path'))
{
    /**
     * This function does the same as realpath WITHOUT checking for existence.
     *
     * @author 	Kader Bouyakoub
     * @link 	@bkader <github>
     * @link 	@KaderBouyakoub <twitter>
     * @link 	http://www.bkader.com/
     *
     * @access  public
     * @param   string
     * @return  string
     */
    function real_path($path)
    {
        $path = str_replace('\\', '/', $path);
        $out = array();
        foreach (explode('/', $path) as $i => $fold)
        {
            if ($fold == '' or $fold == '.')
            {
                continue;
            }

            if ($fold == '..' and $i > 0 and end($out) != '..')
            {
                array_pop($out);
            }
            else
            {
                $out[] = $fold;
            }
        }
        return ($path{0} == '/' ? '/' : '').join('/', $out); 
    }
}

if ( ! function_exists('path_merge'))
{
    /**
     * Merges two strings with common middle part
     *
     * @author  Kader Bouyakoub
     * @link    @bkader <github>
     * @link    @KaderBouyakoub <twitter>
     * @link    http://www.bkader.com/
     *
     * @access  public
     * @param   string
     * @param   string
     * @return  string
     */
    function path_merge($path1, $path2)
    {
        $p1 = explode('/', trim($path1,' /'));
        $p2 = explode('/', trim($path2,' /'));
        $len = count($p1);
        do
        {
            if (array_slice($p1, -$len) === array_slice($p2, 0, $len))
            {

                return '/'.implode('/', array_slice($p1, 0, -$len)).'/'.implode('/', $p2);
            }
        }
        while (--$len);

        return '/'.implode('/', array_merge($p1, $p2));
    }

}

/* End of file path_helper.php */
/* Location: ./system/helpers/path_helper.php */