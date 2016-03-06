<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	/**
	 * The index method uses CodeIgniter Loader
	 *
	 * @access 	public
	 * @return 	void
	 */
	public function index()
	{
		$this->load->view('welcome_message', $this->data);
	}

	/**
	 * This method uses twig
	 *
	 * @access 	public
	 * @return 	void
	 */
	public function twig()
	{
		$this->load->library('twig');
		$this->data['title'] = __("Welcome to CodeIgniter");
		$this->twig->display('welcome_message', $this->data);
	}

	/**
	 * Change current language
	 *
	 * @access 	public
	 * @param 	string
	 * @return 	void
	 */
	public function lang($code = false)
	{
		if ($code)
			$this->i18n->change($code);
		redirect('');
	}
}
