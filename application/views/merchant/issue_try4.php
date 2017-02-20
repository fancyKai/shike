<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布试用</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/settings_trialNumber.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧店铺管理-->
        <div id="my_main" class="store_content left">
            <h1 class="title">发布试用</h1>
            <!--进度条-->
            <div class="progress_bar">
                <img src="images/merchant/sj_fbsy_bg_jdt_four_default.png" alt="">
            </div>
            <!--4.设置试用份数-->
            <div class="settings_trialNumber">
                <h2 class="title">4.设置试用份数</h2>
                <div class="trial_content">
                    <ul>
                        <li>
                            <img style="width: 80px;height: 80x" src="<?php echo $activity_list['picture_url'];?>" alt="">
                        </li>
                        <li>
                            <p>商品名称：<span><?php echo $activity_list['product_name']?></span></p>
                            <p>商品分类：<span><?php if($activity_list['product_classify']==1) {
                                    echo "女装";
                                }elseif ($activity_list['product_classify']==2) {
                                    echo "男装";
                                }elseif ($activity_list['product_classify']==3) {
                                    echo "美妆";
                                }elseif ($activity_list['product_classify']==4) {
                                    echo "鞋包配饰";
                                }elseif ($activity_list['product_classify']==5) {
                                    echo "居家生活";
                                }elseif ($activity_list['product_classify']==6) {
                                    echo "数码电器";
                                }elseif ($activity_list['product_classify']==7) {
                                    echo "母婴儿童";
                                }elseif ($activity_list['product_classify']==8) {
                                    echo "户外运动";
                                }elseif ($activity_list['product_classify']==9) {
                                    echo "食品酒水";
                                }elseif ($activity_list['product_classify']==10) {
                                    echo "其他";
                                }
                                ?></span></p>
                            <p>商品规格：<span><?php echo $activity_list['color']?>.<?php echo $activity_list['size']?></span></p>
                            <p>商品链接：<span><?php echo $activity_list['product_link']?></span></p>
                        </li>
                        <li>
                            <p>店铺名称：<span><?php echo $activity_list['shopname']?></span></p>
                            <p>平台：<span><?php echo($activity_list['platformid']==1?"淘宝":"天猫");?></span></p>
                            <p><span>通过<?php echo($activity_list['ser_platformid']==1?"淘宝":"天猫");?>自然搜索</span></p>
                        </li>
                        <li>
                            <p>商品关键词：<span><?php echo $activity_list['t_key_words']?></span></p>
                            <p>筛选列表：<span><?php echo $activity_list['t_classify1']?>、<?php echo $activity_list['t_classify2']?>、<?php echo $activity_list['t_classify3']?>、<?php echo $activity_list['t_classify4']?>、<?php echo $activity_list['t_classify5']?></span></p>
                            <p>折扣和服务：<span>24小时发货、货到付款</span></p>
                            <p>排列方式：<span>
                            <?php 
                            if($activity_list['t_sort']==1){
                                echo "综合排序";
                            }elseif($activity_list['t_sort']==2){
                                echo "销量从高到低";
                            }elseif($activity_list['t_sort']==3){
                                echo "信用从高到低";
                            }elseif($activity_list['t_sort']==4){
                                echo "价格从低到高";
                            }elseif($activity_list['t_sort']==5){
                                echo "价格从高到低";
                            }elseif($activity_list['t_sort']==6){
                                echo "总价从低到高";
                            }elseif($activity_list['t_sort']==7){
                                echo "总价从高到低";
                            }elseif($activity_list['t_sort']==8){
                                echo "人气从高到低";
                            }elseif($activity_list['t_sort']==9){
                                echo "新品排序";
                            }
                            ?>
                            </span></p>
                        </li>
                        <li>
                            <p>价格：<span>&yen;<?php echo $activity_list['margin']?></span></p>
                            <p>发货地：<span><?php echo $activity_list['t_delivery_place']?></span></p>
                            <p>商品运费：<span><?php if ($activity_list['freight']==0){echo "全国包邮";}else{echo $activity_list['freight'];}
                            ?></span></p>
                        </li>
                    </ul>
                    <div class="try_num">
                        <p>
                        投放试用总份数：
                        <input id="apply_amount" type="text" placeholder="份" onblur="get_right()" value="<?php echo $activity['apply_amount'];?>">
                        <b>（试用份数不得少于10份且必须为偶数）</b>
                        </p>
                        <p class="error_hint"><span id="apply_amount_error"></span></p>
                        <p class="different_good">
                           <b>1.免费试用商品<span id="free_count"></span>份</b>
                           <br/>
                           <b>2.优惠购买商品<span id="buy_count"></span>份</b>
                        </p>
                        <p>优惠券金额：
                            <input id="win_money" type="text" placeholder="元" value="<?php echo $activity['win_money'];?>"/>
                            <b>（优惠券金额必须大于商品价格的50%）</b>
                        </p>
                        <p class="discount_couponURL">
                            优惠券链接：<input id="win_url" type="text" value="<?php echo $activity['win_url'];?>">
                        </p>
                    </div>
                </div>

                <div class="notes">
                    <p>注意：<span>1、总份数必须为偶数，且不得少于10份；</span></p>
                    <p><span>2、优惠金额必须大于商品价格的50%；</span></p>
                    <p><span>3、优惠券链接必须是独家优惠券；</span></p>
                    <p><span>4、优惠券有效时间至少要12天以上；</span></p>
                    <p><span>5、优惠券每人领取数量可以设置1-2张，不用太多；</span></p>
                    <p><span>6、优惠券总数量不用设置太多，但是不能低于10份。</span></p>
                </div>


                <div class="nextStep_btn">
                    <input onclick="location.href='/merchant_issue_try3?act_id=<?php echo $act_id ?>'" type="button" value="上一步"/>
                    <input onclick="next_step();" type="button" value="下一步"/>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
       // $('#left_nav').load("../common/left_nav.html",function(){
                    $('.try_manage ul>li').find('a').eq(0).addClass('leftNav_active')
               // });

        $('[data-toggle="search"]').bind('click',function(){
            $(this).addClass('search_active');
            $(this).siblings().removeClass('search_active');
        });
        $('.by_taobao').click(function(){
            $('.tmall_content').slideUp();
            $('.taobao_content'). slideDown()
        });
        $('.by_tmall').click(function(){
            $('.taobao_content').slideUp();
            $('.tmall_content'). slideDown()
        });
        $('.checkbox').click(function(){
            $(this).toggleClass('search_active');
        });
    })
</script>
<script>
    function get_right(){
        var apply_amount = $("#apply_amount").val();
        if((apply_amount%2) != 0 || apply_amount<10){
            $("#apply_amount_error").text("投放份数不得少于10份且必须为偶数");
            return;
        }
        $("#apply_amount_error").text("");
        $("#free_count").text(apply_amount/2);
        $("#buy_count").text(apply_amount/2);
        return;
    }

    function next_step(){
        //var seller_id = <?php echo $seller_id ?>;

        var apply_amount = $("#apply_amount").val();
        if(apply_amount=='' || apply_amount==0){
            $("#apply_amount_error").text("投放数量不得为0");
            return;
        }else{
            $("#apply_amount_error").text("");
        }

        var act_id = "<?php echo $act_id ?>";
        var apply_amount = $("#apply_amount").val();
        var win_money = $("#win_money").val();
        var win_url = $("#win_url").val();
        $.ajax({
            url : admin.url+'merchant_issue_try4/update_fake_activity4',
            data:{act_id:act_id,apply_amount:apply_amount,
                  win_money:win_money,win_url:win_url},
            type : 'post',
            cache : false,
            success : function (data){
               console.log(data);
               location.href=admin.url+"merchant_issue_try5?act_id="+act_id;
            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }

    function check_apply_amount(){
        if($("#apply_amount").val() == ''){
            $("#apply_amount_error").css("display","inline-block");
        }else{
            $("#apply_amount_error").css("display","none");
        }
    }
</script>
</body>
</html>









