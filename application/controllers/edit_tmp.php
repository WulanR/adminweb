<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_tmp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_get');
	}

	public function index($id_tempat)
	{
		$data['main_view'] = 'tempat/edit_tempat';
		$data['tempat']=$this->m_get->get_data_tempat_by_id($id_tempat);
		$this->load->view('template', $data);
	}

	public function lihat()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'tempat/edit_tempat';
			$id_tempat = $this->uri->segment(3);
			$data['tempat']=$this->m_get->get_data_tempat_by_id($id_tempat);
		    $this->load->view('template', $data);
		} else{
			redirect('login');
		}
	}

	public function edit(){
			$id_tempat = $this->uri->segment(3);

			if($this->input->post('submit')){
			    $this->form_validation->set_rules('id_admin', 'Admin', 'trim|required');
			    $this->form_validation->set_rules('nm_tempat', 'Nama tempat', 'trim|required');
			    $this->form_validation->set_rules('alamat_wis', 'Alamat', 'trim|required');
			    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
			    $this->form_validation->set_rules('harga_wis', 'Biaya', 'trim|required');
		  

			   if($this->form_validation->run() == TRUE){
				    	$config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
					 	$config['max_size']  = '10000';
						
						$this->load->library('upload', $config);
						if ($this->upload->do_upload('foto')){ 
							if($this->m_get->update($id_tempat, $this->upload->data()) == TRUE){
								$data['notif'] = 'Edit Data Tempat berhasil!';
						    	redirect('table_tempat');
							} else {
								$data['notif'] = 'Edit Data Tempat gagal!';
							    $data['main_view'] = 'tempat/edit_tempat';
								$this->load->view('template', $data);
							}
						}else{
							$data['notif'] = $this->upload->display_errors();
							$data['main_view'] = 'tempat/tambah_tempat';
							$this->load->view('template', $data);
						}

					} else {
						$data['notif'] = validation_errors();
						$data['kuliner']=$this->m_get->get_data_tempat_by_id($id_tempat);
						$data['main_view'] = 'tempat/edit_tempat';
						$this->load->view('template', $data);
					}
					
				}else {
					redirect('login');
				}
			} 
		}


/* End of file edit_tmp.php */
/* Location: ./application/controllers/edit_tmp.php */