<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_member_recharge extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        // $seller_id = "1";
        // $this->out_data['recharges'] = $this->db->query("select * from activity where seller_id=$seller_id")->result_array();
        // // $this->out_data['recharge_type'] = "1";
		$this->out_data['con_page'] = 'merchant/member_recharge';
		$this->load->view('merchant_default', $this->out_data);
	}
}
