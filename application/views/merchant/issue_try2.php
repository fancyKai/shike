<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布试用</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/fill_information.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧店铺管理-->
        <div id="my_main" class="store_content left">
            <h1 class="title">发布试用</h1>
            <!--进度条-->
            <div class="progress_bar">
                <img src="images/merchant/sj_fbsy_bg_jdt_two_default.png" alt="">
            </div>
            <!--2.填写商品信息-->
            <div class="fill_information">
                <h2 class="title">2.填写商品信息</h2>
                <div class="shop_information">
                    <div class="commodity_information">
                        <label for="commodity_name">商品名称：</label>
                        <input id="commodity_name" type="text" value="<?php echo $activity['product_name'];?>" >
                        <span id="product_name_error"></span>
                        <br/>
                        <p>
                            请输入试用品名称，
                            <a href="javascript:void(0);">不要和淘宝商品名称相同，</a>
                            防止试客直接搜索名称购买，请控制在12个字内
                        </p>
                        <label for="shop_url">商品链接：</label>
                        <input id="shop_url" type="text" value="<?php echo $activity['product_link'];?>">
                        <span id="product_link_error"></span>
                        <br/>
                        <p>平台会根据您填写的商品链接抓取对应淘宝商品的宝贝描述，显示在试用详情页。</p>
                        <label for="commodity_classify">商品的分类：</label>
                        <select id="commodity_classify">
                            <option value ="1" <?php if($activity['product_classify'] == '1') echo "selected='selected'"?>>女装</option>
                            <option value ="2" <?php if($activity['product_classify'] == '2') echo "selected='selected'"?>>男装</option>
                            <option value ="3" <?php if($activity['product_classify'] == '3') echo "selected='selected'"?>>美妆</option>
                            <option value ="4" <?php if($activity['product_classify'] == '4') echo "selected='selected'"?>>鞋包配饰</option>
                            <option value ="5" <?php if($activity['product_classify'] == '5') echo "selected='selected'"?>>居家生活</option>
                            <option value ="6" <?php if($activity['product_classify'] == '6') echo "selected='selected'"?>>数码电器</option>
                            <option value ="7" <?php if($activity['product_classify'] == '7') echo "selected='selected'"?>>母婴儿童</option>
                            <option value ="8" <?php if($activity['product_classify'] == '8') echo "selected='selected'"?>>户外运动</option>
                            <option value ="9" <?php if($activity['product_classify'] == '9') echo "selected='selected'"?>>食品酒水</option>
                            <option value ="10" <?php if($activity['product_classify'] == '10') echo "selected='selected'"?>>其他</option>
                        </select>
                        <br/>
                        <p>此分类为<a href="javascript:void(0);">平台的分类</a></p>
                        <label for="commodity_picture">商品图片：</label>
                        <input id="commodity_picture" type="text" value="<?php echo $activity['picture_url'];?>" >
                        <span id="picture_url_error"></span>
                        <br/>
                        <p>请输入商品URL</p>
                        <label for="norms">规格：</label>
                        <input class="norms" id="thecolor" type="text" placeholder="颜色" value="<?php echo $activity['color'];?>">
                        <input class="norms"  id="thesize" type="text" placeholder="尺码" value="<?php echo $activity['size'];?>">
                        <br/>
                        <p>如需试客拍下指定规格，请务必填写此项信息，如不填写,</p>
                        <p>
                            默认试客可以拍下任意规格的商品。
                            <a href="javascript:void(0);">
                                鞋子服装类商品，不可限制产品的尺码。</a>
                        </p>
                        <label for="unit_price">单品售价：</label>
                        <input class="norms" id="unit_price" type="text" placeholder="元" value="<?php echo $activity['unit_price'];?>" onblur="check_unit_price()">
                        <label for="buy_sum">每单拍：</label>
                        <input class="norms" id="buy_sum" type="text" placeholder="件" value="<?php echo $activity['buy_sum'];?>" onblur="check_unit_price()">
                        <span id="unit_price_error"></span>
                        <p class="total_money">下单总金额：<span id="xdzje"><?php echo (round($activity['unit_price']*$activity['buy_sum'],2));?></span>元</p>
                        <label for="freight">商品运费：</label>

                        <a href="javascript:void(0);">
                            <span id="baoyou" class="pinkage">全国包邮</span>
                            <span class="pinkage freight" id="yunfei">收取运费：</span>
                        </a>

                        <input class="norms" onkeypress="return event.keyCode>=48&&event.keyCode<=57" id="freight" type="text" placeholder="元" value="<?php echo $activity['freight'];?>">
                    </div>
                </div>
                <p class="note">
                    <b>提示：</b>
                    试客成功领取试用后，商家需按照提交的试用商品进行发货。若试客收到的商品与任务商品不一致，<br/>
                    平台会对商家进行严厉的处罚。
                </p>
                <div class="nextStep_btn">
                    <input onclick="location.href='/merchant_issue_try?act_id=<?php echo $act_id ?>'" type="button" value="上一步">
                    <input onclick="next_step();" type="button" value="下一步">
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/left.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
            $('.try_manage ul>li').find('a').eq(0).addClass('leftNav_active')
        // });

        $('.pinkage').bind('click',function(){
            $(this).css({'background':'url(images/merchant/spot.png) left center no-repeat'});
            $(this).siblings().css({'background':'url(images/merchant/sj_fbsy_icon_quan_default.png) left center no-repeat'});
            $(this).addClass("ifchoose").siblings().removeClass("ifchoose");
            if($("#baoyou").hasClass('ifchoose')){
                $("#freight").attr("disabled", true); 
            }else{
                $("#freight").attr("disabled", false); 
            }
        });

        var freight_init = <?php echo $activity['freight']?1:0;?>;
        console.log(freight_init);
        if(freight_init)
        {
            $("#yunfei").click();
        }else
        {
            $("#baoyou").click();
        }
    })

</script>
<script>
    function next_step(){
        var commodity_name = $("#commodity_name").val();
        if(commodity_name==''){
            $("#product_name_error").text("商品名称不得为空");
            return;
        }else{
            $("#product_name_error").text("");
        }

        var shop_url = $("#shop_url").val();
        if(shop_url==''){
            $("#product_link_error").text("商品链接不得为空");
            return;
        }else{
            $("#product_link_error").text("");
        }

        var reg = /.*[\u4e00-\u9fa5]+.*$/;
        if((reg.test(shop_url)) ){
            $("#product_link_error").text("商品链接中不得出现中文");
            return;
        }else{
            $("#product_link_error").text("");
        }

        var platform_id = "<?php echo $platform_id;?>";
        var iftmall = shop_url.indexOf("tmall");
        var iftaobao = shop_url.indexOf("taobao");
        if((iftmall>=0 && platform_id == 1)||(iftaobao>=0 && platform_id == 2)){
             $("#product_link_error").text("商品链接不匹配");
             return;
        }else{
            $("#product_link_error").text("");
        }
        var commodity_picture = $("#commodity_picture").val();
        if(commodity_picture==''){
            $("#picture_url_error").text("商品主图链接不得为空");
            return;
        }else{
            $("#picture_url_error").text("");
        }

        var reg = /.*[\u4e00-\u9fa5]+.*$/;
        if((reg.test(commodity_picture)) ){
            $("#picture_url_error").text("商品主图链接中不得出现中文");
            return;
        }else{
            $("#picture_url_error").text("");
        }

        var unit_price = $("#unit_price").val();
        if(unit_price=='' || unit_price==0){
            $("#unit_price_error").text("单品售价不得为空或者为0");
            return;
        }else{
            $("#unit_price_error").text("");
        }

        var reg = /\d+\.\d{0,2}|\d$/;
        if(!reg.test(unit_price)){
            $("#unit_price_error").text("单品售价格式错误");
            return;
        }else{
            $("#unit_price_error").text("");
        }

        var buy_sum = $("#buy_sum").val();
        if(buy_sum=='' || buy_sum==0){
            $("#unit_price_error").text("每单数量不得为空或者为0");
            return;
        }else{
            $("#unit_price_error").text("");
        }

        var reg = /\d+\.\d{0,2}|\d$/;
        if(!reg.test(buy_sum)){
            $("#unit_price_error").text("每单数量格式错误");
            return;
        }else{
            $("#unit_price_error").text("");
        }

        var freight = $("#freight").val();
        if($("#baoyou").hasClass('ifchoose')){
            $("#freight").val(0); 
        }else{
            var reg = /\d+\.\d{0,2}|\d*$/;
            if((!reg.test(freight))){
                $("#unit_price_error").text("运费格式错误");
                return;
            }else{
                $("#unit_price_error").text("");
            }
        }

       

        var act_id = "<?php echo $act_id ?>";
        var commodity_name = $("#commodity_name").val();
        var shop_url = $("#shop_url").val();
        var commodity_classify = $("#commodity_classify").val();
        var commodity_picture = $("#commodity_picture").val();
        var thecolor = $("#thecolor").val();
        var thesize = $("#thesize").val();
        var unit_price = $("#unit_price").val();
        var buy_sum = $("#buy_sum").val();
        var freight = $("#freight").val();
        var margin = buy_sum*unit_price;
        location.href=admin.url+"merchant_issue_try3?act_id="+act_id;
        $.ajax({
            url : admin.url+'merchant_issue_try2/update_fake_activity2',
            data:{act_id:act_id,commodity_name:commodity_name,shop_url:shop_url,commodity_classify:commodity_classify,commodity_picture:commodity_picture,thecolor:thecolor,thesize:thesize,unit_price:unit_price,buy_sum:buy_sum,freight:freight,margin:margin},
            type : 'post',
            cache : false,
            async : false,
            success : function (data){
               console.log(data);
               // location.href=admin.url+"merchant_issue_try3?act_id="+act_id;
            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }

    // function check_product_name(){
    //     if($("#commodity_name").val() == ''){
    //         $("#product_name_error").css("display","inline-block");
    //     }else{
    //         $("#product_name_error").css("display","none");
    //     }
    // }

    // function check_product_link(){
    //     if($("#shop_url").val() == ''){
    //         $("#product_link_error").css("display","inline-block");
    //     }else{
    //         $("#product_link_error").css("display","none");
    //     }
    // }

    // function check_picture_url(){
    //     if($("#commodity_picture").val() == ''){
    //         $("#picture_url_error").css("display","inline-block");
    //     }else{
    //         $("#picture_url_error").css("display","none");
    //     }
    // }

    function check_unit_price(){

         if($("#unit_price").val() == '' || $("#buy_sum").val() == ''){
            // $("#unit_price_error").css("display","inline-block");
            return;
        }else{
            $("#unit_price_error").css("display","none");
        }
        $("#xdzje").text(($("#unit_price").val() * $("#buy_sum").val()).toFixed(2));
    }

</script>
</body>
</html>









