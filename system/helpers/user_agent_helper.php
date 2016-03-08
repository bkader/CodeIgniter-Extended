<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Helper that uses user_agent library
 *
 * @package     CodeIgniter
 * @subpackage  Helpers
 * @author      Kader Bouyakoub
 * @link        @bkader <github>
 * @link        @KaderBouyakoub <twitter>
 */

if ( ! function_exists('ua'))
{
    function ua()
    {
        $CI =& get_instance();
        $CI->load->library('user_agent');
        return $CI->agent;
    }
}
if ( ! function_exists('ua_data'))
{
    /**
     * Returns an array with all user agent data
     *
     * @access  public
     * @param   void
     * @return  array
     */
    function ua_data()
    {

        $result = array();
        $agent = ua();
        $result['agent_string'] = $agent->agent_string();
        $result['platform']     = $agent->platform();
        $result['browser']      = $agent->browser();
        $result['version']      = $agent->version();
        $result['robot']        = $agent->robot();
        $result['mobile']       = $agent->mobile();
        $result['referrer']     = $agent->referrer();
        $result['is_referral']  = $agent->is_referral();
        $result['languages']    = $agent->languages();
        $result['charsets']     = $agent->charsets();
        unset($agent);
        return $result;
    }
}

if ( ! function_exists('ua_is_browser'))
{
    /**
     * Returns a true if the user agent is a browser
     *
     * @access  public
     * @param   string
     * @return  boolean
     */
    function ua_is_browser($key = null) 
    {
        return ua()->is_browser($key);
    }
}

if ( ! function_exists('ua_is_robot'))
{
    /**
     * Returns a true if the user agent is a robot
     *
     * @access  public
     * @param   string
     * @return  boolean
     */
    function ua_is_robot($key = null)
    {
        return ua()->is_robot($key);
    }
}

if ( ! function_exists('ua_is_mobile'))
{
    /**
     * Returns a true if the user agent is a mobile device
     *
     * @access  public
     * @param   string
     * @return  boolean
     */
    function ua_is_mobile($key = null)
    {
        return ua()->is_mobile($key);
    }
}

if ( ! function_exists('ua_is_referral'))
{
    /**
     * Checks if the is a referral from another site
     *
     * @access  public
     * @param   void
     * @return  boolean
     */
    function ua_is_referral()
    {
        return ua()->is_referral();
    }
}

if ( ! function_exists('ua_referrer'))
{
    /**
     * Get the referrer
     *
     * @access  public
     * @param   void
     * @return  boolean
     */
    function ua_referrer()
    {
        return ua()->referrer();
    }
}

/* ============================================================
 * Functions dealing with user agent language
 * ============================================================ */

if ( ! function_exists('ua_languages'))
{
    /**
     * Returns and array of languages accepted by the user agent.
     *
     * @access  public
     * @param   void
     * @return  array
     */
    function ua_languages()
    {
        return ua()->languages();
    }
}

if ( ! function_exists('ua_accepts_lang')) 
{
    /**
     * Determines if the user agent accepts a particular language.
     *
     * @access  public
     * @param   string
     * @return  boolean
     */
    function ua_accepts_lang($lang = 'en')
    {
        return ua()->accept_lang($lang);
    }
}

if ( ! function_exists('ua_accepts_charset'))
{
    /**
     * Determines if the user agent accepts a particular character set.
     *
     * @access  public
     * @param   string
     * @return  boolean
     */
    function ua_accepts_charset($charset = 'utf-8') 
    {
        return ua()->accept_charset($charset);
    }
}

if ( ! function_exists('ua_charsets'))
{
    /**
     * Returns an array of character sets accepted by the user agent.
     *
     * @access  public
     * @param   void
     * @return  array
     */
    function ua_charsets()
    {
        return ua()->charsets();
    }
}


/* ============================================================
 * Functions targeting particular user agents
 * ============================================================ */

if ( ! function_exists('ua_ie'))
{
    /**
     * Retrieves data about Internet Explorer.
     *
     * This function is convenient about supporting old browsers (IE < 9),
     * for making adaptive html boilerplate.
     *
     * @access  public
     * @param   void
     * @return  array
     */
    function ua_ie()
    {
        $result = array(
            'is_ie'             => false,
            'ie_version'        => null,
            'is_ie_mobile'      => false,
            'ie_mobile_version' => null,
        );
        $agent = ua_data();
        $result['is_ie'] = $agent['browser'] == 'Internet Explorer';

        if ($result['is_ie'])
        {
            $result['ie_version']   = (int) $agent['version'];
            $result['is_ie_mobile'] = $agent['mobile'] != '';
            if ($result['is_ie_mobile'])
            {
                $result['ie_mobile_version'] = (int) $agent['version'];
                if ($result['ie_mobile_version'] == 7)
                {
                    $result['ie_version'] == 8;
                }
            }
        }
        return $result;
    }
}

if ( ! function_exists('ua_ios'))
{
    /**
     * Detects iOS native browsers
     *
     * @access  public
     * @param   void
     * @return  array
     */
    function ua_ios()
    {
        $result = array('is_ios' => false);
        $data = ua_data();
        $result['is_ios'] = $data['platform'] == 'iOS';
        return $result;
    }
}

/* End of file user_agent_helper.php */
/* Location: ./system/helpers/user_agent_helper.php */