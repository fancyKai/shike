<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_message_center extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

        // $act_id = $this->input->get('act_id');
        $seller_id = "1";
        $this->out_data['messages'] = $this->db->query("select * from message where user_id=$seller_id and user_type='0'")->result_array();
		$this->out_data['con_page'] = 'merchant/message_center';
		$this->load->view('merchant_default', $this->out_data);
	}
}
