<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_platform_fund_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_admin_login();
		// parent::check_permission('admin');
	}

	public function index()
	{

		//$this->out_data['orders'] = $this->db->query("select * from platformorder")->result_array();
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from platformorder where remarks in(2,3,8)")->row_array();
		$count = $count['count'];
		$the_url = "/admin_platform_fund_record";
		$this->out_data['orders'] = $this->db->query("select * from platformorder where remarks in(2,3,8) order by time desc limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/platform_fund_record';
		$this->load->view('admin_default', $this->out_data);
	}
	public function search(){
		$search = $this->input->get("search");
		$where = " where flowid like '%{$search}%' and remarks in(2,3,8)";
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 20;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from platformorder ".$where)->row_array();
		$count = $count['count'];
		$the_url = "/admin_platform_fund_record/search?search=".$search;
		$this->out_data['orders'] = $this->db->query("select * from platformorder ".$where." order by time desc limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($the_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/platform_fund_record';
		$this->load->view('admin_default', $this->out_data);
	}
}