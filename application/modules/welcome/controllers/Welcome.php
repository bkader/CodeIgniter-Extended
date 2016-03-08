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
		$this->load->helper('directory');
		debug(directory_map('D:/xampp/htdocs/codeigniter/application', 2), true);
		debug_session();
		exit;
		//debug(current_lang(), true);
		render('welcome_message', $this->data);
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

	public function faker($return = 'json')
	{
		$locale = current_lang('locale');
		if ($locale === 'ar_DZ')
		{
			$locale = 'ar_SA';
		}
		$faker = faker($locale);
		$users = array();
		for ($i=0; $i <= 20; $i++)
		{
			$gender = ($i&1) ? 'male' : 'female';
			$users[$i] = array(
				'firstname' => $faker->firstname($gender),
				'lastname'  => $faker->lastname,
				'email'     => $faker->email,
				'username'  => $faker->username,
				'gender'    => $gender,
			);
		}
		if ($return == 'json')
		{
			return_json($users, true);
		}
		elseif ($return == 'html')
		{
			$this->load->library('table');
			$this->table->set_heading('firstname', 'lastname', 'email', 'username', 'gender');
			foreach ($users as $user)
			{
				$this->table->add_row($user);
			}
			$this->table->set_template(array(
				'table_open' => '<table border="1" cellpadding="5" cellspacing="0">',
			));
			echo $this->table->generate();
		}
		else
		{
			debug($users, true);
		}
		//debug($users, true);
	}
}

/* End of file Welcome.php */
/* Location: ./application/modules/welcome/controllers/Welcome.php */