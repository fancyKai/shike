<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    //试客注册页
    public function shike_register()
    {
        $this->load->view('mall/login_header');
        $this->load->view('mall/shike_register');
        $this->load->view('mall/footer');
    }

    //商家注册页
    public function merchant_register()
    {
        $this->load->view('mall/login_header');
        $this->load->view('mall/merchant_register');
        $this->load->view('mall/footer');
    }

    //检查用户名是否重复
    public function check_username()
    {
        $user_name = $this->input->post('user_name');
        $type = $this->input->post('type');
        if($type == 1)
        {
            //注册试客
            $res = $this->db->query("select * from user where user_name = '$user_name'")->row_array();
        }elseif($type == 2)
        {
            //注册商家
            $res = $this->db->query("select * from seller where user_name = '$user_name'")->row_array();
        }
        if(count($res))
        {
            $data = array(
                'success'=>false,
                'code'=>1,//用户名已被注册
                'data'=>$this->out_data
            );
        }else
        {
            $data = array(
                'success'=>true,
                'code'=>0,//用户名已被注册
                'data'=>$this->out_data
            );
        }
        echo json_encode($data);
    }

    //注册试客
    public function register_shike()
    {
        $user_name = $this->input->post('user_name');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $user_qq = $this->input->post('user_qq');
        $verification_code = $this->input->post('verification_code');
        //判断手机号是否注册
        $res = $this->db->query("select * from user where phone = $phone")->row_array();
        $res2 = $this->db->query("select * from seller where tel = $phone")->row_array();
        if(count($res) || count($res2))
        {
            $data = array(
                'success'=>false,
                'code'=>1,//手机已注册
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit ;
        }
        //TODO 验证验证码
        $password = md5($password);
        $temp = array(
            'user_name'=>$user_name,
            'phone'=>$phone,
            'user_qq'=>$user_qq,
            'password'=>$password
        );
        $this->db->insert('user',$temp);
        $user_id = $this->insert_id();
        //TODO 登录
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }

    //注册商家
    public function register_merchant()
    {
        $user_name = $this->input->post('user_name');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $user_qq = $this->input->post('user_qq');
        $verification_code = $this->input->post('verification_code');
        //判断手机号是否注册
        $res = $this->db->query("select * from user where phone = $phone")->row_array();
        $res2 = $this->db->query("select * from seller where tel = $phone")->row_array();
        if(count($res) || count($res2))
        {
            $data = array(
                'success'=>false,
                'code'=>1,//手机已注册
                'data'=>$this->out_data
            );
            echo json_encode($data);
            exit ;
        }
        //TODO 验证验证码
        $password = md5($password);
        $temp = array(
            'user_name'=>$user_name,
            'tel'=>$phone,
            'qq'=>$user_qq,
            'passwd'=>$password
        );
        $this->db->insert('seller',$temp);
        $data = array(
            'success'=>true,
            'code'=>0,
            'data'=>$this->out_data
        );
        echo json_encode($data);
    }
}