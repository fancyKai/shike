<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_funds_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

        $seller_id = "1";
		$orderwhere = '';
		$money_type = $this->input->get('money_type');
		$this->out_data['money_type'] = $money_type;
		if(!$money_type){
			
		}else{
			$orderwhere .= " where seller_id=$seller_id and money_type=".$money_type;
		}
		$this->out_data['money_list'] = $this->db->query("select * from platformorder".$orderwhere)->result_array();

		$this->out_data['con_page'] = 'merchant/funds_record';
		$this->load->view('merchant_default', $this->out_data);
	}
}
