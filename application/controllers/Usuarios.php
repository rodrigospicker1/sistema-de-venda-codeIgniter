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

	public function edit($usuario_id = NULL){

		$db1 = $this->db;
		$db2 = $this->db;

		$this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.id = '.$usuario_id.'');

		$query1 = $this->db->get();

		$db1->select('*');
        $db1->from('users_groups');
        $db1->where('users_groups.user_id = '.$usuario_id.'');

        $query2 = $db1->get();

		if(!$usuario_id || !$query1->row_array()){

			exit('Usuário não encontrado');

		}else{

			$data = array(
				'titulo' => 'Editar usuário',
				'usuario' => $query1->row_array(),
				'perfil_usuario' => $query2->row_array()
			); 

			$this->load->view('layout/header', $data);
			$this->load->view('usuarios/edit');
			$this->load->view('layout/footer');
		}

	}
}
