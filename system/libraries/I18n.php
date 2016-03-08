<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Internationalization Library
 *
 * @package 	CodeIgniter
 * @subpackage 	Libraries
 * @author 		Kader Bouyakoub <http://www.bkader.com/>
 * @link 		@bkader <github>
 * @link 		@KaderBouyakoub <github>
 */

class CI_I18n
{
    protected $CI;

    /**
     * Default site language
     * @var  object
     */
    protected $default;

    /**
     * All available languages
     * @var  array
     */
    protected $languages = array();

    /**
     * Store Language in session
     * @var  string
     */
    protected $session = 'lang';

    /**
     * Store the language in a cookie
     * @var  string
     */
    protected $cookie = 'lang';

    /**
     * Client language
     * @var  object
     */
    protected $client;

    /**
     * Current language
     * @var  object
     */
    protected $current;

    function __construct($config = array())
    {
        $this->CI =& get_instance();
        if ( ! empty($config['i18n']))
        {
            $this->initialize($config['i18n']);
        }
        else
        {
            $this->initialize(array(
                // Files to be autoloaded
                'files'     => array(),
                // Available languages
                'languages' => array(
                    'english',
                    'french',
                    'arabic',
                ),
                'session'   => 'lang',
                'cookie'    => 'cookie',
            ));
        }
    }

    private function initialize($config = array())
    {
        // Load language helper
        $this->CI->load->helper(array('cookie','language'));

        // Make sure the session library is loaded
        class_exists('CI_Session') or $this->CI->load->library('session');

        // List all available languages
        require_once BASEPATH.'vendor/languages.php';
        foreach ($config['languages'] as $language)
        {
            $this->languages[$language] = $languages[$language];
        }
        unset($folder, $language);
        //$this->languages = $config['languages'];

        // Set default language.
        // AS you can see, even if we set the default language
        // we do a little check up to make sure in exists on the
        // available languages list. If it doesn't, we set it to
        // CodeIgniter default language (english).
        $this->default = $this->languages[config_item('language')];
        /*$this->default = (array_key_exists($config['default'], $this->languages))
                            ? $this->languages[$config['default']]
                            : $this->languages[config_item('language')];*/

        // We now set the session and cookie names
        $this->session = ($config['session']) ? $config['session'] : 'lang';
        $this->cookie  = ($config['cookie']) ? $config['cookie'] : 'lang';

        // Set client language
        $this->client = $this->_set_client_language();

        // Set the current language
        $this->current = $this->_set_current_language();

        // Set config
        $this->CI->config->set_item('language', $this->current['folder']);

        if ( ! empty($config['files']))
        {
            foreach ($config['files'] as $file)
            {
                $this->CI->lang->load($file, $this->current['folder']);
            }
        }
        T_setlocale(LC_MESSAGES, $this->current['folder']);
        T_bindtextdomain('application', APPPATH.'language');
        return;
    }

    // ------------------------------------------------------------------------

    /**
     * Magic __callStatic
     *
     * @access  public
     * @param   string
     * @param   mixed
     * @return  void
     */
    public function __call($method, $params)
    {
        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        else
        {
            show_error(_t("Call to undefined method %s in %s library", array($method, get_class($this))));
        }
    }

    // ------------------------------------------------------------------------

    /**
     * List all languages
     *
     * @access  public
     * @param   boolean
     * @return  mixed
     */
    public function languages()
    {
        return $this->languages;
    }

    /**
     * Get default language
     *
     * @access  public
     * @param   string
     * @return  mixed
     */
    public function get_default($return = false)
    {
        return ($return and array_key_exists($return, $this->default))
                ? $this->default[$return]
                : $this->default;
    }

    // ------------------------------------------------------------------------

    /**
     * Find a single language by a field
     *
     * @access  public
     * @param   string
     * @param   string
     * @return  object
     */
    public function find_by($field = 'locale', $match = 'en_US')
    {
        foreach ($this->languages as $language)
        {
            if (isset($language[$field]) and $language[$field] === $match)
            {
                return $language;
            }
        }
        return null;
    }

    // ------------------------------------------------------------------------

    /**
     * Set client language
     *
     * @access  private
     * @param   void
     * @return  object
     */
    private function _set_client_language()
    {
        $code = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        return ($lang = $this->find_by('code', $code)) ? $lang : $this->default;
    }

    /**
     * Return client language data
     *
     * @access  public
     * @param   string
     * @return  mixed
     */
    public function get_client($return = false)
    {
        return ($return and array_key_exists($return, $this->client))
                ? $this->client[$return]
                : $this->client;
    }

    // ------------------------------------------------------------------------

    /**
     * Set current language
     *
     * @access  private
     * @param   void
     * @return  object
     */
    private function _set_current_language()
    {
        // We now set our default language.
        $sess_lang = $this->default['folder'];


        // We check if the language cookie exists.
        if ($cookie = get_cookie($this->cookie, true))
        {
            $sess_lang = $cookie;
            unset($cookie);
        }

        // If the cookie was not found, we check the session
        // may be it was set, who knows :)
        else
        {
            $sess_lang = $this->CI->session->userdata($this->session);
            $sess_lang or $sess_lang = $this->get_client('folder');
        }

        // We prepare our default language ;)
        $current = $this->default;
        // We make sure the language is available and enabled
        if ($lang = $this->find_by('folder', $sess_lang))
        {
            $current = $lang;
            unset($lang);
        }

        // Set the session and the cookie
        $this->CI->session->set_userdata($this->session, $current['folder']);
        set_cookie(array(
            'name'   => $this->cookie,
            'value'  => $current['folder'],
            'expire' => 2678400,
        ));
        return $current;
    }

    /**
     * Get current language
     *
     * @access  public
     * @param   string
     * @return  mixed
     */
    public function get_current($return = false)
    {
        return ($return and array_key_exists($return, (array) $this->current))
                ? $this->current[$return]
                : $this->current;
    }

    // ------------------------------------------------------------------------

    /**
     * Change current language
     *
     * @access  public
     * @param   string
     * @return  void
     */
    public function change($code = 'en')
    {
        if ($lang = $this->find_by('code', $code))
        {
            // change session and cookie
            $this->CI->session->set_userdata($this->session, $lang['folder']);
            set_cookie(array(
                'name'   => $this->cookie,
                'value'  => $lang['folder'],
            ));
            return true;
        }
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Return a single line
     *
     * @access  public
     * @param   string
     * @param   string
     * @return  string
     */
    public function line($line, $file = 'main')
    {
        $this->CI->lang->load($file, $this->current['folder']);
        return $this->CI->lang->line($line);
    }
}

/* End of file I18n.php */
/* Location: ./system/libraries/I18n.php */