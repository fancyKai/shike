<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_member_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$user_id = "1";
        $this->out_data['recharges'] = $this->db->query("select * from seller_charge_order where seller_id=$user_id and user_type='1'")->result_array();
        $this->out_data['user'] = $this->db->query("select * from user where user_id=$user_id")->row_array();
        
		$this->out_data['con_page'] = 'shike/member_manage';
		$this->load->view('shike_default', $this->out_data);
	}
}