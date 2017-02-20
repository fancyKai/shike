<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_fund_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_admin_login();
		// parent::check_permission('admin');
	}

	public function index()
	{

		$shike_orders = $this->out_data['shike_orders'] = $this->db->query("select * from platformorder where user_type=1")->result_array();
		$merchant_orders = $this->out_data['merchant_orders'] = $this->db->query("select * from platformorder where user_type=0")->result_array();
		$array_count=0;
		foreach ($merchant_orders as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$merchant_orders[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['merchant_orders'] = $merchant_orders;

		$array_count=0;
		foreach ($shike_orders as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shike_orders[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['shike_orders'] = $shike_orders;
		$this->out_data['con_page'] = 'admin/fund_record';
		$this->load->view('admin_default', $this->out_data);
	}

	public function merchant_search(){
		$search = $this->input->get("search");
		$seller_id_array = $this->db->query("select seller_id from seller where user_name like '%{$search}%'")->result_array();
		$where = " where user_type=0 ";
		if($search && $seller_id_array){
			$seller_id_string = "(";
			foreach($seller_id_array as $v){
				$seller_id_string = $seller_id_string."'".$v['seller_id']."',";
			}
			$seller_id_string = substr($seller_id_string,0,-1);
			$seller_id_string .= ") ";
			$where = $where." and seller_id in ".$seller_id_string;
		}elseif(!$seller_id_array){
			$where .= " and 1=0 ";
		}
		// $page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		// $limit = 5;
		// $start = ($page - 1)*$limit;
		// $count = $this->db->query("select count(*) as count from activity".$where." or act_id='".$search."'")->row_array();
		// $count = $count['count'];

		// $the_url = "/admin_activity_manage/search?search=".$search;
		//$activity = $this->out_data['activity'] = $this->db->query("select * from activity ".$where." or act_id='".$search."' limit {$start},{$limit}")->result_array();
		$merchant_orders = $this->out_data['merchant_orders'] = $this->db->query("select * from platformorder ".$where." or flowid='".$search."'")->result_array();
		$array_count = 0;
		foreach($merchant_orders as $v){
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$merchant_orders[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['merchant_orders'] = $merchant_orders;

		$shike_orders = $this->out_data['shike_orders'] = $this->db->query("select * from platformorder where user_type=1")->result_array();
		$array_count = 0;
		foreach($shike_orders as $v){
			$user_name = $this->db->query("select user_name from user where user_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shike_orders[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['shike_orders'] = $shike_orders;
		// var_dump($this->out_data['activity']);die();
		//$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/fund_record';
		$this->load->view('admin_default', $this->out_data);
	}

	public function shike_search(){
		$search = $this->input->get("search");
		$user_id_array = $this->db->query("select user_id from user where user_name like '%{$search}%'")->result_array();
		$where = " where user_type=1 ";
		if($search && $user_id_array){
			$user_id_string = "(";
			foreach($user_id_array as $v){
				$user_id_string = $user_id_string."'".$v['user_id']."',";
			}
			$user_id_string = substr($user_id_string,0,-1);
			$user_id_string .= ") ";
			$where = $where." and seller_id in ".$user_id_string;
		}elseif(!$user_id_array){
			$where .= " and 1=0 ";
		}

		// $page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		// $limit = 5;
		// $start = ($page - 1)*$limit;
		// $count = $this->db->query("select count(*) as count from activity".$where." or act_id='".$search."'")->row_array();
		// $count = $count['count'];

		// $the_url = "/admin_activity_manage/search?search=".$search;
		//$activity = $this->out_data['activity'] = $this->db->query("select * from activity ".$where." or act_id='".$search."' limit {$start},{$limit}")->result_array();
		$shike_orders = $this->out_data['shike_orders'] = $this->db->query("select * from platformorder ".$where." or flowid='".$search."'")->result_array();
		$array_count = 0;
		foreach($shike_orders as $v){
			$user_name = $this->db->query("select user_name from user where user_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shike_orders[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['shike_orders'] = $shike_orders;

		$merchant_orders = $this->out_data['merchant_orders'] = $this->db->query("select * from platformorder where user_type=0")->result_array();
		$array_count = 0;
		foreach($merchant_orders as $v){
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$merchant_orders[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['merchant_orders'] = $merchant_orders;
		// var_dump($this->out_data['activity']);die();
		//$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/fund_record';
		$this->load->view('admin_default', $this->out_data);
	}

}