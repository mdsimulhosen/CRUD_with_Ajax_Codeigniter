<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_crud_model extends CI_Model
{
	public function insert_data($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function select($table)
	{
		$query = $this->db->get($table);
		return $query->result();
	}

	public function editdata($table, $id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($table);
		if ($query) {
			return $query->row();
		}
	}

	// Update data from table cars 
	public function updateData($id, $table, $data)
	{
		$this->db->set($data);
		$this->db->where('id', $id);
		if ($this->db->update($table)) {
			return true;
		}
	}

	// Delete data 
	public function deleteData($id, $table)
	{
		$this->db->where('id', $id);
		if($this->db->delete($table)){
			return true;
		}
	}
}
