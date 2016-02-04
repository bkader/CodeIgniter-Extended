<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Extend PHP-Gettext Library
 *
 * @package     CodeIgniter
 * @author      EllisLab Development Team
 *
 * @author      Kader Bouyakoub
 * @link        @KaderBouyakoub <twitter>
 * @link        @bkader         <github>
 */

/**
 * Alias of _ngettext
 *
 * @param   string
 * @param   string
 * @param   integer
 * @return  string
 */
if ( ! function_exists('_n'))
{
    function _n($singular, $plural, $number)
    {
        return _ngettext($singular, $plural, $number);
    }
}


/**
 * Alias of _dgettext
 *
 * @param   string
 * @param   string
 * @return  string
 */
if ( ! function_exists('_d'))
{
    function _d($domain, $msgid)
    {
        T_bindtextdomain($domain, APPPATH.'language');
        return _dgettext($domain, $msgid);
    }
}

/* End of file extend.php */
/* Location: ./system/vendor/php-gettext/extend.php */