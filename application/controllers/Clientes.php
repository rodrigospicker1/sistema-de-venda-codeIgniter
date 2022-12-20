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

	public function edit($cliente_id = NULL){

		if(!$cliente_id || !$this->core_model->get_by_id('clientes', array('cliente_id' => $cliente_id))){

			$this->session->set_flashdata('error', 'Cliente não encontrado');

		}else{

			$this->form_validation->set_rules('cliente_nome', 'nome', 'trim|required|min_length[4]|max_length[45]');
			$this->form_validation->set_rules('cliente_sobrenome', 'sobrenome', 'trim|required|min_length[4]|max_length[150]');
			$this->form_validation->set_rules('cliente_data_nascimento', 'data de nascimento', 'required');
			$this->form_validation->set_rules('cliente_cpf_cnpj', 'cpf ou cnpj', 'required|exact_length[18]');
			$this->form_validation->set_rules('cliente_rg_ie', 'inscrição estadual', 'trim|required|max_length[20]');
			$this->form_validation->set_rules('cliente_email', 'email', 'trim|required|max_length[50]');
			$this->form_validation->set_rules('cliente_telefone', 'telefone', 'trim|max_length[14]');
			$this->form_validation->set_rules('cliente_celular', 'celular', 'trim|max_length[15]');
			$this->form_validation->set_rules('cliente_cep', 'cep', 'trim|required|exact_length[9]');
			$this->form_validation->set_rules('cliente_endereco', 'endereço', 'trim|required|max_length[155]');
			$this->form_validation->set_rules('cliente_numero_endereco', 'numero', 'trim|max_length[20]');
			$this->form_validation->set_rules('cliente_bairro', 'bairro', 'trim|required|max_length[45]');
			$this->form_validation->set_rules('cliente_complemento', 'complemento', 'trim|max_length[145]');
			$this->form_validation->set_rules('cliente_cidade', 'cidade', 'trim|required|max_length[50]');
			$this->form_validation->set_rules('cliente_estado', 'estado', 'trim|required|max_length[2]');
			$this->form_validation->set_rules('cliente_obs', 'observações', 'max_length[500]');

			if($this->form_validation->run()){

				echo '<pre>';
				print_r($this->input->post());
				exit();

			}else{

				$data = array(

					'titulo' => 'Atualizar cliente',

					'cliente' => $this->core_model->get_by_id('clientes', 
						array(
							'cliente_id' => $cliente_id
						))			
				);

				echo '<pre>';
				print_r($data['cliente']);
				exit();

				$this->load->view('layout/header', $data);
				$this->load->view('clientes/edit');
				$this->load->view('layout/footer');

			}

		}

	}

}
