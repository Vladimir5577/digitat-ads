<?php

class AuthController extends CI_Controller {
	public function login() {
		// check already login
		// if($this->session->user_data('login_user_id')) {
		// 	redirect(base_url());
		// 	exit;
		// }
		$error = $this->session->flashdata('login_failed');
		$this->load->view("main", ["page_name" => "login", 'error' => $error]);
	}

	public function loginAction() {
		// validate requrest
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == FALSE) {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('login_failed', true);
			redirect(base_url().'auth/login');
			return;
		}
		// save data to db
		$this->load->model('userModel');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		// check user exists in database with email
		$result = $this->userModel->getUserByEmail($email);
		if(!$result) {
			$this->session->set_flashdata('login_failed', true);
			redirect(base_url().'auth/login');
			return;
		}

		// check password is correct or not
		if(!password_verify($password, $result['password'])) {
			$this->session->set_flashdata('login_failed', true);
			redirect(base_url().'auth/login');
			return;
		}

		// set session login
		$this->session->set_userdata('login_user_id', $result['id']);
		redirect(base_url());
	}

	public function logout() {
		$this->session->unset_userdata('login_user_id');
		redirect(base_url());
	}
}

?>