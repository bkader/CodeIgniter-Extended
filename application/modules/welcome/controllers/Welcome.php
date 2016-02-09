<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function lang($code = false)
	{
		if ($code)
			$this->i18n->change($code);
		redirect('');
	}
}
