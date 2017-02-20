<?php
/**
 * Created by PhpStorm.
 * User: WJW
 * Date: 2017/1/3
 * Time: 18:53
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Shell extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->dir = date("Y_m", time());
        $this->file = date("Y_m_d", time());
        if (!file_exists(APPPATH . 'logs/shell' . $this->dir)) {
            mkdir(APPPATH . 'logs/shell' . $this->dir, 0755);
        }
    }

    //7天后下线商品 每分钟执行
    ///usr/bin/php ../var/www/html/shike/index.php shell underCarriage
    public function underCarriage()
    {
        $start_time = time() - 7*24*3600;
        $this->db->query("update activity set status = 5 where unix_timestamp(gene_time) <= $start_time and status = 3 and isreal = 1");
        error_log(date("Y-m-d H:i:s", time()) . " sql:  " . $this->db->last_query(). chr(10), 3, APPPATH . "logs/shell" . $this->dir . "/underCarriage_" . $this->file . ".php");
    }

    //抽奖 每天00:00-00:01
    public function drawLottery2()
    {
        $act_info = $this->db->query("select * from activity where status = 3 and isreal = 1")->result_array();
        foreach($act_info as $k=>$v)
        {
            $act_id = $v['act_id'];
            $apply_amount = $v['apply_amount'];//总份数
            $applyed_count = $v['apply_count'];//总申请人数

            $time_3 = strtotime($v['time_3']);//发布时间
            $apply_info = $this->db->query("select a.apply_time, u.level,u.user_id from apply as a
                join user as u on a.user_id = u.user_id
                where a.act_id = $act_id and a.apply_status = 1")
                ->result_array();
            $first_apply = $this->db->query("select apply_time from apply where act_id = $act_id order by apply_time ASC limit 1")->row_array();
            $first_apply_time = strtotime($first_apply['apply_time']);//第一个申请时间
            foreach($apply_info as $key=>$value)
            {
                $apply_time = $value['apply_time'];//用户申请时间
                $user_level = $value['level'];
                $user_id = $value['user_id'];
                $draw_time = date("Y-m-d 00:00:00",strtotime("$apply_time +3 day"));//用户抽奖时间
                $startdate = strtotime(date("Y-m-d 00:00:00",strtotime($apply_time)));//申请时间
                $now = strtotime(date("Y-m-d 00:00:00",time()));//当前时间
                $days=round(($now-$startdate)/3600/24) ;
                $vip_user = array();
                $common_user = array();
                if($user_level == 1)
                {
                    array_push($common_user,$user_id);
                }elseif($user_level == 2)
                {
                    array_push($vip_user,$user_id);
                }
                echo json_encode($common_user);
                echo json_encode($vip_user);
            }
            /*echo json_encode($apply_info);
            exit*/;

        }
    }

    public function drawLottery()
    {
        echo "time: ".date("Y-m-d H:i:s", time())."\r\n";
        $draw_act_info = $this->db->query("SELECT act_id FROM apply where apply_status = 1 GROUP BY act_id")->result_array();
        /*echo json_encode($act_info);
        exit;*/
        foreach($draw_act_info as $k=>$v)
        {
            $act_id = $v['act_id'];
            $act_info = $this->db->query("select * from activity where act_id = $act_id")->row_array();
            //echo json_encode($apply_info);
            $vip_user = array();
            $common_user = array();
            $apply_amount = $act_info['apply_amount'];//总份数
            $time_3 = $act_info['time_3'];//发布时间
            $first_apply = $this->db->query("select apply_time from apply where act_id = $act_id order by apply_time ASC limit 1")->row_array();
            $first_apply_time = strtotime(date("Y-m-d 00:00:00", strtotime($first_apply['apply_time'])));//第一个申请时间
            $first_apply_date = $first_apply['apply_time'];
            $end_time = date("Y-m-d 23:59:59", strtotime("$first_apply_date +3 day"));//抽奖截止时间

            $apply_info = $this->db->query("select a.* ,u.user_id, u.level from apply as a
            join user as u on a.user_id = u.user_id
            where a.act_id = $act_id and a.apply_time <= '$end_time'
            ")->result_array();
            //$apply_count = $this->db->query("select count(1) as count from apply where act_id = $act_id and apply_time <= '$end_time'")->row_array();
            $applyed_count = count($apply_info);//有效总申请人数
            $now = strtotime(date("Y-m-d 00:00:00", time()));//当前时间
            $first2now = round(($now - $first_apply_time) / 3600 / 24);//第一天时间距现在天数
            echo "first2now: ". $first2now."\r\n";
            if($first2now == 3)
            {
                //echo json_encode($apply_info);
                foreach($apply_info as $key=>$value) {
                    /*$apply_time = $value['apply_time'];//用户申请时间
                    $user_level = $value['level'];
                    $user_id = $value['user_id'];
                    $startdate = strtotime(date("Y-m-d 00:00:00", strtotime($apply_time)));//申请时间
                    $apply2now = round(($now - $startdate) / 3600 / 24);//用户申请时间距离今天时间
                    $apply2first = round(($startdate - $first_apply_time) / 3600 / 24);//申请距离第一个申请天数
                    if (($apply2first <= 2) && ($apply2now == 3)) {

                    }*/
                    $user_level = $value['level'];
                    $user_id = $value['user_id'];
                    if ($user_level == 1) {
                        array_push($common_user, $user_id);
                    } elseif ($user_level == 2) {
                        array_push($vip_user, $user_id);
                    }
                }
                /*echo json_encode($common_user);
                echo json_encode($vip_user);*/

                $draw_user = $this->choujiang($vip_user,$common_user,$apply_amount);
                echo "draw_user: ".json_encode($draw_user)."\r\n";
                echo "act_id: ".$act_id."\r\n";
                //免费试用
                foreach($draw_user[0] as $key=>$value)
                {
                    $draw_user_id = $value;
                    $this->db->query("update apply set apply_flag = 3 where user_id = $draw_user_id and act_id = $act_id");
                    $shike_info = $this->db->query("select user_name from user where user_id = $user_id")->row_array();
                    //insert sorder
                    $user_id = $draw_user_id;
                    $seller_id = $act_info['seller_id'];
                    $apply_info_temp = $this->db->query("select apply_time from apply where act_id = $act_id and user_id = $user_id")->row_array();
                    $time = $apply_info_temp['apply_time'];
                    $product_name = $act_info['product_name'];
                    $shop_name = $act_info['shopname'];
                    $shop_info = $this->db->query("select * from shop where shop_name = '$shop_name' and seller_id = $seller_id")->row_array();
                    $shop_id = $shop_info['shop_id'];
                    $data = array(
                        'user_id'=>$user_id,
                        'seller_id'=>$seller_id,
                        'shikename'=>$shike_info['user_name'],
                        'apply_time'=>$time,
                        'time'=>date('Y-m-d H:i:s',time()),
                        'product_name'=>$product_name,
                        'shop_id'=>$shop_id,
                        'platform_id'=>$act_info['platformid'],
                        'product_link'=>$act_info['product_link'],
                        'status'=>4,
                        'shopname'=>$shop_name,
                        'product_img'=>$act_info['picture_url'],
                        'size'=>$act_info['size'],
                        'color'=>$act_info['color'],
                        'act_id'=>$act_id,
                        'freight'=>$act_info['freight'],
                        'unit_price'=>$act_info['unit_price'],
                        'buy_sum'=>$act_info['buy_sum'],
                        'amount'=>$act_info['apply_amount'],
                        'product_classify'=>$act_info['product_classify'],
                        'flag'=>1
                    );
                    $this->db->insert('sorder',$data);
                    //中奖提示
                    $message_time = date("Y-m-d H:i:s");
                    $msg  = array(
                        'description'=>'您申请的'.$product_name.'已中奖，请尽快到中奖管理中领取，若48小时内未领取，将取消您的中将资格。',
                        'message_time'=>$message_time,
                        'user_id'=>$user_id,
                        'status'=>0,
                        'user_type'=>1,
                        'title'=>"中奖通知",
                        'message_id'=>0
                    );
                    $this->db->insert('message',$msg);
                }
                //优惠购买
                foreach($draw_user[1] as $key=>$value)
                {
                    $draw_user_id = $value;
                    $this->db->query("update apply set apply_flag = 4 where user_id = $draw_user_id and act_id = $act_id");
                    //insert discount
                    $seller_id = $act_info['seller_id'];
                    $apply_info_temp = $this->db->query("select apply_time from apply where act_id = $act_id and user_id = $user_id")->row_array();
                    $time = $apply_info_temp['apply_time'];
                    $product_name = $act_info['product_name'];
                    $shop_name = $act_info['shopname'];
                    $shop_info = $this->db->query("select * from shop where shop_name = '$shop_name' and seller_id = $seller_id")->row_array();
                    $shop_id = $shop_info['shop_id'];
                    $data = array(
                        'act_id'=>$act_id,
                        'apply_time'=>$time,
                        'time'=>date('Y-m-d H:i:s',time()),
                        'product_name'=>$product_name,
                        'shopname'=>$shop_name,
                        'platform_id'=>$act_info['platformid'],
                        'amount_perorder'=>$act_info['buy_sum'],
                        'buy_sum'=>$act_info['unit_price'],
                        'product_link'=>$act_info['product_link'],
                        'status'=>1,
                        'product_img'=>$act_info['picture_url'],
                        'win_money'=>$act_info['win_money'],
                        'win_url'=>$act_info['win_url'],
                        'seller_id'=>$seller_id,
                        'user_id'=>$draw_user_id,
                        'flag'=>1,
                        'click'=>0
                    );
                    $this->db->insert('discount',$data);
                    //中奖提示
                    $message_time = date("Y-m-d H:i:s");
                    $msg  = array(
                        'description'=>'您申请的'.$product_name.'已中奖，请尽快到中奖管理中领取，若48小时内未领取，将取消您的中将资格。',
                        'message_time'=>$message_time,
                        'user_id'=>$user_id,
                        'status'=>0,
                        'user_type'=>1,
                        'title'=>"中奖通知",
                        'message_id'=>0
                    );
                    $this->db->insert('message',$msg);
                }
                //未中奖
                $this->db->query("update apply set apply_flag = 2 where apply_flag !=3 and apply_flag != 4 and act_id = $act_id");
                /*echo json_encode($vip_user);
                echo json_encode($common_user);
                echo json_encode($draw_user);*/
            }
        }
    }

    function choujiang($a, $b, $win_count)
    {
        /*$win_count = 4;
        $a = array(1, 6, 9);
        $b = array(7, 5,10,14,12,11,2);*/
        $c = array('a');
        $d = array('a');
        $applyed_num = count($a) + count($b);
        if($applyed_num <= $win_count/2)
        {
            $c = array_merge($a, $b);
            $d = array();
        }elseif($applyed_num <= $win_count)
        {
            while(count($c)-1 < $win_count/2)
            {
                $r = mt_rand(1,2*count($a)+count($b));
                //echo $r.'<br>';
                if($r <= count($a)*2)
                {
                    $index = ($r%2)?(integer)$r/2:$r/2-1;
                    if(array_search($a[$index],$c))
                    {

                    }else
                    {
                        array_push($c,$a[$index]);
                    }
                }else
                {
                    $index = $r - 2 * count($a) - 1;
                    if(array_search($b[$index],$c))
                    {

                    }else
                    {
                        array_push($c,$b[$index]);
                    }
                }
            }
            while(count($d)-1 != $applyed_num - $win_count/2)
            {
                $r = mt_rand(1,2*count($a)+count($b));
                //echo $r.'<br>';
                if($r <= count($a)*2)
                {
                    $index = ($r%2)?(integer)$r/2:$r/2-1;
                    if(array_search($a[$index],$d) || array_search($a[$index],$c))
                    {

                    }else
                    {
                        array_push($d,$a[$index]);
                    }
                }else
                {
                    $index = $r - 2 * count($a) - 1;
                    if(array_search($b[$index],$d) || array_search($b[$index],$c))
                    {

                    }else
                    {
                        array_push($d,$b[$index]);
                    }
                }
            }
            array_shift($c);
            array_shift($d);
        }else
        {
            while(count($c) <= $win_count/2)
            {
                $r = mt_rand(1,2*count($a)+count($b));
                //echo $r.'<br>';
                if($r <= count($a)*2)
                {
                    $index = ($r%2)?(integer)$r/2:$r/2-1;
                    if(array_search($a[$index],$c))
                    {

                    }else
                    {
                        array_push($c,$a[$index]);
                    }
                }else
                {
                    $index = $r - 2 * count($a) - 1;
                    if(array_search($b[$index],$c))
                    {

                    }else
                    {
                        array_push($c,$b[$index]);
                    }
                }
            }
            while(count($d) <= $win_count/2)
            {
                $r = mt_rand(1,2*count($a)+count($b));
                //echo $r.'<br>';
                if($r <= count($a)*2)
                {
                    $index = ($r%2)?(integer)$r/2:$r/2-1;
                    if(array_search($a[$index],$d) || array_search($a[$index],$c))
                    {

                    }else
                    {
                        array_push($d,$a[$index]);
                    }
                }else
                {
                    $index = $r - 2 * count($a) - 1;
                    if(array_search($b[$index],$d) || array_search($b[$index],$c))
                    {

                    }else
                    {
                        array_push($d,$b[$index]);
                    }
                }
            }
            array_shift($c);
            array_shift($d);
        }
        return array($c ,$d);
    }

    public function test()
    {
        $data = array(
            'user_id'=>9,
            'act_id'=>79
        );
        $this->db->insert('apply',$data);
    }

}