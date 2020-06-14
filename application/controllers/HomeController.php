<?php

class HomeController extends CI_Controller {
	public function index() {
		$this->load->library('form_validation');
		// adds
		$this->load->model('userAdsModel');
		$page = ($this->input->get('page'))? $this->input->get("page") : 0;
		$result_data = $this->userAdsModel->getAllAds($page, 4);

		// comment
		// $this->load->model("commentModel");
		// $comment_data = $this->commentModel->fetchComment();

		$this->load->view("main", [
			"page_name" => "home",
			'ads' => $result_data['data'],
			'totalRecords' => $result_data['totalRecords'],
			'limit' => $result_data['limit'],
			'page' => $page
		]);
	}
}

?>