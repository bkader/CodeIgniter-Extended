<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Put all your ajax functions here.
 *
 * CSRF has been disabled for this controller
 */

class Ajax extends Ajax_Controller
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function change_language()
	{
		$result['status'] = false;
		$code = $this->input->post('code', true);
		if ($code and $this->i18n->change($code))
		{
			$result['status'] = true;
		}
		echo json_encode($result);
		die();
	}
}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */