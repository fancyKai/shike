<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require_once 'log.php';
class merchant_userapi extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('session');
		//$this->load->library('user_agent');
	}
	
	public function index()
	{
		
	}
	public function get_session(){
		$authcode = $this->input->post("authcode");
		$passwd = $this->input->post("passwd");
		$telcode = $this->session->userdata("telcode");
		if($authcode != $telcode){
			$msg = "手机验证码错误";
			$res = 0;
		}else{
			$info = array("passwd"=>$passwd);
			$ress = $this->db->update("seller",$info,array("seller_id"=>1));
			$msg = "成功";
			$res = 1;
		}
		$result = array("msg"=>$msg,"res"=>$res);
		echo json_encode($result);

	}

	public function check_telcode(){
		$authcode = $this->input->post("authcode");
		$telcode = $this->session->userdata("telcode");
		if($authcode != $telcode){
			$msg = "手机验证码错误";
			$res = 0;
		}else{
			$this->session->set_userdata(array("settel_permission"=>1));
			$msg = "成功";
			$res = 1;
		}
		$result = array("msg"=>$msg,"res"=>$res);
		echo json_encode($result);

	}

	public function check_telcode2(){
		$authcode = $this->input->post("authcode");
		$telcode = $this->session->userdata("telcode");
		$phone = $this->input->post("phone");

		if($authcode != $telcode){
			$msg = "手机验证码错误";
			$res = 0;
		}elseif(!$this->session->userdata("settel_permission")){
			$msg = "未经允许的访问";
			$res = 0;
		}else{
			$info = array("tel"=>$phone);
			$ress = $this->db->update("seller",$info,array("seller_id"=>1));
			$msg = "成功";
			$res = 1;
		}
		$result = array("msg"=>$msg,"res"=>$res);
		//$result = array('authcode'=>$authcode,'telcode'=>$telcode,'phone'=>$phone);
		echo json_encode($result);

	}

	public function set_payPw(){
		$passwd = $this->input->post("passwd");
		$info = array("paypw"=>$passwd);
		$ress = $this->db->update("seller",$info,array("seller_id"=>1));
		echo json_encode($ress);
	}

	public function set_withdrawPw(){
		$passwd = $this->input->post("passwd");
		$info = array("withdrawpw"=>$passwd);
		$ress = $this->db->update("seller",$info,array("seller_id"=>1));
		echo json_encode($ress);
	}

	public function set_qq(){
		$qq = $this->input->post("qq");
		$info = array("qq"=>$qq);
		$ress = $this->db->update("seller",$info,array("seller_id"=>1));
		echo json_encode($ress);
	}
/*-----------------------------------------以下为私有方法---------------------------------------------------*/

}