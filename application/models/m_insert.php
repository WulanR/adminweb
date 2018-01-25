<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_insert extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

	}

	public function insert($foto)
	{
		$data = array(
			'ID_ADMIN' => $this->session->userdata('id_admin'),
			'NAMA_TEMPAT' => $this->input->post('nm_tempat'),
			'ALAMAT_WISATA' => $this->input->post('alamat_wis'),
			'KETERANGAN' => $this->input->post('keterangan'),
			'HARGA_WISATA' => $this->input->post('harga_wis'),
			'FOTO' => $foto['file_name']
			);

		$this->db->insert('tempat_wisata', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function insert2($foto)
	{
		$data = array(
			'ID_ADMIN' => $this->session->userdata('id_admin'),
			'NAMA_KULINER' => $this->input->post('nm_kuliner'),
			'HARGA_KULINER' => $this->input->post('harga_kul'),
			'KETERANGAN' => $this->input->post('keterangan'),
			'ALAMAT_KULINER' => $this->input->post('alamat_kul'),
			'FOTO' => $foto['file_name']
		);

		$this->db->insert('tempat_kuliner', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file m_insert.php */
/* Location: ./application/models/m_insert.php */