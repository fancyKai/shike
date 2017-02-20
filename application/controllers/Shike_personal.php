<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_personal extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');

		$this->change_status();

		$this->out_data['user'] = $this->db->query("select * from user where user_id=$user_id")->row_array();
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$orderwhere = " where user_id=$user_id ";
		$order_status = $this->input->get('order_status');
		$this->out_data['order_status'] = $order_status;
		if(!$order_status){
			$base_url = "/shike_try_winningManage/?";
		}else{
			$orderwhere .= " and status=".$order_status;
			$base_url = "/shike_try_winningManage/?order_status=".$order_status;
		}
		$count = $this->db->query("select count(*) as count from sorder".$orderwhere)->row_array();
		$count = $count['count'];
		$this->out_data['order_list'] = $this->db->query("select * from sorder".$orderwhere." order by apply_time desc limit {$start},{$limit}")->result_array();

        $this->out_data['sum_order_list'] = $this->db->query("select count(*) as count from sorder where user_id=$user_id")->row_array();
        $this->out_data['sum_4_order_list'] = $this->db->query("select count(*) as count from sorder where status=4 and user_id=$user_id")->row_array();
        $this->out_data['sum_6_order_list'] = $this->db->query("select count(*) as count from sorder where status=6 and user_id=$user_id")->row_array();
        $this->out_data['sum_5_order_list'] = $this->db->query("select count(*) as count from sorder where status=5 and user_id=$user_id")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu where type = 1")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];

		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['count'] = $count;

		$this->out_data['con_page'] = 'shike/personal';
		$this->load->view('shike_default', $this->out_data);
	}

	public function change_status(){
		$date = date('Y-m-d H:i:s',time());
		$sorders = $this->db->query("select * from sorder where UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time))>172800 and status=4")->result_array();
		foreach ($sorders as $v) {
            $seller_info = $this->db->query("select * from seller where seller_id={$v['seller_id']}")->row_array();
            $info = $arrayName = array('avail_deposit' => $seller_info['avail_deposit']+$v['real_paymoney']*1.05);
            $res = $this->db->update("seller", $info, array("seller_id"=>$seller_info['seller_id']));
            $real_paymoney = $v['unit_price']*$v['buy_sum'];
            $info = array('money' => $real_paymoney, 
                          'money_type' => 2,
                          'processfee' => 0,
                          'money_remain' => $seller_info['avail_deposit']+$real_paymoney,
                          'time' => date('Y-m-d H:i:s',time()),
                          'flowid' => '123',
                          'status' => 1,
                          'seller_id' => $seller_info['seller_id'],
                          'user_type' => 0,
                          'remarks' => 6);
            $res = $this->db->insert("platformorder",$info);
            $info = array('money' => $real_paymoney*0.05, 
                          'money_type' => 2,
                          'processfee' => 0,
                          'money_remain' => $seller_info['avail_deposit']+$real_paymoney*1.05,
                          'time' => date('Y-m-d H:i:s',time()),
                          'flowid' => '123',
                          'status' => 1,
                          'seller_id' => $seller_info['seller_id'],
                          'user_type' => 0,
                          'remarks' => 7);
            $res = $this->db->insert("platformorder",$info);
		}
		$where = " UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time))>172800 and status=4 ";
		$res = $this->db->update("sorder",array("status"=>8),$where);
		$where = "UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time_2))>172800 and status=2 ";
		$res = $this->db->update("sorder",array("status"=>5),$where);
	}
	
	// public function cancle_order(){
	// 	$order_id = $this->input->post('orderid');
	// 	$res = $this->db->update("sorder",array("status"=>'8'),array('order_id'=>$order_id));
	// 	echo json_encode($res);
	// }
}