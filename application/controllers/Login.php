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

class Login extends CI_Controller {

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
		if ($this->session->userdata('admin_login') == 1)
			redirect(base_url() . 'admin/dashboard', 'refresh');

		if ($this->session->userdata('customer_login') == 1)
			redirect(base_url() . 'index.php?customer/dashboard', 'refresh');

		if ($this->session->userdata('contractor_login') == 1)
			redirect(base_url() . 'contractor/dashboard', 'refresh');

		if ($this->session->userdata('subcontractor') == 1)
			redirect(base_url() . 'subcontractor/dashboard', 'refresh');

		$this->load->view('login');
	}

	public function signup() {

		if ($this->session->userdata('admin_login') == 1)
			redirect(base_url() . 'admin/dashboard', 'refresh');

		if ($this->session->userdata('customer_login') == 1)
			redirect(base_url() . 'index.php?customer/dashboard', 'refresh');

		if ($this->session->userdata('contractor_login') == 1)
			redirect(base_url() . 'contractor/dashboard', 'refresh');

		if ($this->session->userdata('subcontractor') == 1)
			redirect(base_url() . 'subcontractor/dashboard', 'refresh');

		$this->load->view('signup');
	}
	public function stripe_subscription() {
        $key = $this->config->item('secret_key');
        Stripe::setApiKey($key);
		$this->load->model('Stripe_customer_model');
       if($this->input->post('stripeToken')){
		   $email = $this->session->userdata('user_email');
				try {
				   $customer = Stripe_Customer::create(array(
					  'email' => $email,  // email id of the customer 
					  'plan' => '100monthly',   //plan 
					  'card'  => $this->input->post('stripeToken')  //token
				  )); 
				  //echo "<pre>"; print_r($customer); 
				  $result = $this->Stripe_customer_model->get_contract_record($email);
				  $data['customer_id'] = $customer->id;
				  $data['subscription_id'] = $customer->subscriptions->data[0]->id;
				  $data['contractor_id'] = $result->contractor_id;
				  $data['active'] = '1';
				  
                $this->Stripe_customer_model->stripe_customer_data($data);
				$this->session->unset_userdata('usertype');
				$this->session->unset_userdata('user_email');
				$data['success'] = '<div class="alert alert-success">
                <strong>Success!</strong> You are subscribed successfully.
				</div>';
			  }
				catch (Exception $e) {
				 $error = $e->getMessage();
				$data['error'] = '<div class="alert alert-danger">
			  <strong>Error!</strong> '.$e->getMessage().'
			  </div>';
			  }
			   $this->load->view('login',$data);
			}
		
	}
	
	public function payment() {
		if ($this->session->userdata('usertype') == 'contractor'){
			$this->load->view('stripe_payment');
		}else{
			$this->load->view('login');
		}
		
	}

	//Ajax login function 
	function ajax_login() {
		$response = array();

		//Recieving post input of email, password from ajax request
		$email = $_POST["email"];
		$password = $_POST["password"];
		$response['submitted_data'] = $_POST;
		
		//Validating login
		$login_status = $this->validate_login($email, $password);
		$response['login_status'] = $login_status;
		if ($login_status == 'success') {
			$response['redirect_url'] = '';
		}

		//Replying ajax request with validation response
		echo json_encode($response);
	}

	//Validating login from ajax request
	function validate_login($email = '', $password = '') {

		$credential = array('email' => $email, 'password' => sha1($password));
		// Checking login credential for admin
		$query = $this->db->get_where('admin', $credential);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('admin_login', '1');
			$this->session->set_userdata('admin_id', $row->admin_id);
			$this->session->set_userdata('login_user_id', $row->admin_id);
			$this->session->set_userdata('name', $row->name);
			$this->session->set_userdata('login_type', 'admin');

			//set last logged  in time
			$data['last_logged_in']   = date('Y-m-d H:i:s');
			$this->db->where('admin_id' , $row->admin_id);
			$this->db->update('admin' , $data);
			return 'success';
		}

		$credential = array('email' => $email, 'password' => sha1($password));//check for active user only

		// Checking login credential for customer
		$query = $this->db->get_where('customer', $credential);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			if($row->active==1) {
				$this->session->set_userdata('customer_login', '1');
				$this->session->set_userdata('customer_id', $row->customer_id);
				$this->session->set_userdata('login_user_id', $row->customer_id);
				$this->session->set_userdata('name', $row->first_name." ".$row->last_name);
				$this->session->set_userdata('login_type', 'customer');

				//set last logged  in time

				$data['last_logged_in']   = date('Y-m-d H:i:s');
				$this->db->where('customer_id' , $row->customer_id);
				$this->db->update('customer' , $data);

				return 'success';
			} else {
				return 'inactive';
			}
		}

		// Checking login credential for contractor
		$query = $this->db->get_where('contractor', $credential);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			if($row->active==1) {
				$this->session->set_userdata('contractor_login', '1');
				$this->session->set_userdata('contractor_id', $row->contractor_id);
				$this->session->set_userdata('login_user_id', $row->contractor_id);
				$this->session->set_userdata('name', $row->customer_name);
				$this->session->set_userdata('login_type', 'contractor');

				//set last logged  in time
				$data['last_logged_in']   = date('Y-m-d H:i:s');
				$this->db->where('contractor_id' , $row->contractor_id);
				$this->db->update('contractor' , $data);
				return 'success';
			} else {
				return 'inactive';
			}
		}

		// Checking login credential for subcontractor
		$query = $this->db->get_where('subcontractor', $credential);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			if($row->active==1) {

				$this->session->set_userdata('subcontractor_login', '1');
				$this->session->set_userdata('subcontractor_id', $row->subcontractor_id);
				$this->session->set_userdata('login_user_id', $row->subcontractor_id);
				$this->session->set_userdata('name', $row->customer_name);
				$this->session->set_userdata('login_type', 'subcontractor');

				//set last logged  in time
				$data['last_logged_in']   = date('Y-m-d H:i:s');
				$this->db->where('subcontractor_id' , $row->subcontractor_id);
				$this->db->update('subcontractor' , $data);
				return 'success';
			} else {
				return 'inactive';
			}
		}
		return 'invalid';
	}
	
	//Ajax signup function 
	function ajax_signup() {
		$signup_status="";
		$response = array();
		$data=array();
		$data['hide_phone_number']  = $this->input->post('hide_number')?1:0;
		$data['licensed']  			= $this->input->post('licensed');
		$data['tagline']            = "";
		$data['phone']       		= $this->input->post('phone_number');
		$data['email']     			= $this->input->post('email');
		$data['password']  			= sha1($this->input->post('password'));
		$data['authentication_key'] = sha1($this->input->post('usertype').mt_rand(10000,99999).time().$this->input->post('email'));

		$credential = array('email' => $this->input->post('email'));

		if ($this->input->post('usertype') == 'customer') {

			$data['first_name']     = $this->input->post('first-name');
			$data['last_name']      = $this->input->post('last-name');
			$name                   = $this->input->post('first-name')." ".$this->input->post('last-name');
			$query                  = $this->db->get_where('customer', $credential);
			
			if ($query->num_rows() > 0) {
				$response['signup_status'] = "failure";
				$response['error_msg'] = "Email already exists!";
				echo json_encode($response);
				exit();
			}
			$this->db->set('account_created_time', 'NOW()', FALSE);
			if($this->db->insert('customer', $data)) {
			$this->email_model->account_opening_email('customer', $data['email'],$name,$data['authentication_key']);
				//SEND EMAIL ACCOUNT OPENING EMAIL TO CUSTOMER
				$signup_status="success";
			} else {
				$signup_status="failure";
			}
        }
		if ($this->input->post('usertype') == 'contractor') {

			$data['company_name']  = $this->input->post('company-name');
			$data['customer_name'] = $this->input->post('customer-name');

			// Checking email for contractor
			$query                 = $this->db->get_where('contractor', $credential);
			if ($query->num_rows() > 0) {
				$response['signup_status'] = "failure";
				$response['error_msg'] = "Email already exists!";
				echo json_encode($response);
				exit();
			}

			// check for userid
			$SQL='SELECT MAX( userid ) AS maxuserid
				FROM (
				SELECT userid
				FROM contractor
				UNION ALL 
				SELECT userid
				FROM subcontractor
				) AS xyz
				';
			$query = $this->db->query($SQL);
			$result=$query->result_array();
			$maxid=$result[0]['maxuserid'];
			$data['userid'] = $maxid+1;
			$data['username'] = $maxid+1;
			$this->db->set('account_created_time', 'NOW()', FALSE);

			if($this->db->insert('contractor', $data)) {
				$this->email_model->account_opening_email('customer', $data['email'],$data['customer_name'],$data['authentication_key']); //SEND EMAIL ACCOUNT OPENING EMAIL TO CUSTOMER
				$signup_status="success";
			} else {
				$signup_status="failure";
			}
		}
		if ($this->input->post('usertype') == 'subcontractor') {
			$data['company_name']  = $this->input->post('company-name');
			$data['customer_name'] = $this->input->post('customer-name');
			// Checking email for subcontractor
			$query                 = $this->db->get_where('subcontractor', $credential);
			if ($query->num_rows() > 0) {
				$response['signup_status'] = "failure";
				$response['error_msg'] = "Email already exists!";
				echo json_encode($response);
				exit();
			}

			$SQL = 'SELECT MAX( userid ) AS maxuserid
				FROM (
				SELECT userid
				FROM contractor
				UNION ALL 
				SELECT userid
				FROM subcontractor
				) AS xyz
				';

			$query            = $this->db->query($SQL);
			$result           = $query->result_array();
			$maxid            = $result[0]['maxuserid'];
			$data['userid']   = $maxid + 1;
			$data['username'] = $maxid + 1;
            $this->db->set('account_created_time', 'NOW()', FALSE);
            if($this->db->insert('subcontractor', $data)) {
				$this->email_model->account_opening_email('customer', $data['email'],$data['customer_name'],$data['authentication_key']); //SEND EMAIL ACCOUNT OPENING EMAIL TO CUSTOMER
				$signup_status="success";
			} else {
				$signup_status="failure";
			}
		}
		$response['signup_status'] = $signup_status;
		if ($signup_status == 'success' && $this->input->post('usertype') == 'contractor') {
			$this->session->set_userdata('usertype', 'contractor');
			$this->session->set_userdata('user_email', $data['email']);
			$response['redirect_url'] = base_url() . 'login/payment';
		}elseif ($signup_status == 'success') {
			$response['redirect_url'] = base_url() . 'login';
		}
		$temp = $this->input->post('where');
		if( isset($temp)) {
            $response['redirect_url'] = $this->input->post('where');
        }
		//Replying ajax request with validation response
		echo json_encode($response);
	}
	//update account
	public function ajax_update_account() {
        $update_status = "";
		if ($this->session->userdata('contractor_login') != 1 || $this->session->userdata('subcontractor_login') != 1)
			$update_status="failure";
			
		// Checking email for contractor
		if($this->session->userdata('login_type')=="contractor") {
			$credential = array('email' => $this->input->post('email'),'contractor_id!=' => $this->session->userdata('login_user_id') );
		}

		if($this->session->userdata('login_type')=="subcontractor") {
			$credential = array('email' => $this->input->post('email'),'subcontractor_id!='=> $this->session->userdata('login_user_id'));
		}

		$query = $this->db->get_where($this->session->userdata('login_type'), $credential);
		if ($query->num_rows() > 0) {
			$response['update_status'] = "failure";
			$response['error_msg'] = "Email already exists!";
			echo json_encode($response);
			exit();
		}

		//checking for username
		if($this->session->userdata('login_type')=="contractor") {
			$credential1 = array('username' => trim($this->input->post('username')) ,'contractor_id!=' => $this->session->userdata('login_user_id')); 
			$query1 = $this->db->get_where("contractor", $credential1);
			$credential2 = array('username' => trim($this->input->post('username'))); 
			$query2 = $this->db->get_where("subcontractor",  $credential2);
		}

		if($this->session->userdata('login_type')=="subcontractor") {
			$credential1 = array('username' => trim($this->input->post('username')),'subcontractor_id!=' => $this->session->userdata('login_user_id') ); 
			$query1 = $this->db->get_where("subcontractor", $credential);
			$credential2 = array('username' => $this->input->post('username')); 
			$query2 = $this->db->get_where("contractor",  $credential2); 
		}

		if ($query1->num_rows() > 0 || $query2->num_rows() > 0 ) {
			$response['update_status'] = "failure";
			$response['error_msg'] = "Username already exists!";
			echo json_encode($response);
			exit();
		}

		$data['company_name']      = $this->input->post('company-name');
		$data['customer_name']     = $this->input->post('customer-name');
		$data['username']          = $this->input->post('username');
		$data['email']    	       = $this->input->post('email');
		$data['postcode']  	       = $this->input->post('postcode');
		$data['phone']             = $this->input->post('phone_number');
		$data['address']           = $this->input->post('address');
		$data['city']              = $this->input->post('city');
		$data['state']             = $this->input->post('state');
		$data['last_updated_time'] = date('Y-m-d H:i:s');

		if($this->session->userdata('login_type') == "contractor") {
			$this->db->where('contractor_id' , $this->session->userdata('login_user_id') );
		}
		if($this->session->userdata('login_type') == "subcontractor") {
			$this->db->where('subcontractor_id' ,$this->session->userdata('login_user_id') );	
		}

		$this->db->update($this->session->userdata('login_type') , $data);
		$update_status             = "success";
		$response['update_status'] = $update_status;
		echo json_encode($response);
	}

	// update settings
	public function ajax_update_settings() {
		$update_status = "";
		if ($this->session->userdata('contractor_login') != 1 || $this->session->userdata('subcontractor_login') != 1)
			$update_status="failure";

		$data['password']          = sha1($this->input->post('password'));
		$data['comments']          = $this->input->post('comments')?1:0;
		$data['last_updated_time'] = date('Y-m-d H:i:s');

		if($this->session->userdata('login_type')=="contractor") {
			$this->db->where('contractor_id' , $this->session->userdata('login_user_id'));
		}

		if($this->session->userdata('login_type')=="subcontractor") {
			$this->db->where('subcontractor_id' ,$this->session->userdata('login_user_id'));
		}

		$this->db->update($this->session->userdata('login_type') , $data);
		$update_status="success";
		$response['update_status'] = $update_status;
		echo json_encode($response);
	}
	
	public function ajax_update_preferences()
    {
        $update_status="";
        if ($this->session->userdata('contractor_login') != 1 || $this->session->userdata('subcontractor_login') != 1)
			$update_status="failure";
		$data['advice']            = $this->input->post('advice')?1:0;
		$data['newsletter']        = $this->input->post('newsletter')?1:0;
		$data['last_updated_time'] = date('Y-m-d H:i:s');
		if($this->session->userdata('login_type') == "contractor") {
			$this->db->where('contractor_id' , $this->session->userdata('login_user_id') );
		}

		if($this->session->userdata('login_type')=="subcontractor") {
			$this->db->where('subcontractor_id' ,$this->session->userdata('login_user_id') );	
		}
		$this->db->update($this->session->userdata('login_type') , $data);
		$update_status="success";
		$response['update_status'] = $update_status;
		//Replying ajax request with validation response
		echo json_encode($response);
	}

    /*     * *DEFAULT NOR FOUND PAGE**** */
	function four_zero_four() {
		$this->load->view('four_zero_four');
	}

    // PASSWORD RESET BY EMAIL
	function forgot_password() {
	    $this->load->view('forgot_password');
	}
	// PASSWORD Change View
	function reset_password() {
		// Checking credential for admin
		$key                 = $this->uri->segment(3);
		$query = $this->db->get_where('password_reset' , array('reset_key' => $key ));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$data["account_type"]  = $row->account_type;
			$data["account_email"] = $row->account_email;

			if($row->reset_status == 1) {
				$data["error_msg"] = "Sorry. That code is already used for this account.<br> Please regenerate new code or email support@bidstates.com for help.";
				$this->load->view('invalid_reset_password',$data);
			} else {
				$this->load->view('reset_password',$data);
			}
		} else {
			$data["error_msg"]="Sorry. That code is invalid for this account.<br> Please try again or email support@bidstates.com for help.";
			$this->load->view('invalid_reset_password',$data);
		}
	}

	function ajax_forgot_password_old() {
		$resp               = array();
		$resp['status']     = 'false';
		$email              = $_POST["email"];
		$reset_account_type = '';
		//resetting user password here
		$new_password       =   substr( md5( rand(100000000,20000000000) ) , 0,7);

		// Checking credential for admin
		$query = $this->db->get_where('admin' , array('email' => $email));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$name=$row->name;
			$reset_account_type     =   'admin';
			$this->db->where('email' , $email);
			$this->db->update('admin' , array('password' => $new_password));
			$resp['status']         = 'true';
		}

		// Checking credential for customer
		$query = $this->db->get_where('customer' , array('email' => $email));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$name=$row->first_name." ".$row->last_name;
			$reset_account_type     =   'customer';
			$this->db->where('email' , $email);
			$this->db->update('customer' , array('password' => $new_password));
			$resp['status']         = 'true';
		}

		// Checking credential for contractor
		$query = $this->db->get_where('contractor' , array('email' => $email));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$name=$row->customer_name;
			$reset_account_type     =   'contractor';
			$this->db->where('email' , $email);
			$this->db->update('contractor' , array('password' => $new_password));
			$resp['status']         = 'true';
		}
		// Checking credential for subcontractor
		$query = $this->db->get_where('subcontractor' , array('email' => $email));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$name=$row->customer_name;
			$reset_account_type     =   'subcontractor';
			$this->db->where('email' , $email);
			$this->db->update('subcontractor' , array('password' => $new_password));
			$resp['status']         = 'true';
		}

        if(!empty($reset_account_type)) {
			// send new password to user email  
			$this->email_model->password_reset_email($new_password , $reset_account_type , $email ,$name);
			$resp['submitted_data'] = $_POST;
			$resp['redirect_url'] =base_url()."login" ;
			echo json_encode($resp);
    	} else {
			$response['status'] = "invalid";
			$response['error_msg'] = "Email does not exists!";
			echo json_encode($response);	
		}
	}
	
	function ajax_forgot_password() {
		$resp                   = array();
		$resp['status']         = 'false';
		$email                  = $_POST["email"];
		$reset_account_type     = '';

		// Checking credential for admin
		$query = $this->db->get_where('admin' , array('email' => $email));
		if ($query->num_rows() > 0) {
			$row                = $query->row();
			$name               = $row->name;
			$reset_account_type = 'admin';
			$resp['status']     = 'true';
		}

		// Checking credential for customer
		$query = $this->db->get_where('customer' , array('email' => $email));
		if ($query->num_rows() > 0) {
			$row                = $query->row();
			$name               = $row->first_name." ".$row->last_name;
			$reset_account_type = 'customer';
			$resp['status']     = 'true';
		}

		// Checking credential for contractor
		$query = $this->db->get_where('contractor' , array('email' => $email));
		if ($query->num_rows() > 0) {
			$row                = $query->row();
			$name               = $row->customer_name;
			$reset_account_type = 'contractor';
			$resp['status']     = 'true';
		}

		// Checking credential for subcontractor
		$query = $this->db->get_where('subcontractor' , array('email' => $email));
		if ($query->num_rows() > 0) {
			$row                = $query->row();
			$name               = $row->customer_name;
			$reset_account_type = 'subcontractor';
			$resp['status']     = 'true';
		}

		if(!empty($reset_account_type)) {
		//resetting user password auth key for email notification
			$password_reset_auth_key    = sha1($reset_account_type.mt_rand(10000,99999).time().$this->input->post('email'));
			$data['account_type']       = $reset_account_type;
			$data['account_email']      = $email;
			$data['reset_key']          = $password_reset_auth_key ;
			$data['reset_status']       = 0 ;
			$data['reset_request_time'] = date('Y-m-d H:i:s');

			//update table
			$this->db->insert("password_reset" , $data);


			// send new password to user email  
			$this->email_model->password_reset_email($password_reset_auth_key, $reset_account_type , $email ,$name);

			$resp['submitted_data'] = $_POST;

			$resp['redirect_url'] =base_url()."login" ;

			echo json_encode($resp);
		} else {
			$response['status'] = "invalid";
			$response['error_msg'] = "Email does not exists!";
			echo json_encode($response);
		}
	}
	
	 /*     * ***** PASSWORD RESET FUNCTION ****** */
	function ajax_reset_password() {
		$resp                   = array();
		$resp['status']         = 'false';
		$email                  = $_POST["email"];
		$reset_account_type     = $_POST["account_type"];
		$new_password           = $_POST["password"];
		$this->db->where('email' , $email);
		$this->db->update($reset_account_type , array('password' => sha1($new_password)));

		$data['reset_status']        		= 1 ;
		$data['reset_complete_time']        = date('Y-m-d H:i:s');

		//update table
		$this->db->where(array('account_email' =>  $email,'account_type' => $reset_account_type));
		if($this->db->update("password_reset" , $data)) {
			$name  = "";
			$query = $this->db->get_where( $reset_account_type , array('email' => $email));
			if ($query->num_rows() > 0) {
				$row = $query->row();
				if($reset_account_type == 'customer') {
					$name=$row->first_name." ".$row->last_name;
				} else {
					$name=$row->customer_name;
				}
			}
			// send  password reset confirmtion email  
			$this->email_model->password_reset_success_email($email ,$name);
			$resp['submitted_data'] = $_POST;
			$resp['status']         = 'true';
			$resp['redirect_url']   = base_url()."login" ;
			echo json_encode($resp);
		} else {
			$response['status'] = "invalid";
			$response['error_msg'] = "Email does not exists!";
			echo json_encode($response);
		}
	}

	/******* ACTIVATION FUNCTION ****** */
	function activate() {
		$resp                = array();
		$resp['status']      = 'false';
		$active_account_type = '';
		$key                 = $this->uri->segment(3);

		// Checking credential for admin
		$query = $this->db->get_where('admin' , array('authentication_key' => $key ));
		if ($query->num_rows() > 0) {
			$active_account_type = 'admin';
			$this->db->where('authentication_key' , $key );
			$this->db->update('admin' , array('active' => 1));
			$resp['status']      = 'true';
		}

		// Checking credential for customer
		$query = $this->db->get_where('customer' , array('authentication_key' =>$key ));
		if ($query->num_rows() > 0) {
			$active_account_type    = 'customer';
			$this->db->where('authentication_key' , $key );
			$this->db->update('customer' , array('active' => 1));
			$resp['status']         = 'true';
		}

		// Checking credential for contractor
		$query = $this->db->get_where('contractor' , array('authentication_key' => $key ));
		if ($query->num_rows() > 0) {
			$active_account_type    =   'contractor';
			$this->db->where('authentication_key' , $key );
			$this->db->update('contractor' , array('active' => 1));
			$resp['status']         = 'true';
		}

		// Checking credential for subcontractor
		$query = $this->db->get_where('subcontractor' , array('authentication_key' => $key ));
		if ($query->num_rows() > 0) {
			$active_account_type    =   'subcontractor';
			$this->db->where('authentication_key' , $key );
			$this->db->update('subcontractor' , array('active' => 1));
			$resp['status']         = 'true';
		}
		
		if(!empty($active_account_type)) {
			$resp['submitted_data'] = $_POST;
			$message = "Account is Activated";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$this->session->set_flashdata('account_activate_notification', 'Account is Activated');
			redirect(base_url()."login", 'refresh');
		} else {
			$this->session->set_flashdata('account_activate_notification', 'Account is not Activated.!');
			$this->load->view('activate_account');
		}
	}

	/******* LOGOUT FUNCTION *******/
	function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('logout_notification', 'logged_out');
		redirect(base_url(), 'refresh');
	}
}
