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
</head>
<body>
<!--商城的头部-->
<div class="header">
    <!--顶部-->
    <div class="top">
        <div class="top_main">
            <ul>
                <li ><a href="<?=base_url('mall/homepage/index')?>">返回首页</a></li>
                <li><a class="merchant_active" href="javascript:void(0);">无所谓A</a></li>
                <li><a href="javascript:void(0);">退出</a></li>
                <li><a href="<?=base_url('mall/help_center/help_center')?>">帮助中心</a></li>
            </ul>
        </div>
    </div>
    <!--Logo和搜索框-->
    <div class="search">
        <div class="left">
            <img class="logo" onclick="location.href='../register/index.html'" src="<?=base_url('/images/mall/xqy_logo_default.png')?>" alt="">
            <span class="details_title">帮助中心</span>
        </div>
    </div>
    <div class="line"></div>
</div>


