<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Yashvir Singh Prince
 *	date		: 20 april, 2016
 *	Bidstates. An online directory of subcontractors.
 *	https://www.bidstates.com
 *	support@bidstates.com
 */

class Profile extends CI_Controller {
	
	  function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }
	
	 /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('login_user_id') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('login_user_id') == 1)
           // redirect(base_url() . 'profile', 'refresh');
		   $this->load->view('profile');
		   
    }
    

}
