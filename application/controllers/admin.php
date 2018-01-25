<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_get');
	}

	public function index()
	{
		$this->load->view('login_view');
	}


	public function home(){
		$data['main_view'] = 'home';
		$data['jumlah_tmp']=$this->m_get->hitung();
		$data['jumlah_kul']=$this->m_get->hitung_kul();
		$this->load->view('template', $data);
	}

	public function logout(){
		$data = array(
			'USERNAME' => '',
			'PASSWORD' => FALSE);
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */