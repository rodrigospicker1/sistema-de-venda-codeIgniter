<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$user_data = $this->session->userdata('login');

		if($user_data == 'out'){
			redirect('login');
		}
	}


	public function index(){
		if($this->session->flashdata('out')){
			redirect('login');
		}

		$this->load->view('layout/header');
		$this->load->view('home/index');
		$this->load->view('layout/footer');
	}

}