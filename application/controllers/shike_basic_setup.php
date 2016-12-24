<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_basic_setup extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

        // $act_id = $this->input->get('act_id');
        // $this->out_data['act'] = $this->db->query("select * from activity where act_id=$act_id")->row_array();
        $user_id = 1;
		$this->out_data['userinfo'] = $this->db->query("select * from user where user_id={$user_id}")->row_array();
		$this->out_data['con_page'] = 'shike/basic_setup';
		$this->load->view('shike_default', $this->out_data);
	}
}
