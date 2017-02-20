<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>绑定淘宝</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/basic_setup.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧店铺管理-->
        <div id="my_main" class="basic_setup left">
            <h1 class="title">绑定淘宝</h1>
            <div class="bound_taobao">
                <label for="">淘宝账户名：</label>
                <input id="taobao" type="text" onblur="check_taobao();"/>
                <br>
                <p><span id="taobao_error" style="color:red"></span></p>
                <p><span>注意：</span>绑定的淘宝账号注册需要超过3个月且信誉等级在两颗红心以上。</p>
                <p class="btn">
                    <input onclick="info_post()" type="button" value="提交审核"/>
                    <input type="button" onclick="location.href='/shike_basic_setup'" value="取消"/>
                </p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/shike/jquery-1.10.2.js"></script>
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
        //$('#left_nav').load("../common/left_nav.html",function(){
            $('.account_information ul>li').find('a').eq(0).addClass('left_nav_active');
       // });
    })

     function info_post(){
        var taobao= $("#taobao").val();
        if(!taobao){
            $("#mewPw_errors").text("密码不能为空");
            return;
        }
        $("#mewPw_errors").text("");
        if(mewPw != confirmPw){
             $("#confirmPw_error").text("两次密码输入不同");
            return;
        }
        $("#confirmPw_error").text("");
        $.ajax({
        url : admin.url+'merchant_userapi/set_payPw',
        type : 'POST',
        cache : false,
        dataType:'json',
        async : false,
        data : {passwd:mewPw},
        success : function (result){
            console.log(result);
            if(result == 1){
                window.location.href="/merchant_payPw_set_succeed";
            }
        }
        })
    }

    function check_taobao(){
        if($("#taobao").val()==''){
            $("#taobao_error").text("淘宝账户名不能为空");
        }else{
            $("#taobao_error").text("");
        }
    }
</script>
</body>
</html>









