<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>绑定银行卡</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/add_bankCard.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--修改登录密码-->
        <div id="my_main" class="add_bankCard left">
            <h1 class="title">绑定银行卡</h1>
            <form action="" class="account_information">
                <label for="username">姓名：</label>
                <input id="username" type="text"/>
                <br/>
                <p><span id="usernameerror"></span></p>

                <label for="phone">开户预留手机号：</label>
                <input id="phone" type="text"/>
                <br/>
                <p><span id="phoneerror"></span></p>

                <label for="selectBank">选择银行：</label>
                <select id="selectBank">
                    <option value="">--请选择银行--</option>
                    <option value="1">中国工商银行</option>
                    <option value="2">中国农业银行</option>
                    <option value="3">中国建设银行</option>
                    <option value="4">中国银行</option>
                    <option value="5">招商银行</option>
                    <option value="6">交通银行</option>
                    <option value="7">中国民生银行</option>
                    <option value="8">兴业银行</option>
                    <option value="9">深圳发展银行</option>
                    <option value="10">北京银行</option>
                    <option value="11">华夏银行</option>
                    <option value="12">广发银行</option>
                    <option value="13">浦发银行</option>
                    <option value="14">中国光大银行</option>
                    <option value="15">广州银行</option>
                    <option value="16">上海农商银行</option>
                    <option value="17">中国邮政储蓄银行</option>
                    <option value="18">中国邮政</option>
                    <option value="19">渤海银行</option>
                    <option value="20">北京农商银行</option>
                    <option value="21">南京银行</option>
                    <option value="22">中信银行</option>
                    <option value="23">宁波银行</option>
                    <option value="24">平安银行</option>
                    <option value="25">杭州银行</option>
                    <option value="26">徽商银行</option>
                    <option value="27">浙商银行</option>
                    <option value="28">上海银行</option>
                    <option value="29">江苏银行</option>
                    <option value="30">BEA东亚银行</option>
                </select>
                <br/>
                <p><span id="openBankerror"></span></p>

                <label for="openBankname">开户支行名称：</label>
                <input id="openBankname" type="text"/>
                <br/>
                <p><span id="openBanknameerror"></span></p>

                <label for="bankCardNum">银行卡号：</label>
                <input id="bankCardNum" type="text"/>
                <br/>
                <p><span id="bankCardNumerror"></span></p>

                <p class="btns">
                    <input id="confirm" type="button" value="确定" onclick="post_add_bankcard()"/>
                    <input type="button" value="取消"/>
                </p>
            </form>
            <p class="warm_prompt"><span>温馨提示：</span>如果您填写的银行卡账号不正确，可能无法成功返款，平台不承担由此产生的一切费用。</p>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<!--确认绑定成功弹框-->
<div class="add_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/merchant/sj_fbsy_tc_icon_right_default.png" alt=""></p>
            <p class="payment_succeed">绑定成功！</p>
        </div>
        <div class="modal_submit">
            <input class="confirm"  onclick="location.href='/merchant_bankcard_manage'" type="button" value="确定"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--确认绑定失败弹框-->
<div class="addFailure_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/merchant/sj_fbsy_tc_icon_no_default.png" alt=""></p>
            <p class="payment_succeed">绑定失败！</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定"/>
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

        $('.mask_layer').height(document.body.offsetHeight+500);
//        添加成功弹框
       // $('#confirm').bind('click',function(){
       //     $('.add_modal').css('display','block');
       //    disableScroll();
       // });
//        添加失败弹框
        // $('#confirm').bind('click',function(){
        //     $('.addFailure_modal').css('display','block');
        //     disableScroll();
        // });

        $('.close,.cancel').bind('click',function(){
            $('.addFailure_modal,.add_modal').css('display','none');
            enableScroll();
        });
    })
    function post_add_bankcard(){
        var name = $("#username").val();
        var phone = $("#phone").val();
        var banktype = $("#selectBank").val();
        var branchbank = $("#openBankname").val();
        var banknum = $("#bankCardNum").val();
        if(!name){
            $("#usernameerror").text("姓名不能为空");
            return;
        }
        if(!phone){
            $("#phoneerror").text("手机号不能为空");
            return;
        }
        if(!branchbank){
            $("#openBanknameerror").text("开户支行银行不能为空");
            return;
        }
        if(!banknum){
            $("#bankCardNumerror").text("银行卡号不能为空");
            return;
        }
        $.ajax({
            url : admin.url+'merchant_add_bankCard/post_add_bankcard',
            type : "POST",
            datatype : "json",
            cache : false,
            timeout : 20000,
            data : {name:name, phone:phone, banktype:banktype, branchbank:branchbank, banknum:banknum},
            success : function (result){
                $('.add_modal').css('display','block');
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









