<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class personal extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        // $user_id = $this->session->userdata('user_id')
        
        $this->out_data['user'] = $this->db->query("select * from user where user_id='{$user_id}'"))->row_array();
		$this->out_data['con_page'] = 'personal';
		$this->load->view('default', $this->out_data);
	}

}
