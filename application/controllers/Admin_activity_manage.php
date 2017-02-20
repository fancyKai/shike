<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_activity_manage extends MY_Controller {

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
		$count = $this->db->query("select count(*) as count from activity")->row_array();
		$count = $count['count'];
		$base_url = "/admin_activity_manage/?";
		$activity = $this->out_data['activity'] = $this->db->query("select * from activity order by gene_time desc limit {$start},{$limit}")->result_array();
		$array_count = 0;
		foreach ($activity as $v ) {
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$activity[$array_count]['user_name'] = $user_name['user_name'];
			$activity[$array_count]['show_product_link'] = $this->link_edit($v['product_link']);
			$array_count++;
		}
		$this->out_data['activity'] = $activity;

		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/activity_manage';
		$this->load->view('admin_default', $this->out_data);
	}

	public function get_shike_info_by_apply(){
		$act_id = $this->input->post('act_id');
		$shike_info = $this->db->query("select * from apply where act_id=".$act_id)->result_array();
		$count=0;
		foreach($shike_info as $v){
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			$user_name = $user_name['user_name'];
			$shike_info[$count]['user_name'] = $user_name;
			$count++;
		}
		echo json_encode($shike_info,true);

	}
	public function get_shike_info_by_apply2(){
		$user_name = $this->input->post('user_name');
		$act_id = $this->input->post('act_id');
		$user_id_array = $this->db->query("select user_id from user where user_name like '%{$user_name}%'")->result_array();
		if($user_id_array){
			$user_id_string = "(";
			foreach($user_id_array as $v){
				$user_id_string = $user_id_string."'".$v['user_id']."',";
			}
			$user_id_string = substr($user_id_string,0,-1);
			$user_id_string .= ")";
			//$where = $where." and seller_id in ".$seller_id_string;
			$shike_info = $this->db->query("select * from apply where user_id in ".$user_id_string." and act_id=".$act_id)->result_array();
		}else{
			$shike_info = $this->db->query("select * from apply where 1=0")->result_array();
		}
		$count=0;
		foreach($shike_info as $v){
			$user_name = $this->db->query("select user_name from user where user_id={$v['user_id']}")->row_array();
			$user_name = $user_name['user_name'];
			$shike_info[$count]['user_name'] = $user_name;
			$count++;
		}
		//$shike_info = $this->db->query("select * from apply where user_id=".$user_id." and act_id=".$act_id)->row_array();
		echo json_encode($shike_info,true);
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
			$seller_id_string .= ") ";
			$where = $where." and seller_id in ".$seller_id_string;
		}elseif(!$seller_id_array){
			$where .= " and 1=0 ";
		}
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from activity".$where." or act_id='".$search."'")->row_array();
		$count = $count['count'];

		$the_url = "/admin_activity_manage/search?search=".$search;
		$activity = $this->out_data['activity'] = $this->db->query("select * from activity ".$where." or act_id='".$search."' order by gene_time desc limit {$start},{$limit}")->result_array();
		$array_count = 0;
		foreach($activity as $v){
			$user_name = $this->db->query("select user_name from seller where seller_id={$v['seller_id']}")->row_array();
			//$v["user_name"]=$user_name;
			$activity[$array_count]['user_name'] = $user_name['user_name'];
			$activity[$array_count]['show_product_link'] = $this->link_edit($v['product_link']);
			$array_count++;
		}
		$this->out_data['activity'] = $activity;
		// var_dump($this->out_data['activity']);die();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/activity_manage';
		$this->load->view('admin_default', $this->out_data);
	}
	public function get_activity_info(){
		$act_id = $this->input->post('act_id');
		$activity_info = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
		$user_name = $this->db->query("select user_name from seller where seller_id={$activity_info['seller_id']}")->row_array();
		$activity_info['seller_name'] = $user_name['user_name'];

		echo json_encode($activity_info);
	}
	public function set_seller_info(){
		$seller_id = $this->input->post('seller_id');
		$tel = $this->input->post('tel');
		$qq = $this->input->post('qq');
		$res = $this->db->update("seller",array("tel"=>$tel,"qq"=>$qq),array("seller_id"=>$seller_id));
		echo json_encode($res);
	}
	public function release_activity(){
		$act_id = $this->input->post('act_id');
		if($this->input->post('product_name')){
			$product_name = $this->input->post('product_name');
		}else{
			$product_name ='';
		}
		if($this->input->post('product_link')){
			$product_link= $this->input->post('product_link');
		}else{
			$product_link ='';
		}
		if($this->input->post('shop_name')){
			$shop_name = $this->input->post('shop_name');
		}else{
			$shop_name ='';
		}
		if($this->input->post('platform')){
			$platform = $this->input->post('platform');
		}else{
			$platform ='';
		}
		if($this->input->post('picture_url')){
			$picture_url = $this->input->post('picture_url');
		}else{
			$picture_url ='';
		}
		if($this->input->post('product_classify')){
			$product_classify = $this->input->post('product_classify');
		}else{
			$product_classify ='';
		}
		if($this->input->post('color')){
			$color = $this->input->post('color');
		}else{
			$color ='';
		}
		if($this->input->post('size')){
			$size = $this->input->post('size');
		}else{
			$size ='';
		}
		if($this->input->post('freight')){
			$freight = $this->input->post('freight');
		}else{
			$freight ='';
		}
		if($this->input->post('t_picture_url')){
			$t_picture_url = $this->input->post('t_picture_url');
		}else{
			$t_picture_url ='';
		}
		if($this->input->post('t_key_words')){
			$t_key_words = $this->input->post('t_key_words');
		}else{
			$t_key_words ='';
		}
		if($this->input->post('t_classify1')){
			$t_classify1 = $this->input->post('t_classify1');
		}else{
			$t_classify1 ='';
		}
		if($this->input->post('t_classify2')){
			$t_classify2 = $this->input->post('t_classify2');
		}else{
			$t_classify2 ='';
		}
		if($this->input->post('t_classify3')){
			$t_classify3 = $this->input->post('t_classify3');
		}else{
			$t_classify3 ='';
		}
		if($this->input->post('t_classify4')){
			$t_classify4 = $this->input->post('t_classify4');
		}else{
			$t_classify4 ='';
		}
		if($this->input->post('t_classify5')){
			$t_classify5 = $this->input->post('t_classify5');
		}else{
			$t_classify5 ='';
		}
		if($this->input->post('ser_platformid')){
			$ser_platformid = $this->input->post('ser_platformid');
		}else{
			$ser_platformid ='';
		}
		if($ser_platformid == 1){
			if($this->input->post('dis_ser1')){
				$dis_ser1 = $this->input->post('dis_ser1');
			}else{
				$dis_ser1 =0;
			}
			if($this->input->post('dis_ser3')){
				$dis_ser3 = $this->input->post('dis_ser3');
			}else{
				$dis_ser3 =0;
			}
		}else{
			if($this->input->post('dis_ser1_')){
				$dis_ser1 = $this->input->post('dis_ser1_');
			}else{
				$dis_ser1 =0;
			}
			if($this->input->post('dis_ser3_')){
				$dis_ser3 = $this->input->post('dis_ser3_');
			}else{
				$dis_ser3 =0;
			}
		}
		if($this->input->post('dis_ser2')){
			$dis_ser2 = $this->input->post('dis_ser2');
		}else{
			$dis_ser2 =0;
		}
		if($this->input->post('dis_ser4')){
			$dis_ser4 = $this->input->post('dis_ser4');
		}else{
			$dis_ser4 =0;
		}
		if($this->input->post('dis_ser5')){
			$dis_ser5 = $this->input->post('dis_ser5');
		}else{
			$dis_ser5 =0;
		}
		if($this->input->post('dis_ser6')){
			$dis_ser6 = $this->input->post('dis_ser6');
		}else{
			$dis_ser6 =0;
		}
		if($this->input->post('dis_ser7')){
			$dis_ser7 = $this->input->post('dis_ser7');
		}else{
			$dis_ser7 =0;
		}
		if($this->input->post('dis_ser8')){
			$dis_ser8 = $this->input->post('dis_ser8');
		}else{
			$dis_ser8 =0;
		}
		if($this->input->post('dis_ser9')){
			$dis_ser9 = $this->input->post('dis_ser9');
		}else{
			$dis_ser9 =0;
		}
		if($this->input->post('dis_ser10')){
			$dis_ser10 = $this->input->post('dis_ser10');
		}else{
			$dis_ser10 =0;
		}
		if($this->input->post('dis_ser11')){
			$dis_ser11 = $this->input->post('dis_ser11');
		}else{
			$dis_ser11 =0;
		}
		if($this->input->post('dis_ser12')){
			$dis_ser12 = $this->input->post('dis_ser12');
		}else{
			$dis_ser12 =0;
		}
		if($this->input->post('dis_ser13')){
			$dis_ser13 = $this->input->post('dis_ser13');
		}else{
			$dis_ser13 =0;
		}
		if($this->input->post('dis_ser14')){
			$dis_ser14 = $this->input->post('dis_ser14');
		}else{
			$dis_ser14 =0;
		}
		if($this->input->post('dis_ser15')){
			$dis_ser15 = $this->input->post('dis_ser15');
		}else{
			$dis_ser15 =0;
		}
		if($this->input->post('t_sort')){
			$t_sort = $this->input->post('t_sort');
		}else{
			$t_sort ='';
		}
		if($this->input->post('lower_price')){
			$lower_price = $this->input->post('lower_price');
		}else{
			$lower_price ='';
		}
		if($this->input->post('higher_price')){
			$higher_price = $this->input->post('higher_price');
		}else{
			$higher_price ='';
		}
		if($this->input->post('t_delivery_place')){
			$t_delivery_place = $this->input->post('t_delivery_place');
		}else{
			$t_delivery_place ='';
		}
		if($this->input->post('win_url')){
			$win_url = $this->input->post('win_url');
		}else{
			$win_url ='';
		}
		if($this->input->post('win_two_url')){
			$win_two_url = $this->input->post('win_two_url');
		}else{
			$win_two_url ='';
		}
		$info = array(
			"product_name"=>$product_name,
			"product_link"=>$product_link,
			"shopname"=>$shop_name,
			"platformid"=>$platform,
			"picture_url"=>$picture_url,
			"product_classify"=>$product_classify,
			"color"=>$color,
			"size"=>$size,
			"freight"=>$freight,
			"t_picture_url"=>$t_picture_url,
			"t_key_words"=>$t_key_words,
			"t_classify1"=>$t_classify1,
			"t_classify2"=>$t_classify2,
			"t_classify3"=>$t_classify3,
			"t_classify4"=>$t_classify4,
			"t_classify5"=>$t_classify5,
			"dis_ser1"=>$dis_ser1,
			"dis_ser2"=>$dis_ser2,
			"dis_ser3"=>$dis_ser3,
			"dis_ser4"=>$dis_ser4,
			"dis_ser5"=>$dis_ser5,
			"dis_ser6"=>$dis_ser6,
			"dis_ser7"=>$dis_ser7,
			"dis_ser8"=>$dis_ser8,
			"dis_ser9"=>$dis_ser9,
			"dis_ser10"=>$dis_ser10,
			"dis_ser11"=>$dis_ser11,
			"t_sort"=>$t_sort,
			"t_lower_price"=>$lower_price,
			"t_higher_price"=>$higher_price,
			"t_delivery_place"=>$t_delivery_place,
			"win_url"=>$win_url,
			"win_two_url"=>$win_two_url,
			"time_3"=>date('Y-m-d H:i:s',time()),
			"status"=>3,
			);
		// echo json_encode($info);
		// return;
		$res = $this->db->update("activity",$info,array("act_id"=>$act_id));
		echo json_encode($res);
	}

	public function save_activity(){
		$act_id = $this->input->post('act_id');
		if($this->input->post('product_name')){
			$product_name = $this->input->post('product_name');
		}else{
			$product_name ='';
		}
		if($this->input->post('product_link')){
			$product_link= $this->input->post('product_link');
		}else{
			$product_link ='';
		}
		if($this->input->post('shop_name')){
			$shop_name = $this->input->post('shop_name');
		}else{
			$shop_name ='';
		}
		if($this->input->post('platform')){
			$platform = $this->input->post('platform');
		}else{
			$platform ='';
		}
		if($this->input->post('picture_url')){
			$picture_url = $this->input->post('picture_url');
		}else{
			$picture_url ='';
		}
		if($this->input->post('product_classify')){
			$product_classify = $this->input->post('product_classify');
		}else{
			$product_classify ='';
		}
		if($this->input->post('color')){
			$color = $this->input->post('color');
		}else{
			$color ='';
		}
		if($this->input->post('size')){
			$size = $this->input->post('size');
		}else{
			$size ='';
		}
		if($this->input->post('freight')){
			$freight = $this->input->post('freight');
		}else{
			$freight ='';
		}
		if($this->input->post('t_picture_url')){
			$t_picture_url = $this->input->post('t_picture_url');
		}else{
			$t_picture_url ='';
		}
		if($this->input->post('t_key_words')){
			$t_key_words = $this->input->post('t_key_words');
		}else{
			$t_key_words ='';
		}
		if($this->input->post('t_classify1')){
			$t_classify1 = $this->input->post('t_classify1');
		}else{
			$t_classify1 ='';
		}
		if($this->input->post('t_classify2')){
			$t_classify2 = $this->input->post('t_classify2');
		}else{
			$t_classify2 ='';
		}
		if($this->input->post('t_classify3')){
			$t_classify3 = $this->input->post('t_classify3');
		}else{
			$t_classify3 ='';
		}
		if($this->input->post('t_classify4')){
			$t_classify4 = $this->input->post('t_classify4');
		}else{
			$t_classify4 ='';
		}
		if($this->input->post('t_classify5')){
			$t_classify5 = $this->input->post('t_classify5');
		}else{
			$t_classify5 ='';
		}
		if($this->input->post('ser_platformid')){
			$ser_platformid = $this->input->post('ser_platformid');
		}else{
			$ser_platformid ='';
		}
		if($ser_platformid == 1){
			if($this->input->post('dis_ser1')){
				$dis_ser1 = $this->input->post('dis_ser1');
			}else{
				$dis_ser1 =0;
			}
			if($this->input->post('dis_ser3')){
				$dis_ser3 = $this->input->post('dis_ser3');
			}else{
				$dis_ser3 =0;
			}
		}else{
			if($this->input->post('dis_ser1_')){
				$dis_ser1 = $this->input->post('dis_ser1_');
			}else{
				$dis_ser1 =0;
			}
			if($this->input->post('dis_ser3_')){
				$dis_ser3 = $this->input->post('dis_ser3_');
			}else{
				$dis_ser3 =0;
			}
		}
		if($this->input->post('dis_ser2')){
			$dis_ser2 = $this->input->post('dis_ser2');
		}else{
			$dis_ser2 =0;
		}
		if($this->input->post('dis_ser4')){
			$dis_ser4 = $this->input->post('dis_ser4');
		}else{
			$dis_ser4 =0;
		}
		if($this->input->post('dis_ser5')){
			$dis_ser5 = $this->input->post('dis_ser5');
		}else{
			$dis_ser5 =0;
		}
		if($this->input->post('dis_ser6')){
			$dis_ser6 = $this->input->post('dis_ser6');
		}else{
			$dis_ser6 =0;
		}
		if($this->input->post('dis_ser7')){
			$dis_ser7 = $this->input->post('dis_ser7');
		}else{
			$dis_ser7 =0;
		}
		if($this->input->post('dis_ser8')){
			$dis_ser8 = $this->input->post('dis_ser8');
		}else{
			$dis_ser8 =0;
		}
		if($this->input->post('dis_ser9')){
			$dis_ser9 = $this->input->post('dis_ser9');
		}else{
			$dis_ser9 =0;
		}
		if($this->input->post('dis_ser10')){
			$dis_ser10 = $this->input->post('dis_ser10');
		}else{
			$dis_ser10 =0;
		}
		if($this->input->post('dis_ser11')){
			$dis_ser11 = $this->input->post('dis_ser11');
		}else{
			$dis_ser11 =0;
		}
		if($this->input->post('dis_ser12')){
			$dis_ser12 = $this->input->post('dis_ser12');
		}else{
			$dis_ser12 =0;
		}
		if($this->input->post('dis_ser13')){
			$dis_ser13 = $this->input->post('dis_ser13');
		}else{
			$dis_ser13 =0;
		}
		if($this->input->post('dis_ser14')){
			$dis_ser14 = $this->input->post('dis_ser14');
		}else{
			$dis_ser14 =0;
		}
		if($this->input->post('dis_ser15')){
			$dis_ser15 = $this->input->post('dis_ser15');
		}else{
			$dis_ser15 =0;
		}
		if($this->input->post('t_sort')){
			$t_sort = $this->input->post('t_sort');
		}else{
			$t_sort ='';
		}
		if($this->input->post('lower_price')){
			$lower_price = $this->input->post('lower_price');
		}else{
			$lower_price ='';
		}
		if($this->input->post('higher_price')){
			$higher_price = $this->input->post('higher_price');
		}else{
			$higher_price ='';
		}
		if($this->input->post('t_delivery_place')){
			$t_delivery_place = $this->input->post('t_delivery_place');
		}else{
			$t_delivery_place ='';
		}
		if($this->input->post('win_url')){
			$win_url = $this->input->post('win_url');
		}else{
			$win_url ='';
		}
		if($this->input->post('win_two_url')){
			$win_two_url = $this->input->post('win_two_url');
		}else{
			$win_two_url ='';
		}
		$info = array(
			"product_name"=>$product_name,
			"product_link"=>$product_link,
			"shopname"=>$shop_name,
			"platformid"=>$platform,
			"picture_url"=>$picture_url,
			"product_classify"=>$product_classify,
			"color"=>$color,
			"size"=>$size,
			"freight"=>$freight,
			"t_picture_url"=>$t_picture_url,
			"t_key_words"=>$t_key_words,
			"t_classify1"=>$t_classify1,
			"t_classify2"=>$t_classify2,
			"t_classify3"=>$t_classify3,
			"t_classify4"=>$t_classify4,
			"t_classify5"=>$t_classify5,
			"dis_ser1"=>$dis_ser1,
			"dis_ser2"=>$dis_ser2,
			"dis_ser3"=>$dis_ser3,
			"dis_ser4"=>$dis_ser4,
			"dis_ser5"=>$dis_ser5,
			"dis_ser6"=>$dis_ser6,
			"dis_ser7"=>$dis_ser7,
			"dis_ser8"=>$dis_ser8,
			"dis_ser9"=>$dis_ser9,
			"dis_ser10"=>$dis_ser10,
			"dis_ser11"=>$dis_ser11,
			"t_sort"=>$t_sort,
			"t_lower_price"=>$lower_price,
			"t_higher_price"=>$higher_price,
			"t_delivery_place"=>$t_delivery_place,
			"win_url"=>$win_url,
			"win_two_url"=>$win_two_url,
			);
		// echo json_encode($info);
		// return;
		$res = $this->db->update("activity",$info,array("act_id"=>$act_id));
		echo json_encode($res);
	}

	public function ban_activity(){
		$act_id = $this->input->post('act_id');
		$res = $this->db->update("activity",array("status"=>5,"time_3"=>date('Y-m-d H:i:s',time())),array("act_id"=>$act_id));
        //活动被驳回，返回押金和试用金
		$act = $this->db->query("select * from activity where act_id={$act_id}")->row_array();
		$seller_info = $this->db->query("select * from seller where seller_id={$act['seller_id']}")->row_array();
        $info = array('money' => $act["total_money"]/1.05*1, 
        	          'money_type' => 1,
        	          'processfee' => 0,
        	          'money_remain' => $seller_info['avail_deposit']+$act["total_money"]/1.05*1,
        	          'time' => date('Y-m-d H:i:s',time()),
        	          'flowid' => '123',
        	          'status' => 1,
        	          'seller_id' => $seller_info['seller_id'],
        	          'user_type' => 0,
        	          'remarks' => 6);
        $res = $this->db->insert("platformorder",$info);
        $info = array('money' => $act["total_money"]/1.05*0.05,
        	          'money_type' => 1,
        	          'processfee' => 0,
        	          'money_remain' => $seller_info['avail_deposit']+$act["total_money"],
        	          'time' => date('Y-m-d H:i:s',time()),
        	          'flowid' => '123',
        	          'status' => 1,
        	          'seller_id' => $seller_info['seller_id'],
        	          'user_type' => 0,
        	          'remarks' => 7);
        $res = $this->db->insert("platformorder",$info);
        //商家账户信息更新
        $info = array('avail_deposit' => $seller_info['avail_deposit']+$act["total_money"]);
        $res = $this->db->update("seller", $info, array("seller_id"=>$seller_info['seller_id']));

		echo json_encode($res);
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