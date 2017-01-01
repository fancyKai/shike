<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_set_payPw extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::check_merchant_login();
	}

	public function index()
	{

		$this->out_data['con_page'] = 'merchant/set_payPw';
		$this->load->view('merchant_default', $this->out_data);
	}
}
