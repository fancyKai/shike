<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_deposit_withdraw extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

        $seller_id = "1";
        $bankcard = $this->db->query("select * from bankbind where user_id=$seller_id and type='0'")->row_array();
        $seller = $this->db->query("select * from seller where seller_id=$seller_id")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
        $this->out_data['bankcard'] = $bankcard;
        $this->out_data['seller'] = $seller;
		$this->out_data['con_page'] = 'merchant/deposit_withdraw';
		$this->load->view('merchant_default', $this->out_data);
	}
}
