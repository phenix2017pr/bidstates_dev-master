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

class Admin_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
        $this->load->database();

	}
	
    /* function for list all the accounts on bidstates */
    function getAccounts()
    {
        $query= $this->db->get('contractor');
        return $query->result();
    }

    /* function for list all the customers on bidstates */
    function getCustomers()
    {
       $query= $this->db->get('customer');
       return $query->result();
    }

    public function getCustomerById($id = 0) {
        $query = $this->db->get_where('customer', array('customer_id' => $id));
        return $query->result();
    }

    public function getContractorById($id = 0) {
        $query = $this->db->get_where('contractor', array('contractor_id' => $id));
        return $query->result();
    }
}