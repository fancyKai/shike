<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	function check_login()
	{
		$this->load->model('md_login');
		$name = $this->input->post('name');
		$password = $this->input->post('password');
		$result = $this->md_login->check_login($name, $password);
		if($result['status'])
		{
			$this->session->set_userdata('admin_login', 1);
			$this->session->set_userdata('id', $result['id']);
			$this->session->set_userdata('nick', $result['nick']);
			$this->session->set_userdata('permission', $result['permission']);
			$this->session->set_userdata('rid', $result['rid']);
		}
		echo json_encode($result);
	}

	function logout()
	{
		$this->session->sess_destroy();
		header("Location:".base_url()."login");
	}
}