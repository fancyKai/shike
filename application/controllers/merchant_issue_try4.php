<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_issue_try4 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

        // $user_id = $this->session->userdata('user_id');
		$user_id=$this->session->userdata('seller_id');
		$this->out_data['act_id'] = $this->input->get('act_id');
		$activity_sellerid = $this->db->query('select seller_id from activity where act_id='.$this->out_data['act_id'])->row_array();
		if($user_id != $activity_sellerid['seller_id']){
			echo "不可允许的访问";
			return;
		}	
		$this->out_data['seller_id'] = $user_id;
		$this->out_data['activity_list'] = $this->db->query("select * from activity where act_id=".$this->out_data['act_id'])->row_array();
		$this->out_data['activity'] = $this->db->query("select * from activity where act_id=".$this->out_data['act_id'])->row_array();
		$this->out_data['con_page'] = 'merchant/issue_try4';
		//var_dump($this->out_data);die();
		$this->load->view('merchant_default', $this->out_data);
	}

	public function update_fake_activity4(){
		$act_id = $this->input->post('act_id');
		$apply_amount = $this->input->post('apply_amount');
		$act_info = $this->db->query("select * from activity where act_id={$act_id}")->row_array();
		$total_money = $act_info['margin']*$apply_amount/2*1.05;
		$guarantee = $act_info['margin']*$apply_amount/2*0.05;
		$deposit = $act_info['margin']*$apply_amount/2;
		$win_money = $this->input->post('win_money');
		$win_url = $this->input->post('win_url');
        $is_real = 1;
        $status = 1;
        $time = date('Y-m-d H:i:s',time());
		$info = array("apply_amount" => $apply_amount,
			          "isreal" => $is_real,
			          "status" => $status,
                      "win_money" => $win_money,
                      "win_url" => $win_url,
			          "gene_time" => $time,
			          "total_money" => $total_money,
			          "guarantee" => $guarantee, 
			          "deposit" => $deposit);
		$res = $this->db->update("activity",$info,array("act_id"=>$act_id));
		echo json_encode($res);

	}
}
