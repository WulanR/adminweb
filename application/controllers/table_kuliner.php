<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_kuliner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_get');
	}

	public function index(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'kuliner/data_kuliner';
			$this->load->library('pagination');
				
				$config['base_url'] = base_url().'index.php/table_kuliner/index';
				$config['total_rows'] = $this->m_get->total_records2();
				$config['per_page'] = 3;
				$config['uri_segment'] = 3;
				$config['full_tag_open'] = "<ul class='pagination'>";
				$config['full_tag_close'] = "</ul>";
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = "<li class='active'><a href='#'>";
				$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
				$config['next_tag_open'] = "<li>";
				$config['next_tagl_close'] = "</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tagl_close'] = "</li>";
				$config['first_tag_open'] = "<li>";
				$config['first_tagl_close'] = "</li>";
				$config['last_tag_open'] = "<li>";
				$config['last_tagl_close'] = "</li>";
				
				$this->pagination->initialize($config);
				$start = $this->uri->segment(3, 0);

				$rows = $this->m_get->get_data_kuliner($config['per_page'],$start);

				$data['kuliner'] = $rows;
				$data['pagination'] = $this->pagination->create_links();
				$data['start'] = $start;
			$this->load->view('template', $data);
		} else {
			redirect('login');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$id_kuliner = $this->uri->segment(3);

			if($this->m_get->delete2($id_kuliner) == TRUE)
			{
				$this->session->set_flashdata('notif', 'Hapus data berhasil!');
				redirect('table_kuliner/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus data gagal!');
				redirect('table_kuliner/index');
			}
		} else {
			redirect('login');
		}
	}

}

/* End of file table_kuliner.php */
/* Location: ./application/controllers/table_kuliner.php */