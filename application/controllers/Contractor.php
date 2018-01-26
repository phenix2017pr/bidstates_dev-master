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

class Contractor extends CI_Controller {
	
	
	function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->library('session');
        //$this->load->library('stripe');
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('contractor_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('contractor_login') == 1)
            redirect(base_url() . 'contractor/dashboard', 'refresh');
    }
	/***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('contractor_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
       // $page_data['page_title'] = get_phrase('contractor_dashboard');
		$page_data['page_title'] = "Contractor Dashboard";
		//get value from db :-
		
		$credential = array('contractor_id' => $this->session->userdata('login_user_id'));


        // getting data from database
        $query = $this->db->get_where('contractor', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
			
			$user_info["contractor_id"]=$row->contractor_id;
			$user_info["username"]=$row->username;
			$user_info["userid"]=$row->userid;
			$user_info["company_name"]=$row->company_name;
			$user_info["customer_name"]=$row->customer_name;
			$user_info["phone"]=$row->phone;
			$user_info["email"]=$row->email;
			$user_info["address"]=$row->address;
			$user_info["city"]=$row->city;
			$user_info["state"]=$row->state;
			
			$user_info["postcode"]=$row->postcode;
		    $user_info["comments"]=$row->comments;
			$user_info["newsletter"]=$row->newsletter;
			$user_info["advice"]=$row->advice;
			$user_info["last_logged_in"]= $this->humanTiming(strtotime($row->last_logged_in));
			
            $page_data["user_info"]=$user_info;
			$query = $this->db->get('states');
			$states=[];
			
			foreach ($query->result_array() as $state_row)
			{
				$state['name']=$state_row['name'];
				$state['abbrev']=$state_row['abbrev'];
				
				array_push($states,$state);
			  
			}
			
			
			$page_data["states"]=$states;
        }
		
        $this->load->view('index', $page_data);
    }
	/***ADMIN DASHBOARD***/
    function profile()
    {
		
	
        if ($this->session->userdata('contractor_login') == 1)
           {
			   
			  
        $page_data['page_name']  = 'dashboard';
       // $page_data['page_title'] = get_phrase('contractor_dashboard');
		$page_data['page_title'] = "Contractor Profile";
		//get value from db :-
		
		$credential = array('contractor_id' => $this->session->userdata('login_user_id'));


        // getting data from database
        $query = $this->db->get_where('contractor', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
			
			$user_info["contractor_id"]=$row->contractor_id;
			$user_info["username"]=$row->username;
			$user_info["userid"]=$row->userid;
			$user_info["company_name"]=$row->company_name;
			$user_info["customer_name"]=$row->customer_name;
			$user_info["phone"]=$row->phone;
			$user_info["email"]=$row->email;
			$user_info["address"]=$row->address;
			$user_info["city"]=$row->city;
			$user_info["state"]=$row->state;
			$user_info["postcode"]=$row->postcode;
		    $user_info["comments"]=$row->comments;
			$user_info["newsletter"]=$row->newsletter;
			$user_info["advice"]=$row->advice;
			$user_info["last_logged_in"]= $this->humanTiming(strtotime($row->last_logged_in));
			
            $page_data["user_info"]=$user_info;
        }
		
        $this->load->view('profile', $page_data);
		
		}
		else
		{
			
			 $page_data['page_name']  = 'dashboard';
           // $page_data['page_title'] = get_phrase('contractor_dashboard');
		    $page_data['page_title'] = "Contractor Profile";
		      //get value from db :-
		
	
		$credential = array('username' => $this->uri->segment(3));


        // getting data from database
        $query = $this->db->get_where('contractor', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
			
			$user_info["contractor_id"]=$row->contractor_id;
			$user_info["username"]=$row->username;
			$user_info["userid"]=$row->userid;
			$user_info["company_name"]=$row->company_name;
			$user_info["customer_name"]=$row->customer_name;
			$user_info["phone"]=$row->phone;
			$user_info["email"]=$row->email;
			$user_info["address"]=$row->address;
			$user_info["city"]=$row->city;
			$user_info["state"]=$row->state;
			$user_info["postcode"]=$row->postcode;
		    $user_info["comments"]=$row->comments;
			$user_info["newsletter"]=$row->newsletter;
			$user_info["advice"]=$row->advice;
			$user_info["last_logged_in"]= $this->humanTiming(strtotime($row->last_logged_in));
			
            $page_data["user_info"]=$user_info;
        }
		
        $this->load->view('public-profile', $page_data);
			
			
			
		
		
		}
    }
	public function humanTiming ($time)
    {

		$time = time() - $time; // to get the time since that moment
		$time = ($time<1)? 1 : $time;
		$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);
	
		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		}

    }


    public function paymentDetails (){
        $data = array(
            'error' => '',
            'success' => '',
        );
        $key = $this->config->item('secret_key');
        Stripe::setApiKey($key);
        if ($_POST) {
            try {
                if (empty($_POST['street']) || empty($_POST['city']) || empty($_POST['zip']))
                    throw new Exception("Fill out all required fields.");
                if (!isset($_POST['stripeToken']))
                    throw new Exception("The Stripe Token was not generated correctly");
                $stripe_customer = Stripe_Customer::create(
                array(
                    "card" => $_POST['stripeToken'],
                    "email" => $_POST['email']
                    )
                );
                $customer_data['user_id'] = $this->session->userdata('login_user_id');
                $customer_data['stripe_id'] = $stripe_customer->id;
                $this->load->model('Stripe_customer_model');
                $this->Stripe_customer_model->stripe_customer_insert($customer_data);
                $data['success'] = '<div class="alert alert-success">
                <strong>Success!</strong> Your card was successfully registered.
				</div>';
                //$user_info = Stripe_Customer::retrieve("cus_9d3PsMt7fFPdzY",$key);

            }
            catch (Exception $e) {
                $data['error'] = '<div class="alert alert-danger">
			  <strong>Error!</strong> '.$e->getMessage().'
			  </div>';
            }
        }


       /* $create = Stripe_Charge::create(
            array(
                 "amount" => 10000,
                 "currency" => "usd",
                "customer" => "cus_9d3PsMt7fFPdzY",

            )
        );*/
        //echo '<pre>';
      // var_dump($create);die;
        //$this->model->stripe_customer_insert($data);

        $this->load->view('payment',$data);


    }
    public function userInfo(){
        $key = $this->config->item('secret_key');
        $stripe_customers = Stripe_Customer::all('',$key);
        $this->load->view('user_info',['stripe_customers' => $stripe_customers]);

    }

    public function userCharges(){
        $key = $this->config->item('secret_key');
        $stripe_customers_charge = Stripe_Charge::all('',$key);
        $this->load->view('stripe_customers_charge',['stripe_customers_charge' => $stripe_customers_charge]);

    }

    public function pay(){
        $key = $this->config->item('secret_key');
        Stripe::setApiKey($key);
        $customer_id = $this->input->get('customer_id');
        $create = Stripe_Charge::create(
            array(
                "amount" => 10000,
                "currency" => "usd",
                "customer" => $customer_id,
                "description" => "Membership plan",
            )
        );
        $this->load->view('thank_you');
    }

}
