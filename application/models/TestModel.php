<?php

	class TestModel extends CI_Model {

		public function get_result() {
			$this->db->select("*");
			$this->db->from('user a');
			$this->db->join('user_ads b', 'b.user_id=a.id', 'left');
			$this->db->join('user_comment c',
					 'c.user_id=a.id', 'c.advert_id=b.id_ads', 'left');

			$a = $this->db->get();
			$data = $a->result();

			return $data;

		}

	}




?>