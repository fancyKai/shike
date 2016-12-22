<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_try_winningManage extends MY_Controller {

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
			$base_url = "/shike_try_winningManage/?";
		}else{
			$orderwhere .= " and status=".$order_status;
			$base_url = "/shike_try_winningManage/?order_status=".$order_status;
		}
		$count = $this->db->query("select count(*) as count from sorder".$orderwhere)->row_array();
		$count = $count['count'];
		$this->out_data['order_list'] = $this->db->query("select * from sorder".$orderwhere." limit {$start},{$limit}")->result_array();
        $this->out_data['sum_order_list'] = $this->db->query("select count(*) as count from sorder where user_id=$user_id")->row_array();
        $this->out_data['sum_4_order_list'] = $this->db->query("select count(*) as count from sorder where status=4 and user_id=$user_id")->row_array();
        $this->out_data['sum_6_order_list'] = $this->db->query("select count(*) as count from sorder where status=6 and user_id=$user_id")->row_array();
        $this->out_data['qq'] = $this->db->query("select qq from qqkefu")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];

		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);

		$this->out_data['con_page'] = 'shike/try_winningManage';
		$this->load->view('shike_default', $this->out_data);
	}
}