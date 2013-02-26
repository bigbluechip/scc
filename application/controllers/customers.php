<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
	
	public function add()
	{
		if($this->session->userdata('isLoggedIn')) //checking if the user is logged in
		{
			$data['title'] = "New Customer | Sharman's Cab Company";
			$data['message'] = "not added";
			$data['menuIndex'] = 2;
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_add_customer');
		}
		else {
			redirect('main');
		}
	}
	
	public function manage() //returns a list of customers and options to manage them
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$this->load->library('pagination');
			
			$config['base_url'] = base_url() . "customers/manage";
			$config['total_rows'] = $this->db->get('customers')->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 10;
			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$this->db->order_by("name", "asc");
			$data['records'] = $this->db->get('customers',$config['per_page'],$this->uri->segment(3));
							
			$data['title'] = "Manage Customers | Sharman's Cab Company";
			$data['menuIndex'] = 2;
			$this->load->view('site_header', $data);
			$this->load->view('dashboard_header');
			$this->load->view('view_manage_customers');
		}
		else {
			redirect('main');
		}
	}
	
	public function add_customer_validate() //this is where the add_customer form posts back
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("name","name","required|trim|xss_clean");
		$this->form_validation->set_rules("address_1","address line 1","required|trim|xss_clean");
		$this->form_validation->set_rules("address_2","address line 2","required|trim|xss_clean");
		$this->form_validation->set_rules("mobile","mobile","required|trim|xss_clean");
		$this->form_validation->set_rules("email","email","required|trim|valid_email|xss_clean");
		
		if($this->form_validation->run())
		{
			$this->load->model('model_customers');
			
			if($this->model_customers->add_customer()) //add the customer
			{
				$data['title'] = "New Customer | Sharman's Cab Company";
				$data['message'] = "added";
				$data['menuIndex'] = 2;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
			}
			else
			{
				$data['title'] = "New Customer | Sharman's Cab Company";
				$data['message'] = "error";
				$data['menuIndex'] = 2;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
			}
		}
		else
		{
				$data['title'] = "New Customer | Sharman's Cab Company";
				$data['message'] = "not added";
				$data['menuIndex'] = 2;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
		}
		
	}

	public function details($id)
	{
		$id = trim($id);
		
		$this->db->where('id',$id);
		$query = $this->db->get('customers');
		if($query->num_rows())
		{
			$customer = $query->row();
			
			$response['message'] = "true";
			$response['id'] = $id;
			$response['name'] = $customer->name;
			$response['address'] = $customer->address;
			$response['mobile'] = $customer->mobile;
			$response['type'] = $customer->type;
			$response['email'] = $customer->email;
		}
		else
		{
			$response['message'] = "false";
		}
		 
		$this->load->view('overlay_header',$response); //loads the overlay view as this page is viewed from within a Facebox
		$this->load->view('overlay_customer_details', $response);
	}
	public function edit($id) //provides the page to edit a driver
	{
		if($this->session->userdata('isLoggedIn'))
		{
			$id = trim($id); //gets the ID
			$this->db->where('id',$id);
			$query = $this->db->get('customers'); //fetches the driver using the ID
			
			if($query->num_rows() == 1) //if we get exactly ONE row
			{
				$customer = $query->row(); //get that row into an object
				
				
				$data['id'] = $id;
				$data['name'] = $customer->name;
				$data['type'] = $customer->type;
				$data['address'] = $customer->address;
				$data['mobile'] = $customer->mobile;
				$data['email'] = $customer->email;
				$data['message'] = "edit";
				$data['menuIndex'] = 1;
				$data['title'] = "Edit Customer | Sharman's Cab Company";
				$this->load->view('site_header', $data); //send this array to the view, use this info to populate the fields
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
			}
			else {
				$data['message'] = "editNotFound";
				$data['menuIndex'] = 1;
				$data['title'] = "Edit Customer | Sharman's Cab Company";
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
			}
		}
		else {
			redirect('main');
		}
	}

   public function edit_customer_validate() //the edit driver form posts back here
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("id","id","required|trim|xss_clean");
		$this->form_validation->set_rules("name","name","required|trim|xss_clean");
		$this->form_validation->set_rules("type","type","required|trim|xss_clean");
		$this->form_validation->set_rules("address","address","required|trim|xss_clean");
		$this->form_validation->set_rules("email","email","required|trim|xss_clean");
		$this->form_validation->set_rules("mobile","mobile","required|trim|xss_clean");
		
		if($this->form_validation->run())
		{
			$this->load->model('model_customers');
			
			if($this->model_customers->edit_customer()) //edit the driver
			{
				$data['title'] = "Edit Customer | Sharman's Cab Company";
				$data['message'] = "edited";
				$data['menuIndex'] = 1;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
			}
			else
			{
				$data['title'] = "Edit Customer | Sharman's Cab Company";
				$data['message'] = "editError";
				$data['menuIndex'] = 1;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
			}
		}
		else
		{
				$data['title'] = "Edit Customer | Sharman's Cab Company";
				$data['message'] = "edit";
				$data['menuIndex'] = 1;
				$this->load->view('site_header', $data);
				$this->load->view('dashboard_header');
				$this->load->view('view_add_customer');
		}
	
}
}