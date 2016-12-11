<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_store extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        // $user_id = $this->session->userdata('user_id')

        // $users = $this->db->query("select * from user where user_id='1'")->row_array();
        // echo $users['user_id'];

        $this->out_data['shops'] = $this->db->query("select * from shop where seller_id='1'")->result_array();
		$this->out_data['con_page'] = 'merchant/store';
		$this->load->view('merchant_default', $this->out_data);
	}

	function change_content()
	{
		$shop_id = $this->input->post('shop_id');
		$chargeqq = $this->input->post('chargeqq');
		$chargewx = $this->input->post('chargewx');
		$chargetel = $this->input->post('chargetel');

		$info = array('chargeqq' => $chargeqq);
		if ($chargewx){
			$info['chargewx'] = $chargewx;
		}
		if ($chargetel){
			$info['chargetel'] = $chargetel;
		}
		$this->db->update('shop', $info, array('shop_id' => $shop_id));
		exit();
	}
    function submit_new_shop()
    {
    	$seller_id = "1";
    	$platform_id = "1";
    	$logo_id = "2";
    	$shop_link = $this->input->post('shop_link');
        $shop_name = $this->input->post('shop_name');
        $wangwang  = $this->input->post('wangwang');
        $good_url  = $this->input->post('good_url');
        $chargeqq  = $this->input->post('chargeqq');
        $chargewx  = $this->input->post('chargewx');
        $chargetel = $this->input->post('chargetel');
        $time = date('y-m-d h:i:s',time());
        $info = array('seller_id' => $seller_id,
        	          'shop_link' => $shop_link,
        	          'shop_name' => $shop_name,
        	          'wangwang' => $wangwang,
                      'platform_id' => $platform_id,
                      'logo_id' => $logo_id,
                      'chargeqq' => $chargeqq,
                      'chargewx' => $chargewx,
                      'chargetel' => $chargetel,
                      'bind_time' => $time
                      );
        $this->db->insert('shop', $info);
        exit();
    }

}
