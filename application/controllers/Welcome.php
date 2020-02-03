<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function create() 
	{
		$this->load->view('create');
	}
	public function ShowUser()
	{
		$this->load->model('Welcome_Model');
		$data=$this->Welcome_Model->product_list();
		echo json_encode($data);
	}
	public function save()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|valid_email|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				    $array = array(
				    'error'   => true,
				    'name_error' => form_error('name'),
				    'email_error' => form_error('email')
			   
			  				 );
						    echo json_encode($array);
			} 
			else {
		$this->load->model('Welcome_Model');
		$data=$this->Welcome_Model->save_product();
		echo json_encode($data);
		}
	}
	public function delete()
	{
		$user_id = $this->uri->segment(3);
		$this->load->model('Welcome_Model');
		
			$data=$this->Welcome_Model->delete_product($user_id);
		echo json_encode($data);
	}
	function update(){
		// print_r($this->input->post());
		// die();
		$this->load->model('Welcome_Model');

		$data=$this->Welcome_Model->update_product();
		echo json_encode($data);
	}
}
