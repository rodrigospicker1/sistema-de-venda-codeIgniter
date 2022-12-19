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

		$this->form_validation->set_rules('sistema_razao_social', 'razao social', 'required|min_length[10]|max_length[145]');
		$this->form_validation->set_rules('sistema_nome_fantasia', 'nome fantasia', 'required|min_length[10]|max_length[145]');
		$this->form_validation->set_rules('sistema_cnpj', 'cnpj', 'required|exact_length[18]');
		$this->form_validation->set_rules('sistema_ie', 'inscrição estadual', 'required|max_length[25]');
		$this->form_validation->set_rules('sistema_telefone_fixo', 'telefone fixo', 'required|max_length[25]');
		$this->form_validation->set_rules('sistema_telefone_movel', 'telefone móvel', 'required|max_length[25]');
		$this->form_validation->set_rules('sistema_email', 'e-mail', 'required|valid_email|max_length[100]');
		$this->form_validation->set_rules('sistema_site_url', 'site url', 'required|valid_url|max_length[100]');
		$this->form_validation->set_rules('sistema_cep', 'cep', 'required|exact_length[9]');
		$this->form_validation->set_rules('sistema_endereco', 'endereço', 'required|max_length[145]');
		$this->form_validation->set_rules('sistema_numero', 'numero', 'max_length[25]');
		$this->form_validation->set_rules('sistema_cidade', 'cidade', 'required|max_length[45]');
		$this->form_validation->set_rules('sistema_estado', 'estado', 'required|exact_length[2]');
		$this->form_validation->set_rules('sistema_txt_ordem_servico', 'texto da ordem de serviço', 'max_length[500]');

		if($this->form_validation->run()){

			$data = elements(array(
					'sistema_razao_social',
					'sistema_nome_fantasia',
					'sistema_cnpj',
					'sistema_ie',
					'sistema_telefone_fixo',
					'sistema_telefone_movel',
					'sistema_email',
					'sistema_razao_social',
					'sistema_site_url',
					'sistema_cep',
					'sistema_endereco',
					'sistema_numero',
					'sistema_cidade',
					'sistema_estado',
					'sistema_txt_ordem_servico'
				), $this->input->post()
			);

			$data = html_escape($data);

			$this->core_model->update('sistema', $data, array('sistema_id' => 1));
			redirect('sistema');

		}else{

			$this->load->view('layout/header', $data);
			$this->load->view('sistema/index');
			$this->load->view('layout/footer');

		}

	}

}
