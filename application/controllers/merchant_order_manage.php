<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_order_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$seller_id = "1";
		$orderwhere = '';
		$order_status = $this->input->get('order_status');
		$this->out_data['order_status'] = $order_status;
		if(!$order_status){
			
		}else{
			$orderwhere .= " where seller_id=$seller_id and status=".$order_status;
		}
        $this->out_data['order_list'] = $this->db->query("select * from sorder".$orderwhere)->result_array();
        $this->out_data['sum_order_list'] = $this->db->query("select count(*) as count from sorder where seller_id=$seller_id")->row_array();
        $this->out_data['sum_1_order_list'] = $this->db->query("select count(*) as count from sorder where status=1 and seller_id=$seller_id")->row_array();
        $this->out_data['sum_2_order_list'] = $this->db->query("select count(*) as count from sorder where status=2 and seller_id=$seller_id")->row_array();
        $this->out_data['sum_3_order_list'] = $this->db->query("select count(*) as count from sorder where status=3 and seller_id=$seller_id")->row_array();
		$this->out_data['con_page'] = 'merchant/order_manage';
		$this->load->view('merchant_default', $this->out_data);
	}
}
