<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/select.css" rel="stylesheet" type="text/css" />
<link href="css/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="css/admin/js/jquery.js"></script>
<!-- <script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="js/select-ui.min.js"></script>
<script type="text/javascript" src="editor/kindeditor.js"></script>

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<script type="text/javascript">
$(document).ready(function(e) {

	$(".select3").uedSelect({
		width : 152
	});
});
</script> -->


</head>

<style>
    .seachform .li{width:370px;}
     .leftNav_active{
              color:#f10180 !important ;
              text-decoration:underline ;
            }
</style>
<div class="tip-wrapper edit_order_block" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="hide_order_info()"></a></div>
    <form enctype="multipart/form-data">
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>订单编号:</label><label id="edit_outer_orderid"></label></li>
        <li class="li"><label>生成时间:</label><label id="edit_time"></label></li>
        <li class="li"><label>试客账号:</label><label id="edit_shike_name"></label></li>
        <li class="li"><label>商家账号:</label><label id="edit_merchant_name"></label></li>
        <li class="li"><label>商品名称:</label><label id="edit_product_name"></label></li>
        <li class="li"><label>店铺名称:</label><label id="edit_shopname"></label></li>
        <li class="li"><label>平台:</label><label id="edit_platform"></label></li>
        <li class="li"><label>商品链接:</label><label id="edit_product_link"></label></li>
        <li class="li"><label>商品分类:</label><label id="edit_product_classify"></label></li>
        <li class="li"><label>商品规格:</label><label id="edit_color_size"></label></li>
        <li class="li"><label>单品售价:</label><label id="edit_unit_price"></label></li>
        <li class="li"><label>每单拍:</label><label id="edit_buy_sum"></label><label>件</label></li>
        <li class="li"><label>商品运费:</label><label id="edit_freight"></label></li>
        <li style="border:1px solid;width:740px">
            <label style="border-bottom:1px solid;text-align:center;width:740px;">收藏宝贝和店铺</label>
            <label style="width:740px;height:200px;">
                <label>宝贝收藏：</label>
                <label><img id="edit_product_saveimg" style="width:260px;height:180px"></label>
                <label>店铺收藏：</label>
                <label><img id="edit_shop_saveimg" style="width:260px;height:180px"></label>
            </label>
        </li>

        <li style="border:1px solid;width:740px;margin-top:5px;">
            <label style="border-bottom:1px solid;text-align:center;width:740px;">浏览店铺</label>
            <label style="width:740px;"><label>宝贝链接1：</label><label id="edit_product_url1"></label></label>
            <label style="width:740px;"><label>宝贝链接2：</label><label id="edit_product_url2"></label></label>
            <label style="width:740px;"><label>宝贝链接3：</label><label id="edit_product_url3"></label></label>
            <label style="width:740px;"><label>宝贝链接4：</label><label id="edit_product_url4"></label></label>
        </li>
        <li style="border:1px solid;width:740px;margin-top:5px;">
            <label style="border-bottom:1px solid;text-align:center;width:740px;">客服聊天</label>
            <label style="width:740px;"><img id="edit_chatlog_img" style="margin-left:260px;width:260px;height:180px"></label>
        </li>
        <li style="border:1px solid;width:740px;margin-top:5px;">
            <label style="border-bottom:1px solid;text-align:center;width:740px;">淘宝订单</label>
            <label style="width:100px">订单信息：</label>
            <label style="width:250px">
                <label style="width:90px;">订单号</label><label id="edit_outer_orderid" style="width:150px;"></label>
                <label style="width:90px;">实际付款金额</label><label id="edit_real_paymoney" style="width:80px;">100.00</label><label>元</label>
            </label>
                <label>订单截图</label>
                <label><img id="edit_orderdetail_img" style="width:260px;height:180px"></label>
        </li>
        <li style="border:1px solid;width:740px;margin-top:5px;">
            <label style="border-bottom:1px solid;text-align:center;width:740px;">物流信息</label>
            <label id="edit_wuliu"></label>
        </li>
        <li style="border:1px solid;width:740px;margin-top:5px;">
            <label style="border-bottom:1px solid;text-align:center;width:740px;">评价信息</label>
            <label style="width:100px">评价内容：</label><label style="width:600px"><textarea id="edit_comment_detail"></textarea></label>
            <label style="width:100px">晒单照片</label>
            <label style="width:600px">
                <img id="edit_shaidan_img1" style="margin-top:5px;width:180px;height:150px">
                <img id="edit_shaidan_img2" style="margin-top:5px;width:180px;height:150px">
                <img id="edit_shaidan_img3" style="margin-top:5px;width:180px;height:150px">
                <img id="edit_shaidan_img4" style="margin-top:5px;width:180px;height:150px">
                <img id="edit_shaidan_img5" style="margin-top:5px;width:180px;height:150px">
            </label>
        </li>
        <li style="border:1px solid;width:740px;margin-top:5px;">
            <label style="border-bottom:1px solid;text-align:center;width:740px;">淘宝评价截图</label>
            <label style="width:740px;height:300px"><img id="edit_comment_img" style="width:600px;height:260px;margin-left:70px;margin-top:20px"></label>
        </li>
        <style>
            .tuikuantable{border:solid 1px;margin-top:10px;}
            .tuikuantable td{border:solid 1px;width:200px;}
        </style>
        <li style="border:1px solid;width:740px;margin-top:5px;">
            <label style="border-bottom:1px solid;text-align:center;width:740px;">返款信息</label>
            <label style="width:740px;height:95px">
                <table class="tuikuantable">
                    <tr>
                        <td>退款时间</td>
                        <td>实际付款时间</td>
                        <td>运费</td>
                        <td>退款金额</td>
                        <td>状态</td>
                    </tr>
                    <tr>
                        <td id="edit_tuikuan_time">0</td>
                        <td id="edit_realpaytime">0</td>
                        <td id="edit_tuikuan_freight">0</td>
                        <td id="edit_tuikuan_money">0</td>
                        <td id="edit_tuikuan_status">0</td>
                    </tr>
                </table>

            </label>
        </li>

        <li class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
        <input name="sure" type="submit"  class="sure" value="确定" onclick="hide_order_info()" />&nbsp;
        </li>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <!-- <li class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="sure" type="submit"  class="sure" value="确定" onclick="hide_order_info()" />&nbsp;
    </li> -->
    <input type="hidden" id="edit_seller_id" name="edit_seller_id">
    <input type="hidden" id="edit_shop_idd" name="edit_shop_idd">
    </form>
</div>
</div>
<body>
    <!-- <div class="edit_merchant_block" style="position:absolute;width:800px;height:300px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_merchant_id" style="font-size:30px;width:270px;margin:auto">商家ID:</p></div>
            <div style="width:490px;float:left"><p id="edit_reg_time" style="font-size:30px;width:470px;margin:auto">注册时间:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_account" style="font-size:30px;width:250px;margin:auto">账号:</p></div>
            <div style="width:120px;float:left"><p style="font-size:30px;width:120px;margin:auto">手机号:</p></div>
            <div style="width:370px;float:left"><input id="edit_merchant_phone" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:30px;width:90px;margin:auto">QQ号:</p></div>
            <div style="width:370px;float:left"><input id="edit_merchant_qq" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_merchant_type" style="font-size:30px;width:270px;margin:auto">会员类型:</p></div>
            <div style="width:490px;float:left"><p id="edit_end_time" style="font-size:30px;width:470px;margin:auto">会员到期时间:</p></div>
        </div>
         <div style="overflow:hidden">
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="保存" onclick="set_seller_info()"></div>
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="取消" onclick="cancle_seller_info()"></div>
        </div>
    </div> -->
<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">订单列表</a></li>
        </ul>
    </div>
    
    <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label>账号</label><input name="" type="text" class="scinput1" /></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="search()"/></li>
	    </ul>
    <script>
        function search(){
            var account = $(".scinput1").val();
            location.href="/admin_try_winningManage/search?search="+account;
        }
    </script>
	<div class="formtitle1"><span>商家基本信息</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>订单编号</th>
        <th>生成时间</th>
        <th>试客账号</th>
        <th>商家账号</th>
        <th>商品名称</th>
        <th>店铺名称</th>
        <th>平台</th>
		<th>商品链接</th>
        <th>详情信息</th>
        <th>状态</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($orders as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['outer_orderid'];?></td>
        <td><?php echo $v['time'];?></td>
        <td><?php echo $v['shike_name'];?></td>
        <td><?php echo $v['merchant_name'];?></td>
        <td><?php echo $v['product_name'];?></td>
        <td><?php echo $v['shopname'];?></td>
		<td><?php echo ($v['platform_id']==1?"淘宝":"天猫");?></td>
        <td><a target="blank" href="<?php echo $v['product_link'];?>"><?php echo $v['show_product_link'];?></a></td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_order(<?php echo $count;?>)">查看</a></td>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['order_id'];?>">
    <?php if($v['status'] == 1):?>
        <td>待发货</td>
    <?php endif;?>
    <?php if($v['status'] == 2):?>
        <td>待审核评价</td>
    <?php endif;?>
    <?php if($v['status'] == 3):?>
        <td>待确认评价</td>
    <?php endif;?>
    <?php if($v['status'] == 4):?>
        <td>待领取下单</td>
    <?php endif;?>
    <?php if($v['status'] == 5):?>
        <td>待复制评价</td>
    <?php endif;?>
    <?php if($v['status'] == 6):?>
        <td>待收货评价</td>
    <?php endif;?>
    <?php if($v['status'] == 7):?>
        <td>已完成</td>
    <?php endif;?>
    <?php if($v['status'] == 8):?>
        <td>已取消</td>
    <?php endif;?>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['order_id'];?>">
        <?php endforeach ?>
        </tbody>
    </table>
    <?php echo $pagin; ?>
    <script>
    $('.lottery_manage ul>li').find('a').eq(0).addClass('leftNav_active')
        function edit_order(count){
            var order_id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_try_winningManage/get_order_info",
                data:{
                    order_id:order_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_outer_orderid").text(data.outer_orderid);
                    $("#edit_time").text(data.time);
                    $("#edit_shike_name").text(data.shike_name);
                    $("#edit_merchant_name").text(data.merchant_name);
                    $("#edit_product_name").text(data.product_name);
                    $("#edit_shopname").text(data.shopname);
                    $("#edit_platform").text(data.platform_id==1?"淘宝":"天猫");
                    $("#edit_product_link").text(data.product_link);
                    if (data.product_classify == 1){
                        $("#edit_product_classify").text("女装");
                    } else if (data.product_classify == 2){
                        $("#edit_product_classify").text("男装");
                    } else if (data.product_classify == 3){
                        $("#edit_product_classify").text("美妆");
                    } else if (data.product_classify == 4){
                        $("#edit_product_classify").text("鞋包配饰");
                    } else if (data.product_classify == 5){
                        $("#edit_product_classify").text("居家生活");
                    } else if (data.product_classify == 6){
                        $("#edit_product_classify").text("数码电器");
                    } else if (data.product_classify == 7){
                        $("#edit_product_classify").text("母婴儿童");
                    } else if (data.product_classify == 8){
                        $("#edit_product_classify").text("户外运动");
                    } else if (data.product_classify == 9){
                        $("#edit_product_classify").text("食品酒水");
                    } else if (data.product_classify == 10){
                        $("#edit_product_classify").text("其他");
                    }
                    $("#edit_pcolor_size").text(data.color+data.size);
                    $("#edit_unit_price").text(data.unit_price);
                    $("#edit_product_saveimg").attr('src',data.product_saveimg);
                    $("#edit_shop_saveimg").attr('src',data.shop_saveimg);
                    $("#edit_product_url1").text(data.product_url1);
                    $("#edit_product_url2").text(data.product_url2);
                    $("#edit_product_url3").text(data.product_url3);
                    $("#edit_product_url4").text(data.product_url4);
                    $("#edit_chatlog_img").attr('src',data.chatlog_img);
                    $("#edit_outer_orderid").text(data.outer_orderid);
                    $("#edit_real_paymoney").text(data.real_paymoney);
                    $("#edit_orderdetail_img").attr('src',data.orderdetail_img);
                    $("#edit_wuliu").text(data.wuliu);
                    $("#edit_comment_detail").text(data.comment_detail);
                    $("#edit_shaidan_img1").attr('src',data.shaidan_img1);
                    $("#edit_shaidan_img2").attr('src',data.shaidan_img2);
                    $("#edit_shaidan_img3").attr('src',data.shaidan_img3);
                    $("#edit_shaidan_img4").attr('src',data.shaidan_img4);
                    $("#edit_shaidan_img5").attr('src',data.shaidan_img5);
                    $("#edit_comment_img").attr('src',data.comment_img);
                    $("#edit_tuikuan_time").text(data.time_7);
                    $("#edit_realpaytime").text(data.time);
                    if(data.freight==0){
                        $("#edit_tuikuan_freight").text("包邮");
                    }else{
                        $("#edit_tuikuan_freight").text(data.freight);
                    }
                    $("#edit_tuikuan_money").text(data.real_paymoney);
                    if(data.status == 7){
                    $("#edit_tuikuan_status").text("返款成功");
                    }
                    $(".edit_order_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
        function hide_order_info(){
            $(".edit_order_block").css("display","none");
        }
    </script>
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>

    </div> 
    </div>   
    </div>
</section>
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    <script>
        function edit_merchant(count){
            var seller_id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_merchant_basic/get_seller_info",
                data:{
                    seller_id:seller_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_merchant_id").text("商家ID: "+data.seller_id);
                    $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    $("#edit_account").text("账号: "+data.account);
                    $("#edit_merchant_phone").val(data.tel);
                    $("#edit_merchant_qq").val(data.qq);
                    $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));

                    $(".edit_merchant_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }

        function set_seller_info(){
            var seller_id =  $("#edit_merchant_id").text().substring(6);
            var tel = $("#edit_merchant_phone").val();
            var qq = $("#edit_merchant_qq").val();
            // console.log(seller_id);
            // console.log(typeof seller_id);
            // console.log(tel);
            // console.log(typeof tel);
            // console.log(qq);
            // console.log(typeof qq);
            // return;
            $.ajax({
                url:"/admin_merchant_basic/set_seller_info",
                data:{
                    seller_id:seller_id,
                    tel:tel,
                    qq:qq,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    //console.log(data);
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }

        function cancle_seller_info(){
            $(".edit_merchant_block").css("display","none");
        }
    </script>

</body>

</html>
