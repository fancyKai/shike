<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员充值</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <!--<link rel="stylesheet" href="../../css/reset_content.css">-->
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/member_recharge.css">
    <link rel="stylesheet" href="css/merchant/deposit_withdraw.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--会员充值详情-->
    <div class="rechange_details">
        <!--所在位置-->
        <div class="location_title">
            <ul>
                <li>你所在的位置：</li>
                <li class="order">
                    <a class="personal_active" href='<?=base_url('')?>'>首页</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a class="personal_active" href="/shike_personal">试客中心</a>
                </li>
                <li class="order"><img src="images/shike/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a href="/shike_member_manage">会员管理</a>
                </li>
                <li class="order"><img src="images/shike/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">会员充值</li>
            </ul>
        </div>
        <!--请选择开通时长-->
        <div class="member_rechange">
            <h1>请选择开通时长</h1>
            <ul class="select_duration">
                          <li class="select one_years" onclick="change_recharge_items(1)">
                            <p><span>&yen;20.00</span></p>
                             <p>会员时长：<b>1个月</b></p
                         </li>
                         <li class="select two_years" onclick="change_recharge_items(2)">
                          <p><span>&yen;100.00</span></p>
                             <p>会员时长：<b>6个月</b></p>
                         </li>
                         <li class="select three_years" onclick="change_recharge_items(3)">
                          <p><span>&yen;200.00</span></p>
                             <p>会员时长：<b>12个月</b></p>
                         </li>
                       </ul>
            <div class="need_pay">
                <p class="one">您已选择<b>1</b>个月会员，有效期至<b><?php echo $one_year_end;?></b></p>
                <p class="two">需要支付:<span>&yen;20.00</span></p>
                <p class="three" style = "display:none;padding-bottom: 8px">您已选择<b style="color: #f10180;">6</b>个月会员，有效期至<b style="color: #f10180;"><?php echo $two_year_end;?></b></p>
                <p class="four" style = "display:none">需要支付:<span style="font-size: 24px;
  color: #e61e28;">&yen;100.00</span></p>
                <p class="five" style = "display:none;padding-bottom: 8px">您已选择<b style="color: #f10180;">12</b>个月会员，有效期至<b style="color: #f10180;"><?php echo $three_year_end;?></b></p>
                <p class="six" style = "display:none">需要支付:<span style="font-size: 24px;
  color: #e61e28;">&yen;200.00</span></p>
            </div>
            <h1>请选择银行</h1>
            <table>
                <tr>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_gsyh_default.png" alt="" onclick="set_bank('ICBC')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_nyyh_default.png" alt="" onclick="set_bank('ABC')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_jsyh_default.png" alt="" onclick="set_bank('CCB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_zgyh_default.png" alt="" onclick="set_bank('BOC')">
                    </td>
                </tr>
                <tr class="bank">
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_zsyh_default.png" alt="" onclick="set_bank('CMB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_jtyh_default.png" alt="" onclick="set_bank('BCOM')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_zgmsyh_default.png" alt="" onclick="set_bank('CMBC')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_xyyh_default.png" alt="" onclick="set_bank('CIB')">
                    </td>
                </tr>
                <tr class="bank">
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_hzyh_default.png" alt="" onclick="set_bank('HZB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_bjyh_default.png" alt="" onclick="set_bank('BOB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_hxyh_default.png" alt="" onclick="set_bank('HXB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_hsyh_default.png" alt="" onclick="set_bank('HSB')">
                    </td>
                </tr>
                <tr class="bank">
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_pfyh_default.png" alt="" onclick="set_bank('SPDB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_zggdyh_default.png" alt="" onclick="set_bank('CEB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_zheshangyh_default.png" alt="" onclick="set_bank('CZB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_shnsyh_default.png" alt="" onclick="set_bank('SRCB')">
                    </td>
                </tr>
                <tr class="bank">
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_yzcx_default.png" alt="" onclick="set_bank('PSBC')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_shyh_default.png" alt="" onclick="set_bank('SHB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_bhyh_default.png" alt="" onclick="set_bank('CBHB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_bjnsyh_default.png" alt="" onclick="set_bank('BJRCB')">
                    </td>
                </tr>
                <tr class="bank">
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_njyh_default.png" alt="" onclick="set_bank('NJCB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_zxyh_default.png" alt="" onclick="set_bank('CITIC')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_nbyh_default.png" alt="" onclick="set_bank('NBCB')">
                    </td>
                    <td class="bank">
                        <img src="images/bank/sj_zhxx_bg_fkyh_payh_default.png" alt="" onclick="set_bank('PAB')">
                    </td>
                </tr>
                <tr class="bank">
                    <td class="bank">
                        <a href="javascript:void(0);">选择其他</a>
                    </td>
                </tr>
            </table>
            <p class="confirm_btn">
                <input id="confirm_payment" type="button" value="确认付款" onclick="pay_recharge()"/>
            </p>
            <div class="warm_prompt">
                <h1>温馨提示：</h1>
                <p>1、信用卡支付时银行会自动提示风险安全提醒，可继续支付，请勿担心；</p>
                <p>2、请注意您的银行卡充值限制，以便造成不便；</p>
                <p>3、禁止洗钱、信用卡套现、虚假交易等行为，一经发现并确认，将终止该账号的试用；</p>
                <p>
                    4、如果充值金额没有及时到账，请联系客服。
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/shike/sj_grzx_icon_qq_default.png" alt=""></a>
                </p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>

<!--支付弹框-->
<div class="pay_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <p>请在新窗口完成支付，支付成功后请点击“已完成支付”<br/>若支付遇到问题请点击“支付遇到问题”</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="已完成支付" onclick="pay_check()"/>
            <input class="cancel" type="button" value="支付遇到问题" onclick="pay_failed()" />
        </div>
    </div>
    <div class="mask_layer"></div>
</div>

<!--支付成功-->
<div class="withdraw_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/shike/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/shike/sj_fbsy_tc_icon_right_default.png" alt=""></p>
            <p class="payment_succeed">支付成功！</p>
            <p></p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="check_fail()"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--支付失败-->
<div class="withdrawFailure_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/shike/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/shike/sj_fbsy_tc_icon_no_default.png" alt=""></p>
            <p class="payment_succeed">支付失败！</p>
            <p></p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="check_fail()"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>

<input type="hidden" id="hidden_recharge">
<input type="hidden" id="hidden_bank">
<script src="js/shike/jquery-1.10.2.js"></script>
<script src="js/merchant/modal_scrollbar.js"></script>
<script src="js/merchant/mask_layer.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
        //     $('.account_information ul>li').find('a').eq(2).addClass('left_nav_active');
        // });
//        充值不同的会员
        // $('.select').bind('click',function(){
        //     $(this).css('border','1px solid #e61e28');
        //     $(this).siblings().css('border','1px solid #c8c8c8');
        // });
        // $('.one_years').bind('click',function(){
        //     $('.month').text(12);
        //     $('.money').text('¥4000');
        // });
        // $('.two_years').bind('click',function(){
        //     $('.month').text(24);
        //     $('.money').text('¥7200');
        // });
        // $('.three_years').bind('click',function(){
        //     $('.month').text(36);
        //     $('.money').text('¥9600');
        // });
        $('.bank').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #c8c8c8')
            $(this).parent().siblings().find('td').css('border','1px solid #c8c8c8')
        });

        $('#confirm_payment').bind('click',function(){
            $('.pay_modal').css('display','block');
            disableScroll();
        })

        change_recharge_items(1)
    })
    function set_bank(o){
         $('#hidden_bank').val(o);
    }
    function change_recharge_items(o){
        $('.select').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #fff');
        })
        if(o == 1){
            $('.one').css('display','block');
            $('.two').css('display','block');
            $('.three').css('display','none');
            $('.four').css('display','none');
            $('.five').css('display','none');
            $('.six').css('display','none');
        }
        if(o == 2){
            $('.one').css('display','none');
            $('.two').css('display','none');
            $('.three').css('display','block');
            $('.four').css('display','block');
            $('.five').css('display','none');
            $('.six').css('display','none');
        }
        if(o == 3){
            $('.one').css('display','none');
            $('.two').css('display','none');
            $('.three').css('display','none');
            $('.four').css('display','none');
            $('.five').css('display','block');
            $('.six').css('display','block');
        }
        $('#hidden_recharge').val(o);
    }
    function pay_recharge(){
        var recharge_year = $("#hidden_recharge").val();
        var bankId = $("#hidden_bank").val();
        console.log(recharge_year);
        console.log(bankId);
        window.open("http://www.shike8888.com/kq/send?money=1&bankId="+bankId+"&ext1=1&ext2="+recharge_year);
    }
    function pay_check(){
        var old_time = "<?PHP echo $charge_time; ?>";
        $.ajax({
        url : admin.url+'Shike_member_recharge/pay_check',
        type : 'POST',
        cache : false,
        dataType:'json',
        data : {old_time:old_time},
        success : function (result){
             if(result == 0){
                $('.withdrawFailure_modal').css('display','block');
            }else{
                $('.withdraw_modal').css('display','block');
            }
        },
        error : function(XMLHttpRequest, textStatus){
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
        }

        })
    }
    function pay_failed(){
        $('.withdrawFailure_modal').css('display','block');
    }
    function check_fail(){
        window.location.href="/Shike_member_manage";
    }
</script>
</body>
</html>









