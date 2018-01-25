<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_kul extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_get');
	}

	public function index($id_kuliner)
	{
		$data['main_view'] = 'kuliner/edit_kuliner';
		$data['kuliner']=$this->m_get->get_data_kuliner_by_id($id_kuliner);
		$this->load->view('template', $data);
	}

	public function lihat()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'kuliner/edit_kuliner';
			$id_kuliner = $this->uri->segment(3);
			$data['kuliner']=$this->m_get->get_data_kuliner_by_id($id_kuliner);
		    $this->load->view('template', $data);
		} else{
			redirect('login');
		}
	}

	public function edit(){

				if($this->input->post('submit')){
				    $this->form_validation->set_rules('id_admin', 'Admin', 'trim|required');
				    $this->form_validation->set_rules('nm_kuliner', 'Nama Kuliner', 'trim|required');
				    $this->form_validation->set_rules('harga_kul', 'Harga', 'trim|required');
				    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
				    $this->form_validation->set_rules('alamat_kul', 'Alamat', 'trim|required');

				    if($this->form_validation->run() == TRUE){
				    	$config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
					 	$config['max_size']  = '10000';
						
						$this->load->library('upload', $config);
						if ($this->upload->do_upload('foto')){ 
							if($this->m_get->update2($id_kuliner, $this->upload->data()) == TRUE){
								$data['notif'] = 'Edit Data Kuliner berhasil!';
						    	redirect('table_kuliner');
							} else {
								$data['notif'] = 'Edit Data Tempat gagal!';
							    $data['main_view'] = 'kuliner/edit_kuliner';
								$this->load->view('template', $data);
							}
						}else{
							$data['notif'] = $this->upload->display_errors();
							$data['main_view'] = 'kuliner/tambah_kuliner';
							$this->load->view('template', $data);
						}

					} else {
						$data['notif'] = validation_errors();
						$data['kuliner']=$this->m_get->get_data_kuliner_by_id($id_kuliner);
						$data['main_view'] = 'kuliner/edit_kuliner';
						$this->load->view('template', $data);
					}
					
				}else {
					redirect('login');
				}
			} 
}
/* End of file edit_kuliner.php */
/* Location: ./application/controllers/edit_kuliner.php */