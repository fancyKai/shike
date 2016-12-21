<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_message_center extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$user_id = "1";
        $this->out_data['messages'] = $this->db->query("select * from message where user_id=$user_id and user_type='1'")->result_array();
		$this->out_data['con_page'] = 'shike/message_center';
		$this->load->view('shike_default', $this->out_data);
	}
}