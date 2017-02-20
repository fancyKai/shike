<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kq extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		//parent::check_permission('admin');
	}

	public function index(){

	}
	public function send()
	{
		$dir = date("Y_m", time());
		$file = date("Y_m_d", time());
		if (!file_exists(APPPATH . 'logs/' . $dir)) {
			mkdir(APPPATH . 'logs/' . $dir, 0755);
		}
		//error_log(date("Y-m-d H:i:s", time()) . "  send:   " . json_encode($_REQUEST) . chr(10), 3, APPPATH . "logs/" . $dir . "/post_info_" . $file . ".php");
		error_log(date("Y-m-d H:i:s", time()) . "  send:   " . json_encode($_SESSION) . chr(10), 3, APPPATH . "logs/" . $dir . "/post_info_" . $file . ".php");


		$bankId = $this->input->get('bankId');

		$this->out_data['merchantAcctId'] = "1008325264301";
		//编码方式，1代表 UTF-8; 2 代表 GBK; 3代表 GB2312 默认为1,该参数必填。
		$this->out_data['inputCharset'] = "1";
		//接收支付结果的页面地址，该参数一般置为空即可。
		$this->out_data['pageUrl'] = "";
		//服务器接收支付结果的后台地址，该参数务必填写，不能为空。
		$this->out_data['bgUrl'] = "http://www.shike8888.com/kq/receive";
		//网关版本，固定值：v2.0,该参数必填。
		$this->out_data['version'] =  "v2.0";
		//语言种类，1代表中文显示，2代表英文显示。默认为1,该参数必填。
		$this->out_data['language'] =  "1";
		//签名类型,该值为4，代表PKI加密方式,该参数必填。
		$this->out_data['signType'] =  "4";
		//支付人姓名,可以为空。
		$this->out_data['payerName']= ""; 
		//支付人联系类型，1 代表电子邮件方式；2 代表手机联系方式。可以为空。
		$this->out_data['payerContactType'] =  "1";
		//支付人联系方式，与payerContactType设置对应，payerContactType为1，则填写邮箱地址；payerContactType为2，则填写手机号码。可以为空。
		$this->out_data['payerContact'] =  "2532987@qq.com";
		//商户订单号，以下采用时间来定义订单号，商户可以根据自己订单号的定义规则来定义该值，不能为空。
		$this->out_data['orderId'] = date("YmdHis");
		//订单金额，金额以“分”为单位，商户测试以1分测试即可，切勿以大金额测试。该参数必填。
		$this->out_data['orderAmount'] = $this->input->get('money');
		//订单提交时间，格式：yyyyMMddHHmmss，如：20071117020101，不能为空。
		$this->out_data['orderTime'] = date("YmdHis");
		//商品名称，可以为空。
		$this->out_data['productName']= ''; 
		//商品数量，可以为空。
		$this->out_data['productNum'] = ''; 
		//商品代码，可以为空。
		$this->out_data['productId'] = '';
		//商品描述，可以为空。
		$this->out_data['productDesc'] = "";
		//扩展字段1，商户可以传递自己需要的参数，支付完快钱会原值返回，可以为空。
		$this->out_data['ext1'] = $this->input->get('ext1');
		//扩展自段2，商户可以传递自己需要的参数，支付完快钱会原值返回，可以为空。
		$ext2 = $this->input->get('ext2');
		if(isset($_SESSION['user_id']))
		{
			$user_id = $this->session->userdata('user_id');
		}else
		{
			$user_id = $this->session->userdata('seller_id');
		}
		$temp = array(
			'ext2'=>$ext2,
			'user_id'=>$user_id
		);
		//$this->out_data['ext2'] = json_encode($temp);
		$this->out_data['ext2'] = $ext2.'-'.$user_id;
		// $this->out_data['payType'] = "10";
		// $this->out_data['bankId'] = "ICBC";
		if($bankId){
			//支付方式，一般为00，代表所有的支付方式。如果是银行直连商户，该值为10，必填。
			$this->out_data['payType'] = "10";
			//银行代码，如果payType为00，该值可以为空；如果payType为10，该值必须填写，具体请参考银行列表。
			$this->out_data['bankId'] = $bankId;
		}else{
            //支付方式，一般为00，代表所有的支付方式。如果是银行直连商户，该值为10，必填。
			$this->out_data['payType'] = "00";
			//银行代码，如果payType为00，该值可以为空；如果payType为10，该值必须填写，具体请参考银行列表。
			$this->out_data['bankId'] = "";
		}
		//同一订单禁止重复提交标志，实物购物车填1，虚拟产品用0。1代表只能提交一次，0代表在支付不成功情况下可以再提交。可为空。
		$this->out_data['redoFlag'] = "";
		//快钱合作伙伴的帐户号，即商户编号，可为空。
		$this->out_data['pid'] = "";

		error_log(date("Y-m-d H:i:s", time()) . "  send-data:   " . json_encode($this->out_data) . chr(10), 3, APPPATH . "logs/" . $dir . "/post_info_" . $file . ".php");

		$kq_all_para=$this->kq_ck_null($this->out_data['inputCharset'],'inputCharset');
		$kq_all_para.=$this->kq_ck_null($this->out_data['pageUrl'],"pageUrl");
		$kq_all_para.=$this->kq_ck_null($this->out_data['bgUrl'],'bgUrl');
		$kq_all_para.=$this->kq_ck_null($this->out_data['version'],'version');
		$kq_all_para.=$this->kq_ck_null($this->out_data['language'],'language');
		$kq_all_para.=$this->kq_ck_null($this->out_data['signType'],'signType');
		$kq_all_para.=$this->kq_ck_null($this->out_data['merchantAcctId'],'merchantAcctId');
		$kq_all_para.=$this->kq_ck_null($this->out_data['payerName'],'payerName');
		$kq_all_para.=$this->kq_ck_null($this->out_data['payerContactType'],'payerContactType');
		$kq_all_para.=$this->kq_ck_null($this->out_data['payerContact'],'payerContact');
		$kq_all_para.=$this->kq_ck_null($this->out_data['orderId'],'orderId');
		$kq_all_para.=$this->kq_ck_null($this->out_data['orderAmount'],'orderAmount');
		$kq_all_para.=$this->kq_ck_null($this->out_data['orderTime'],'orderTime');
		$kq_all_para.=$this->kq_ck_null($this->out_data['productName'],'productName');
		$kq_all_para.=$this->kq_ck_null($this->out_data['productNum'],'productNum');
		$kq_all_para.=$this->kq_ck_null($this->out_data['productId'],'productId');
		$kq_all_para.=$this->kq_ck_null($this->out_data['productDesc'],'productDesc');
		$kq_all_para.=$this->kq_ck_null($this->out_data['ext1'],'ext1');
		$kq_all_para.=$this->kq_ck_null($this->out_data['ext2'],'ext2');
		$kq_all_para.=$this->kq_ck_null($this->out_data['payType'],'payType');
		$kq_all_para.=$this->kq_ck_null($this->out_data['bankId'],'bankId');
		$kq_all_para.=$this->kq_ck_null($this->out_data['redoFlag'],'redoFlag');
		$kq_all_para.=$this->kq_ck_null($this->out_data['pid'],'pid');
	

		$kq_all_para=substr($kq_all_para,0,strlen($kq_all_para)-1);


		
		/////////////  RSA 签名计算 ///////// 开始 //
		$fp = fopen("./99bill-rsa.pem", "r");
		$priv_key = fread($fp, 123456);
		fclose($fp);
		$pkeyid = openssl_get_privatekey($priv_key);

		// compute signature
		openssl_sign($kq_all_para, $signMsg, $pkeyid,OPENSSL_ALGO_SHA1);

		// free the key from memory
		openssl_free_key($pkeyid);

		 $this->out_data['signMsg'] = base64_encode($signMsg);
		/////////////  RSA 签名计算 ///////// 结束 //

		 $this->load->view('kqsend', $this->out_data);
	}

	public function ydlog($content){
		$fp = fopen("./log.txt", "w"); 
		fwrite($fp,$content);
		fclose($fp);
	}
	public function test(){
		$this->ydlog("aaaaa");
	}
	public function receive(){

		$this->ydlog('first');
		$this->ydlog(date('Y-m-d H:i:s',time()));
		$this->ydlog(json_encode($_SESSION));
		$this->ydlog(json_encode($_REQUEST));

		$dir = date("Y_m", time());
		$file = date("Y_m_d", time());
		if (!file_exists(APPPATH . 'logs/' . $dir)) {
			mkdir(APPPATH . 'logs/' . $dir, 0755);
		}
		error_log(date("Y-m-d H:i:s", time()) . "  first:   " . json_encode($_REQUEST) . chr(10), 3, APPPATH . "logs/" . $dir . "/post_info_" . $file . ".php");
		error_log(date("Y-m-d H:i:s", time()) . "  session:   " . json_encode($_SESSION) . chr(10), 3, APPPATH . "logs/" . $dir . "/post_info_" . $file . ".php");

		$kq_check_all_para=$this->kq_ck_null($_REQUEST['merchantAcctId'],'merchantAcctId');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['version'],'version');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['language'],'language');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['signType'],'signType');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['payType'],'payType');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['bankId'],'bankId');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['orderId'],'orderId');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['orderTime'],'orderTime');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['orderAmount'],'orderAmount');
	    //$kq_check_all_para.=$this->kq_ck_null($_REQUEST['bindCard'],'bindCard');
	    //$kq_check_all_para.=$this->kq_ck_null($_REQUEST['bindMobile'],'bindMobile');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['dealId'],'dealId');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['bankDealId'],'bankDealId');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['dealTime'],'dealTime');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['payAmount'],'payAmount');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['fee'],'fee');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['ext1'],'ext1');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['ext2'],'ext2');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['payResult'],'payResult');
		$kq_check_all_para.=$this->kq_ck_null($_REQUEST['errCode'],'errCode');
		$this->ydlog('second');
		//$this->ydlog($kq_check_all_para);
		$ext1 = $_REQUEST['ext1'];
		$ext2 = $_REQUEST['ext2'];
		$trans_body=substr($kq_check_all_para,0,strlen($kq_check_all_para)-1);
		$MAC=base64_decode($_REQUEST['signMsg']);

		$fp = fopen("./99bill.cert.rsa.20340630.cer", "r"); 
		$cert = fread($fp, 8192); 
		fclose($fp); 
		$pubkeyid = openssl_get_publickey($cert); 
		$ok = openssl_verify($trans_body, $MAC, $pubkeyid); 
		$this->ydlog(json_encode($_REQUEST));
		error_log(date("Y-m-d H:i:s", time()) . "  second:   " . json_encode($_REQUEST) . chr(10), 3, APPPATH . "logs/" . $dir . "/post_info_" . $file . ".php");
		//$this->ydlog($trans_body."signMsg=".$_REQUEST['signMsg']."\npubkeyid=".$pubkeyid."\nok=".$ok."\ncert".$cert."\nMac=".$MAC);
		if ($ok == 1) {
			switch($_REQUEST['payResult']){
				case '10':
					//此处做商户逻辑处理
						$rtnOK=1;
					//以下是我们快钱设置的show页面，商户需要自己定义该页面。
						$rtnUrl="http://www.shike8888.com/kq/show?msg=success";
						$flag = $_REQUEST['ext1'];
						$temp = explode('-',$ext2);
						$mess = $temp[0];
						$user_id = $temp[1];
						switch ($flag)
						{
							case 1:
								error_log(date("Y-m-d H:i:s", time()) . "  1:   " . $flag . chr(10), 3, APPPATH . "logs/" . $dir . "/post_info_" . $file . ".php");
								$this->pay_recharge_u($mess,$user_id);
								break;
							case 2:
								$this->pay_recharge_m($mess,$user_id);
								break;
							case 3:
								$this->check_recharge($user_id,$mess);
								break;
							default:
								break;
						}
						break;
				default:
						$rtnOK=0;
					//以下是我们快钱设置的show页面，商户需要自己定义该页面。
						$rtnUrl="http://www.shike8888.com/kq/show?msg=false";
						break;	
			}
		}else{
			$rtnOK=0;
			//以下是我们快钱设置的show页面，商户需要自己定义该页面。
			$rtnUrl="http://www.shike8888.com/kq/show?msg=error";
								
		}
		$this->out_data['rtnOK'] =$rtnOK;
		$this->out_data['rtnUrl'] =$rtnUrl;
		$this->load->view('kqreceive', $this->out_data);
	}

	public function show(){
		$this->out_data['dealId'] = $_REQUEST['dealId'];
		$this->out_data['orderId'] = $_REQUEST['orderId'];
		$this->out_data['orderAmount'] = $_REQUEST['orderAmount'];
		$this->out_data['orderTime'] = $_REQUEST['orderTime'];
		$this->out_data['msg'] = $_REQUEST['msg'];
        $this->out_data['flag'] = $_REQUEST['ext1'];
        $this->out_data['mess'] = $_REQUEST['ext2'];
        // var_dump($_REQUEST);
        //var_dump($this->out_data);die();
		$this->load->view('kqshow', $this->out_data);
	}
	private function kq_ck_null($kq_va,$kq_na){if($kq_va == ""){$kq_va="";}else{return $kq_va=$kq_na.'='.$kq_va.'&';}}

	private function pay_recharge_u($recharge_year,$user_id){
		//$recharge_year = $this->input->post('recharge_year');
		$dir = date("Y_m", time());
		$file = date("Y_m_d", time());
		error_log(date("Y-m-d H:i:s", time()) . "  user_id:   " . $user_id . chr(10), 3, APPPATH . "logs/" . $dir . "/post_info_" . $file . ".php");

		$user_info = $this->db->query("select * from user where user_id ={$user_id}")->row_array();
		error_log(date("Y-m-d H:i:s", time()) . "  user:   " . json_encode($user_info) . chr(10), 3, APPPATH . "logs/" . $dir . "/post_info_" . $file . ".php");
		if($user_info["level"] == 1){
			if($recharge_year == 1){
				$end_time = date('Y-m-d H:i:s',strtotime("+1month", time()));
				$open_duration = "1个月";
				$money = 20;
			}elseif ($recharge_year == 2) {
				$end_time = date('Y-m-d H:i:s',strtotime("+6month", time()));
				$open_duration = "6个月";
				$money = 100;
			}else{
				$end_time = date('Y-m-d H:i:s',strtotime("+1year", time()));
				$open_duration = "12个月";
				$money = 200;
			}
			$info = array('level' => 2,
					'vip_endtime' => $end_time);
			$this->db->update("user",$info,array("user_id"=>$user_id));
			$info = array('seller_id' => $user_id,
					'open_duration' => $open_duration,
					'end_time' => $end_time,
					'money' => $money,
					'charge_type' => 1,
					'status' => 1,
					'charge_time' => date('Y-m-d H:i:s',time()),
					'user_type' => 1);
			$res = $this->db->insert("seller_charge_order",$info);
		}else{
			if($recharge_year == 1){
				$end_time = date('Y-m-d H:i:s',strtotime("+1month", strtotime($user_info["vip_endtime"])));
				$open_duration = "1个月";
				$money = 20;
			}elseif ($recharge_year == 2) {
				$end_time = date('Y-m-d H:i:s',strtotime("+6month", strtotime($user_info["vip_endtime"])));
				$open_duration = "6个月";
				$money = 100;
			}else{
				$end_time = date('Y-m-d H:i:s',strtotime("+1year", strtotime($user_info["vip_endtime"])));
				$open_duration = "12个月";
				$money = 200;
			}
			$info = array('level' => 2,
					'vip_endtime' => $end_time);
			$this->db->update("user",$info,array("user_id"=>$user_id));
			$info = array('seller_id' => $user_id,
					'open_duration' => $open_duration,
					'end_time' => $end_time,
					'money' => $money,
					'charge_type' => 2,
					'status' => 1,
					'charge_time' => date('Y-m-d H:i:s',time()),
					'user_type' => 1);
			$res = $this->db->insert("seller_charge_order",$info);
		}
		//echo json_encode($res);
	}

	private function pay_recharge_m($recharge_year,$seller_id){
		/*$recharge_year = $this->input->post('recharge_year');
		$seller_id = $this->session->userdata('seller_id');*/
		$seller_info = $this->db->query("select * from seller where seller_id ={$seller_id}")->row_array();
		if($seller_info["level"] == 1){
			if($recharge_year == 1){
				$end_time = date('Y-m-d H:i:s',strtotime("+1year", time()));
				$open_duration = "1年";
				$money = 2288;
			}elseif ($recharge_year == 2) {
				$end_time = date('Y-m-d H:i:s',strtotime("+2year", time()));
				$open_duration = "2年";
				$money = 4576;
			}else{
				$end_time = date('Y-m-d H:i:s',strtotime("+3year", time()));
				$open_duration = "3年";
				$money = 6864;
			}
			$info = array('level' => 2,
					'end_time' => $end_time);
			$this->db->update("seller",$info,array("seller_id"=>$seller_id));
			$info = array('seller_id' => $seller_id,
					'open_duration' => $open_duration,
					'end_time' => $end_time,
					'money' => $money,
					'charge_type' => 1,
					'status' => 1,
					'charge_time' => date('Y-m-d H:i:s',time()),
					'user_type' => 0);
			$res = $this->db->insert("seller_charge_order",$info);
		}else{
			if($recharge_year == 1){
				$end_time = date('Y-m-d H:i:s',strtotime("+1year", strtotime($seller_info["end_time"])));
				$open_duration = "1年";
				$money = 2288;
			}elseif ($recharge_year == 2) {
				$end_time = date('Y-m-d H:i:s',strtotime("+2year", strtotime($seller_info["end_time"])));
				$open_duration = "2年";
				$money = 4576;
			}else{
				$end_time = date('Y-m-d H:i:s',strtotime("+3year", strtotime($seller_info["end_time"])));
				$open_duration = "3年";
				$money = 6864;
			}
			$info = array('level' => 2,
					'end_time' => $end_time);
			$this->db->update("seller",$info,array("seller_id"=>$seller_id));
			$info = array('seller_id' => $seller_id,
					'open_duration' => $open_duration,
					'end_time' => $end_time,
					'money' => $money,
					'charge_type' => 2,
					'status' => 1,
					'charge_time' => date('Y-m-d H:i:s',time()),
					'user_type' => 0);
			$res = $this->db->insert("seller_charge_order",$info);
		}
	}

	private function check_recharge($seller_id,$money){

		/*$seller_id = $this->session->userdata('seller_id');
		$money = $this->input->post('money');*/
		$sellerinfo = $this->db->query("select * from seller where seller_id ={$seller_id}")->row_array();

		$this->db->update('seller',array('avail_deposit' => $sellerinfo['avail_deposit']+$money),array('seller_id' => $seller_id));
		$info = array('money' => $money,
				'money_type' => 1,
				'processfee' => 0,
				'money_remain' => $sellerinfo['avail_deposit']+$money,
				'time' => date('Y-m-d H:i:s',time()),
				'flowid' => '123',
				'status' => 4,
				'seller_id' => $seller_id,
				'user_type' => 0,
				'remarks' => 3);
		$res = $this->db->insert("platformorder",$info);
		echo json_encode($res);

	}
}