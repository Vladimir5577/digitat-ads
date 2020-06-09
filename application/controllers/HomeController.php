<?php

class HomeController extends CI_Controller {
	public function index() {
		$this->load->model('userAdsModel');
		$page = ($this->input->get('page'))? $this->input->get("page") : 0;
		$result_data = $this->userAdsModel->getAllAds($page, 4);
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