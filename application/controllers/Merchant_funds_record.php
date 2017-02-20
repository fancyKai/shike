<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_funds_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        $seller_id = $this->session->userdata('seller_id');
		$orderwhere = '';
		$remarks = $this->input->get('remarks');
		$this->out_data['remarks'] = $remarks;
		if(!$remarks){
			$orderwhere .= " where seller_id=$seller_id and user_type='0'";
		}else{
			$orderwhere .= " where seller_id=$seller_id and user_type='0' and remarks=".$remarks;
		}
		$this->out_data['money_list'] = $this->db->query("select * from platformorder".$orderwhere." order by time desc")->result_array();

		$this->out_data['con_page'] = 'merchant/funds_record';
		$this->load->view('merchant_default', $this->out_data);
	}
}
