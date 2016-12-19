<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>绑定银行卡</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/bound_bankCard.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--修改登录密码-->
        <div class="bound_bankCard left">
            <h1 class="title">绑定银行卡</h1>
            <div class="bankCard_kind">
                <p class="bound_num">
                    最多可以绑定1张银行卡，绑定的银行卡仅限于提现。联系客服QQ：
                    <a href="javascript:void(0);"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a>
                </p>
                <div class="bankCard">
                    <p class="one">
                        <span class="bank_logo">
                            <img src="images/merchant/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                        </span>
                        <a id="delete" href="javascript:void(0);">删除</a>
                    </p>
                    <p class="two"><span>储蓄卡</span></p>
                    <p class="three">**** **** **** <?php echo substr($bankcard['banknum'], -4);?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>

<div class="delete_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>删除</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认审核-->
            <p class="confirm_audit">确认删除？</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="delete_bankcard(<?php echo $bankcard['id'];?>)"/>
            <input class="cancel" type="button" value="取消"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/modal_scrollbar.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html");

//        确认审核
        $('.mask_layer').height(document.body.offsetHeight+500);
        $('#delete').bind('click',function(){
            $('.delete_modal').css('display','block');
            disableScroll();
        });

        $('.close,.cancel').bind('click',function(){
            $('.delivery_modal,.delete_modal').css('display','none');
            enableScroll();
        });
        $('.confirm').bind('click',function(){
            $('.delivery_modal,.delete_modal').css('display','none');
            $('.bankCard').css('display','none');
            enableScroll();
        });
    })
    function delete_bankcard(o){
        var bankcard_id = o;
        $.ajax({
            url : admin.url+'merchant_bankcard_manage/delete_bankcard',
            type : "POST",
            datatype : "json",
            cache : false,
            timeout : 20000,
            data : {bankcard_id:bankcard_id},
            success : function (result){
                location.reload();
            },
            error : function(XMLHttpRequest, textStatus){
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }
</script>
</body>
</html>









