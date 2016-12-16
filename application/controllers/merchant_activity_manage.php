<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_activity_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		// $this->out_data['seller_id'] = $user_id;
		$seller_id = "1";
		$orderwhere = '';
		$order_status = $this->input->get('order_status');
		$this->out_data['order_status'] = $order_status;
		if(!$order_status){
			
		}else{
			$orderwhere .= " where seller_id=$seller_id and status=".$order_status;
		}
        $this->out_data['activity_list'] = $this->db->query("select * from activity".$orderwhere)->result_array();
        $this->out_data['sum_activity_list'] = $this->db->query("select count(*) as count from activity where seller_id=$seller_id")->row_array();
        $this->out_data['sum_1_activity_list'] = $this->db->query("select count(*) as count from activity where status=1 and seller_id=$seller_id")->row_array();
        $this->out_data['sum_2_activity_list'] = $this->db->query("select count(*) as count from activity where status=2 and seller_id=$seller_id")->row_array();
        $this->out_data['sum_3_activity_list'] = $this->db->query("select count(*) as count from activity where status=3 and seller_id=$seller_id")->row_array();
        $this->out_data['sum_4_activity_list'] = $this->db->query("select count(*) as count from activity where status=4 and seller_id=$seller_id")->row_array();
		$this->out_data['con_page'] = 'merchant/activity_manage';
		$this->load->view('merchant_default', $this->out_data);
	}

	public function cancle_activity(){
		$order_id = $this->input->post('orderid');
		$res = $this->db->update("sorder",array("status"=>'8'),array('order_id'=>$order_id));
		echo json_encode($res);
		// echo 1;
	}
}
