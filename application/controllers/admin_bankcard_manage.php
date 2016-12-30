<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_bankcard_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// parent::check_permission('admin');
	}

	public function index()
	{
		$this->out_data['shike_cards'] = $this->db->query("select * from bankbind where type=1")->result_array();
		$this->out_data['merchant_cards'] = $this->db->query("select * from bankbind where type=0")->result_array();
		$this->out_data['con_page'] = 'admin/bankcard_manage';
		$this->load->view('admin_default', $this->out_data);
	}
}