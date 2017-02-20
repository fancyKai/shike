<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class applyTry extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //是否申请过
    public function isApply()
    {
        $act_id = $this->input->post('act_id');
        if(empty($_SESSION['merchant_login']) and empty($_SESSION['shike_login']))
        {
            $data = array(
                'success'=>false,
                'code'=>2,//未登录
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit;
        }
        if($_SESSION['merchant_login'])
        {
            $data = array(
                'success'=>false,
                'code'=>5,//商家不能申请
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit;
        }
        $user_id = $this->session->userdata('user_id');
        $user_info = $this->db->query("select * from user where user_id = $user_id")->row_array();
        switch($user_info['taobao_status'])
        {
            case 0:
                $data = array(
                    'success'=>false,
                    'code'=>3,//未绑定淘宝
                    'data'=>$this->out_data
                );
                echo json_encode($data);
                exit;
                break;
            case 1:
                $data = array(
                    'success'=>false,
                    'code'=>4,//淘宝审核中
                    'data'=>$this->out_data
                );
                echo json_encode($data);
                exit;
                break;
            case 2:
                break;
            default:
                break;
        }
        $res = $this->db->query("select * from apply where act_id = $act_id and user_id = $user_id")->row_array();
        if(count($res))
        {
            $data = array(
                'success'=>false,
                'code'=>1,//已申请过
                'data'=>$this->out_data
            );
        }else
        {
            //这周周一
            $period = date("w") - 1;
            $start = date("Y-m-d 00:00:00",strtotime("-".$period."day", time()));
            $user_info = $this->db->query("select * from user where user_id = $user_id")->row_array();
            if($user_info['level'] == 1)
            {
                $apply_info = $this->db->query("select * from apply where user_id = $user_id and apply_time > $start")->row_array();
                if(count($apply_info))
                {
                    $data = array(
                        'success'=>false,
                        'code'=>6,//一周内申请过
                        'data'=>$this->out_data
                    );
                }
            }else{
                $data = array(
                    'success'=>true,
                    'code'=>0,
                    'data'=>$this->out_data
                );
            }
        }
        echo json_encode($data);
    }

    //第一步
    public function applyTry_one($act_id)
    {
        $this->out_data['product_details'] = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
        $this->out_data['act_id'] = $act_id;
        $user_id = $this->session->userdata('user_id');
        $user_info = $this->db->query("select * from user where user_id = $user_id")->row_array();
        $this->out_data['user_info'] = $user_info;
        $this->load->view('mall/details_header');
        $this->load->view('mall/applyTry_one',$this->out_data);
        $this->load->view('mall/footer');
    }

    //第二步
    public function applyTry_two($act_id)
    {
        $this->out_data['product_details'] = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
        $this->out_data['act_id'] = $act_id;
        $seller_id = $this->out_data['product_details']['seller_id'];
        $shop_name = $this->out_data['product_details']['shopname'];
        $shop_info = $this->db->query("select * from shop where seller_id = {$seller_id} and shop_name = '$shop_name'")->row_array();
        $this->out_data['shop_info'] = $shop_info;
        $this->load->view('mall/details_header');
        $this->load->view('mall/applyTry_two',$this->out_data);
        $this->load->view('mall/footer');
    }

    //第三步
    public function applyTry_three($act_id)
    {
        $this->out_data['product_details'] = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
        $this->out_data['act_id'] = $act_id;
        $this->load->view('mall/details_header');
        $this->load->view('mall/applyTry_three',$this->out_data);
        $this->load->view('mall/footer');
    }

    //申请试用
    public function apply_product()
    {
        $act_id = $this->input->post('act_id');
        $user_id = $this->session->userdata('user_id');
        $res = $this->db->query("select * from apply where act_id = $act_id and user_id = $user_id")->row_array();
        if(count($res))
        {
            $data = array(
                'success'=>false,
                'code'=>2,//已经申请过
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit;
        }
        $product_details = $this->db->query("select * from activity where act_id = {$act_id}")->row_array();
        $product_name = $product_details['product_name'];
        $shopname = $product_details['shopname'];
        $platformid = $product_details['platformid'];
        $amount_perorder = $product_details['buy_sum'];
        $price = $product_details['unit_price'];
        $apply_time = date('Y-m-d H:i:s',time());
        $apply_status = 1;
        $picture_url = $product_details['picture_url'];
        $temp = array(
            'act_id'=>$act_id,
            'user_id'=>$user_id,
            'product_name'=>$product_name,
            'shopname'=>$shopname,
            'platformid'=>$platformid,
            'amount_perorder'=>$amount_perorder,
            'price'=>$price,
            'apply_time'=>$apply_time,
            'apply_status'=>$apply_status,
            'picture_url'=>$picture_url
        );
        $this->db->insert('apply',$temp);
        $apply_id = $this->db->insert_id();
        $this->db->query("update activity set apply_count = apply_count + 1 where act_id = $act_id");
        if($apply_id)
        {
            $data = array(
                'success'=>true,
                'code'=>0,
                'data'=>$this->out_data
            );
        }else
        {
            $data = array(
                'success'=>false,
                'code'=>1,
                'data'=>$this->out_data
            );
        }
        echo json_encode($data);
    }
}