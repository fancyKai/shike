<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike_member_recharge extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		$this->out_data['con_page'] = 'shike/member_recharge';
		$this->load->view('shike_default', $this->out_data);
	}
}