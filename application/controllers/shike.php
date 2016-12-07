<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shike extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// echo 2;die();
		$this->out_data['con_page'] = 'home';
		$this->load->view('default', $this->out_data);
	}
}
