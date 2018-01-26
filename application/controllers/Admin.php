<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*  
 *  @author     : Yashvir Singh Prince
 *  date        : 20 april, 2016
 *  Bidstates. An online directory of subcontractors.
 *  https://www.bidstates.com
 *  support@bidstates.com
 */

class Admin extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->model('admin_model');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('template');
    }

    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
    }

    /***ADMIN DASHBOARD***/
    public function dashboard()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = 'Admin Dashboard';
        $page_data['script'] = 'index.js';
        $this->template->load('admin_layout', 'backend/index', $page_data);
    }


    /*
     *function for display constructors/subcontracors and used them in admin section
     *
     */

    public function customers() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $data["page_data"] = $this->admin_model->getCustomers();

        $data['script'] = 'customer.js';
        $this->template->load('admin_layout', 'backend/customers', $data);
    }

    public function accounts() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $data["page_data"] = $page_data = $this->admin_model->getAccounts();
        $data['script'] = 'account.js';
        $this->template->load('admin_layout', 'backend/accounts', $data);
    }

    /*
     *function for update active status
     *
     */
    public function updateStatus()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $active = $_POST["active"];
        $table = $_POST["table"];
        $email = $_POST["email"];
        // update the status in database
        $this->db->where('email', $email);
        $this->db->update($table, array('active' => $active));
        $response['update_status'] = "success";
        echo json_encode($response);
    }

    public function addContractor() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $data['user_manager'] = true;
        $this->template->load('admin_layout', 'backend/add_contractor', $data);
    }

    public function addCustomer() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $data['user_manager'] = true;
        $this->template->load('admin_layout', 'backend/add_customer', $data);
    }

    public function editContractor($id = 0) {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $user = $this->admin_model->getContractorById($id);
        if ($user) {
            $data['user'] = $user[0];
            $this->template->load('admin_user_layout', 'backend/edit_contractor', $data);
        } else {
            echo "Invalid Userid";
            redirect(base_url(), 'refresh');
        }
    }

    public function editCustomer($id = 0) {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $user = $this->admin_model->getCustomerById($id);
        if ($user) {
            $data['user'] = $user[0];
            $this->template->load('admin_user_layout', 'backend/edit_customer', $data);
        } else {
            echo "Invalid Userid";
            redirect(base_url(), 'refresh');
        }
    }

    public function update_user() {
        $response = array();

        if ($this->session->userdata('admin_login') != 1) {
            $response['status'] = 'fail';
            echo json_encode($response);
            exit;
        }

        $id = $this->input->post("user_id");
        if ($this->input->post('usertype') == 'contractor') {
            $data['company_name']      = $this->input->post('company-name');
            $data['customer_name']     = $this->input->post('customer-name');
            $data['phone']             = $this->input->post('phone_number');
            $data['licensed']          = $this->input->post('licensed');
            $data['hide_phone_number'] = $this->input->post('hide_number') ? 1 : 0;

            $password = $this->input->post('password');


            if ( (trim($this->input->post('password')) != "") && (trim($this->input->post('new_password')) != "")) {
                $user = $this->db->get_where("contractor", array('contractor_id' => $id));
                if ($user->result_array()[0]['password'] == sha1($password)) {
                    $data['password'] = sha1($this->input->post('new_password'));
                    $this->db->where('contractor_id', $id);
                    if ($this->db->update('contractor', $data)) {
                        $response['status'] = 'ok';
                    } else {
                        $response['status'] = 'fail';
                    }
                } else {
                    $response['status'] = "fail";
                }
            } else {
                if ($this->db->update('contractor', $data)) {
                    $response['status'] = 'ok';
                } else {
                    $response['status'] = 'fail';
                }
            }

            $response['where'] = $this->input->post('where');
            echo json_encode($response);
        } else if ($this->input->post('usertype') == 'customer') {
            $data['company_name']  = $this->input->post('company-name');
            $data['customer_name'] = $this->input->post('customer-name');
            $data['phone']             = $this->input->post('phone_number');
            $data['licensed']          = $this->input->post('licensed');
            $data['hide_phone_number'] = $this->input->post('hide_number') ? 1 : 0;

            $password = $this->input->post('password');

            if ( (trim($this->input->post('password')) != "") && (trim($this->input->post('new_password')) != "")) {
                $user = $this->db->get_where("customer", array('customer_id' => $id));
                if ($user->result_array()[0]['password'] == sha1($password)) {
                    $data['password'] = sha1($this->input->post('new_password'));
                    $this->db->where('customer_id', $id);
                    if ($this->db->update('customer', $data)) {
                        $response['status'] = 'ok';
                    } else {
                        $response['status'] = 'fail';
                    }
                } else {
                    $response['status'] = "fail";
                }
            } else {
                $this->db->where('customer_id', $id);
                if ($this->db->update('customer', $data)) {
                    $response['status'] = 'ok';
                } else {
                    $response['status'] = 'fail';
                }
            }

            $response['where'] = $this->input->post('where');
            echo json_encode($response);
        }
    }
}
