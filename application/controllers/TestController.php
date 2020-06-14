<?php

	class TestController extends CI_Controller {

		public function get_result() {
			$this->load->model("testModel");
			$data['bla'] = $this->testModel->get_result();

			$this->load->view("test", $data);
		}

	}



?>