<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Controller
 *
 * @package 	CodeIgniter-Extended
 * @author 		Kader Bouyakoub
 * @link 		@bkader <github>
 * @link 		@KaderBouyakoub <twitter>
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
		// Put your conditions below to make controllers
		// extending this required admin permission.
	}
}

/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */