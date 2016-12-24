<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-Type: text/html; charset=GBK");
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
		//$tel = $this->input->get('tel');
		$tel = $this->input->post('tel');
		$code = rand(1000,9999);
		$url="http://utf8.sms.webchinese.cn/?Uid=91shike&Key=6dbcefa96f64859e24cb&smsMob=$tel&smsText=验证码：$code";
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$res = curl_exec($ch);
		curl_close($ch);
		$this->session->set_userdata(array("telcode"=>$code));
		// if(function_exists('file_get_contents'))
		// {
		// 	$file_contents = file_get_contents($url);
		// }
		echo $res;
		// $tel = $this->input->post('tel');
  //       $code = "123456";
  //       $res = array("code"=>$code,"result"=>"true");
  //       $this->session->set_userdata(array("telcode"=>$code));
  //       echo json_encode($res);

// if(function_exists('file_get_contents'))
// {
// $file_contents = file_get_contents($url);
// }
// else
// {
// $ch = curl_init();
// $timeout = 5;
// curl_setopt ($ch, CURLOPT_URL, $url);
// curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
// $file_contents = curl_exec($ch);
// curl_close($ch);
// }
// return $file_contents;
// }
	}

/*-----------------------------------------以下为私有方法---------------------------------------------------*/

}