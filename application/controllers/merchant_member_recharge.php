<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_member_recharge extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        $seller_id = $this->session->userdata('seller_id');
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu where type = 2")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
        $date = date('Y-m-d H:i:s',time());
        $seller_info = $this->db->query("select * from seller where seller_id ={$seller_id}")->row_array();
        if($seller_info["level"] == 1){
        	$this->out_data['one_year_end'] = date('Y-m-d',strtotime("+1year", time()));
        	$this->out_data['two_year_end'] = date('Y-m-d',strtotime("+2year", time()));
        	$this->out_data['three_year_end'] = date('Y-m-d',strtotime("+3year", time()));
        }else{
        	$this->out_data['one_year_end'] = date('Y-m-d',strtotime("+1year", strtotime($seller_info["end_time"])));
        	$this->out_data['two_year_end'] = date('Y-m-d',strtotime("+2year", strtotime($seller_info["end_time"])));
        	$this->out_data['three_year_end'] = date('Y-m-d',strtotime("+3year", strtotime($seller_info["end_time"])));
        }
        $this->out_data['charge_time'] = $this->db->query("select charge_time from seller_charge_order where seller_id={$seller_id} order by charge_time desc")->row_array();
        $this->out_data['charge_time'] = $this->out_data['charge_time']['charge_time'];
		$this->out_data['con_page'] = 'merchant/member_recharge';
		$this->load->view('merchant_default', $this->out_data);
	}

	public function pay_recharge(){
		$recharge_year = $this->input->post('recharge_year');
		$seller_id = $this->session->userdata('seller_id');
		$seller_info = $this->db->query("select * from seller where seller_id ={$seller_id}")->row_array();
		if($seller_info["level"] == 1){
			if($recharge_year == 1){
			    $end_time = date('Y-m-d H:i:s',strtotime("+1year", time()));
			    $open_duration = "1年";
			    $money = 2288;
		    }elseif ($recharge_year == 2) {
		    	$end_time = date('Y-m-d H:i:s',strtotime("+2year", time()));
		    	$open_duration = "2年";
		    	$money = 4576;
		    }else{
                $end_time = date('Y-m-d H:i:s',strtotime("+3year", time()));
                $open_duration = "3年";
                $money = 6864;
		    }
		    $info = array('level' => 2, 
		    	          'end_time' => $end_time);
		    $this->db->update("seller",$info,array("seller_id"=>$seller_id));
		    $info = array('seller_id' => $seller_id, 
		    	          'open_duration' => $open_duration,
		    	          'end_time' => $end_time,
		    	          'money' => $money,
		    	          'charge_type' => 1,
		    	          'status' => 1,
		    	          'charge_time' => date('Y-m-d H:i:s',time()),
		    	          'user_type' => 0);
		    $res = $this->db->insert("seller_charge_order",$info);
		}else{
			if($recharge_year == 1){
			    $end_time = date('Y-m-d H:i:s',strtotime("+1year", strtotime($seller_info["end_time"])));
			    $open_duration = "1年";
			    $money = 2288;
		    }elseif ($recharge_year == 2) {
		    	$end_time = date('Y-m-d H:i:s',strtotime("+2year", strtotime($seller_info["end_time"])));
		    	$open_duration = "2年";
		    	$money = 4576;
		    }else{
                $end_time = date('Y-m-d H:i:s',strtotime("+3year", strtotime($seller_info["end_time"])));
                $open_duration = "3年";
                $money = 6864;
		    }
		    $info = array('level' => 2, 
		    	          'end_time' => $end_time);
		    $this->db->update("seller",$info,array("seller_id"=>$seller_id));
		    $info = array('seller_id' => $seller_id, 
		    	          'open_duration' => $open_duration,
		    	          'end_time' => $end_time,
		    	          'money' => $money,
		    	          'charge_type' => 2,
		    	          'status' => 1,
		    	          'charge_time' => date('Y-m-d H:i:s',time()),
		    	          'user_type' => 0);
		    $res = $this->db->insert("seller_charge_order",$info);
		}
		echo json_encode($res);
	}
	public function pay_check(){
		$seller_id = $this->session->userdata('seller_id');
		$old_time = $this->input->post('old_time');
		$now_time = $this->db->query("select charge_time from seller_charge_order where seller_id={$seller_id} order by charge_time desc")->row_array();
		$now_time = $now_time['charge_time'];
		if($old_time == $now_time){
			$res = 0;
			echo json_encode($res);
		}else{
			$res = 1;
			echo json_encode($res);
		}
	}
}
