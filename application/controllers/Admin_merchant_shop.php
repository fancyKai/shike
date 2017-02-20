<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_merchant_shop extends MY_Controller {

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
		$count = $this->db->query("select count(*) as count from shop")->row_array();
		$count = $count['count'];
		$base_url = "/admin_merchant_basic/?";
		$shops = $this->db->query("select * from shop order by bind_time desc limit {$start},{$limit}")->result_array();
		$array_count = 0;
		foreach ($shops as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shops[$array_count]['user_name'] = $user_name['user_name'];
			$shops[$array_count]['show_shop_link'] = $this->link_edit($v['shop_link']);
			$array_count++;
		}
		//var_dump($shops);die();
		$this->out_data['shops'] = $shops;
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/merchant_shop';
		$this->load->view('admin_default', $this->out_data);
	}
	public function search(){
		$search = $this->input->get("search");
		$seller_id_array = $this->db->query("select seller_id from seller where user_name like '%{$search}%'")->result_array();
		$where = " where 1=1 ";
		if($search && $seller_id_array){
			$seller_id_string = "(";
			foreach($seller_id_array as $v){
				$seller_id_string = $seller_id_string."'".$v['seller_id']."',";
			}
			$seller_id_string = substr($seller_id_string,0,-1);
			$seller_id_string .= ")";
			$where = $where." and seller_id in ".$seller_id_string;
		}elseif(!$seller_id_array){
			$where .= " and 1=0 ";
		}

		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from shop".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_merchant_shop/?search=".$search;

		$shops = $this->out_data['shops'] = $this->db->query("select * from shop ".$where." order by bind_time desc limit {$start},{$limit}")->result_array();
		$array_count = 0;
		foreach ($shops as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$shops[$array_count]['user_name'] = $user_name['user_name'];
			$shops[$array_count]['show_shop_link'] = $this->link_edit($v['shop_link']);
			$array_count++;
		}
		$this->out_data['shops'] = $shops;

		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/merchant_shop';
		$this->load->view('admin_default', $this->out_data);
	}
	public function get_shop_info(){
		$shop_id = $this->input->post('shop_id');
		$shop_info = $this->db->query("select * from shop where shop_id = {$shop_id}")->row_array();
		$user_name = $this->db->query("select user_name from seller where seller_id={$shop_info['seller_id']}")->row_array();
		$user_name = $user_name['user_name'];
		$shop_info['user_name'] = $user_name;
		echo json_encode($shop_info);
	}
	public function edit_shop_info(){
		$shop_id = $this->input->post("edit_shop_idd");
		$shop_name = $this->input->post("edit_shop_name");
		$shop_link = $this->input->post("edit_shop_link");
		$wangwang = $this->input->post("edit_wangwang");
		$qq = $this->input->post("edit_qq");
		$wx = $this->input->post("edit_wx");
		$tel = $this->input->post("edit_tel");
		$seller_id = $this->input->post("edit_seller_id");
		$platformid = $this->input->post("platformid");
		$path = "images/merchant/shop/".$seller_id;
		if(is_dir($path)){

		}else{
         mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
      	}
      	$tmp_file = $_FILES['edit_shop_logo']['tmp_name'];
	    $filename = $_FILES['edit_shop_logo']['name'];
	    $logo_link = "images/merchant/shop/".$seller_id."/".$filename;
	    $info = array(
        	          'shop_link' => $shop_link,
        	          'shop_name' => $shop_name,
        	          'wangwang' => $wangwang,
                      'chargeqq' => $qq,
                      'chargewx' => $wx,
                      'chargetel' => $tel,
                      'platform_id' => $platformid,
        			);
	    if($tmp_file){
	    	$info['logo_link'] = $logo_link;
	    	$res = move_uploaded_file($tmp_file,$logo_link);
	    }
	    // var_dump($info);
	    // var_dump($shop_id);
	    // die();
	    $res = $this->db->update("shop",$info,array("shop_id"=>$shop_id));
	    header("Location: /admin_merchant_shop");
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