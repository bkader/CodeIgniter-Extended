<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Controller
 *
 * @package CodeIgniter-Extended
 * @author  Kader Bouyakoub
 * @link    @kader
 */

class MY_Controller extends CI_Controller
{
    /**
     * Store previous page in case of redirection
     * @var  string
     */
    protected $previous_page = null;

    /**
     * Pages that should not be used for previous_page
     *
     */
    protected $ignored_pages = array();

    /**
     * Global view data
     * @var  array
     */
    protected $data = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        Events::trigger('before_my_controller');

        // Constructor like method :D (Like on Fuelphp)
        if (method_exists($this, '_init'))
            $this->_init();

        // Prepare previous_page
        if ( ! preg_match('/\.(gif|jpg|jpeg|png|css|js|ico|shtml)$/i', $this->uri->uri_string()))
        {
            $this->previous_page  = $this->session->userdata('previous_page');
        }
        // Things to do
        Events::trigger('after_my_controller');
    }

    /**
     * Set previous page
     *
     * @access  public
     * @param   void
     * @return  void
     */
    public function set_previous_page()
    {
        class_exists('Session') or $this->load->library('session');
        if ( ! in_array(uri_string(), $this->ignored_pages))
        {
            $this->session->set_userdata('previous_page', current_url());
        }
    }

    /**
     * Prepare form
     *
     * @access  public
     * @param   array
     * @return  void
     */
    public function prepare_form($rules = array())
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if ( ! empty($rules))
        {
            $this->form_validation->set_rules($rules);
        }
    }

    /**
     * Set flash message
     *
     * @access  public
     * @param   string
     * @param   string
     * @return  void
     */
    public function flash_message($content = '', $type = 'info')
    {
        $types = array('warning', 'error', 'success', 'info');
        $type = (in_array(strtolower($type), $types)) ? $type : 'info';
        if ( ! empty($content))
        {
            $this->session->set_flashdata('__ci_flash', array(
                'type'    => $type,
                'content' => $content
           ));
        }
    }

    /**
     * Generic callback used to call callback methods for form validation.
     * 
     * @access public
     * @param string
     *        - the value to be validated
     * @param string
     *        - a comma separated string that contains the model name, method name
     *          and any optional values to send to the method as a single parameter.
     *          First value is the name of the model.
     *          Second value is the name of the method.
     *          Any additional values are values to be send in an array to the method. 
     *
     *      EXAMPLE RULE:
     *  callback_external_callbacks[some_model,some_method,some_string,another_string]
     * @author      Robert B Gottier
     * @copyright   Copyright (c) 2011, Robert B Gottier.
     * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
     * @link        http://community-auth.com
     */
    public function external_callbacks($postdata, $param)
    {
        $param_values = explode(',', $param);

        // We start by loading the model
        $model = $param_values[0];
        $this->load->model($model);

        // Grab the method name, which is the second param
        $method = $param_values[1];

        // Check to see if there are any additional values to send as an array
        if (count($param_values) > 2)
        {
            // Remove the first two elements in the param_values array
            array_shift($param_values);
            array_shift($param_values);
            $argument = $param_values;
        }
        // Do the actual validation in the external callback
        $callback_result = (isset($argument))
                            ? $this->$model->$method($postdata, $argument)
                            : $this->$model->$method($postdata);
        return $callback_result;
    }
}

// ------------------------------------------------------------------------

/**
 * Ajax Controller
 *
 * @package     CodeIgniter-Extended
 * @author      Kader Bouyakoub
 * @link        @bkader <github>
 * @link        @KaderBouyakoub <twitter>
 */

class Ajax_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        Events::trigger('before_ajax_controller');
        if ( ! $this->input->is_ajax_request())
        {
            redirect('');
            exit;
        }
        $this->load->library('response');
        Events::trigger('after_ajax_controller');
    }
}

// ------------------------------------------------------------------------

/**
 * Public Controller
 *
 * @package     CodeIgniter-Extended
 * @author      Kader Bouyakoub
 * @link        @bkader <github>
 * @link        @KaderBouyakoub <twitter>
 */

class Public_Controller extends MY_Controller
{
    /**
     * Constructor
     *
     * @access   public
     * @param    void
     * @return   void
     */
    public function __construct()
    {
        parent::__construct();
        Events::trigger('before_public_controller');
        // Put your code here
        Events::trigger('after_public_controller');
    }
}

// ------------------------------------------------------------------------

/**
 * Private Controller
 *
 * @package     CodeIgniter-Extended
 * @author      Kader Bouyakoub
 * @link        @bkader <github>
 * @link        @KaderBouyakoub <twitter>
 */

class Private_Controller extends MY_Controller
{
    /**
     * Constructor
     *
     * @access   public
     * @param    void
     * @return   void
     */
    public function __construct()
    {
        parent::__construct();
        Events::trigger('before_private_controller');
        // Put your conditions below to make controllers
        // extending this one private.
        Events::trigger('after_private_controller');
    }
}

// ------------------------------------------------------------------------

/**
 * Admin Controller
 *
 * @package     CodeIgniter-Extended
 * @author      Kader Bouyakoub
 * @link        @bkader <github>
 * @link        @KaderBouyakoub <twitter>
 */

class Admin_Controller extends MY_Controller
{
    /**
     * Constructor
     *
     * @access   public
     * @param    void
     * @return   void
     */
    public function __construct()
    {
        parent::__construct();
        Events::trigger('before_admin_controller');
        // Put your conditions below to make controllers
        // extending this required admin permission.
        Events::trigger('after_admin_controller');
    }
}

// ------------------------------------------------------------------------

/**
 * API Controller
 *
 * @package     CodeIgniter-Extended
 * @author      Kader Bouyakoub
 * @link        @bkader <github>
 * @link        @KaderBouyakoub <twitter>
 */

class API_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */