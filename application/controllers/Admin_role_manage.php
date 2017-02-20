<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_role_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_admin_login();
		// parent::check_shike_login();

	}

	public function index()
	{
		$this->out_data['role'] = $this->db->query("select * from role")->result_array();
		$this->out_data['con_page'] = 'admin/role_manage';
		$this->load->view('admin_default', $this->out_data);
	}
	public function search(){
		$search = $this->input->get("search");
		$where = " where name like '%{$search}%' ";
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from role".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_role_manage/?search=".$search;
		$this->out_data['role'] = $this->db->query("select * from role".$where)->result_array();
		//$this->out_data['sellers'] = $this->db->query("select * from seller ".$where." limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/role_manage';
		$this->load->view('admin_default', $this->out_data);
	}
	public function get_role_info(){
		$id = $this->input->post('id');
		$role_info = $this->db->query("select * from role where id = {$id}")->row_array();
		echo json_encode($role_info);
	}
	public function delete_role(){
		$id = $this->input->post('id');
		$res = $this->db->delete("role",array("id"=>$id));
		echo json_encode($res);
	}
	public function set_role_info(){
		$pri_merchant = $this->input->post('pri_merchant')=='true'?1:0;
		$pri_shike = $this->input->post('pri_shike')=='true'?1:0;
		$pri_activity = $this->input->post('pri_activity')=='true'?1:0;
		$pri_order = $this->input->post('pri_order')=='true'?1:0;
		$pri_money = $this->input->post('pri_money')=='true'?1:0;
		$pri_msg = $this->input->post('pri_msg')=='true'?1:0;
		$pri_pri = $this->input->post('pri_pri')=='true'?1:0;
		$name = $this->input->post('name');
		$id = $this->input->post("id");
		//$verify = $_REQUEST;
		if($name == ''){
			echo json_encode(2);
			return;
		}
		$verify = $this->db->query("select * from role where name = '{$name}'")->row_array();
		// $verify = 1;
		if($verify && $verify['id'] != $id){
			$res = 0;
		}else{
			$info = array(
				'pri_merchant'=>$pri_merchant,
				'pri_shike'=>$pri_shike,
				'pri_activity'=>$pri_activity,
				'pri_order'=>$pri_order,
				'pri_money'=>$pri_money,
				'pri_msg'=>$pri_msg,
				'pri_pri'=>$pri_pri,
				'name'=>$name,
				);
			if($id == -1){
				$res = $this->db->insert("role",$info);
			}else{
				$res = $this->db->update("role",$info,array("id"=>$id));
			}
			$res = 1;
		}
		
		echo json_encode($res);
	}
}