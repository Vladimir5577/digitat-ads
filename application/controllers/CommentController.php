<?php

	class CommentController extends CI_Controller {


		public function addCommentAction() {
			// validate the form
			$errors = [];
			$this->load->library("form_validation");
			$this->form_validation->set_rules('user_id', 'Comment', 'required|integer');
			$this->form_validation->set_rules('comment', 'Comment', 'required|max_length[255]');

			if ($this->form_validation->run() === false) {
				$errors = $this->form_validation->error_array();
				$this->session->set_flashdata('errors', $errors);

				print_r($errors);
				redirect(base_url().'user/userProfile/'.$this->input->post('user_id'));
				exit;
			}

			$data = [];
			$data['user_id'] = $this->input->post("user_id");
			$data['commented_by'] = $this->input->post("commented_by");
			$data['comment'] = $this->input->post("comment");

			$this->load->model("commentModel");
			$result = $this->commentModel->insertComment($data);
			if($result) {
				$this->session->set_flashdata('comment_added', true);
			}else {
				$this->session->set_flashdata('comment_added', false);
			}
			
			redirect(base_url().'user/userProfile/'.$this->input->post('user_id'));
		}

	}




?>