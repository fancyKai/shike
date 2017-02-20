<head>
    <meta charset="UTF-8">
    <title>申请试用</title>
    <link rel="stylesheet" href="<?=base_url('/css/mall/reset.css')?> ">
    <link rel="stylesheet" href="<?=base_url('/css/mall/apply_try.css')?>">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_content">
        <div class="location_title">
            <ul>
                <li>您的位置：</li>
                <li><a href="<?php echo base_url().''; ?>">首页</a></li>
                <li><img src="<?=base_url('/images/mall/icon_arrow_default.png')?>" alt=""></li>
                <li><a href="<?php echo base_url().'mall/homepage/productdetails/'.$act_id; ?>">商品详情</a></li>
                <li><img src="<?=base_url('/images/mall/icon_arrow_default.png')?>" alt=""></li>
                <li>申请试用</li>
            </ul>
        </div>
        <div class="step_introduce">
            <div class="step_picture">
                <img src="<?=base_url('/images/mall/sc_sqsy_bg_jdt1_default.png')?>" alt="">
            </div>
            <!--搜索商品-->
            <div class="search_good">
                <h1>1.搜索商品</h1>
                <?php
                    $plat = ($product_details['ser_platformid']==1)?"<p>第一步：请访问淘宝<b><a target='_blank' href='https://www.taobao.com'>www.taobao.com</a></b>，登录账号：<b>".$user_info['taobao_id']."</b>，并刷新淘宝页面确认账号是否已登录；</p>
                <p>第二步：淘宝搜索关键字：<b>".$product_details['t_key_words']."</b></p>":"<p>第一步：请访问天猫<b><a target='_blank' href='https://www.tmall.com'></a>www.tmall.com</b>，登录账号：<b>".$user_info['taobao_id']."</b>，并刷新天猫页面确认账号是否已登录；</p>
                <p>第二步：天猫搜索关键字：<b>".$product_details['t_key_words']."</b></p>";
                    echo $plat;
                ?>
                <p>第三步：搜索结果页筛选商品分类：<b><?php
                        $temp = $product_details['t_classify1'].$product_details['t_classify2'].$product_details['t_classify3'].$product_details['t_classify4'].$product_details['t_classify5'];
                        if(empty($temp))
                        {
                            echo "无筛选项";
                        }else
                        {
                            echo $product_details['t_classify1'].' '.$product_details['t_classify2'].' '.$product_details['t_classify3'].' '.
                                $product_details['t_classify4'].' '.$product_details['t_classify5'];
                        }
                        ?></b></p>
                <p>第四步：筛选价格区间为：<b><?php if(!(integer)$product_details['t_lower_price']&&!(integer)$product_details['t_higher_price'])
                        {
                            echo "无筛选项";
                        }else{
                            echo $product_details['t_lower_price'];
                            echo '-';
                            echo $product_details['t_higher_price'];
                        }
                        ?></b>，筛选商品所在地为：<b><?php echo empty($product_details['t_delivery_place'])?'无筛选项':$product_details['t_delivery_place']; ?></b></p>
                         <p>第五步：选择折扣和服务：<b>
                                 <?php
                                    $str = '';
                                    /*$str1 = ($product_details['dis_ser1'])?'包邮':'';
                                    $str2 = ($product_details['dis_ser2'])?'赠送退货运费险':'';
                                    $str3 = ($product_details['dis_ser3'])?'货到付款 ':'';
                                    $str4 = ($product_details['dis_ser4'])?'海外商品':'';
                                    $str5 = ($product_details['dis_ser5'])?'二手':'';
                                    $str6 = ($product_details['dis_ser6'])?'天猫':'';
                                    $str7 = ($product_details['dis_ser7'])?'正品保障':'';
                                    $str8 = ($product_details['dis_ser8'])?'二十四小时发货':'';
                                    $str9 = ($product_details['dis_ser9'])?'7天退换货':'';
                                    $str10 = ($product_details['dis_ser10'])?'旺旺在线':'';
                                    $str11 = ($product_details['dis_ser11'])?'新品':'';
                                    $str12 = ($product_details['dis_ser12'])?'新到商品':'';
                                    $str13 = ($product_details['dis_ser13'])?'折扣':'';
                                    $str14 = ($product_details['dis_ser14'])?'搭配减价':'';
                                    $str15 = ($product_details['dis_ser15'])?'满就减':'';*/

                                 $str = ($product_details['dis_ser1'])?'包邮、'.$str:$str;
                                 $str = ($product_details['dis_ser2'])?'赠送退货运费险、'.$str:$str;
                                 $str = ($product_details['dis_ser3'])?'货到付款 、'.$str:$str;
                                 $str = ($product_details['dis_ser4'])?'海外商品、'.$str:$str;
                                 $str = ($product_details['dis_ser5'])?'二手、'.$str:$str;
                                 $str = ($product_details['dis_ser6'])?'天猫、'.$str:$str;
                                 $str = ($product_details['dis_ser7'])?'正品保障、'.$str:$str;
                                 $str = ($product_details['dis_ser8'])?'二十四小时发货、'.$str:$str;
                                 $str = ($product_details['dis_ser9'])?'7天退换货、'.$str:$str;
                                 $str = ($product_details['dis_ser10'])?'旺旺在线、'.$str:$str;
                                 $str = ($product_details['dis_ser11'])?'新品、'.$str:$str;
                                 $str = ($product_details['dis_ser12'])?'新到商品、'.$str:$str;
                                 $str = ($product_details['dis_ser13'])?'折扣、'.$str:$str;
                                 $str = ($product_details['dis_ser14'])?'搭配减价、'.$str:$str;
                                 $str = ($product_details['dis_ser15'])?'满就减、'.$str:$str;
                                 if($str)
                                 {
                                     echo $str;
                                 }else
                                 {
                                     echo '无筛选项';
                                 }
                                 ?>
                                 </b></p>
            </div>
            <p class="step_btn">
                <input onclick="location.href='<?=base_url('mall/applyTry/applyTry_two').'/'.$act_id?>'" class="next_step" type="button" value="确认商品信息">
            </p>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="<?=base_url('/js/mall/jquery-1.10.2.js')?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/details_header.html',function(){

        });*/
        $('.header .line').css({'background':'-webkit-linear-gradient(#eaeaea, #f5f5f5)'});
        $('.search .right ul').find('a').removeClass('header_active');
        $('.search .right ul').find('a').eq(0).addClass('header_active');
        conversion(0)
        //$('#footer').load('../common/footer_other.html');
    })
</script>
</body>
</html>