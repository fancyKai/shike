<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_deposit_recharge extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        $seller_id = $this->session->userdata('seller_id');
        $this->out_data['sellerinfo'] = $this->db->query("select * from seller where seller_id ={$seller_id}")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu where type = 2")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
                $this->out_data['charge_time'] = $this->db->query("select time from platformorder where seller_id={$seller_id} and user_type=0 order by time desc")->row_array();
        $this->out_data['charge_time'] = $this->out_data['charge_time']['time'];
		$this->out_data['con_page'] = 'merchant/deposit_recharge';
		$this->load->view('merchant_default', $this->out_data);
	}

	public function check_recharge(){

        $seller_id = $this->session->userdata('seller_id');
        $money = $this->input->post('money');
        $sellerinfo = $this->db->query("select * from seller where seller_id ={$seller_id}")->row_array();

        $this->db->update('seller',array('avail_deposit' => $sellerinfo['avail_deposit']+$money),array('seller_id' => $seller_id));
        $info = array('money' => $money, 
        	          'money_type' => 1,
        	          'processfee' => 0,
        	          'money_remain' => $sellerinfo['avail_deposit']+$money,
        	          'time' => date('Y-m-d H:i:s',time()),
        	          'flowid' => '123',
        	          'status' => 4,
        	          'seller_id' => $seller_id,
        	          'user_type' => 0,
        	          'remarks' => 3);
        $res = $this->db->insert("platformorder",$info);
        echo json_encode($res);

	}
        public function pay_check(){
                $seller_id = $this->session->userdata('seller_id');
                $old_time = $this->input->post('old_time');
                $now_time = $this->db->query("select time from platformorder where seller_id={$seller_id} and user_type=0 order by time desc")->row_array();
                $now_time = $now_time['time'];
                if($old_time == $now_time){
                        $res = 0;
                        echo json_encode($res);
                }else{
                        $res = 1;
                        echo json_encode($res);
                }
        }
}
