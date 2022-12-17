<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->load->view('layout/header');
		$this->load->view('login/index');
		$this->load->view('layout/footer');

	}

	public function login(){

		$email = $this->security->xss_clean($this->input->post('email'));
		$password = md5($this->input->post('password'));

		$this->db->select('*');
		$this->db->where(
			array(
				'email' => $email, 
				'password' => $password)
		);
		$query1 = $this->db->get('users');
		$result1 = $query1->row_array();

		if($result1 != null){
			redirect('home');
		}else{
			
			$this->session->set_flashdata('error', 'Verifique seu e-mail ou senha');

			redirect('login');
		}
		
	}
}
