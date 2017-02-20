<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->session->set_userdata("merchant_login",0);
		// $this->session->set_userdata("shike_login",0);
		// $this->session->set_userdata("admin_login",0);
	}

	public function index()
	{
		$this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];
		$this->load->view('admin/login',$this->out_data);
	}

	function check_login()
	{
		$result = array('status' => true, 'msg' => '');
		$name = $this->input->post('name');
		$password = $this->input->post('password');
		//$password = md5($password);
		$query = $this->db->query("select * from admin where name = '{$name}' and pwd = '{$password}'");
		//echo json_encode("select * from admin where name = '{$name}' and pwd = '{$password}'");return;
        //$query_shike = $this->db->query("select * from user where user_name='{$name}' and password='{$password}' or phone='{$name}' and password='{$password}'");

		if($query->num_rows() > 0)
        {
            $query = $query->row_array();
            $result = array_merge($result, $query);
            $this->session->set_userdata('admin_id', $result['id']);
            $this->session->set_userdata('admin_name', $result['name']);
			$this->session->set_userdata('admin_login', true);
			$this->session->set_userdata("merchant_login",false);
			$this->session->set_userdata("shike_login",false);
			$role = $query['role'];
			$admininfo = $this->db->query("select * from role where id='{$role}'")->row_array();
			$this->session->set_userdata('admin_pri_merchant', $admininfo['pri_merchant']);
			$this->session->set_userdata('admin_pri_shike', $admininfo['pri_shike']);
			$this->session->set_userdata('admin_pri_activity', $admininfo['pri_activity']);
			$this->session->set_userdata('admin_pri_order', $admininfo['pri_order']);
			$this->session->set_userdata('admin_pri_money', $admininfo['pri_money']);
			$this->session->set_userdata('admin_pri_msg', $admininfo['pri_msg']);
			$this->session->set_userdata('admin_pri_pri', $admininfo['pri_pri']);
			// echo json_encode($admininfo);return;
        }
        else{
            $result = array('status' => false, 'msg' => '用户名或密码错误，请重新输入');
        }
		
		echo json_encode($result);
	}
	public function all_session(){
		var_dump($this->session->all_userdata());
	}
	function logout()
	{
		$this->session->sess_destroy();
		header("Location: /admin_login");
	}
}
