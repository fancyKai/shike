<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class merchant_bankcard_manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $seller_id = "1";
        $bankcard = $this->db->query("select * from bankbind where user_id=$seller_id and type='0'")->row_array();
        if(!$bankcard){
            $this->out_data['con_page'] = 'merchant/bankcard_manage';
		    $this->load->view('merchant_default', $this->out_data);
        }else{
        	$this->out_data['bankcard'] = $bankcard;
            $this->out_data['con_page'] = 'merchant/bound_bankCard';
		    $this->load->view('merchant_default', $this->out_data);
        }
		
	}

	public function delete_bankcard()
	{
		$id = $this->input->post('bankcard_id');
		$this->db->delete('bankbind', array('id' => $id));
		$result['status'] = true;
		echo json_encode($result);
	}
}
