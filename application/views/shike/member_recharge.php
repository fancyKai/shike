<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员充值</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <!--<link rel="stylesheet" href="../../css/reset_content.css">-->
    <link rel="stylesheet" href="css/shike/modal_alert.css">
    <link rel="stylesheet" href="css/shike/member_recharge.css">
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
                    <a class="personal_active" href="/shike_personal">个人中心</a>
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
                    <p>会员时长：<b>1年</b></p>
                    <p><span>&yen;4000.00</span></p>
                </li>
                <li class="select two_years" onclick="change_recharge_items(2)">
                    <p>会员时长：<b>2年</b></p>
                    <p><span>&yen;7200.00</span></p>
                </li>
                <li class="select three_years" onclick="change_recharge_items(3)">
                    <p>会员时长：<b>3年</b></p>
                    <p><span>&yen;9600.00</span></p>
                </li>
            </ul>
            <div class="need_pay">
                <p class="one">您已选择<b class="month">12</b>个月会员，有效期至<b>2012.12.12</b></p>
                <p class="two">需要支付:<span class="money">&yen;4000.00</span></p>
            </div>
            <h1>请选择银行</h1>
            <table>
                <tr>
                    <td class="bank">
                        <img src="images/shike/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/shike/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/shike/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/shike/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td class="bank">
                        <img src="images/shike/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/shike/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/shike/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <a href="javascript:void(0);">选择其他</a>
                    </td>
                </tr>
            </table>
            <p class="confirm_btn">
                <input id="confirm_payment" type="button" value="确认付款"/>
            </p>
            <div class="warm_prompt">
                <h1>温馨提示：</h1>
                <p>1、信用卡支付时银行会自动提示风险安全提醒，可继续支付，请勿担心；</p>
                <p>2、请注意您的银行卡充值限制，以便造成不便；</p>
                <p>3、禁止洗钱、信用卡套现、虚假交易等行为，一经发现并确认，将终止该账号的试用；</p>
                <p>
                    4、如果充值金额没有及时到账，请联系客服。
                    <img src="images/shike/sj_grzx_icon_qq_default.png" alt="">
                </p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/modal_scrollbar.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
        //     $('.account_information ul>li').find('a').eq(2).addClass('left_nav_active');
        // });
//        充值不同的会员
        $('.select').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #c8c8c8');
        });
        $('.one_years').bind('click',function(){
            $('.month').text(12);
            $('.money').text('¥4000');
        });
        $('.two_years').bind('click',function(){
            $('.month').text(24);
            $('.money').text('¥7200');
        });
        $('.three_years').bind('click',function(){
            $('.month').text(36);
            $('.money').text('¥9600');
        });
        $('.bank').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #c8c8c8')
            $(this).parent().siblings().find('td').css('border','1px solid #c8c8c8')
        });
    })
    function change_recharge_items(o){
        $('.select').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #c8c8c8');
        })
        if(o == 1){
            $('.month').text(12);
            $('.money').text('¥4000');
        }
        if(o == 2){
            $('.month').text(24);
            $('.money').text('¥7200');
        }
        if(o == 3){
            $('.month').text(36);
            $('.money').text('¥9600');
        }
    }
</script>
</body>
</html>









