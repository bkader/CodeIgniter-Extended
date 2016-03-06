<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Ajax Controller
 *
 * @package 	CodeIgniter-Extended
 * @author 		Kader Bouyakoub
 * @link 		@bkader <github>
 * @link 		@KaderBouyakoub <twitter>
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

/* End of file Ajax_Controller.php */
/* Location: ./application/core/Ajax_Controller.php */