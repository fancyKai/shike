<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_add_bankCard extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		
		$this->out_data['con_page'] = 'shike/add_bankCard';
		$this->load->view('shike_default', $this->out_data);
	}
	public function post_add_bankcard()
	{
		$seller_id = "1";
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$banktype = $this->input->post('banktype');
		$branchbank = $this->input->post('branchbank');
		$banknum = $this->input->post('banknum');

		$info = array('user_id' => $seller_id,
			          'name' => $name,
			          'phone' => $phone,
			          'banktype' => $banktype,
			          'branchbank' => $branchbank,
			          'banknum' => $banknum,
			          'type' => "1");
		$this->db->insert('bankbind', $info);
	}
}