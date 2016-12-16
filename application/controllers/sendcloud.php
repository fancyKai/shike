<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require_once 'log.php';
class sendcloud extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('session');
		//$this->load->library('user_agent');
	}
	
	public function index()
	{
		
		$tel = $this->input->post('tel');
        $code = "123456";
        $res = array("code"=>$code,"result"=>"true");
        $this->session->set_userdata(array("telcode"=>$code));
        echo json_encode($res);
	}


/*-----------------------------------------以下为私有方法---------------------------------------------------*/

}