<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Artak Hovakimyan
 *	date		: 25 November, 2016
 *	Bidstates. An online directory of subcontractors.
 *	https://www.bidstates.com
 *	support@bidstates.com
 */


class Stripe_customer_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public  function stripe_customer_insert($data){
        $this->db->insert('stripe_customers',$data);
    }
	public function stripe_customer_data($data){
        $this->db->insert('stripe_payment',$data);
    }
	public function get_contract_record($email){
			$this->db->select('*');	
			$this->db->where('email',$email);
			$this->db->from('contractor');
			$query = $this->db->get();
 			return  $query->row();
    }

}
