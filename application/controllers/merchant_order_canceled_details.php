<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_order_canceled_details extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{


		$this->out_data['con_page'] = 'merchant/order_canceled_details';
		$this->load->view('merchant_default', $this->out_data);
	}
}
