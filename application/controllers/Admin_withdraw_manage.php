<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_withdraw_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_admin_login();
		// parent::check_permission('admin');
	}

	public function index()
	{
		$shike_withdraws = $this->db->query("select * from platformorder where remarks=2 and user_type=1")->result_array();
		$array_count = 0;
		foreach ($shike_withdraws as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$bankcard = $this->db->query("select * from bankbind where user_id={$v['seller_id']} and type=1")->row_array();
            $shike_withdraws[$array_count]['banknum'] = $bankcard['banknum'];
            $shike_withdraws[$array_count]['banktype'] = $bankcard['banktype'];
            $shike_withdraws[$array_count]['branchbank'] = $bankcard['branchbank'];
            $shike_withdraws[$array_count]['name'] = $bankcard['name'];
			$shike_withdraws[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['shike_withdraws'] = $shike_withdraws;
		$merchant_withdraws = $this->db->query("select * from platformorder where remarks=8 and user_type=0")->result_array();
		$array_count = 0;
		foreach ($merchant_withdraws as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$bankcard = $this->db->query("select * from bankbind where user_id={$v['seller_id']} and type=0")->row_array();
            $merchant_withdraws[$array_count]['banknum'] = $bankcard['banknum'];
            $merchant_withdraws[$array_count]['banktype'] = $bankcard['banktype'];
            $merchant_withdraws[$array_count]['branchbank'] = $bankcard['branchbank'];
            $merchant_withdraws[$array_count]['name'] = $bankcard['name'];
			$merchant_withdraws[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}

		$this->out_data['merchant_withdraws'] = $merchant_withdraws;
		$this->out_data['con_page'] = 'admin/withdraw_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	public function merchant_search(){
		$search = $this->input->get("search");
		$seller_id_array = $this->db->query("select seller_id from seller where user_name like '%{$search}%'")->result_array();
		$where = " where remarks=2 and user_type=0 ";

		if($search && $seller_id_array){
			$seller_id_string = "(";
			foreach($seller_id_array as $v){
				$seller_id_string = $seller_id_string."'".$v['seller_id']."',";
			}
			$seller_id_string = substr($seller_id_string,0,-1);
			$seller_id_string .= ")";
			$where = $where." and seller_id in ".$seller_id_string;
		}
		if(!$seller_id_array){
			$where .= " and 1=0 ";
		}

		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from platformorder".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_withdraw_manage/merchant_search?search=".$search;
		$shike_withdraws = $this->db->query("select * from platformorder where remarks=8 and user_type=1")->result_array();
		$array_count = 0;
		foreach ($shike_withdraws as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shike_withdraws[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['shike_withdraws'] = $shike_withdraws;
		$merchant_withdraws = $this->db->query("select * from platformorder ".$where)->result_array();
		$array_count = 0;
		foreach ($merchant_withdraws as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$merchant_withdraws[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['merchant_withdraws'] = $merchant_withdraws;
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/withdraw_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	public function shike_search(){
		$search = $this->input->get("search");
		$user_id_array = $this->db->query("select user_id from user where user_name like '%{$search}%'")->result_array();
		$where = " where remarks=2 and user_type=1 ";

		if($search && $user_id_array){
			$user_id_string = "(";
			foreach($user_id_array as $v){
				$user_id_string = $user_id_string."'".$v['user_id']."',";
			}
			$user_id_string = substr($user_id_string,0,-1);
			$user_id_string .= ")";
			$where = $where." and seller_id in ".$user_id_string;
		}
		if(!$user_id_array){
			$where .= " and 1=0 ";
		}
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from platformorder".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_withdraw_manage/shike_search?search=".$search;
		$merchant_withdraws = $this->db->query("select * from platformorder where remarks=8 and user_type=0")->result_array();
		$array_count = 0;
		foreach ($merchant_withdraws as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$merchant_withdraws[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['merchant_withdraws'] = $merchant_withdraws;
		$shike_withdraws = $this->db->query("select * from platformorder ".$where)->result_array();
		$array_count = 0;
		foreach ($shike_withdraws as $v ) {
			$user_name = $this->db->query("select user_name from user where user_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shike_withdraws[$array_count]['user_name'] = $user_name['user_name'];
			$array_count++;
		}
		$this->out_data['shike_withdraws'] = $shike_withdraws;
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/withdraw_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	function submit_merchant_picture(){
		$id = $this->input->post("hidden_id");
		$seller_id = $this->input->post("hidden_seller_id");
		$path = "images/merchant/platformorder/".$seller_id."/";
		if(is_dir($path)){
			// echo 1;die();
		}else{
			// echo 2;die();
         mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
      	}
      	$tmp_file = $_FILES['edit_merchant_picture']['tmp_name'];
	    $filename = $_FILES['edit_merchant_picture']['name'];
	    $img_url = "images/merchant/platformorder/".$seller_id."/".$filename;
	    $info = array(
        	         'img_url'=>$img_url,
        	         'status'=>3
        			);
	    if($tmp_file){
	    	$info['img_url'] = $img_url;
	    	$res = move_uploaded_file($tmp_file,$img_url);
	    }
	    $res = $this->db->update("platformorder",$info,array("id"=>$id));
	    header("Location: /admin_withdraw_manage");
	}

	function submit_shike_picture(){
		$id = $this->input->post("hidden_id");
		$user_id = $this->input->post("hidden_user_id");
		$path = "images/shike/platformorder/".$user_id."/";
		if(is_dir($path)){
			// echo 1;die();
		}else{
			// echo 2;die();
         mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
      	}
      	$tmp_file = $_FILES['edit_shike_picture']['tmp_name'];
	    $filename = $_FILES['edit_shike_picture']['name'];
	    $img_url = "images/shike/platformorder/".$user_id."/".$filename;
	    $info = array(
        	         'img_url'=>$img_url,
        	         'status'=>3
        			);
	    if($tmp_file){
	    	$info['img_url'] = $img_url;
	    	$res = move_uploaded_file($tmp_file,$img_url);
	    }
	    $res = $this->db->update("platformorder",$info,array("id"=>$id));
	    header("Location: /admin_withdraw_manage");
	}
	function get_merchant_info(){
		$id = $this->input->post('id');
		$merchant_withdraws = $this->db->query("select img_url from platformorder where id={$id}")->row_array();
		$img_url = $merchant_withdraws['img_url'];
		echo json_encode($img_url);
	}
	function get_shike_info(){
		$id = $this->input->post('id');
		$shike_withdraws = $this->db->query("select img_url from platformorder where id={$id}")->row_array();
		$img_url = $shike_withdraws['img_url'];
		echo json_encode($img_url);
	}
}