<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shike_privilege_buyManage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_shike_login();
	}

	public function index()
	{

		$user_id = $this->session->userdata('user_id');

		$this->change_status();

		$page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
		$limit = 5;
		$start = ($page - 1)*$limit;
		$orderwhere = " where user_id=$user_id ";
		$order_status = $this->input->get('order_status');
		$this->out_data['order_status'] = $order_status;
		if(!$order_status){
			$base_url = "/shike_privilege_buyManage/?";
		}else{
			$orderwhere .= " and status=1";
			$base_url = "/shike_privilege_buyManage/?order_status=".$order_status;
		}

		$count = $this->db->query("select count(*) as count from discount".$orderwhere)->row_array();
		$count = $count['count'];
		$this->out_data['discount_list'] = $this->db->query("select * from discount".$orderwhere." order by apply_time desc limit {$start},{$limit}")->result_array();
        $this->out_data['sum_discount_list'] = $this->db->query("select count(*) as count from discount where user_id=$user_id")->row_array();
        $this->out_data['sum_1_discount_list'] = $this->db->query("select count(*) as count from discount where status=1 and user_id=$user_id")->row_array();

        $this->out_data['qq'] = $this->db->query("select qq from qqkefu where type = 1")->row_array();
		$this->out_data['qq'] = $this->out_data['qq']['qq'];

		$this->out_data['pagin'] = parent::get_pagin($base_url, $count, $limit, 3,  true);

		$this->out_data['con_page'] = 'shike/privilege_buyManage';
		$this->load->view('shike_default', $this->out_data);
	}

	public function change_status(){
		$date = date('Y-m-d H:i:s',time());
		$where = "(UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time))>172800) and status = 1 and click = 0";
		$res = $this->db->update("discount",array("status"=>3),$where);
		$where = "(UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time))>172800) and status = 1 and click = 1";
		$res = $this->db->update("discount",array("status"=>2),$where);
	}

	public function click_ok(){
		$discount_id = $this->input->post('discount_id');
		$res = $this->db->update("discount",array("click"=>'1'),array('discount_id'=>$discount_id));
		$win_url = $this->db->query("select win_url from discount where discount_id={$discount_id}")->row_array();
		echo json_encode($win_url);
		// echo 1;
	}

}