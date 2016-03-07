<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This controller is used to do any process
 * before redirecting the user the desired
 * page
 *
 * @package 	CodeIgniter-Extended
 * @author 		Kader Bouyakoub
 */

class Process extends MY_Controller
{
	/**
	 * Constrcutor
	 *
	 * @access   public
	 * @param    void
	 * @return   void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Changing site language
	 *
	 * @access   public
	 * @param    string
	 * @return   void
	 */
	public function lang($code = false)
	{
		$code or $code = current_lang('code');
		$url = $this->input->get('redirect', true);
		$url or $url = site_url();
		$this->i18n->change($code);
		redirect($url);
		exit;
	}
}

/* End of file Process.php */
/* Location: ./application/controllers/Process.php */