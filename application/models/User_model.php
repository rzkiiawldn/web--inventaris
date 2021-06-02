<?php

class User_model extends CI_Model
{

	public function get($id_user = null)
	{
		$id_login = $this->session->userdata('id_user');
		if ($id_user != null) {
			return $this->db->query("SELECT * FROM user JOIN user_level ON user.id_level = user_level.id_level WHERE id_user = '$id_user'")->row();
		}
		return $this->db->query("SELECT * FROM user JOIN user_level ON user.id_level = user_level.id_level WHERE id_user != 1 AND id_user != $id_login ORDER BY id_user DESC")->result();
	}

	public function get_level($id_level = null)
	{
		if ($id_level != null) {
			return $this->db->query('SELECT * FROM user_level WHERE id_level = $id_level')->row();
		}
		return $this->db->query('SELECT * FROM user_level')->result();
	}
}
