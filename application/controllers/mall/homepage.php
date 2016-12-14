<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class homepage extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->out_data['newest_list'] = $this->db->query("select * from activity where status = 3 order by gene_time DESC limit 8")->result_array();
        $this->out_data['recommend_list'] = $this->db->query("select * from activity where status = 3 order by apply_amount ASC limit 100")->result_array();
        /*echo json_encode($this->out_data['newest_list']);
        exit;*/
        $this->load->view('mall/header');
        $this->load->view('mall/index',$this->out_data);
        $this->load->view('mall/footer');
    }

    public function hottest()
    {
        $this->load->view('mall/header');
        $this->load->view('mall/hottest_try');
        $this->load->view('mall/footer');
    }
}