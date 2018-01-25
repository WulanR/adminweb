<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function masuk()
	{
		//jika button submit/daftar di klik
		if($this->input->post('submit')){

			//set rule disetiap form input
			$this->form_validation->set_rules('username','Username','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
			
			if ($this->form_validation->run() == TRUE){

				if($this->m_admin->cek_user() == TRUE){

					redirect(base_url('index.php/admin/home'));

				} else {
				$data['notif'] = 'Login gagal';
				$this->load->view('login_view',$data);
				}
				

			}else{
				//jika gagal
				$data['notif'] = validation_errors();
				$this->load->view('login_view', $data);
			}
		}
	}
}

/* End of file login_admin.php */
/* Location: ./application/controllers/login_admin.php */