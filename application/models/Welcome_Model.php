<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_Model extends CI_Model {
	public function product_list()
		{
			$this->db->select('*'); 
			$alldata=$this->db->get('users');
			return $alldata->result();
		}	
		public function save_product() 
		{
			$this->db->set('name',$this->input->post('name'));
			$this->db->set('email',$this->input->post('email'));
			$result=$this->db->insert('users');
			return $result;
		}
		public function delete_product($user_id)
		{
			$this->db->where('id', $user_id);
			$result=$this->db->delete('users');
			return $result;
		}
		function update_product(){
			// echo $this->input->post('email_u');
		$this->db->set('name', $this->input->post('name_u'));
		$this->db->set('email', $this->input->post('email_u'));

		$this->db->where('id', $this->input->post('id_u'));
		$result=$this->db->update('users');
		return $result;
	}
} 

	