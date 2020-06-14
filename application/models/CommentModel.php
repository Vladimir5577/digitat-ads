<?php

	class CommentModel extends CI_Model {

		public function insertComment($data) {
			$a = $this->db->insert("user_comment", $data);
			return $a;
		}


		public function getCommentForUserId($id) {
			$result = $this->db
				->select([
					'user_comment.id as id',
					'name',
					'comment',
					'photo',
					'user_id'
				])
				->where("user_comment.user_id", $id)
				->join("user", "user_comment.user_id = user.id")
				->get('user_comment');
			if($result !== false) {
				return $result->result();
			}
			return false;
		}

		public function getUserComment($id) {
			$this->db->select('*');
			$this->db->from('user_comment');
			$this->db->join('user', 'user_comment.commented_by = user.id', 'left');
			$this->db->where('user_comment.user_id', $id);
			$this->db->order_by('id_com', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

	}

?>