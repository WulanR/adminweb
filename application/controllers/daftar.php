<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
	}

	public function index()
	{
		$this->load->view('sign_up');
	}

	public function simpan(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if($this->form_validation->run() == TRUE){
					if($this->m_admin->insert() == TRUE){
						$data['notif'] = 'Tambah Admin berhasil!';
						$this->load->view('sign_up');
					} else {
						$data['notif'] = 'Tambah Admin gagal!';
						$this->load->view('sign_up');
					}

				} else {
					$data['notif'] = validation_errors();
					$this->load->view('sign_up');
				}
			}
		}
} 
/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */