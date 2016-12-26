<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_deposit_withdraw extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$user_id = "1";
        $bankcard = $this->db->query("select * from bankbind where user_id=$user_id and type='1'")->row_array();
        $user = $this->db->query("select * from user where user_id=$user_id")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
        $this->out_data['bankcard'] = $bankcard;
        $this->out_data['user'] = $user;
		$this->out_data['con_page'] = 'shike/deposit_withdraw';
		$this->load->view('shike_default', $this->out_data);
	}
}