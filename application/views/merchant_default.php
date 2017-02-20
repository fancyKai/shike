<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo base_url(); ?>">

    <title>商家后台</title>

    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/left_nav.css">
    <link rel="stylesheet" href="css/merchant/store_manage.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/common.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="<?/*=base_url('/css/mall/modal_alert.css')*/?>">-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery.js"></script>
	<script src="/js/WdatePicker.js"></script>
    <script src="js/common.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Tables -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
</head>



<body>

<div id="wrapper">
    <?php include 'common/merchant_top.php'; ?>
    <?php include 'common/merchant_sidebar.php'; ?>
    <div id="page-wrapper">
        <?php include $con_page.'.php'; ?>
    </div>

    <div class="modal" style="display:none">
        <div class="modal_box" style="max-width: 500px">
            <div class="modal_prompt">
                <span>提示</span>
                <a class="close" href="javascript:void(0);">
                    <img src="../../images/mall/sj_grzx_tc_off_default.png" alt="">
                </a>
            </div>
            <div class="modal_content">
                <p style="line-height: 40px;margin: 30px 20px 30px 20px;font-size: 16px ">提示的内容</p>
            </div>
            <div class="modal_submit">
                <input class="confirm" type="button" value="确定"/>
            </div>
        </div>
        <div class="mask_layer"></div>
    </div>
    <?php include 'common/merchant_foot.php'; ?>
</div>

<script src="<?=base_url("js/mall/mask_layer.js")?>"></script>
<script>
 $(function(){
    $("aside").append($(".left_nav"));
    $(".left_nav").css("display","none");
    $("aside div").css("display","block");
 })

 function issue_try()
 {
     $.ajax({
         url : '/shike_php/merchant_issue_try/issure_try',
         data:{},
         type : 'post',
         dataType : 'json',
         cache : false,
         success : function (result){
             var count = result;
             console.log(result);
             if(count)
             {
                 //alert('这个月发布过');
                 $('.modal').myAlert('您是试用会员，一个月只能发布一款商品，本月已经发布过试用，请下个月再来申请发布或者充值办理正式会员');
             }else
             {
                 location.href = '<?=base_url('merchant_issue_try')?>';
             }
         },
         error : function (XMLHttpRequest, textStatus){
             console.log("insert_fake_activity false");
             console.log(XMLHttpRequest);
             console.log(textStatus);
         }
     })
 }

</script>
</body>
</html>


