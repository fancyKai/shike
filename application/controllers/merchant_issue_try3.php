<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_issue_try3 extends MY_Controller {

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
		$this->out_data['con_page'] = 'merchant/issue_try3';
		//var_dump($this->out_data);die();
		$this->load->view('merchant_default', $this->out_data);
	}

	public function update_fake_activity3(){
		$act_id = $this->input->post('act_id');
		$platformid = $this->input->post('platformid');
		$t_picture_url = $this->input->post('t_picture_url');
		$t_key_words = $this->input->post('t_key_words');
		$t_classify1 = $this->input->post('t_classify1');
		$t_classify2 = $this->input->post('t_classify2');
		$t_classify3 = $this->input->post('t_classify3');
		$t_classify4 = $this->input->post('t_classify4');
		$t_classify5 = $this->input->post('t_classify5');
		$t_lower_price = $this->input->post('t_lower_price');
		$t_higher_price = $this->input->post('t_higher_price');
		$t_delivery_place = $this->input->post('t_delivery_place');
		$t_sort = $this->input->post('t_sort');
		$info = array("platformid" => $platformid,"t_picture_url" => $t_picture_url,"t_key_words" => $t_key_words,"t_classify1" => $t_classify1,"t_classify2" => $t_classify2,"t_classify3" => $t_classify3,
			"t_classify4" => $t_classify4,"t_classify5" => $t_classify5,"t_lower_price" => $t_lower_price,"t_higher_price" => $t_higher_price,"t_delivery_place" => $t_delivery_place);
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
