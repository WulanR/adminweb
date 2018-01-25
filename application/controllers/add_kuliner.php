<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_kuliner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_insert');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			$data['main_view'] = 'kuliner/tambah_kuliner';
			$this->load->view('template', $data);
		}else{
			redirect('login');
		}
	}

	public function simpan(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('id_admin', 'Admin', 'trim|required');
			$this->form_validation->set_rules('nm_kuliner', 'Nama Kuliner', 'trim|required');
			$this->form_validation->set_rules('harga_kul', 'Harga', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
			$this->form_validation->set_rules('alamat_kul', 'Alamat', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '10000';

				$this->load->library('upload', $config);
		
				if ($this->upload->do_upload('foto')){
					if($this->m_insert->insert2($this->upload->data()) == TRUE){
						$data['notif'] = 'Tambah Kuliner berhasil!';
						$data['main_view'] = 'kuliner/tambah_kuliner';
						$this->load->view('template', $data);
					} else {
						$data['notif'] = 'Tambah Kuliner gagal!';
						$data['main_view'] = 'kuliner/tambah_kuliner';
						$this->load->view('template', $data);
					}
				} 
				else{
						$data['notif'] = $this->upload->display_errors();
						$data['main_view'] = 'tempat/tambah_tempat';
						$this->load->view('template', $data);
					}
				}
				else {
					$data['notif'] = validation_errors();
					$data['main_view'] = 'kuliner/tambah_kuliner';
					$this->load->view('template', $data);
				}
			}
		}
	}
/* End of file add_kuliner.php */
/* Location: ./application/controllers/add_kuliner.php */