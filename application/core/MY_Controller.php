<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        Events::trigger('before_my_controller');

        // Constructor like method :D
        if (method_exists($this, '_init'))
        {
            $this->_init();
        }

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
    public function prepare_form($config = array())
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if ( ! empty($config))
        {
            $this->form_validation->set_rules($config);
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
}

// ------------------------------------------------------------------------

/**
 * Ajax Controller
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
        else
        {
            $this->load->library('reponse');
        }
        Events::trigger('after_ajax_controller');
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */