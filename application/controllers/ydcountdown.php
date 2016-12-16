<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');
//require_once 'log.php';
class ydcountdown extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->library('user_agent');
	}

	
	public function index()
	{
		$this->out_data['remain_seconds'] = time();
		$this->load->view("ydcount",$this->out_data);

	}


/*-----------------------------------------以下为私有方法---------------------------------------------------*/

}