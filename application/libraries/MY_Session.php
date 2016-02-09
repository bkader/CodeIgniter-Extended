<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Session extends CI_Session
{
    /**
     * Session Update
     *
     * @access  public
     * @param   void
     * @return  void
     */
    public function sess_create()
    {
        if ( ! $this->CI->agent->is_robot())
        {
            parent::sess_create();
        }
    }
}

/* End of file MY_Session.php */
/* Location: ./application/libraries/MY_Session.php */