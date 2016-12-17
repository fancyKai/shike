<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <title>商城头部</title>-->
    <!--避免浏览器兼容性的js-->
    <link rel="stylesheet" href="<?=base_url("css/mall/reset.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/header.css")?>">
</head>
<body>
<!--商城的头部-->
<div class="header">
    <!--顶部-->
    <div class="top">
        <div class="top_main">
            <ul>
                <li ><a href="../register/login.html">登录</a></li>
                <li><a href="../register/business_registration.html">商家注册</a></li>
                <li><a href="javascript:void(0);">注册试客</a></li>
                <li><a href="javascript:void(0);">帮助中心</a></li>
            </ul>
        </div>
    </div>
    <!--Logo和搜索框-->
    <div class="search">
        <div class="left">
            <img class="logo" onclick="location.href='../register/index.html'" src="<?=base_url("images/mall/logo_default.png")?>" alt="">
        </div>
        <div class="right">
            <ul class="nav left">
                <li class="nav_title_index"><a href=<?php echo base_url().'mall/homepage/index'; ?> >首页</a></li>
                <li class="nav_title"><a href=<?php echo base_url().'mall/homepage/newest'; ?> >最新试用</a></li>
                <li class="nav_title"><a href=<?php echo base_url().'mall/homepage/hottest'; ?> >最热试用</a></li>
            </ul>
            <div class="search_box left">
                <input type="text" style="margin-top: 7px;" placeholder="搜索" >
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url("js/mall/jquery-1.10.2.js")?>"></script>
<script>
    function conversion(i){

        $('.nav').mouseover(function(){
            $('.search .right ul').find('a').removeClass('header_active');
        });
        $('.nav').mouseout(function(){
            $('.search .right ul').find('a').removeClass('header_active');
            $('.search .right ul').find('a').eq(i).addClass('header_active');
        });
    }
</script>
</body>
</html>










