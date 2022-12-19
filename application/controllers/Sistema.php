<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$user_data = $this->session->userdata('login');

		if($user_data == 'out'){
			redirect('login');
		}
	}

	public function index()
	{

		$data = array(
			'titulo' => 'Editar informações do sistema',
			'sistema' => $this->core_model->get_by_id('sistema', array(
				'sistema_id' => 1
			)),
		);

		$this->load->view('layout/header', $data);
		$this->load->view('sistema/index');
		$this->load->view('layout/footer');

	}

}
