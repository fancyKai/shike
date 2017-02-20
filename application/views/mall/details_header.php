<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--    <title>商城头部</title>-->
    <!--避免浏览器兼容性的js-->
    <link rel="stylesheet" href="<?=base_url("css/mall/index.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/reset.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/header.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/modal_alert.css")?>">
</head>
<body>
<!--商城的头部-->
<div class="header">
    <!--顶部-->
    <div class="top">
        <div class="top_main">
            <ul>
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
                    echo '<li><a href="'.base_url('login/logout').'">退出</a></li>';
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
        <div class="left"  style="padding-top: 9px;">
            <img class="logo" onclick="location.href='<?php echo base_url().''; ?>'" src="<?=base_url("images/mall/xqy_logo_default.png")?>" alt="">
            <span class="details_title">商品详情</span>
        </div>
        <div class="right">
            <ul class="nav left">
                <li class="nav_title_index"><a data-type="1" href=<?php echo base_url().''; ?> >首页</a></li>
                <li class="nav_title"><a data-type="2" href=<?php echo base_url().'mall/homepage/classify/2/11'; ?>>最新试用</a></li>
                <li class="nav_title"><a data-type="3" href=<?php echo base_url().'mall/homepage/classify/3/11'; ?>>最热试用</a></li>
                <!--                <li class="nav_title"><a href=--><?php //echo base_url().'mall/homepage/newest'; ?><!-- >最新试用</a></li>-->
                <!--                <li class="nav_title"><a href=--><?php //echo base_url().'mall/homepage/hottest'; ?><!-- >最热试用</a></li>-->
            </ul>
            <div class="search_box left">
                <input type="text" style="margin-top: 7px;" placeholder="搜索" >
            </div>
        </div>
    </div>
    <div class="line"></div>
</div>
<script src="<?=base_url("js/mall/jquery-1.10.2.js")?>"></script>
<script src="<?=base_url("js/mall/modal_scrollbar.js")?>"></script>
<script src="<?=base_url("js/mall/return_top.js")?>"></script>

<script src="<?=base_url("js/mall/bootstrap-transition.js")?>"></script>
<script src="<?=base_url("js/mall/bootstrap-carousel.js")?>"></script>
<script src="<?=base_url("js/mall/mask_layer.js")?>"></script>
<script src="<?=base_url("js/common.js")?>"></script>
<script>
    function conversion(i){

        $('.search .nav').mouseover(function(){
            $('.search .right ul').find('a').removeClass('header_active');
        });

        $('.search .nav').mouseout(function(){
            $('.search .right ul').find('a').removeClass('header_active');
            $('.search .right ul').find('a').eq(i).addClass('header_active');
        });

        $('.search_box input').on('click',function(){
            return false;
        })

        $('.search_box').on('click',function(){
            console.log($('.search_box input').val());
            var search = $('.search_box input').val();
            if(search === '')
            {

            }else
            {
                var url = "<?=base_url('mall/homepage/search/')?>";
                url = url + search;
                location.href = url;
            }
        })

        $('.search_box.left input').on('keydown',function(){
            if(event.keyCode == 13)
            {
                var search = $('.search_box input').val();
                if(search === '')
                {

                }else
                {
                    var url = "<?=base_url('mall/homepage/search/')?>";
                    url = url + search;
                    location.href = url;
                }
            }
        })

    }

    function la(birth) {
        var now = new Date();
        var days = parseInt((now - birth) / 24 / 3600 / 1000);
        console.log(days);
        var number = new Array('jd1', 'jd2', 'jd3', 'jd4', 'jd5', 'jd6', 'jd7');
//          初始的情况
        $('.progress_bar').last().find('img').attr('src', base_url+'images/mall/sc_bg_' + number[days] + '_selected.png');
        console.log(base_url+'images/mall/sc_bg_' + number[days] + '_selected.png');
//            鼠标移入时的图片
        $('.progress_bar').last().mouseover(function () {
            var imgValue = base_url+'images/mall/sc_bg_' + number[days] + '_default.png';
            $(this).find('img').attr('src', imgValue);
        });
//            鼠标移除时的图片
        $('.progress_bar').last().mouseout(function () {
            var imgValue = base_url+'images/mall/sc_bg_' + number[days] + '_selected.png';
            $(this).find('img').attr('src', imgValue);
        });
        if (days > 7) {
            alert('下线');
            $('.change').css('display', 'none');

        }
    }
</script>
</body>
</html>