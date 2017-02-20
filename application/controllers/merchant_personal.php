<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_personal extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        $seller_id = $this->session->userdata('seller_id');
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$orderwhere = " where seller_id=$seller_id ";
		$order_status = $this->input->get('order_status');
		$this->out_data['order_status'] = $order_status;
		if(!$order_status){
			$base_url = "/merchant_personal/?";
		}else{
			$orderwhere .= " and status=".$order_status;
			$base_url = "/merchant_personal/?order_status=".$order_status;
		}
		$this->change_status();
		$this->out_data['sellerinfo'] = $this->db->query("select * from seller where seller_id ={$seller_id}")->row_array();
		$order_list = $this->out_data['order_list'] = $this->db->query("select * from sorder".$orderwhere." order by apply_time desc limit {$start},{$limit}")->result_array();

		$array_count = 0;
		foreach ($this->out_data['order_list'] as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$order_list[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['order_list'] = $order_list;
		$count = $this->db->query("select count(*) as count from sorder".$orderwhere)->row_array();
		$count = $count['count'];

		$this->out_data['sum_order_list'] = $this->db->query("select count(*) as count from sorder where seller_id={$seller_id}")->row_array();
		$this->out_data['sum_1_order_list'] = $this->db->query("select count(*) as count from sorder where status=1 and seller_id={$seller_id}")->row_array();
		$this->out_data['sum_2_order_list'] = $this->db->query("select count(*) as count from sorder where status=2 and seller_id={$seller_id}")->row_array();
		$this->out_data['sum_3_order_list'] = $this->db->query("select count(*) as count from sorder where status=3 and seller_id={$seller_id}")->row_array();
		$this->out_data['qq'] = $this->db->query("select qq from qqkefu where type = 2")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['count'] = $count;
		$this->out_data['con_page'] = 'merchant/personal';
		$this->load->view('merchant_default', $this->out_data);
	}

	public function change_status(){
		$date = date('Y-m-d H:i:s',time());
		$where = "UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time_2))>172800 and status=2 ";
		$res = $this->db->update("sorder",array("status"=>5),$where);
		$sorders = $this->db->query("select * from sorder where UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time_3))>172800 and status=3")->result_array();
        foreach ($sorders as $v) {
            $user_info = $this->db->query("select * from user where user_id={$v['user_id']}")->row_array();
            $info = array('money_use'=>$user_info['money_use']+$v['real_paymoney'],
                          'money_return'=>$user_info['money_return']-$v['real_paymoney'],
                          'return_num' => $user_info["return_num"]-1);
            $this->db->update("user",$info,array("user_id"=>$v['user_id']));
            $info = array('money' => $v['real_paymoney'], 
                          'money_type' => 2,
                          'processfee' => 0,
                          'money_remain' => $user_info['money_use']+$v['real_paymoney'],
                          'time' => date('Y-m-d H:i:s',time()),
                          'flowid' => '123',
                          'status' => 1,
                          'seller_id' => $user_id,
                          'user_type' => 1,
                          'remarks' => 1);
            $res = $this->db->insert("platformorder",$info);
            //商家担保金返现
            $seller_info = $this->db->query("select * from seller where seller_id={$v['seller_id']}")->row_array();
            $info = $arrayName = array('avail_deposit' => $seller_info['avail_deposit']+$v['real_paymoney']*0.05);
            $res = $this->db->update("seller", $info, array("seller_id"=>$seller_info['seller_id']));
            $info = array('money' => $v['real_paymoney']*0.05, 
                          'money_type' => 2,
                          'processfee' => 0,
                          'money_remain' => $seller_info['avail_deposit']+$v['real_paymoney']*0.05,
                          'time' => date('Y-m-d H:i:s',time()),
                          'flowid' => '123',
                          'status' => 1,
                          'seller_id' => $seller_info['seller_id'],
                          'user_type' => 0,
                          'remarks' => 7);
            $res = $this->db->insert("platformorder",$info);
        }
		$where = "UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time_3))>172800 and status=3 ";
		$res = $this->db->update("sorder",array("status"=>7),$where);
	}
	
	public function update_confirm_ship(){
		$wuliu = $this->input->post('wuliu');
		$yundan = $this->input->post('yundan');
		$order_id = $this->input->post('order_id');
		$info = array("wuliu"=>$wuliu,"yundan"=>$yundan,'status'=>6);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		echo json_encode($res);
	}

	public function update_shenhe(){
		$order_id = $this->input->post('order_id');
		$info = array('status'=>5);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		echo json_encode($res);
	}

	public function tongguo_shenhe(){
		$order_id = $this->input->post('order_id');
		$info = array('status'=>7);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		//更新user表中的信息
		$sorder = $this->db->query("select * from sorder where order_id=$order_id")->row_array();
		$user_info = $this->db->query("select * from user where user_id={$sorder['user_id']}")->row_array();
		$info = array('money_use'=>$user_info['money_use']+$sorder['real_paymoney'],
			          'money_return'=>$user_info['money_return']-$sorder['real_paymoney'],
			          'return_num' => $user_info["return_num"]-1);
		$this->db->update("user",$info,array("user_id"=>$sorder['user_id']));
		//更新user中账户变更表的信息
		$info = array('money' => $sorder['real_paymoney'], 
        	          'money_type' => 1,
        	          'processfee' => 0,
        	          'money_remain' => $user_info['money_use']+$sorder['real_paymoney'],
        	          'time' => date('Y-m-d H:i:s',time()),
        	          'flowid' => '123',
        	          'status' => 1,
        	          'seller_id' => $sorder['user_id'],
        	          'user_type' => 1,
        	          'remarks' => 1);
        $res = $this->db->insert("platformorder",$info);
        //商家担保金返现
        $seller_info = $this->db->query("select * from seller where seller_id={$sorder['seller_id']}")->row_array();
        $info = $arrayName = array('avail_deposit' => $seller_info['avail_deposit']+$sorder['real_paymoney']*0.05);
        $res = $this->db->update("seller", $info, array("seller_id"=>$seller_info['seller_id']));
        $info = array('money' => $sorder['real_paymoney']*0.05, 
                      'money_type' => 1,
                      'processfee' => 0,
                      'money_remain' => $seller_info['avail_deposit']+$sorder['real_paymoney']*0.05,
                      'time' => date('Y-m-d H:i:s',time()),
                      'flowid' => '123',
                      'status' => 1,
                      'seller_id' => $seller_info['seller_id'],
                      'user_type' => 0,
                      'remarks' => 7);
        $res = $this->db->insert("platformorder",$info);    
		echo json_encode($res);
	}
}
