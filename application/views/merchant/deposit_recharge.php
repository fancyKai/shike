<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>押金充值</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/deposit_recharge.css">
    <link rel="stylesheet" href="css/merchant/deposit_withdraw.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--押金充值-->
        <div id="my_main" class="deposit_recharge  left">
            <h1 class="title">押金充值</h1>
            <h2 class="select_bank">1.请选择银行</h2>
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
            <h2>2.填写充值金额</h2>
            <div class="recharge_amount">
                <p class="account_balance">账户余额：<span>&yen;<?php echo $sellerinfo['avail_deposit']?></span></p>
                <p class="recharge_amount">充值金额：<input id="recharge_money" type="text"/><b>每次充值不得少于100元</b></p>
                <p class="error"><span id="moneyerror"></span></p>
            </div>
            <p class="confirm_btn">
                <input id="confirm_payment" type="button" value="确认充值" onclick="check_recharge()"/>
            </p>
            <div class="warm_prompt">
                <h1>温馨提示：</h1>
                <p>1、信用卡支付时银行会自动提示风险安全提醒，可继续支付，请勿担心；</p>
                <p>2、请注意您的银行卡充值限制，以便造成不便；</p>
                <p>3、禁止洗钱、信用卡套现、虚假交易等行为，一经发现并确认，将终止该账号的试用；</p>
                <p>
                    4、如果充值金额没有及时到账，请联系客服。
                    <img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')">
                </p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<input type="hidden" id="hidden_bank">
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
            <input class="cancel" type="button" value="支付遇到问题" onclick="pay_failed()"/>
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

<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/mask_layer.js"></script>
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
            $('.fund_manage ul>li').find('a').eq(0).addClass('leftNav_active')
        // });
        $('.bank').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #c8c8c8')
            $(this).parent().siblings().find('td').css('border','1px solid #c8c8c8')
        });
        $('#confirm_payment').bind('click',function(){
            var money_error = $("#moneyerror").text();
            if(money_error == "")
            {
                $('.pay_modal').css('display','block');
                disableScroll();
            }

        })
    })
    function set_bank(o){
         $('#hidden_bank').val(o);
    }
    function check_recharge(){
        var money = $("#recharge_money").val();
        if (!money){
            $("#moneyerror").text("充值金额不能为空");
            return;
        }
        if (money < 100){
            $("#moneyerror").text("最低100元起充");
            return;
        }
        var bankId = $("#hidden_bank").val();
        var money_pay = money *100;
        window.open("http://www.shike8888.com/kq/send?money="+money_pay+"&bankId="+bankId+"&ext1=3&ext2="+money);
        // $.ajax({
        //     url : admin.url+'merchant_deposit_recharge/check_recharge',
        //     data:{money:money},
        //     type : 'post',
        //     cache : false,
        //     success : function (data){
        //         location.href=admin.url+"merchant_deposit_recharge";
        //     },
        //     error : function (XMLHttpRequest, textStatus){
        //     }
        // })
    }

    function pay_check(){
        var old_time = "<?PHP echo $charge_time; ?>";
        $.ajax({
        url : admin.url+'Merchant_deposit_recharge/pay_check',
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
        window.location.href="/Merchant_funds_record";
    }
</script>
</body>
</html>









