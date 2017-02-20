<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_member_recharge extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$this->out_data['qq'] = $this->db->query("select qq from qqkefu where type = 1")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
        $date = date('Y-m-d H:i:s',time());
        $user_info = $this->db->query("select * from user where user_id ={$user_id}")->row_array();
        if($user_info["level"] == 1){
        	$this->out_data['one_year_end'] = date('Y-m-d',strtotime("+1month", time()));
        	$this->out_data['two_year_end'] = date('Y-m-d',strtotime("+6month", time()));
        	$this->out_data['three_year_end'] = date('Y-m-d',strtotime("+1year", time()));
        }else{
        	$this->out_data['one_year_end'] = date('Y-m-d',strtotime("+1month", strtotime($user_info["vip_endtime"])));
        	$this->out_data['two_year_end'] = date('Y-m-d',strtotime("+6month", strtotime($user_info["vip_endtime"])));
        	$this->out_data['three_year_end'] = date('Y-m-d',strtotime("+1year", strtotime($user_info["vip_endtime"])));
        }
        $this->out_data['charge_time'] = $this->db->query("select charge_time from seller_charge_order where seller_id={$user_id} order by charge_time desc")->row_array();
        $this->out_data['charge_time'] = $this->out_data['charge_time']['charge_time'];
        // var_dump($this->out_data['charge_time']);die();
		$this->out_data['con_page'] = 'shike/member_recharge';
		$this->load->view('shike_default', $this->out_data);
	}

	public function pay_recharge(){
		$recharge_year = $this->input->post('recharge_year');
		$user_id = $this->session->userdata('user_id');
		$user_info = $this->db->query("select * from user where user_id ={$user_id}")->row_array();
		if($user_info["level"] == 1){
			if($recharge_year == 1){
			    $end_time = date('Y-m-d H:i:s',strtotime("+1month", time()));
			    $open_duration = "1个月";
			    $money = 20;
		    }elseif ($recharge_year == 2) {
		    	$end_time = date('Y-m-d H:i:s',strtotime("+6month", time()));
		    	$open_duration = "6个月";
		    	$money = 100;
		    }else{
                $end_time = date('Y-m-d H:i:s',strtotime("+1year", time()));
                $open_duration = "12个月";
                $money = 200;
		    }
		    $info = array('level' => 2, 
		    	          'vip_endtime' => $end_time);
		    $this->db->update("user",$info,array("user_id"=>$user_id));
		    $info = array('seller_id' => $user_id, 
		    	          'open_duration' => $open_duration,
		    	          'end_time' => $end_time,
		    	          'money' => $money,
		    	          'charge_type' => 1,
		    	          'status' => 1,
		    	          'charge_time' => date('Y-m-d H:i:s',time()),
		    	          'user_type' => 1);
		    $res = $this->db->insert("seller_charge_order",$info);
		}else{
			if($recharge_year == 1){
			    $end_time = date('Y-m-d H:i:s',strtotime("+1month", strtotime($user_info["vip_endtime"])));
			    $open_duration = "1个月";
			    $money = 20;
		    }elseif ($recharge_year == 2) {
		    	$end_time = date('Y-m-d H:i:s',strtotime("+6month", strtotime($user_info["vip_endtime"])));
		    	$open_duration = "6个月";
		    	$money = 100;
		    }else{
                $end_time = date('Y-m-d H:i:s',strtotime("+1year", strtotime($user_info["vip_endtime"])));
                $open_duration = "12个月";
                $money = 200;
		    }
		    $info = array('level' => 2, 
		    	          'vip_endtime' => $end_time);
		    $this->db->update("user",$info,array("user_id"=>$user_id));
		    $info = array('seller_id' => $user_id, 
		    	          'open_duration' => $open_duration,
		    	          'end_time' => $end_time,
		    	          'money' => $money,
		    	          'charge_type' => 2,
		    	          'status' => 1,
		    	          'charge_time' => date('Y-m-d H:i:s',time()),
		    	          'user_type' => 1);
		    $res = $this->db->insert("seller_charge_order",$info);
		}
		echo json_encode($res);
	}
	public function pay_check(){
		$user_id = $this->session->userdata('user_id');
		$old_time = $this->input->post('old_time');
		$now_time = $this->db->query("select charge_time from seller_charge_order where seller_id={$user_id} order by charge_time desc")->row_array();
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