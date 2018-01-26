<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Viktor
 *	date		: 20 april, 2016
 *	Bidstates. An online directory of subcontractors.
 *	https://www.bidstates.com
 *	support@bidstates.com
 */

class Terms extends CI_Controller {
	
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


	public function index()
	{

        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'admin/dashboard', 'refresh');

        if ($this->session->userdata('customer_login') == 1)
            $this->load->view('terms');

        if ($this->session->userdata('contractor_login') == 1)
            redirect(base_url() . 'contractor/dashboard', 'refresh');

        if ($this->session->userdata('subcontractor_login') == 1)
            redirect(base_url() . 'subcontractor/dashboard', 'refresh');

        $this->load->view('terms');
	}
	
	public function terms()
	{
		$this->load->view('terms');
	}
}
