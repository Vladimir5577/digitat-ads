<?php 
class UserAdsModel extends CI_Model {
	public function getAllAds($page_no = 0, $limit = 5) {
		$totalRecords = $this->db->count_all_results('user_ads');
		$data = $this->db
			->select(['user_ads.id_ads as id', 'user_id', 'name', 'title', 'user_ads.photo as photo', 'description'])
			->from('user_ads')
			->join('user', 'user_ads.user_id=user.id')
			->limit($limit)
			->offset($page_no * $limit) 
			->order_by("id_ads", 'DESC')
			->get();	
		if($data) {
			return [
				"data" => $data->result_array(),
				"totalRecords" => $totalRecords,
				"limit" => $limit
			];
		}
	}

	public function insertUserAds($data) {
		return $this->db->insert('user_ads', $data);
	}
}
?>