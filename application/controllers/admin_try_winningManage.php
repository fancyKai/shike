<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_try_winningManage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_admin_login();
		// parent::check_permission('admin');
	}

	public function index()
	{
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from sorder")->row_array();
		$count = $count['count'];
		$base_url = "/admin_try_winningManage/?";
		$orders = $this->db->query("select * from sorder order by time desc limit {$start},{$limit}")->result_array();
		$array_count = 0;
		foreach ($orders as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$orders[$array_count]['shike_name'] = $user_name['user_name'];
			$orders[$array_count]['show_product_link'] = $this->link_edit($v['product_link']);
			$array_count++;
		}
		$array_count = 0;
		foreach ($orders as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$orders[$array_count]['merchant_name'] = $user_name['user_name'];
			$orders[$array_count]['show_product_link'] = $this->link_edit($v['product_link']);
			$array_count++;
		}
		$this->out_data['orders'] = $orders;
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/try_winningManage';
		$this->load->view('admin_default', $this->out_data);
	}
	public function search(){
		$search = $this->input->get("search");
		$seller_id_array = $this->db->query("select seller_id from seller where user_name like '%{$search}%'")->result_array();
		$user_id_array = $this->db->query("select user_id from user where user_name like '%{$search}%'")->result_array();
		// var_dump($seller_id_string);die();
		$where = " where 1=1 ";
		if($search && $seller_id_array){
			$seller_id_string = "(";
			foreach($seller_id_array as $v){
				$seller_id_string = $seller_id_string."'".$v['seller_id']."',";
			}
			$seller_id_string = substr($seller_id_string,0,-1);
			$seller_id_string .= ")";
			$where = $where." and seller_id in ".$seller_id_string;
		}
		if($search && $user_id_array){
			$user_id_string = "(";
			foreach($user_id_array as $v){
				$user_id_string = $user_id_string."'".$v['user_id']."',";
			}
			$user_id_string = substr($user_id_string,0,-1);
			$user_id_string .= ")";
			$where = $where." or user_id in ".$user_id_string;
		}
		if(!$seller_id_array && !$user_id_array){
			$where .= " and 1=0 ";
		}
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from sorder".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_try_winningManage/?search=".$search;
		$orders = $this->out_data['orders'] = $this->db->query("select * from sorder ".$where." order by time desc limit {$start},{$limit}")->result_array();
		$array_count = 0;
		foreach ($orders as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$orders[$array_count]['merchant_name'] = $user_name['user_name'];
			$orders[$array_count]['show_product_link'] = $this->link_edit($v['product_link']);
			$array_count++;
		}
		$array_count = 0;
		foreach ($orders as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$orders[$array_count]['shike_name'] = $user_name['user_name'];
			$orders[$array_count]['show_product_link'] = $this->link_edit($v['product_link']);
			$array_count++;
		}
		$this->out_data['orders'] = $orders;
		//var_dump($orders);die();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/try_winningManage';
		$this->load->view('admin_default', $this->out_data);
	}
	function get_order_info(){
		$order_id = $this->input->post('order_id');
		$order_info = $this->db->query("select * from sorder where order_id = {$order_id}")->row_array();
		$user_name = $this->db->query("select user_name from seller where seller_id={$order_info['seller_id']}")->row_array();
		$user_name = $user_name['user_name'];
		$order_info['merchant_name'] = $user_name;
		$user_name = $this->db->query("select user_name from user where user_id={$order_info['user_id']}")->row_array();
		$user_name = $user_name['user_name'];
		$order_info['shike_name'] = $user_name;
		echo json_encode($order_info);
	}

	public function link_edit($link){
		if(strlen($link)>25){
			return substr($link,0,25).'...';
		}
		else{
			return $link;
		}
	}
}