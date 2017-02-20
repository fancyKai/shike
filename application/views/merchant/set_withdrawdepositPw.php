<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设置提现密码</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/revamp_loginPw.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--设置支付密码-->
        <div id="my_main" class="basic_setup left">
            <h1 class="title">设置提现密码</h1>
            <form class="revamp_content">
                <!--修改前-->
                <!--<label for="mewPw">新密码：</label>-->
                <!--<input id="mewPw" type="text" onblur="check_pw();verify_pwd()"/>-->
                <!--<br/>-->
                <!--<p><span id="mewPw_errors">密码不能为空</span></p>-->

                <!--<label for="confirmPw">确认新密码：</label>-->
                <!--<input id="confirmPw" type="text" onblur="verify_pwd()"/>-->
                <!--<br/>-->
                <!--<p><span id="confirmPw_error"></span></p>-->
                <!--修改后-->
                 <table>
                    <tr>
                        <td><label for="mewPw">新密码：</label></td>
                        <td><input class="pw" id="pwd1" onkeyup="keyup_pwd1()" onfocus="focus_pwd1()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd2" onkeyup="keyup_pwd2()" onfocus="focus_pwd2()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd3" onkeyup="keyup_pwd3()" onfocus="focus_pwd3()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd4" onkeyup="keyup_pwd4()" onfocus="focus_pwd4()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd5" onkeyup="keyup_pwd5()" onfocus="focus_pwd5()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd6" onkeyup="keyup_pwd6()" onfocus="focus_pwd6()" type="password" maxlength="1"/></td>
                    </tr>
                </table>
                <p><span id="mewPw_errors"></span></p>
                <table>
                    <tr>
                        <td><label for="confirmPw">确认新密码：</label></td>
                        <td><input class="pw" id="pwd7" onkeyup="keyup_pwd7()" onfocus="focus_pwd7()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd8" onkeyup="keyup_pwd8()" onfocus="focus_pwd8()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd9" onkeyup="keyup_pwd9()" onfocus="focus_pwd9()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd10" onkeyup="keyup_pwd10()" onfocus="focus_pwd10()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd11" onkeyup="keyup_pwd11()" onfocus="focus_pwd11()" type="password" maxlength="1"/></td>
                        <td><input class="pw" id="pwd12" onkeyup="keyup_pwd12()" onfocus="focus_pwd12()" type="password" maxlength="1"/></td>
                    </tr>
                </table>
                <p><span id="confirmPw_error"></span></p>
                <p class="btns">
                    <input onclick="info_post()" type="button" value="确定"/>
                    <input type="button" onclick="location.href='/merchant_basic_setup'" value="取消"/>
                </p>
            </form>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/merchant/jquery-1.10.2.js"></script>
<!-- <script src="js/merchant/payPw_verify.js"></script> -->
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
        $('.account_information ul>li').find('a').eq(0).addClass('leftNav_active')
        // });
    })

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

                    function keyup_pwd7(){
                        $('#pwd8').focus();
                    }
                    function keyup_pwd8(){
                        $('#pwd9').focus();

                    }
                    function keyup_pwd9(){
                        $('#pwd10').focus();

                    }
                    function keyup_pwd10(){
                        $('#pwd11').focus();

                    }
                    function keyup_pwd11(){
                        $('#pwd12').focus();

                    }
                    function keyup_pwd12(){
                        $('#pwd12').blur();

                    }
                    function focus_pwd7(){
                        $('#pwd7').val('');

                    }
                     function focus_pwd8(){
                        $('#pwd8').val('');

                    }
                     function focus_pwd9(){
                        $('#pwd9').val('');

                    }
                     function focus_pwd10(){
                        $('#pwd10').val('');

                    }
                     function focus_pwd11(){
                        $('#pwd11').val('');

                    }
                     function focus_pwd12(){
                        $('#pwd12').val('');

                    }


    function info_post(){
        var pwd1=$("#pwd1").val();
        var pwd2=$("#pwd2").val();
        var pwd3=$("#pwd3").val();
        var pwd4=$("#pwd4").val();
        var pwd5=$("#pwd5").val();
        var pwd6=$("#pwd6").val();
        if( pwd1 == '' || pwd2 == '' || pwd3 == '' ||pwd4 == '' ||pwd5 == '' ||pwd6 == ''){
            $("#mewPw_errors").text("密码不能为空");
            return;
        }
        mewPw = pwd1+pwd2+pwd3+pwd4+pwd5+pwd6;

        var pwd7=$("#pwd7").val();
        var pwd8=$("#pwd8").val();
        var pwd9=$("#pwd9").val();
        var pwd10=$("#pwd10").val();
        var pwd11=$("#pwd11").val();
        var pwd12=$("#pwd12").val();
        confirmPw = pwd7+pwd8+pwd9+pwd10+pwd11+pwd12;
        
        $("#mewPw_errors").text("");
        if(mewPw != confirmPw){
             $("#confirmPw_error").text("两次密码输入不同");
            return;
        }
        $("#confirmPw_error").text("");
        $.ajax({
        url : admin.url+'merchant_userapi/set_withdrawPw',
        type : 'POST',
        cache : false,
        dataType:'json',
        async : false,
        data : {passwd:mewPw},
        success : function (result){
            console.log(result);
            if(result == 1){
                window.location.href="/merchant_withdrawPw_set_succeed";
            }
        }
        })
    }

    function check_pw(){
        if($("#mewPw").val()==''){
            $("#mewPw_errors").text("密码不能为空");
        }else{
            $("#mewPw_errors").text("");
        }
    }

    function verify_pwd(){
        var mewPw = $("#mewPw").val();
        var confirmPw = $("#confirmPw").val();
        if(mewPw != confirmPw){
             $("#confirmPw_error").text("两次密码输入不同");
            return;
        }
        $("#confirmPw_error").text("");
    }
</script>
</body>
</html>









