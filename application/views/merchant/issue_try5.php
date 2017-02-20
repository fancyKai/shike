<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布试用</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/confirm_payment.css">
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
                <img src="images/merchant/sj_fbsy_bg_jdt_five_default.png" alt="">
            </div>
            <!--4.设置试用份数-->
            <div class="confirm_payment">
                <h2 class="title">5.订单确认支付</h2>
                <div class="payment_content">
                    <h3>订单信息</h3>
                    <table>
                        <tr>
                            <th></th>
                            <th>商品单价</th>
                            <th>免单数量</th>
                            <th>备注</th>
                            <th>合计</th>
                        </tr>
                        <tr>
                            <td>商品押金</td>
                            <td rowspan="2"><span><?php echo $activity['unit_price']*$activity['buy_sum'];?>元</span></td>
                            <td rowspan="2"><span><?php echo $activity['apply_amount']/2;?>单</span></td>
                            <td>
                                <p><span>商品押金=商品单价*免单数量</span></p>
                                <p>试用完成后，平台直接将押金返给试客</p>
                            </td>
                            <td><b><?php echo $activity['margin']*$activity['apply_amount']/2;?>元</b></td>
                        </tr>
                        <tr>
                            <td>试用担保金</td>
                           <!--<td><span><?php echo $activity['margin'];?>元</span></td>-->
                             <!--<td><span><?php echo $activity['apply_amount']/2;?>单</span></td>-->
                            <td>
                                <p><span>试用担保金=商品押金*5%</span></p>
                                <p>试用完成后，平台会自动将试用担保金返回到您的账户可用押金中。</p>
                            </td>
                            <td><b><?php echo $activity['margin']*$activity['apply_amount']/2*0.05;?>元</b></td>
                        </tr>
                    </table>
                    <p class="total">订单合计：<span><?php echo $activity['margin']*$activity['apply_amount']/2*1.05;?>元</span></p>
                    <h3>进行支付</h3>
                    <p class="deposit">使用押金支付：可用押金：<span>&yen; <?php echo $sellerinfo['avail_deposit'];?> </span></p>
                    <p id="moneyerror" style="color:red"></p>
                    <div class="payment_code">
                        <p>请输入支付密码：</p>
                        <table>
                            <tr>
                                <td><input onkeyup="keyup_pwd1()" onfocus="focus_pwd1()" maxlength="1" id="pwd1" type="text"/></td>
                                <td><input onkeyup="keyup_pwd2()" onfocus="focus_pwd2()" maxlength="1" id="pwd2" type="text"/></td>
                                <td><input onkeyup="keyup_pwd3()" onfocus="focus_pwd3()" maxlength="1" id="pwd3" type="text"/></td>
                                <td><input onkeyup="keyup_pwd4()" onfocus="focus_pwd4()" maxlength="1" id="pwd4" type="text"/></td>
                                <td><input onkeyup="keyup_pwd5()" onfocus="focus_pwd5()" maxlength="1" id="pwd5" type="text"/></td>
                                <td><input onkeyup="keyup_pwd6()" onfocus="focus_pwd6()" maxlength="1" id="pwd6" type="text"/></td>
                            </tr>
                        </table>
                        <p style="height:8px;padding-top:5px;"><span class="error" id="pwderror" style="color:red;text-align:right;"></span></p>
                    </div>
                </div>
                <input type="hidden" id="hiddenpwd1">
                <input type="hidden" id="hiddenpwd2">
                <input type="hidden" id="hiddenpwd3">
                <input type="hidden" id="hiddenpwd4">
                <input type="hidden" id="hiddenpwd5">
                <input type="hidden" id="hiddenpwd6">
                <script>
                    function keyup_pwd1(){
                        $("#hiddenpwd1").val($('#pwd1').val());
                        $('#pwd1').val('*');
                        $('#pwd2').focus();
                    }
                    function keyup_pwd2(){
                        $("#hiddenpwd2").val($('#pwd2').val());
                        $('#pwd2').val('*');
                        $('#pwd3').focus();

                    }
                    function keyup_pwd3(){
                        $("#hiddenpwd3").val($('#pwd3').val());
                        $('#pwd3').val('*');
                        $('#pwd4').focus();

                    }
                    function keyup_pwd4(){
                        $("#hiddenpwd4").val($('#pwd4').val());
                        $('#pwd4').val('*');
                        $('#pwd5').focus();

                    }
                    function keyup_pwd5(){
                        $("#hiddenpwd5").val($('#pwd5').val());
                        $('#pwd5').val('*');
                        $('#pwd6').focus();

                    }
                    function keyup_pwd6(){
                        $("#hiddenpwd6").val($('#pwd6').val());
                        $('#pwd6').val('*');
                        $('#pwd6').blur();

                    }
                    function focus_pwd1(){
                        $('#pwd1').val('');

                    }
                     function focus_pwd2(){
                        $('#pwd2').val('');

                    }
                     function focus_pwd3(){
                        $('#pwd3').val('');

                    }
                     function focus_pwd4(){
                        $('#pwd4').val('');

                    }
                     function focus_pwd5(){
                        $('#pwd5').val('');

                    }
                     function focus_pwd6(){
                        $('#pwd6').val('');

                    }
                   
                </script>
                <div class="nextStep_btn">
                    <input onclick="location.href='/merchant_issue_try4?act_id=<?php echo $act_id ?>'" type="button" value="上一步"/>
                    <input id="confirm_payment" type="button" value="确认付款" onclick="check_pay()"/>
                </div>
            </div>
        </div>
    </div>  
</section>
<footer id="footer"></footer>
<!--确认付款成功弹框-->
<div class="payment_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/merchant/sj_fbsy_tc_icon_right_default.png" alt=""></p>
            <p class="payment_succeed">支付成功！</p>
            <p>请等待客服审核任务审核通过后会上线发布。</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="end_act()"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--确认付款失败弹框-->
<div class="paymentFailure_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content" style="padding-top:37px;">
            <p><img src="images/merchant/sj_fbsy_tc_icon_no_default.png" alt=""></p>
            <p class="payment_succeed">支付失败！</p>
            <p style="height:20px;"></p>
        </div>
        <div class="modal_submit" style="padding-top:0px;">
            <input class="confirm" type="button" value="确定" onclick="end_act()"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/modal_scrollbar.js"></script>
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
       //  $('#header').load("../common/merchant_header.html");
       //  $('#footer').load("../common/footer.html");
       // $('#left_nav').load("../common/left_nav.html",function(){
                   $('.try_manage ul>li').find('a').eq(0).addClass('leftNav_active')
               // });

        $('.mask_layer').height(document.body.offsetHeight+500);

////        支付成功弹框
//        $('#confirm_payment').bind('click',function(){
//            $('.payment_modal').css('display','block');
//            disableScroll();
//        });
////        支付失败弹框
        // $('#confirm_payment').bind('click',function(){
        //     $('.paymentFailure_modal').css('display','block');
        //     disableScroll();
        // });
        $('.close,.cancel,.confirm').bind('click',function(){
            $('.payment_modal,.paymentFailure_modal').css('display','none');
            enableScroll();
        });
    })
    function check_pay(){

        var avail = <?php echo $sellerinfo['avail_deposit'];?>;
        var need_pay = <?php echo $activity['margin']*5*1.05;?>;
        var act_id = "<?php echo $act_id ?>";
        if (avail < need_pay){
            $("#moneyerror").text("可用押金不足，请先充值押金，然后在试用活动-待付款活动中进行支付");
            return;
        }
        var pwd1=$("#hiddenpwd1").val();
        var pwd2=$("#hiddenpwd2").val();
        var pwd3=$("#hiddenpwd3").val();
        var pwd4=$("#hiddenpwd4").val();
        var pwd5=$("#hiddenpwd5").val();
        var pwd6=$("#hiddenpwd6").val();
        if( pwd1 == '' || pwd2 == '' || pwd3 == '' ||pwd4 == '' ||pwd5 == '' ||pwd6 == ''){
            $("#pwderror").text("支付密码不能为空");
            return;
        }
        pwd = pwd1;
        pwd += pwd2;
        pwd += pwd3;
        pwd += pwd4;
        pwd += pwd5;
        pwd += pwd6;
        if(<?php echo (empty($sellerinfo['paypw'])==1?1:2);?> == 1){
            $("#pwderror").text("请先设置支付密码");
            return;
        }

        $.ajax({
            url : admin.url+'merchant_issue_try5/check_pay',
            data:{pwd:pwd,avail:avail,need_pay:need_pay,act_id:act_id},
            type : 'post',
            cache : false,
            success : function (result){
                if(result == "1"){
                    $('.payment_modal').css('display','block');
                }else{
                    $('.paymentFailure_modal').css('display','block');
                }
            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }
    function end_act(){
        location.href=admin.url+"merchant_activity_manage";
    }
</script>
</body>
</html>









