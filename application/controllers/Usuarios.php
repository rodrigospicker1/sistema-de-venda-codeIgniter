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

	public function add(){

		$data = array(
			'titulo' => 'Cadastrar usuário'
		); 

		$this->form_validation->set_rules('first_name', 'name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('confirm_password', 'confirm password', 'matches[password]');

		if($this->form_validation->run()){

			$insert = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'active' => $this->input->post('active'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email')
			);

			$group = array($this->input->post('perfil_usuario'));
			$group = $this->security->xss_clean($group);

			$insert = $this->security->xss_clean($insert);

			$this->db->insert('users',$insert);
			redirect('usuarios');

		}else{

			$data = array(
				'titulo' => 'Cadastrar usuário'
			); 

			$this->load->view('layout/header', $data);
			$this->load->view('usuarios/add');
			$this->load->view('layout/footer');

		}

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

			$this->form_validation->set_rules('first_name', 'name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email_check');
			$this->form_validation->set_rules('username', 'username', 'trim|required|callback_username_check');
			$this->form_validation->set_rules('password', 'password', 'min_length[5]|max_length[255]');
			$this->form_validation->set_rules('confirm_password', 'confirm password', 'matches[password]');

			if($this->form_validation->run()){

				$data = elements(

					array(
						'first_name',
						'last_name',
						'email',
						'username',
						'active',
						'password'
					), $this->input->post()

				);

				$data = $this->security->xss_clean($data);

				$password = $this->input->post('password');

				if(!$password){
					unset($data['password']);
				}

				$this->core_model->update('users', $data, array('id' => $usuario_id));

				$perfil_usuario_db = $query2->row_array();
				$perfil_usuario_post = $this->input->post('perfil_usuario');

				if($perfil_usuario_post != $perfil_usuario_db['id']){
					$perfil_usuario_post = $usuario_id;
				}
				$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
				redirect('usuarios');

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

	public function email_check($email){

		$usuario_id = $this->input->post('usuario_id');

		if($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))){

			$this->form_validation->set_message('email_check', 'Esse e-mail já existe');

			return FALSE;

		}else{

			return TRUE;

		}

	}

	public function username_check($username){

		$usuario_id = $this->input->post('usuario_id');

		if($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))){


			$this->form_validation->set_message('username_check', 'Esse usuário já existe');

			return FALSE;

		}else{

			return TRUE;

		}

	}
}
