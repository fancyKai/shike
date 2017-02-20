<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_privilege_buyManage extends MY_Controller {

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
		$count = $this->db->query("select count(*) as count from discount")->row_array();
		$count = $count['count'];
		$base_url = "/admin_privilege_buyManage/?";
		$discounts = $this->db->query("select * from discount order by time desc limit {$start},{$limit}")->result_array();

		$array_count = 0;
		foreach ($discounts as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$discounts[$array_count]['shike_name'] = $user_name['user_name'];
			$discounts[$array_count]['show_win_url'] = $this->link_edit($v['win_url']);
			$discounts[$array_count]['show_win_two_url'] = $this->link_edit($v['win_two_url']);
			$array_count++;
		}
		$array_count = 0;
		foreach ($discounts as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$discounts[$array_count]['merchant_name'] = $user_name['user_name'];
			$discounts[$array_count]['show_win_url'] = $this->link_edit($v['win_url']);
			$discounts[$array_count]['show_win_two_url'] = $this->link_edit($v['win_two_url']);
			$array_count++;
		}

		$this->out_data['discounts'] = $discounts;
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/privilege_buyManage';
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
		$count = $this->db->query("select count(*) as count from discount".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_privilege_buyManage/?search=".$search;
		$discounts = $this->out_data['discounts'] = $this->db->query("select * from discount ".$where." order by time desc limit {$start},{$limit}")->result_array();
		$array_count = 0;
		foreach ($discounts as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$discounts[$array_count]['merchant_name'] = $user_name['user_name'];
			$discounts[$array_count]['show_win_url'] = $this->link_edit($v['win_url']);
			$discounts[$array_count]['show_win_two_url'] = $this->link_edit($v['win_two_url']);
			$array_count++;
		}
		$array_count = 0;
		foreach ($discounts as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$discounts[$array_count]['shike_name'] = $user_name['user_name'];
			$discounts[$array_count]['show_win_url'] = $this->link_edit($v['win_url']);
			$discounts[$array_count]['show_win_two_url'] = $this->link_edit($v['win_two_url']);
			$array_count++;
		}
		$this->out_data['discounts'] = $discounts;
		//var_dump($discounts);die();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/privilege_buyManage';
		$this->load->view('admin_default', $this->out_data);
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