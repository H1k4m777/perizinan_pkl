<?php
class Users_model extends CI_Model
{

	public function get_all_users()
	{
		$query = $this->db->get('user');
		return $query->result();
	}

	public function get_user_by_id($id)
	{
		$query = $this->db->get_where('user', array('id' => $id));
		return $query->row();
	}

	public function get_role_id_by_name_and_password($name, $password)
	{
		$this->db->select('id_role');
		$this->db->from('user');
		$this->db->where('nama', $name);
		$this->db->where('password', $password);
		$query = $this->db->get();
		return $query->row()->id_role;
	}

	public function get_user_by_nama_and_password($nama, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('nama', $nama);
		$this->db->where('password', $password);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function insert_user($data)
	{
		return $this->db->insert('user', $data);
	}

	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}
}
