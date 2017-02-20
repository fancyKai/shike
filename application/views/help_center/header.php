<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>帮助中心</title>
    <!--避免浏览器兼容性的js-->
    <link rel="stylesheet" href="<?=base_url('/css/mall/reset.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/merchant_header.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/shike_center.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/reset_content.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/service_agreement.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/winning_miji.css')?>">
</head>
<body>
<!--商城的头部-->
<div class="header">
    <!--顶部-->
    <div class="top">
        <div class="top_main">
            <ul>
                <li ><a href="<?=base_url('')?>">返回首页</a></li>
                <?php
                //echo json_encode($_SESSION);
                if(!empty($_SESSION['shike_login']) or !empty($_SESSION['merchant_login']))
                {
                    if($_SESSION['shike_login'])
                    {
                        echo '<li><a href="'.base_url('shike_personal').'">欢迎您：<span>'.$_SESSION['user_name'].'<img src="'.base_url("images/mall/nav_icon_tx_default.png").'" alt=""></span></a></li>';
                    }else
                    {
                        echo '<li><a href="'.base_url('merchant_personal').'">欢迎您：<span>'.$_SESSION['user_name'].'<img src="'.base_url("images/mall/nav_icon_tx_default.png").'" alt=""></span></a></li>';
                    }
                    echo '<li><a href="'.base_url('login/logout').'">登出</a></li>';
                }else
                {
                    echo '<li><a href="'.base_url('login/index').'">登录</a></li>';
                    echo '<li><a href="'.base_url('mall/register/merchant_register').'">注册商家</a></li>';
                    echo '<li><a href="'.base_url('mall/register/shike_register').'">注册试客</a></li>';
                }
                ?>
                <li><a href="<?=base_url('mall/help_center/help_center')?>">帮助中心</a></li>
            </ul>
        </div>
    </div>
    <!--Logo和搜索框-->
    <div class="search">
        <div class="left" style="padding-top: 9px;">
            <img class="logo" onclick="location.href='<?=base_url('')?>'" src="<?=base_url('/images/mall/xqy_logo_default.png')?>" alt="">
            <span class="details_title">帮助中心</span>
        </div>
    </div>
    <div class="line"></div>
</div>


