<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_shike_basic extends MY_Controller {

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
		$count = $this->db->query("select count(*) as count from user")->row_array();
		$count = $count['count'];
		$base_url = "/admin_shike_basic/?";
		$this->out_data['users'] = $this->db->query("select * from user order by reg_time desc limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/shike_basic';
		$this->load->view('admin_default', $this->out_data);
	}

	public function search(){
		$search = $this->input->get("search");
		$where = " where user_name like '%{$search}%' or phone like '%{$search}%' ";
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from user".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_shike_basic/?search=".$search;
		$this->out_data['users'] = $this->db->query("select * from user ".$where." order by reg_time desc limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/shike_basic';
		$this->load->view('admin_default', $this->out_data);
	}

	public function get_user_info(){
		$user_id = $this->input->post('user_id');
		$user_info = $this->db->query("select * from user where user_id = {$user_id}")->row_array();
		echo json_encode($user_info);
	}

	public function set_user_info(){
		$user_id = $this->input->post('user_id');
		$tel = $this->input->post('tel');
		$qq = $this->input->post('qq');
		$res = $this->db->update("user",array("phone"=>$tel,"user_qq"=>$qq),array("user_id"=>$user_id));
		echo json_encode($res);
	}

	public function pass_check(){
		$user_id = $this->input->post('user_id');
		$res = $this->db->update("user",array("taobao_status"=>2),array("user_id"=>$user_id));
		echo json_encode($res);
	}
	public function fail_check(){
		$user_id = $this->input->post('user_id');
		$user_info = $this->db->query("select taobao_id from user where user_id={$user_id}")->row_array();
		$taobao_id = $user_info['taobao_id'];
		$res = $this->db->update("user",array("taobao_status"=>0,"taobao_id"=>""),array("user_id"=>$user_id));
		$description = '您申请绑定的淘宝帐号'.$taobao_id.'审核不通过，请换一个淘宝帐号进行绑定！';
		$info = array('description' => $description, 
					          'message_time' => date("Y-m-d H:i:s",time()),
					          'user_id' =>$user_id,
					          'status' => 0,
					          'title' => '淘宝帐号审核不通过',
					          'user_type' => '1',
					          'message_id' => '');
				$res = $this->db->insert("message", $info);
		echo json_encode($res);
	}
}