<?php

class AdsController extends CI_Controller {
	public function addAds() { 
		$errors = $this->session->flashdata('errors');
        $update_status = $this->session->flashdata('update_status');
		$this->load->view('main', ['page_name' => 'add_ads', 'errors' => $errors, 'form_status' => $update_status]);
	}

	public function adsAddAction() {
		//var_dump($_POST, $_FILES);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$errors = [];

		if($this->form_validation->run() === FALSE) {
			$errors = $this->form_validation->error_array();
		}

		$config['upload_path']          = './uploads/ads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) {
        	$upload_error = $this->upload->display_errors();
        	$errors['photo'] = $upload_error;
        }

		if(!empty($errors)) {
			$this->session->set_flashdata('update_status', false);
        	$this->session->set_flashdata('errors', $errors);
        	redirect(base_url().'ads/addAds');
        	return;
        }
        // update db
        $data = [];
        $data['user_id'] = $this->session->userdata('login_user_id');
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['photo'] = $this->upload->data('file_name');
        $this->load->model('userAdsModel');
        $result = $this->userAdsModel->insertUserAds($data);
        if(!$result) {
        	$this->session->set_flashdata('update_status', false);
        	 redirect(base_url().'ads/addAds');
        	return;
        }
        
        $this->session->set_flashdata('update_status', true);
    	redirect(base_url().'ads/addAds');
    	return;
	}
}

?>