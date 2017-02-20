<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends MY_Controller
{
    private $classify_a = array(
        1=>'女装',
        2=>'男装',
        3=>'美妆',
        4=>'鞋包配饰',
        5=>'居家生活',
        6=>'数码电器',
        7=>'母婴儿童',
        8=>'户外运动',
        9=>'食品酒水',
        10=>'其他'
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->change_status();
        $newest_list = $this->db->query("select * from activity where status = 3 and isreal = 1 order by time_3 DESC limit 10")->result_array();
        foreach($newest_list as $k=>$v)
        {
            $newest_list[$k]['start_time'] = strtotime($v['time_3'])*1000;
            $newest_list[$k]['isApply'] = $this->isApply($v['act_id']);
        }
        $this->out_data['newest_list'] = $newest_list;
        $recommend_list = $this->db->query("select * from activity where status = 3  and isreal = 1 order by apply_amount ASC limit 100")->result_array();
        foreach($recommend_list as $k=>$v)
        {
            $recommend_list[$k]['start_time'] = strtotime($v['time_3'])*1000;
            $recommend_list[$k]['isApply'] = $this->isApply($v['act_id']);
        }
        $this->out_data['recommend_list'] = $recommend_list;
        $this->out_data['recommend_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        if(!empty($_SESSION['shike_login']) or !empty($_SESSION['merchant_login']))
        {
            if($_SESSION['shike_login'])
            {
                $user_type = 1;//试客
                $user_id = $this->session->userdata('user_id');
                $msg = $this->db->query("select * from message where user_id = $user_id and user_type = 1 and status = 0 and title like '%中奖%'")->result_array();
                $is_msg = count($msg)?1:0;
            }else
            {
                $user_type = 2;//商家
                //$user_id = $this->session->userdata('seller_id');
                //$msg = $this->db->query("select * from message where user_id = $user_id and user_type = 0 and status = 0")->result_array();
                $is_msg = 0;
            }
        }else
        {
            $user_type = 0;//未登录
            $is_msg = 0;
        }
        //公告
        $affiche_details = $this->db->query("select * from message_type order by time DESC limit 3")->result_array();
        $this->out_data['affiche'] = $affiche_details;
        $this->out_data['msg_info']['user_type'] = $user_type;
        $this->out_data['msg_info']['is_msg'] = $is_msg;
        /*echo json_encode($this->out_data);
        exit;*/
        $this->load->view('mall/header');
        $this->load->view('mall/index',$this->out_data);
        $this->load->view('mall/footer');
    }


    //平台所有状态变更函数

    public function change_status()
    {
        $this->change_act_status();
        $this->change_order_status();
        $this->change_discount_status();
        $this->change_apply_status();
    }
    //activity表的状态变更
    public function change_act_status()
    {
        $date = date('Y-m-d H:i:s',time());
        $where = "UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(gene_time))>172800 and status=1 ";
        $res = $this->db->update("activity",array("status"=>5),$where);
        $where = "UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time_3))>604800 and status=3 ";
        $res = $this->db->update("activity",array("status"=>4),$where);
    }

    //sorder表中的状态变更
    public function change_order_status()
    {
        $date = date('Y-m-d H:i:s',time());
        $sorders = $this->db->query("select * from sorder where UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time))>172800 and status=4")->result_array();
        foreach ($sorders as $v) {
            $seller_info = $this->db->query("select * from seller where seller_id={$v['seller_id']}")->row_array();
            $info = $arrayName = array('avail_deposit' => $seller_info['avail_deposit']+$v['real_paymoney']*1.05);
            $res = $this->db->update("seller", $info, array("seller_id"=>$seller_info['seller_id']));
            $real_paymoney = $v['unit_price']*$v['buy_sum'];
            $info = array('money' => $real_paymoney, 
                          'money_type' => 2,
                          'processfee' => 0,
                          'money_remain' => $seller_info['avail_deposit']+$real_paymoney,
                          'time' => date('Y-m-d H:i:s',time()),
                          'flowid' => '123',
                          'status' => 1,
                          'seller_id' => $seller_info['seller_id'],
                          'user_type' => 0,
                          'remarks' => 6);
            $res = $this->db->insert("platformorder",$info);
            $info = array('money' => $real_paymoney*0.05, 
                          'money_type' => 2,
                          'processfee' => 0,
                          'money_remain' => $seller_info['avail_deposit']+$real_paymoney*1.05,
                          'time' => date('Y-m-d H:i:s',time()),
                          'flowid' => '123',
                          'status' => 1,
                          'seller_id' => $seller_info['seller_id'],
                          'user_type' => 0,
                          'remarks' => 7);
            $res = $this->db->insert("platformorder",$info);
        }
        $where = "UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time))>172800 and status=4 ";
        $res = $this->db->update("sorder",array("status"=>8),$where);
        $where = "UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time_2))>172800 and status=2 ";
        $res = $this->db->update("sorder",array("status"=>5),$where);
        $sorders = $this->db->query("select * from sorder where UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time_3))>172800 and status=3")->result_array();
        foreach ($sorders as $v) {
            $user_info = $this->db->query("select * from user where user_id={$v['user_id']}")->row_array();
            $info = array('money_use'=>$user_info['money_use']+$v['real_paymoney'],
                          'money_return'=>$user_info['money_return']-$v['real_paymoney'],
                          'return_num' => $user_info["return_num"]-1);
            $this->db->update("user",$info,array("user_id"=>$v['user_id']));
            $info = array('money' => $v['real_paymoney'], 
                          'money_type' => 2,
                          'processfee' => 0,
                          'money_remain' => $user_info['money_use']+$v['real_paymoney'],
                          'time' => date('Y-m-d H:i:s',time()),
                          'flowid' => '123',
                          'status' => 1,
                          'seller_id' => $v['user_id'],
                          'user_type' => 1,
                          'remarks' => 1);
            $res = $this->db->insert("platformorder",$info);
            //商家担保金返现
            $seller_info = $this->db->query("select * from seller where seller_id={$v['seller_id']}")->row_array();
            $info = $arrayName = array('avail_deposit' => $seller_info['avail_deposit']+$v['real_paymoney']*0.05);
            $res = $this->db->update("seller", $info, array("seller_id"=>$seller_info['seller_id']));
            $info = array('money' => $v['real_paymoney']*0.05, 
                          'money_type' => 2,
                          'processfee' => 0,
                          'money_remain' => $seller_info['avail_deposit']+$v['real_paymoney']*0.05,
                          'time' => date('Y-m-d H:i:s',time()),
                          'flowid' => '123',
                          'status' => 1,
                          'seller_id' => $seller_info['seller_id'],
                          'user_type' => 0,
                          'remarks' => 7);
            $res = $this->db->insert("platformorder",$info);
        }
        $where = "UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time_3))>172800 and status=3 ";
        $res = $this->db->update("sorder",array("status"=>7),$where);
    }

    //discount表的状态变更
    public function change_discount_status()
    {
        $date = date('Y-m-d H:i:s',time());
        
        $where = "(UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time))>172800) and status = 1 and click = 0";
        $res = $this->db->update("discount",array("status"=>3),$where);
        $where = "(UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(time))>172800) and status = 1 and click = 1";
        $res = $this->db->update("discount",array("status"=>2),$where);
    }

    //apply表的状态变更
    public function change_apply_status()
    {
        $date = date('Y-m-d H:i:s',time());
        $where = "(UNIX_TIMESTAMP('{$date}')-(UNIX_TIMESTAMP(apply_time))>172800) and apply_status != 3 and apply_status !=4 ";
        $res = $this->db->update("apply",array("apply_status"=>2),$where);
    }

    //某用户是否申请过
    function IsApply($act_id)
    {
        if(isset($_SESSION['user_id']))
        {
            $user_id = $_SESSION['user_id'];
            $apply_info = $this->db->query("select * from apply where user_id = $user_id and act_id = $act_id")->row_array();
            $is_apply = count($apply_info)?1:0;
        }else{
            $is_apply = 0;
        }
        return $is_apply;
    }

}