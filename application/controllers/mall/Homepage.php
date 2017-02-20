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
        $this->out_data['msg_info']['user_type'] = $user_type;
        $this->out_data['msg_info']['is_msg'] = $is_msg;
        /*echo json_encode($this->out_data);
        exit;*/
        $this->load->view('mall/header');
        $this->load->view('mall/index',$this->out_data);
        $this->load->view('mall/footer');
    }

    //获取推荐试用商品
    public function getRecommend()
    {
        $page = $this->input->post('page');
        //$limit = 100;
        $limit = 2;
        $start = ($page - 1) * $limit;
        $recommend_list = $this->db->query("select * from activity where status = 3  and isreal = 1 order by apply_amount ASC limit $start, $limit")->result_array();
        foreach($recommend_list as $k=>$v)
        {
            $recommend_list[$k]['start_time'] = strtotime($v['time_3'])*1000;
            $recommend_list[$k]['isApply'] = $this->isApply($v['act_id']);
        }
        $this->out_data['recommend_list'] = $recommend_list;
        $this->out_data['recommend_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->result_array();
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    public function hottest()
    {
        $this->out_data['hottest_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        $this->load->view('mall/header');
        $this->load->view('mall/hottest',$this->out_data);
        $this->load->view('mall/footer');
    }

    //获取最热试用商品 废弃
    public function getHottest()
    {
        $page = $this->input->post('page');
        $limit = 2;
        $start = ($page - 1) * $limit;
        $this->out_data['hottest_list'] = $this->db->query("select * from activity where status = 3 and isreal = 1 order by apply_amount DESC limit $start , $limit")->result_array();
        $this->out_data['hottest_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //最新试用
    public function newest()
    {
        $this->out_data['newest_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        $this->load->view('mall/header');
        $this->load->view('mall/newest',$this->out_data);
        $this->load->view('mall/footer');
    }

    //获取最新试用商品 废弃
    public function getNewest()
    {
        $page = $this->input->post('page');
        $limit = 2;
        $start = ($page - 1) * $limit;
        $this->out_data['newest_list'] = $this->db->query("select * from activity where status = 3  and isreal = 1 order by time_3 DESC limit $start , $limit")->result_array();
        $this->out_data['newest_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 ")->row_array();
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //商品分类页
    public function classify($type,$classify)
    {
        //$this->out_data['classify_list'] = $this->db->query("select * from activity where status = 3 and product_classify = $classify order by time_3 ASC limit $start , $limit")->result_array();
        if($classify == 11)//全部
        {
            $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1")->row_array();
        }else
        {
            $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_classify = $classify")->row_array();
        }
        $this->out_data['classify'] = $classify;
        $this->out_data['type'] = $type;
        $this->load->view('mall/details_header');
        $this->load->view('mall/classify_page',$this->out_data);
        $this->load->view('mall/footer');
    }

    //获取分类商品
    public function getClassify()
    {
        $classify = $this->input->post('classify');
        $page = $this->input->post('page');
        $type = $this->input->post('type');
        $limit = 2;
        $start = ($page - 1) * $limit;
        if($type == 1)
        {
            if($classify == 11)
            {
                $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1")->row_array();
                $classify_list = $this->db->query("select * from activity where status = 3  and isreal = 1 order by time_3 ASC limit $start , $limit")->result_array();
            }else
            {
                $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_classify = $classify")->row_array();
                $classify_list = $this->db->query("select * from activity where status = 3  and isreal = 1 and product_classify = $classify order by time_3 ASC limit $start , $limit")->result_array();
            }
        }elseif($type == 2)//最新
        {
            if($classify == 11)
            {
                $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1")->row_array();
                $classify_list = $this->db->query("select * from activity where status = 3  and isreal = 1 order by time_3 DESC limit $start , $limit")->result_array();
            }else
            {
                $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_classify = $classify")->row_array();
                $classify_list = $this->db->query("select * from activity where status = 3  and isreal = 1 and product_classify = $classify order by time_3 DESC limit $start , $limit")->result_array();
            }
        }elseif($type == 3)//最热
        {
            if($classify == 11)
            {
                $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1")->row_array();
                $classify_list = $this->db->query("select * from activity where status = 3  and isreal = 1 order by apply_count DESC limit $start , $limit")->result_array();
            }else
            {
                $this->out_data['classify_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_classify = $classify")->row_array();
                $classify_list = $this->db->query("select * from activity where status = 3  and isreal = 1 and product_classify = $classify order by apply_count DESC limit $start , $limit")->result_array();
            }
        }
        foreach($classify_list as $k=>$v)
        {
            $classify_list[$k]['start_time'] = strtotime($v['time_3'])*1000;
            $classify_list[$k]['isApply'] = $this->isApply($v['act_id']);
        }
        $this->out_data['classify_list'] = $classify_list;
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //搜索页
    public function search($search)
    {
        $search = urldecode($search);
        $page = 1;
        $limit = 2;
        $start = ($page - 1) * $limit;
        //$this->out_data['search_list'] = $this->db->query("select * from activity where status = 3 and isreal = 1 and product_name like '%$search%' order by time_3 DESC limit $start , $limit")->result_array();
        $this->out_data['search_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_name like '%$search%' ")->row_array();
        $this->out_data['search'] = $search;
        $this->load->view('mall/details_header');
        $this->load->view('mall/search',$this->out_data);
        $this->load->view('mall/footer');
    }

    //分页刷新搜索
    public function searchList()
    {
        $search = $this->input->post('search');
        $page = $this->input->post('page');
        $limit = 2;
        $start = ($page - 1) * $limit;
        $search_list = $this->db->query("select * from activity where status = 3 and isreal = 1 and product_name like '%$search%' order by time_3 DESC limit $start , $limit")->result_array();
        foreach($search_list as $k=>$v)
        {
            $search_list[$k]['start_time'] = strtotime($v['time_3'])*1000;
            $search_list[$k]['isApply'] = $this->isApply($v['act_id']);
        }
        $this->out_data['search_list'] = $search_list;
        $this->out_data['search_count'] = $this->db->query("select count(*) as count from activity where status = 3 and isreal = 1 and product_name like '%$search%'")->row_array();
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //商品详情
    public function productDetails($act_id)
    {
        //$act_id = $this->input->post('data');
        $need = 'platformid,product_classify,act_id,picture_url, product_name, unit_price, freight, buy_sum, apply_amount, color, size, time_3, product_details,apply_count';
        $product_details= $this->db->query("select $need from activity where act_id = $act_id and isreal = 1")->row_array();
        $product_details['product_classify'] = $this->classify_a[$product_details['product_classify']];
        $product_details['isApply'] = $this->isApply($act_id);
        $this->out_data['product_details'] = $product_details;
        //申请人数
        $applyed_num = $this->db->query("select count(1) as count from apply where act_id = $act_id")->row_array();
        $this->out_data['product_details']['apply_count'] = $applyed_num['count'];
        $need2 = 'platformid, time_3,act_id, picture_url,product_name, unit_price, apply_amount, freight,apply_count';
        $seller_else = $this->db->query("select $need2 from activity where status = 3 and isreal = 1 and act_id != $act_id order by time_3 DESC limit 2")->result_array();
        foreach($seller_else as $k=>$v)
        {
            $seller_else[$k]['start_time'] = strtotime($v['time_3'])*1000;
            $seller_else[$k]['isApply'] = $this->isApply($v['act_id']);
        }
        $this->out_data['seller_else'] = $seller_else;
        $apply_else = $this->db->query("
        select a1.act_id, a1.platformid, a1.time_3, a1.product_name,a1.picture_url, a1.unit_price, a1.apply_count, a1.apply_amount, a1.freight
        from apply as a2
        join activity as a1 on a2.act_id =  a1.act_id
        where a2.act_id = $act_id and a2.act_id != $act_id and a1.isreal = 1
        order by a1.time_3 DESC
        limit 2
        ")->result_array();
        foreach($apply_else as $k=>$v)
        {
            $apply_else[$k]['start_time'] = strtotime($v['time_3'])*1000;
            $apply_else[$k]['isApply'] = $this->isApply($v['act_id']);
        }
        $this->out_data['apply_else'] = $apply_else;
        //已申请试用用户
        $this->out_data['apply_user'] = $this->db->query("
        select u.user_name
        from apply as a
        join user as u on a.user_id = u.user_id
        where a.act_id = $act_id
        order by a.apply_time DESC
        ")->result_array();
        /*echo json_encode($this->out_data);
        exit;*/
        $this->load->view('mall/details_header');
        $this->load->view('mall/details',$this->out_data);
        $this->load->view('mall/footer');
    }

    //公告
    public function affiche_details($id)
    {
        $details = $this->db->query("select * from message_type where message_id = $id")->row_array();
        $this->out_data['details'] = $details;
        $this->load->view('mall/details_header');
        $this->load->view('mall/affiche_details',$this->out_data);
        $this->load->view('mall/footer');
    }

    //中奖秘笈
    public function winning_miji()
    {
        $this->load->view('mall/details_header');
        $this->load->view('mall/winning_miji',$this->out_data);
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