<?php

class UserController extends CI_Controller {
	public function register() {
		$errors = $this->session->flashdata('validation_errors');
		$reg_success = $this->session->flashdata('reg_success');
		$this->load->view("main", [
			"page_name" => "register",
			'validation_errors' => $errors,
			'reg_success' => $reg_success
		]);
	}

	public function registerAction() {
		// validate requrest
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', array('trim', 'required','valid_email'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == FALSE) {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('validation_errors', $errors);
			redirect(base_url().'user/register');
			return;
		}
		// save data to db
		$this->load->model('userModel');
		$data = [];
		$data['email'] = $this->input->post('email');
		$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$result = $this->userModel->registerUser($data);
		if($result) {
			$this->session->set_flashdata('reg_success', true);
			$this->session->set_userdata('login_user_id', $result);
			redirect(base_url().'user/updateProfile');
			return;
		}else {
			$this->session->set_flashdata('reg_success', false);
			redirect(base_url().'user/register');
			return;
		}
	}

	public function updateProfile() {
		$this->load->model("userModel");
		$errors = $this->session->flashdata('errors');
		$user = $this->userModel->getUserById($this->session->userdata('login_user_id'));
		$upload_status = $this->session->flashdata('update_status');
		$this->load->view("main", ["page_name" => "update_profile", "user" => $user, 'errors' => $errors, 'upload_status' => $upload_status]);
	}

	public function updateUserProfileAction() {
		//var_dump($_POST, $_FILES);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$errors = [];
		if($this->form_validation->run() === FALSE) {
			$errors = $this->form_validation->error_array();
		}

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('photo')) {
        	$upload_error = $this->upload->display_errors();
        	$errors['photo'] = $upload_error;
        }

		if(!empty($errors)) {
			$this->session->set_flashdata('update_status', false);
        	$this->session->set_flashdata('errors', $errors);
        	redirect(base_url().'user/updateProfile');
        	return;
        }

        // update user profile
        $data = [];
        $data['name'] = $this->input->post('name');
        $data['photo'] = $this->upload->data('file_name');
        $this->load->model('userModel');
        $user_id = $this->session->userdata('login_user_id');
        $result = $this->userModel->updateUserById($data, $user_id);
        if(!$result) {
        	$this->session->set_flashdata('update_status', false);
        	redirect(base_url().'user/updateProfile');
        	return;
        }
        $this->session->set_flashdata('update_status', true);
    	redirect(base_url().'user/userProfile/'.$user_id);
    	return;
	}

	public function userProfile() {
		$id = $this->uri->segment(3);
		$this->load->model('userModel');
		$user = $this->userModel->getUserById($id);
		if(!$user) {
			show_404();
		}
		//if(!$user) {}
		$this->load->view("main", ['page_name' => 'user_profile', 'user' => $user]);
	}

}

?>