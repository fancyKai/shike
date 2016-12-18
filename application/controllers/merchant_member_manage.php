<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_member_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

        $seller_id = "1";
        $this->out_data['recharges'] = $this->db->query("select * from seller_charge_order where seller_id=$seller_id")->result_array();
        $this->out_data['seller'] = $this->db->query("select * from seller where seller_id=$seller_id")->row_array();

		$this->out_data['con_page'] = 'merchant/member_manage';
		$this->load->view('merchant_default', $this->out_data);
	}
}
