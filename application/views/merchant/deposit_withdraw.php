<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>押金提现</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/deposit_withdraw.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--押金提现-->
        <div id="my_main" class="deposit_withdraw left">
            <h1 class="title">押金提现</h1>
            <h2>填写提现金额</h2>
            <!--填写金额先关的信息-->
            <div class="fillIn_money">
                <div class="main_one"><b>可用押金：</b><span>&yen;<?php echo $seller['avail_deposit'];?></span></div>
                <div class="main_two">
                    <b>可用押金：</b>
                    <?php if(!$bankcard):?>
                    <div class="left bankCard_two">
                        <p><img onclick="location.href='/merchant_add_bankCard'" src="images/merchant/sj_zjgl_icon_bdyhk_default.png" alt="" ></p>
                        <p>请先绑定银行卡</p>
                    </div>
                    <?php else:?>
                    <div class="left bankCard_one">
                        <p class="one">

                        <?php if ($bankcard['banktype']==1):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zgzsyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==2):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==3):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zgjsyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==4):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zgyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==5):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zsyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==6):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_jtyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==7):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zgmsyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==8):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_xyyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==9):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_szfzyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==10):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_bjyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==11):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_hxyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==12):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_gfyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==13):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_pfyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==14):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zggdyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==15):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_gzyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==16):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_shnsyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==17):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zgyzcxyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==18):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zgyz_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==19):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_bhyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==20):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_bjnsyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==21):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_njyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==22):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zxyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==23):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_nbyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==24):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_payh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==25):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_hzyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==26):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_hsyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==27):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_zheshangyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==28):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_shanghaiyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==29):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_jsyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==30):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_dyyh_five_default.png" alt="">
                        <?php endif;?>


                        </p>

                        <p class="two"><span>储蓄卡</span></p>
                        <p class="three">**** **** **** <?php echo substr($bankcard['banknum'], -4);?></p>
                    </div>
                    <?php endif;?>
                </div>
                <div class="main_three">
                    <b>提现金额：</b>
                    <input id="tixian" type="text" onblur="get_money()" />
                    <span class="error" id="tixianerror"></span>
                    <br/>
                    <p class="one">单次最少提现500元，提现操作平台将收取1%的手续费</p>
                    <p class="two">预计2个工作日内（国家法定节假日和双休日顺延）平台完成提现操作。<br/>
                        到账时间以各大银行为准，预计3-5个工作日左右。</p>
                </div>
                <div class="main_four">
                    <b>实际到账金额：</b>
                    <span id="daozhang"></span>
                </div>
                <div class="main_five">

                     <!--修改前-->
                    <!--<b>提现密码：</b>-->
                    <!--<input type="text" id="tixian_pwd"/>-->
                    <!--<span class="error" id="pwderror"></span>-->
                     <!--修改后-->
                     <table>
                        <tr>
                           <td><b>提现密码：</b></td>
                           <td><input class="pw" type="password" maxlength="1" id="pwd1" onkeyup="keyup_pwd1()" onfocus="focus_pwd1()"/></td>
                           <td><input class="pw" type="password" maxlength="1" id="pwd2" onkeyup="keyup_pwd2()" onfocus="focus_pwd2()"/></td>
                           <td><input class="pw" type="password" maxlength="1" id="pwd3" onkeyup="keyup_pwd3()" onfocus="focus_pwd3()"/></td>
                           <td><input class="pw" type="password" maxlength="1" id="pwd4" onkeyup="keyup_pwd4()" onfocus="focus_pwd4()"/></td>
                           <td><input class="pw" type="password" maxlength="1" id="pwd5" onkeyup="keyup_pwd5()" onfocus="focus_pwd5()"/></td>
                           <td><input class="pw" type="password" maxlength="1" id="pwd6" onkeyup="keyup_pwd6()" onfocus="focus_pwd6()"/></td>
                           <td><span class="error" id="pwderror"></span></td>
                        </tr>
                    </table>
                    <span class="error" id="pwderror"></span>
                    <br/>
                    <p class="one">忘记密码请联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')" ></p>
                </div>
            </div>

                <script>
                    function keyup_pwd1(){
                        $('#pwd2').focus();
                    }
                    function keyup_pwd2(){
                        $('#pwd3').focus();

                    }
                    function keyup_pwd3(){
                        $('#pwd4').focus();

                    }
                    function keyup_pwd4(){
                        $('#pwd5').focus();

                    }
                    function keyup_pwd5(){
                        $('#pwd6').focus();

                    }
                    function keyup_pwd6(){
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

            <p class="confirm_btn">
                <input id="confirm_withdraw" type="button" value="确认提现" onclick="post_tixian()" />
            </p>
            <div class="warm_prompt">
                <h1>温馨提示：</h1>
                <p>1、信用卡支付时银行会自动提示风险安全提醒，可继续支付，请勿担心；</p>
                <p>2、请注意您的银行卡充值限制，以便造成不便；</p>
                <p>3、禁止洗钱、信用卡套现、虚假交易等行为，一经发现并确认，将终止该账号的试用；</p>
                <p>
                    4、如果充值金额没有及时到账，请联系客服。
                    <img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')" >
                </p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<!--确认提现成功弹框-->
<div class="withdraw_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/merchant/sj_fbsy_tc_icon_right_default.png" alt=""></p>
            <p class="payment_succeed">提现成功！</p>
            <p>请在3-5个工作日后查询银行账户，如有问题请联系客服。</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="check_ok()"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--确认提现失败--原因一：可用押金金额不足-->
<div class="withdrawFailure_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/merchant/sj_fbsy_tc_icon_no_default.png" alt=""></p>
            <p class="payment_succeed">支付失败！</p>
            <p style="height:20px;">提现密码错误</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="check_fail()"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/modal_scrollbar.js"></script>
<script src="js/merchant/payPw_verify.js"></script>
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
         // $('#left_nav').load("../common/left_nav.html",function(){
            $('.fund_manage ul>li').find('a').eq(1).addClass('leftNav_active')
         // });
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);

//        提现成功弹框
        // $('#confirm_withdraw').bind('click',function(){
        //     $('.withdraw_modal').css('display','block');
        //    disableScroll();
        // });
////        提现失败弹框
//        $('#confirm_withdraw').bind('click',function(){
//            $('.withdrawFailure_modal').css('display','block');
//            disableScroll();
//        });

        $('.close,.cancel').bind('click',function(){
            $('.withdrawFailure_modal,.withdraw_modal').css('display','none');
            enableScroll();
        });
    })

    function check_ok(){
        location.reload();
    }
    function check_fail(){
        $('.withdrawFailure_modal,.withdraw_modal').css('display','none');
        return;
    }
    function get_money(){
        
        var tixian = $("#tixian").val();
        var reg = /\d+\.\d{0,2}|\d$/;
        if(!reg.test(tixian)){
            $("#tixianerror").text("非法输入");
            return;
        }
        if(tixian < 500){
            $("#tixianerror").text("单次最少提现500元");
            $("#daozhang").text("");
            return;
        }
        var money = (tixian*0.99).toFixed(2);
        if(tixian){
            $("#daozhang").text("￥"+money);
            $("#tixianerror").text("");
            return;
        }
        return;
    }
    function post_tixian(){
        var tixian = $("#tixian").val();
        var pwd1=$("#pwd1").val();
        var pwd2=$("#pwd2").val();
        var pwd3=$("#pwd3").val();
        var pwd4=$("#pwd4").val();
        var pwd5=$("#pwd5").val();
        var pwd6=$("#pwd6").val();
        if( pwd1 == '' || pwd2 == '' || pwd3 == '' ||pwd4 == '' ||pwd5 == '' ||pwd6 == ''){
            $("#pwderror").text("提现密码不能为空");
            return;
        }
        tixian_pwd = pwd1+pwd2+pwd3+pwd4+pwd5+pwd6;
        var avail_deposit = <?php echo $seller['avail_deposit'];?>;
        if(!tixian){
            $("#tixianerror").text("提现金额不能为空");
            return;
        }
        if(avail_deposit < tixian){
            $("#tixianerror").text("金额不足");
            return;
        }
        if(<?php echo (empty($seller['withdrawpw'])==1?1:2);?> == 1){
            $("#pwderror").text("请先设置提现密码");
            return;
        }
        $.ajax({
            url : admin.url+'merchant_deposit_withdraw/post_tixian',
            data:{tixian:tixian,tixian_pwd:tixian_pwd},
            type : 'post',
            cache : false,
            datatype : "json",
            success : function (data){
                
                if(data == 0){
                    $('.withdrawFailure_modal').css('display','block');
                    $("#pwderror").text("提现密码错误");
                    return;
                }else{
                    $('.withdraw_modal').css('display','block');
                    return;
                }

            },
            error : function (XMLHttpRequest, textStatus){
            }
        })
    }
</script>
</body>
</html>









