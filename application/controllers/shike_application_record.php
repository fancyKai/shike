<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_application_record extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$user_id = "1";

		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$orderwhere = " where user_id=$user_id ";
		$order_status = $this->input->get('order_status');
		$this->out_data['order_status'] = $order_status;
		if(!$order_status){
			$base_url = "/shike_application_record/?";
		}else{
			$orderwhere .= " and apply_status=".$order_status;
			$base_url = "/shike_application_record/?order_status=".$order_status;
		}

		$count = $this->db->query("select count(*) as count from apply".$orderwhere)->row_array();
		$count = $count['count'];
		$this->out_data['apply_list'] = $this->db->query("select * from apply".$orderwhere." limit {$start},{$limit}")->result_array();
        $this->out_data['sum_apply_list'] = $this->db->query("select count(*) as count from apply where user_id=$user_id")->row_array();
        $this->out_data['sum_win_apply_list'] = $this->db->query("select count(*) as count from apply where status=3 or status=4 and user_id=$user_id")->row_array();

        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];

		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);
		$this->out_data['con_page'] = 'shike/application_record';
		$this->load->view('shike_default', $this->out_data);
	}
}