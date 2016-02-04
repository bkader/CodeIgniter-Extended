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

if ( ! function_exists('_ci'))
{
    /**
     * Get instance of CI
     *
     * @access  public
     * @param   void
     * @return  object
     */
    function _ci()
    {
        $CI =& get_instance();
        return $CI;
    }
}

if ( ! function_exists('hash_password')) {
    /**
     * Hash Password
     *
     * @access  public
     * @param   string
     * @return  string
     */
    function hash_password($password = null, $salt = false)
    {
        if(isset($password) && strlen($password) > 0)
        {
            _ci()->load->library('bcrypt');
            return _ci()->bcrypt->hash($password, $salt);
        }
        return null;
    }
}

if ( ! function_exists('check_password')) {
    /**
     * Check password
     *
     * @access  public
     * @param   string  $password
     * @param   string  $hashed
     * @return  boolean
     */
    function check_password($password, $hashed)
    {
        _ci()->load->library('bcrypt');
        return _ci()->bcrypt->check($password, $hashed);
    }
}

/* End of file hash_helper.php */
/* Location: ./application/helpers/hash_helper.php */