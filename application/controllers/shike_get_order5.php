<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_get_order5 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{

		$user_id = $this->session->userdata('user_id');
		$order_id = $this->input->get("order_id");
		$orderinfo = $this->db->query("select * from sorder where order_id=".$order_id)->row_array();
		// var_dump($orderinfo);die();
		$shop_id = $orderinfo['shop_id'];
		//var_dump($shop_id);die();
		$sellerwangwang = $this->db->query("select wangwang from shop where shop_id={$shop_id}")->row_array();
		$orderinfo['sellerwangwang'] = $sellerwangwang['wangwang'];
		$userinfo = $this->db->query("select * from user where user_id=".$user_id)->row_array();
		$this->out_data['orderinfo'] = $orderinfo;
		$this->out_data['userinfo'] = $userinfo;
		$this->out_data['user_id'] = $user_id;
		//$this->out_data['shoplist'] = $this->db->query("select * from shop where seller_id=".$user_id)->result_array();
		//var_dump($this->out_data);die();
		$this->out_data['con_page'] = 'shike/get_order5';
		//var_dump($this->out_data);die();
		$this->load->view('shike_default', $this->out_data);
	}

	public function submit_order5(){
		$user_id = $this->session->userdata('user_id');
		$order_id = $this->input->post('order_id');
		$outer_orderid = $this->input->post('order');
		$pay_money = $this->input->post('pay_money');
		$path = "images/shike/orderdetail_img/".$user_id;
		if(is_dir($path)){  

      	}else{
         	mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
      	}
      	
      	$tmp_file = $_FILES['orderdetail_img']['tmp_name'];
      	$filename = $_FILES['orderdetail_img']['name'];
     	$orderdetail_img = "images/shike/orderdetail_img/".$user_id."/".$filename;
      	$res = move_uploaded_file($tmp_file,$orderdetail_img);
      	//var_dump($res);die();

      	$info = array(
      		'orderdetail_img'=>$orderdetail_img,'outer_orderid'=>$outer_orderid,'real_paymoney'=>$pay_money,'status' => 1);
      	$this->db->update("sorder",$info,array("order_id"=>$order_id));

      	$userinfo = $this->db->query("select * from user where user_id=".$user_id)->row_array();
      	$info = array('money_return' => $userinfo["money_return"]+$pay_money, 
      		          'return_num' => $userinfo["return_num"]+1);
      	$this->db->update("user",$info,array("user_id"=>$user_id));
      	
      	header("Location: /shike_try_winningManage");
        exit();
	}
}
