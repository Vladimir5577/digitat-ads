<?php

	class RateModel extends CI_Model {

		public function writeRate($data) {
			$a = $this->db->insert("user_rating", $data);
			return $a;
		}

		public function getRateModel($id) {
			$a = $this->db->select('*');
			$this->db->from('user_rating');
			$this->db->join('user', 'user_rating.user_id = user.id', 'left');
			$this->db->where('user_rating.user_id', $id);

			$query = $this->db->get();
			return $query->result();
		}

		public function getUserRatingByUserId($id) {
			$this->db->select(" sum(rate) / count(*) as rating");
			$this->db->where("user_id", $id);
			$this->db->from("user_rating");
			$result = $this->db->get();
			if($result) {
				$row =  $result->row_array();
				if(!isset($row['rating'])) {
					return false;
				}
				return $row['rating'];
			}
		}

		public function isUserAlreadyRated($user_id, $commented_by) {
			$this->db->where([ 'user_id' => $user_id, 'commented_by' => $commented_by]);
			$this->db->from('user_rating');
			$rows =  $this->db->count_all_results();
			if($rows) {
				return true;
			}
			return false;
		}

	}




?>
