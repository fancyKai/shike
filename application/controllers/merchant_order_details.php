<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_order_details extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $order_id = $this->input->get('order_id');
        $this->out_data['order'] = $this->db->query("select * from sorder where order_id=$order_id")->row_array();

		$this->out_data['con_page'] = 'merchant/order_manage_details';
		$this->load->view('merchant_default', $this->out_data);
	}
}
