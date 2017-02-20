<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_permission('admin');
	}

	public function index()
	{
		$this->admin_list();
	}

	function admin_list()
	{
		$this->out_data['admin_list'] = $this->db->select('id,name,nick')->from('admin')->get()->result_array();
		$this->out_data['con_page'] = 'admin_list';
		$this->load->view('default', $this->out_data);
	}

	function del_admin()
	{
		if(!parent::is_post()) show_404();
		$id = (int)$this->input->post('id');
		$this->db->delete('admin', array('id' => $id));
	}

	function edit_admin($id = 0)
	{
		$id = (int)$id;

		if($id == 0)
		{
			$this->out_data['admin'] = array('id' => 0, 'name' => '', 'nick' => '', 'permission' => '', 'rid' => '');
		}
		else
		{
			$this->out_data['admin'] = $this->db->select('id,name,nick,permission,rid')->from('admin')->where('id', $id)->get()->row_array();
		}
		$this->out_data['rid_list'] = $this->db->select('id,name')->from('room')->get()->result_array();
		$this->out_data['con_page'] = 'admin_edit';
		$this->load->view('default', $this->out_data);
	}

	function save_admin()
	{
		if(!parent::is_post()) show_404();
		$result = array('status' => false, 'msg' => '');
		$id = $this->input->post('id');
		$info = array('name' => $this->input->post('name'),
			'nick' => $this->input->post('nick'));

		$is_exist = $this->db->select('id')->from('admin')->where(array('name' => $info['name'], 'id <> '=> $id))->get()->num_rows();
		if($is_exist)
		{
			$result['msg'] = '该账号已存在，请重新输入';
			echo json_encode($result);
			exit;
		}

		$permission = $this->input->post('permission');
		if($permission) $permission = join(',', $permission);
		$info['permission'] = $permission;
		$rid = $this->input->post('rid');
		if($rid) $rid = join(',', $rid);
		$info['rid'] = $rid;
		$password = $this->input->post('password');
		if($password) $info['password'] = md5($password);


		if($id == 0)
		{
			$this->db->insert('admin', $info);
		}
		else
		{
			$this->db->update('admin', $info, array('id' => $id));
		}
		$result['status'] = true;
		echo json_encode($result);
	}
}