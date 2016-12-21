<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_funds_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$user_id = "1";
		$orderwhere = '';
		$money_type = $this->input->get('money_type');
		$this->out_data['money_type'] = $money_type;
		if(!$money_type){
			$orderwhere .= " where seller_id=$user_id and user_type='1'";
		}else{
			$orderwhere .= " where seller_id=$user_id and user_type='1' and money_type=".$money_type;
		}
		$this->out_data['money_list'] = $this->db->query("select * from platformorder".$orderwhere)->result_array();
		$this->out_data['con_page'] = 'shike/funds_record';
		$this->load->view('shike_default', $this->out_data);
	}
}