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

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
		$this->load->model('email_model');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {
		
		 $response = array();
		 
		 

        //Recieving post input of email, password from ajax request
		
          if($this->input->get('ads')=="contractor" or $this->input->get('ads')=="subcontractor" )
		  {
          $match = $this->input->get('address');
		  $this->db->select('company_name,username,customer_name,email,city,state,address,licensed');
		  $this->db->like('city',$match);
		  $this->db->or_like('state',$match);
		  $this->db->or_like('address',$match);
		  $this->db->or_like('postcode',$match);
          $this->db->or_like('company_name',$match);
          $this->db->or_like('customer_name',$match);
		  $query = $this->db->get($this->input->get('ads'));
		  $response= $query->result();
		  }
		  else
		  {
			 $response = array();  
		  }
		  $data["details"]= $response;
		 
		  $this->load->view('search',$data);
       
    }
	
	


    //Ajax search function 
    function ajax_search() {
        $response = array();

        //Recieving post input of email, password from ajax request
		
          if($this->input->post('type')=="contractor" or $this->input->post('type')=="subcontractor" )
		  {
          $match = $this->input->post('city');
		  $this->db->select('company_name,username,customer_name,email,city,state,address');
		  $this->db->like('city',$match);
		  $this->db->or_like('state',$match);
		  $this->db->or_like('address',$match);
		  $this->db->or_like('postcode',$match);
		  $query = $this->db->get($this->input->post('type'));
		  $response= $query->result();
		  }
		  else
		  {
			 $response = array();  
		  
		  }

        //Replying ajax request with validation response
        echo json_encode($response);
    }

   

}
