<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_shike_recharge extends MY_Controller {

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
		$count = $this->db->query("select count(*) as count from seller_charge_order where user_type='1'")->row_array();
		$count = $count['count'];
		$base_url = "/admin_shike_recharge/?";
		$orders = $this->db->query("select * from seller_charge_order where user_type='1' order by charge_time desc limit {$start},{$limit}")->result_array();
		$array_count = 0;
		foreach ($orders as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$orders[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['orders'] = $orders;
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/shike_recharge';
		$this->load->view('admin_default', $this->out_data);
	}

	public function search(){
		$search = $this->input->get("search");
		$user_id_array = $this->db->query("select user_id from user where user_name like '%{$search}%'")->result_array();
		$where = " where user_type='1' ";
		if($search && $user_id_array){
			$user_id_string = "(";
			foreach($user_id_array as $v){
				$user_id_string = $user_id_string."'".$v['user_id']."',";
			}
			$user_id_string = substr($user_id_string,0,-1);
			$user_id_string .= ")";
			$where = $where." and seller_id in ".$user_id_string;
		}elseif(!$user_id_array){
			$where .= " and 1=0 ";
		}
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from seller_charge_order".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_shike_recharge/?search=".$search;
		$orders = $this->out_data['orders'] = $this->db->query("select * from seller_charge_order ".$where." order by charge_time desc limit {$start},{$limit}")->result_array();

		$array_count = 0;
		foreach ($orders as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$orders[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['orders'] = $orders;

		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/shike_recharge';
		$this->load->view('admin_default', $this->out_data);
	}
}