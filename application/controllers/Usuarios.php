<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->_table_ = 'users';
	}

	public function index()
	{
		$data = array(

			'titulo' => 'Usuários cadastrados',

			'styles' => array(
				'vendor/datables/dataTables.bootstrap4.min.css'
			),
			'scripts' => array(
				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'vendor/datatables/app.js'
			),

			'usuarios' => $this->db->get("users")->result()
		);

		$this->load->view('layout/header', $data);
		$this->load->view('usuarios/index');
		$this->load->view('layout/footer');
	}

	public function edit($user_id = NULL){

		$this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.id = '.$user_id.'');

		$query = $this->db->get();

		if(!$user_id || !$query->row_array()){

			exit('Usuário não encontrado');

		}else{

			$data = array(
				'titulo' => 'Editar usuário',
				'usuario' => $query->row_array()
			); 

			$this->load->view('layout/header', $data);
			$this->load->view('usuarios/edit');
			$this->load->view('layout/footer');
		}

	}
}
