<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_merchant_recharge extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// parent::check_permission('admin');
	}

	public function index()
	{
		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$count = $this->db->query("select count(*) as count from seller_charge_order where user_type='0'")->row_array();
		$count = $count['count'];
		$base_url = "/admin_merchant_recharge/?";
		$this->out_data['orders'] = $this->db->query("select * from seller_charge_order where user_type='0' limit {$start},{$limit}")->result_array();
		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'admin/merchant_recharge';
		$this->load->view('admin_default', $this->out_data);
	}
}