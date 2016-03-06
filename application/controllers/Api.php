<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Api controller
 *
 * All methods below should return json_encoded string
 *
 * @package 	CodeIgniter-Extended
 * @author 		Kader Bouyakoub
 * @link 		@bkader <github>
 * @link 		@KaderBouyakoub <twitter>
 */
class Api extends API_Controller
{
	/**
	 * Index method
	 *
	 * @access   public
	 * @param    void
	 * @return   void
	 */
	public function index()
	{
		$result['error'] = __("No results found!");
		return_json($result);
		exit;
	}
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */