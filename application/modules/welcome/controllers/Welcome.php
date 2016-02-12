<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	public function index()
	{
		$this->data['title'] = __("Welcome to CodeIgniter");
		$this->twig->display('welcome_message', $this->data);
	}

	public function lang($code = false)
	{
		if ($code)
			$this->i18n->change($code);
		redirect('');
	}
}
