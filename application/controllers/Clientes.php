<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

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

			'titulo' => 'Clientes cadastrados',

			'styles' => array(
				'vendor/datables/dataTables.bootstrap4.min.css'
			),
			'scripts' => array(
				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'vendor/datatables/app.js'
			),

			'clientes' => $this->core_model->get_all('clientes')
		);

		$this->load->view('layout/header', $data);
		$this->load->view('clientes/index');
		$this->load->view('layout/footer');

	}

}