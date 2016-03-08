<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Bcrypt Helper
 *
 * @package     CodeIgniter Starter Kit
 * @author      Kader Bouyakoub
 *
 * @package     CodeIgniter
 * @author      EllisLab Development Team
 */

if ( ! function_exists('bcrypt_hash'))
{
    /**
     * Hash Password
     *
     * @access  public
     * @param   string
     * @return  string
     */
    function bcrypt_hash($password = null, $salt = false)
    {
        $CI =& get_instance();
        if(isset($password) && strlen($password) > 0)
        {
            $CI->load->library('bcrypt');
            return $CI->bcrypt->hash($password, $salt);
        }
        return null;
    }
}

if ( ! function_exists('bcrypt_check')) {
    /**
     * Check password
     *
     * @access  public
     * @param   string  $password
     * @param   string  $hashed
     * @return  boolean
     */
    function bcrypt_check($password, $hashed)
    {
        $CI =& get_instance();
        $CI->load->library('bcrypt');
        return $CI->bcrypt->check($password, $hashed);
    }
}

if ( ! function_exists('bcrypt_salt'))
{
    function bcrypt_salt()
    {
        $CI =& get_instance();
        $CI->load->library('bcrypt');
        return $CI->bcrypt->get_salt();
    }
}

/* End of file hash_helper.php */
/* Location: ./system/helpers/hash_helper.php */