<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Private Controller
 *
 * @package 	CodeIgniter-Extended
 * @author 		Kader Bouyakoub
 * @link 		@bkader <github>
 * @link 		@KaderBouyakoub <twitter>
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
		// Put your conditions below to make controllers
		// extending this one private.
	}
}

/* End of file Private_Controller.php */
/* Location: ./application/core/Private_Controller.php */