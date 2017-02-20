<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_bankcard_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_admin_login();
		// parent::check_permission('admin');
	}

	public function index()
	{
		$shike_cards = $this->db->query("select * from bankbind where type=1")->result_array();
		$array_count = 0;
		foreach ($shike_cards as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shike_cards[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['shike_cards'] = $shike_cards;

		$merchant_cards = $this->db->query("select * from bankbind where type=0")->result_array();
		$array_count = 0;
		foreach ($merchant_cards as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$merchant_cards[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['merchant_cards'] = $merchant_cards;
		$this->out_data['con_page'] = 'admin/bankcard_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	public function merchant_search(){
		$search = $this->input->get("search");
		$seller_id_array = $this->db->query("select seller_id from seller where user_name like '%{$search}%'")->result_array();

		$where = " where type=0 ";

		if($search && $seller_id_array){
			$seller_id_string = "(";
			foreach($seller_id_array as $v){
				$seller_id_string = $seller_id_string."'".$v['seller_id']."',";
			}
			$seller_id_string = substr($seller_id_string,0,-1);
			$seller_id_string .= ")";
			$where = $where." and user_id in ".$seller_id_string;
		}
		if(!$seller_id_array){
			$where .= " and 1=0 ";
		}
		//var_dump($where);die();
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from bankbind".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_bankcard_manage/?search=".$search;
		$shike_cards = $this->db->query("select * from bankbind where type=1")->result_array();
		$array_count = 0;
		foreach ($shike_cards as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shike_cards[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['shike_cards'] = $shike_cards;
		$merchant_cards = $this->db->query("select * from bankbind ".$where)->result_array();
		$array_count = 0;
		foreach ($merchant_cards as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$merchant_cards[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['merchant_cards'] = $merchant_cards;
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/bankcard_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	public function shike_search(){
		$search = $this->input->get("search");
		$user_id_array = $this->db->query("select user_id from user where user_name like '%{$search}%'")->result_array();
		$where = " where type=1 ";
		if($search && $user_id_array){
			$user_id_string = "(";
			foreach($user_id_array as $v){
				$user_id_string = $user_id_string."'".$v['user_id']."',";
			}
			$user_id_string = substr($user_id_string,0,-1);
			$user_id_string .= ")";
			$where = $where." and user_id in ".$user_id_string;
		}
		if(!$user_id_array){
			$where .= " and 1=0 ";
		}
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from bankbind".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_bankcard_manage/?search=".$search;
		$array_count = 0;
		$merchant_cards = $this->db->query("select * from bankbind where type=0")->result_array();
		foreach ($merchant_cards as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$merchant_cards[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
        $this->out_data['merchant_cards'] = $merchant_cards;

		$shike_cards = $this->db->query("select * from bankbind ".$where)->result_array();
		// var_dump("select * from bankbind ".$where);
		// var_dump($shike_cards);die();
		$array_count = 0;
		foreach ($shike_cards as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shike_cards[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['shike_cards'] = $shike_cards;
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/bankcard_manage';
		$this->load->view('admin_default', $this->out_data);
	}
}