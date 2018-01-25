<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	function cek($username,$password){
        $this->db->where("USERNAME",$username);
        $this->db->where("PASSWORD",$password);
        return $this->db->get("admin");
    }

    public function cek_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('USERNAME', $username)
					->where('PASSWORD', md5($password))
					->get('admin');

		if($query->num_rows() > 0){
			$data = array(
				'id_admin' => $query->row('ID_ADMIN'),
				'username' => $username,
				'logged_in' => TRUE
				);
			$this->session->set_userdata($data);

			return TRUE;

		} else {
			return FALSE;
		}
	}

	public function insert()
	{
		$data = array(
			'USERNAME' => $this->input->post('username'),
			'PASSWORD' => md5($this->input->post('password')),
			);

		$this->db->insert('admin', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */