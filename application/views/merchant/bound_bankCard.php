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
        <div id="my_main" class="bound_bankCard left">
            <h1 class="title">绑定银行卡</h1>
            <div class="bankCard_kind">
                <p class="bound_num">
                    最多可以绑定1张银行卡，绑定的银行卡仅限于提现。联系客服QQ：
                    <a href="javascript:void(0);"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></a>
                </p>
                <div class="bankCard">
                    <p class="one">
                        <span class="bank_logo">
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
                            <img src="images/bank/sj_zhxx_bg_bdyhk_shyh_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==29):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_jiangsu_five_default.png" alt="">
                        <?php elseif ($bankcard['banktype']==30):?>
                            <img src="images/bank/sj_zhxx_bg_bdyhk_dyyh_five_default.png" alt="">
                        <?php endif;?>

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
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
         $('#left_nav').load("../common/left_nav.html",function(){
            $('.account_information ul>li').find('a').eq(1).addClass('leftNav_active')
         });

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









