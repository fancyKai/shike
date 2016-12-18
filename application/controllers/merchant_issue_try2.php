<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-type: text/html; charset=utf-8");
class merchant_issue_try2 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

        // $user_id = $this->session->userdata('user_id');
		$user_id=1;
		$this->out_data['act_id'] = $this->input->get('act_id');
		$activity_sellerid = $this->db->query('select seller_id from activity where act_id='.$this->out_data['act_id'])->row_array();
		if($user_id != $activity_sellerid['seller_id']){
			echo "不可允许的访问";
			return;
		}
		
		// $orderwhere = '';
		// $order_status = $this->input->get('order_status');
		// $this->out_data['order_status'] = $order_status;
		// if(!$order_status){
			
		// }else{
		// 	$orderwhere .= " where status=".$order_status;
		// }
		// echo $orderwhere;
		// die();
        // $users = $this->db->query("select * from user where user_id='1'")->row_array();
        // echo $users['user_id'];

  //       $this->out_data['user'] = $this->db->query("select * from user where user_id='1'")->row_array();
		// $this->out_data['sellerinfo'] = $this->db->query("select * from seller where seller_id ={$user_id}")->row_array();
		// $this->out_data['order_list'] = $this->db->query("select * from sorder".$orderwhere)->result_array();
		// $this->out_data['sum_order_list'] = $this->db->query("select count(*) as count from sorder")->row_array();
		// $this->out_data['sum_1_order_list'] = $this->db->query("select count(*) as count from sorder where status=1")->row_array();
		// $this->out_data['sum_2_order_list'] = $this->db->query("select count(*) as count from sorder where status=2")->row_array();
		// $this->out_data['sum_3_order_list'] = $this->db->query("select count(*) as count from sorder where status=3")->row_array();
		$this->out_data['seller_id'] = $user_id;
		$this->out_data['shoplist'] = $this->db->query("select * from shop where seller_id=".$user_id)->result_array();
		$this->out_data['activity'] = $this->db->query("select * from activity where act_id=".$this->out_data['act_id'])->row_array();
		//var_dump($this->out_data);die();
		$this->out_data['con_page'] = 'merchant/issue_try2';
		//var_dump($this->out_data);die();
		$this->load->view('merchant_default', $this->out_data);
	}

	public function update_fake_activity2(){
		$act_id = $this->input->post('act_id');
		$commodity_name = $this->input->post('commodity_name');
		$shop_url = $this->input->post('shop_url');
		$commodity_classify = $this->input->post('commodity_classify');
		$commodity_picture = $this->input->post('commodity_picture');
		$thecolor = $this->input->post('thecolor');
		$thesize = $this->input->post('thesize');
		$unit_price = $this->input->post('unit_price');
		$buy_sum = $this->input->post('buy_sum');
		$freight = $this->input->post('freight');
		$info = array("product_name" => $commodity_name,"product_link" => $shop_url,"product_classify" => $commodity_classify,"picture_url" => $commodity_picture,"color" => $thecolor,"size" => $thesize,"unit_price" => $unit_price,"buy_sum" => $buy_sum,"freight" => $freight);
		$res = $this->db->update("activity",$info,array("act_id"=>$act_id));
		echo json_encode($res);

	}
	public function update_confirm_ship(){
		$wuliu = $this->input->post('wuliu');
		$yundan = $this->input->post('yundan');
		$order_id = $this->input->post('order_id');
		$info = array("wuliu"=>$wuliu,"yundan"=>$yundan,'status'=>2);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		echo json_encode($res);
	}

	public function update_shenhe(){
		$order_id = $this->input->post('order_id');
		$info = array('status'=>3);
		$res = $this->db->update("sorder",$info,array("order_id"=>$order_id));
		echo json_encode($res);
	}
}
