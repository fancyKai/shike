<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_get_order4 extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

        // $user_id = $this->session->userdata('user_id');
		$user_id=1;
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
		$order_id = $this->input->get("order_id");
		$orderinfo = $this->db->query("select * from sorder where order_id=".$order_id)->row_array();
		$userinfo = $this->db->query("select * from user where user_id=".$user_id)->row_array();
		$this->out_data['orderinfo'] = $orderinfo;
		$this->out_data['userinfo'] = $userinfo;
		$this->out_data['user_id'] = $user_id;
		//$this->out_data['shoplist'] = $this->db->query("select * from shop where seller_id=".$user_id)->result_array();
		//var_dump($this->out_data);die();
		$this->out_data['con_page'] = 'shike/get_order4';
		//var_dump($this->out_data);die();
		$this->load->view('shike_default', $this->out_data);
	}

	public function submit_order4(){
		$user_id = "1";
		$order_id = $this->input->post('order_id');
		$path = "images/shike/chatlog/".$user_id;
		if(is_dir($path)){  

      	}else{
         	mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
      	}
      	$tmp_file = $_FILES['chatlog']['tmp_name'];
      	$filename = $_FILES['chatlog']['name'];
     	$chatlog = "images/shike/chatlog/".$user_id."/".$filename;
      	$res = move_uploaded_file($tmp_file,$chatlog);

      	$info = array(
      		'chatlog_img'=>$chatlog);
      	$this->db->update("sorder",$info,array("order_id"=>$order_id));
      	header("Location: /shike_get_order5?order_id={$order_id}");
        exit();
	}
}
