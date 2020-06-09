<?php

class UserModel extends CI_Model {
	public function registerUser($data) {
		if($this->db->insert('user', $data)) {
			return $this->db->insert_id();
		}
	}

	public function getUserByEmail($email) {
		$result = $this->db->get_where('user', ['email' => $email]);
		if(!$result) {
			return false;
		}
		$data = $result->result_array();
		return $data[0];
	}

	public function getUserById($id) {
		$result = $this->db->get_where("user", ["id" => $id]);
		$data = $result->result_array();
		if(count($data) == 0) {
			return null;
		}
		return $data[0];
	}

	public function updateUserById($data, $id) {
		return $this->db->where(['id' => $id])->set($data)->update('user');
	}
}


?>