<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_user_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_admin_login();
		// parent::check_shike_login();

	}

	public function index()
	{
		$this->out_data['user'] = $this->db->query("select * from admin")->result_array();
		$this->out_data['con_page'] = 'admin/user_manage';
		$this->out_data['role']= $this->db->query("select id,name from role")->result_array();
		$this->load->view('admin_default', $this->out_data);
	}
	public function search(){
		$search = $this->input->get("search");
		$this->out_data['role']= $this->db->query("select id,name from role")->result_array();
		$where = " where name like '%{$search}%' ";
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from admin".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_user_manage/?search=".$search;
		$this->out_data['user'] = $this->db->query("select * from admin".$where)->result_array();
		//$this->out_data['sellers'] = $this->db->query("select * from seller ".$where." limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/user_manage';
		$this->load->view('admin_default', $this->out_data);
	}
	public function get_user_info(){
		$id = $this->input->post('id');
		$role_info = $this->db->query("select * from admin where id = {$id}")->row_array();
		echo json_encode($role_info);
	}

	public function my_delete_user(){
		$id = $this->input->post('id');
		$res = $this->db->delete("admin",array("id"=>$id));
		echo json_encode($res);
	}
	public function set_user_info(){
		$name = $this->input->post('name');
		$pwd = $this->input->post('pwd');
		$role = $this->input->post('role');
		$id = $this->input->post("id");
		//$pwd=md5($pwd);
		$info = array(
			'name'=>$name,
			'pwd'=>$pwd,
			'role'=>$role,
			);
		if($id == -1){
			$res = $this->db->insert("admin",$info);
		}else{
			$res = $this->db->update("admin",$info,array("id"=>$id));
		}
		echo json_encode($res);
	}

	public function delete_user(){
		$id = $this->input->post("id");
		$this->db->delete("admin",array("id"=>$id));
		$res  = $this->db->affected_rows();
		echo json_encode($res);
	}
}