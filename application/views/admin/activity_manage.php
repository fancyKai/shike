<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="css/admin/css/select.css" rel="stylesheet" type="text/css" />
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
<script>
 $('.activity_manage').find('a').eq(0).addClass('leftNav_active')
    // $(document).click(function(){
    //     $(".edit_activity_block").hide();
    //     $(".edit_shike_info_block").hide();

    // });
    // $(".edit_activity_block").click(function(event){
    // event.stopPropagation();});
    // $(".edit_shike_info_block").click(function(event){
    // event.stopPropagation();});
</script>
<style>
    .seachform .li{width:370px;}
     .leftNav_active{
         color:#f10180 !important ;
         text-decoration:underline ;
     }
     .tablelist th:last-of-type{
         min-width:60px;
         text-align:center;
         text-indent:0;
     }
     .tablelist td:last-of-type{
         min-width:60px;
         text-align:center;
         text-indent:0;
     }
</style>
<div class="tip-wrapper edit_activity_block" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="hide_edit_activity_block()"></a></div>
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>活动订单号:</label><label id="edit_act_id"></label></li>
        <li class="li"><label>生成时间:</label><label id="edit_gene_time"></label></li>
        <li class="li"><label>账号:</label><label id="edit_account"></label></li>
        <li class="li"><label>商品名称</label><input id="edit_product_name" name="name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li style="width:760px;"><label>商品链接</label><input id="edit_product_link"  name="name" id="" value="" type="text" class="scinput" style="width:600px"/></li>
        <li class="li"><label>店铺名称</label><input id="edit_shop_name" name="name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>平台</label><input id="edit_platform" name="name" id="" value="" type="text" class="scinput" readonly="readonly"  style="width:300px"/></li>
        <li style="width:760px;"><label>商品主图</label><input id="edit_picture_url" name="name" id="" value="" type="text" class="scinput" style="width:600px"/></li>
        <li class="li">
            <label>商品分类</label>
            <select id="edit_product_classify" class="scinput" style="width:200px;opacity:1">
                <option value="1">女装</option>
                <option value="2">男装</option>
                <option value="3">美妆</option>
                <option value="4">鞋包配饰</option>
                <option value="5" selected="selected">居家生活</option>
                <option value="6">数码电器</option>
                <option value="7">母婴儿童</option>
                <option value="8">户外运动</option>
                <option value="9">食品酒水</option>
                <option value="10">其他</option>
            </select>
            <!-- <input id="edit_product_classify" name="name" id="" value="" type="text" class="scinput" style="width:300px"/> -->
        </li>
        <li class="li"><label>商品规格</label><input name="name" id="edit_color" value="" type="text" class="scinput" style="width:145px"/>-<input name="name" id="edit_size" value="" type="text" class="scinput" style="width:145px"/></li>
        <li class="li"><label>单品价格:</label><label id="edit_unit_price"></label></li>
        <li class="li"><label>每单拍 件</label><label id="edit_buy_sum"></label></li>
        <li style="width:760px;">
            <label>商品运费:</label><input name="name" id="check_freight1" value="" type="radio" class="scinput" style="width:10px;float:left;height:25px;"/>
            <label>全国包邮</label><input name="name" id="check_freight2" value="" type="radio" class="scinput" style="width:10px;float:left;height:25px;"/>
            <label>收取费用</label><input name="name" id="edit_freight" value="" type="text" class="scinput" style="float:left;"/><label>元</label></li>
        <li class="li"><label>搜索方式:</label><label id="edit_search_platform"></label></li>
        <li class="li"><label>搜索关键字:</label><!-- <label id="edit_key_words"></label> --><input id="edit_key_words" name="name" value="" type="text" class="scinput" style="width:300px"/></li>
        <li style="width:760px;"><label>商品搜索主图</label><input name="name" id="edit_t_picture_url" value="" type="text" class="scinput" style="width:600px"/></li>
        <li style="width:760px;"><label>筛选列表</label>
            <input name="name" id="edit_t_classify1" value="" type="text" class="scinput" style="width:125px"/>&nbsp;
            <input name="name" id="edit_t_classify2" value="" type="text" class="scinput" style="width:125px"/>&nbsp;
            <input name="name" id="edit_t_classify3" value="" type="text" class="scinput" style="width:125px"/>&nbsp;
            <input name="name" id="edit_t_classify4" value="" type="text" class="scinput" style="width:125px"/>&nbsp;
            <input name="name" id="edit_t_classify5" value="" type="text" class="scinput" style="width:125px"/>&nbsp;
        </li>
        <li id="zkfw1" style="width:760px;"><label>折扣服务:</label>
            <input name="name" id="edit_ser1" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>全国包邮</label>
            <input name="name" id="edit_ser2" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>赠送退货运费险</label>
            <input name="name" id="edit_ser3" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>货到付款</label>
            <input name="name" id="edit_ser4" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>海外商品</label>
            <input name="name" id="edit_ser5" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>二手</label>
            <input name="name" id="edit_ser6" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>天猫</label>
            <input name="name" id="edit_ser7" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>正品保障</label>
            <input name="name" id="edit_ser8" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>24小时内发货</label>
            <input name="name" id="edit_ser9" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>7+天退换货</label>
            <input name="name" id="edit_ser10" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>旺旺在线</label>
            <input name="name" id="edit_ser11" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>新品</label>
        </li>
        <li id="zkfw2" style="width:760px;" style="display:none"><label>折扣服务:</label>
            <input name="name" id="edit_ser12" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>新到商品</label>
            <input name="name" id="edit_ser1_" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>包邮</label>
            <input name="name" id="edit_ser13" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>折扣</label>
            <input name="name" id="edit_ser14" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>搭配减价</label>
            <input name="name" id="edit_ser15" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>满就减</label>
            <input name="name" id="edit_ser3_" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>货到付款</label>
        </li>
        <li style="width:760px;"><label>排序方式</label>
            <select id="edit_t_sort" class="scinput" style="width:200px;opacity:1">
                <option value="1">综合排序</option>
                <option value="2">销量从高到低</option>
                <option value="3">信用从高到低</option>
                <option value="4">价格从低到高</option>
                <option value="5">价格从高到低</option>
                <option value="6">总价从低到高</option>
                <option value="7">总价从高到低</option>
                <option value="8">人气从高到低</option>
                <option value="9">新品排序</option>
            </select>
            <!-- <input name="name" id="edit_t_sort" value="" type="text" class="scinput" style="width:100px"/> -->
        </li>
        <li style="width:760px;"><label>价格:</label>
            <input name="name" id="edit_lower_price" value="" type="text" class="scinput" style="float:left;"/><label>元&nbsp;&nbsp;-</label>
            <input name="name" id="edit_higher_price" value="" type="text" class="scinput" style="float:left;"/><label>元</label>
        </li>
        <li class="li" id="fhd"><label>发货地</label><input id="edit_t_delivery_place" name="name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>商品押金:</label><label id="edit_deposit"></label></li>
        <li class="li"><label>试用担保金:</label><label id="edit_guarantee"></label></li>
        <li  style="width:760px;"><label>订单合计:</label><label id="edit_total_money"></label></li>
        <li  style="width:760px;"><label>优惠券价格:</label><label id="edit_win_money"></label></li>
        <li  style="width:760px;"><label>优惠券链接:</label><input type="text" id="edit_win_url" class="scinput" style="width:300px"></li>
        <li  style="width:760px;"><label>二合一链接:</label><input type="text" id="edit_win_two_url" class="scinput" style="width:300px"></li>
        <li  style="width:760px;"><label>状态:</label><label id="edit_status"></label></li>
        <li  id="edit_apply_user_li" style="width:760px;"><label>申请试客:</label><label id="edit_apply_user"></label></li>
        <li  id="edit_apply_user_suc_li" style="width:760px;"><label>中奖试客:</label><label id="edit_apply_user_suc"></label></li>

        <div style="clear:both;"></div>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;float:left">
        <input name="sure" id="release_activity" type="button"  class="sure" value="发布" style="float:left"/>&nbsp;
        <input id="cancle_button" name="cancel" type="button"  class="cancel" value="确定" style="margin-left:70px;float:left" onclick="hide_edit_activity_block()"/>
        <input name="cancel" id="ban_activity" type="button"  class="sure" value="驳回" style="margin-left:70px;float:left" />
        <input name="save" id="save_activity" type="button"  class="sure" value="保存" style="margin-left:70px;float:lefti;display:none" />
    </div>
</div>
</div>

<style>
    .edit_merchant_block div{height:55px;}
</style>
<body>
    <!-- <div class="edit_activity_block" style="position:absolute;width:800px;height:800px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
        <img src="images/close.jpg" style="width:30px;height:30px;position:absolute;top:0;right:0;cursor:pointer" onclick="hide_edit_activity_block()">
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_act_id" style="font-size:24px;width:270px;margin:auto">活动订单号:</p></div>
            <div style="width:490px;float:left"><p id="edit_gene_time" style="font-size:24px;width:470px;margin:auto">生成时间:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_account" style="font-size:24px;width:250px;margin:auto">账号:</p></div>
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">商品名称</p></div>
            <div style="width:370px;float:left"><input id="edit_product_name" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">商品链接</p></div>
            <div style="width:500px;float:left"><input id="edit_product_link" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">店铺名称</p></div>
            <div style="width:250px;float:left"><input id="edit_shop_name" type="text" style="height:40px;border:1px solid;width:100%"></div>
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">平台</p></div>
            <div style="width:250px;float:left"><input id="edit_platform" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">商品主图</p></div>
            <div style="width:500px;float:left"><input id="edit_picture_url" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">商品分类</p></div>
            <div style="width:250px;float:left"><input id="edit_product_classify" type="text" style="height:40px;border:1px solid;width:100%"></div>
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">商品规格</p></div>
            <div style="width:100px;float:left"><input id="edit_color" type="text" style="height:40px;border:1px solid;width:100%"></div>
            <div style="width:100px;float:left"><input id="edit_size" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:350px;float:left"><p id="edit_unit_price" style="font-size:24px;width:270px;margin:auto">单品价格:</p></div>
            <div style="width:440px;float:left"><p id="edit_buy_sum" style="font-size:24px;width:470px;margin:auto">每单拍 件</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:150px;float:left"><p style="font-size:24px;width:100%;margin:auto">商品运费:</p></div>
            <div style="width:200px;float:left"><input id="check_freight1" name="check_freight" type="radio" style="float:left;width:10%"><p style="font-size:24px;width:90%;margin:auto">全国包邮</p></div>
            <div style="width:120px;float:left"><input id="check_freight2" name="check_freight" type="radio" style="float:left;width:10%"><p id="edit_buy_sum" style="font-size:24px;width:90%;margin:auto">收取费用</p></div>
            <div style="width:200px;float:left"><input id="edit_freight" style="width:90%;border:1px solid;height:30px" type="text">元</div>
        </div>
        <div style="overflow:hidden">
            <div style="width:200px;float:left"><p style="font-size:24px;width:100%">搜索方式:</p></div>
            <div style="width:120px;float:left"><p id="edit_search_platform" style="font-size:24px;width:120px;margin:auto"></p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:200px;float:left"><p style="font-size:24px;width:100%">搜索关键字:</p></div>
            <div style="width:120px;float:left"><p id="edit_key_words" style="font-size:24px;width:120px;margin:auto"></p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:150px;float:left"><p style="font-size:24px;width:100%;margin:auto">商品搜索主图</p></div>
            <div style="width:500px;float:left"><input id="edit_t_picture_url" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">筛选列表</p></div>          
            <div style="width:120px;float:left"><input id="edit_t_classify1" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:120px;float:left"><input id="edit_t_classify2" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:120px;float:left"><input id="edit_t_classify3" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:120px;float:left"><input id="edit_t_classify4" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:120px;float:left"><input id="edit_t_classify5" type="text" style="height:40px;border:1px solid;width:90%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">折扣服务</p></div>          
            <div style="width:60px;float:left"><input id="edit_ser1" type="checkbox" style="float:left;width:10%">包邮</div>
            <div style="width:60px;float:left"><input id="edit_ser2" type="checkbox" style="float:left;width:10%">赠送退货运费险</div>
            <div style="width:60px;float:left"><input id="edit_ser3" type="checkbox" style="float:left;width:10%">货到付款</div>
            <div style="width:60px;float:left"><input id="edit_ser4" type="checkbox" style="float:left;width:10%">海外商品</div>
            <div style="width:60px;float:left"><input id="edit_ser5" type="checkbox" style="float:left;width:10%">二手</div>
            <div style="width:60px;float:left"><input id="edit_ser6" type="checkbox" style="float:left;width:10%">天猫</div>
            <div style="width:60px;float:left"><input id="edit_ser7" type="checkbox" style="float:left;width:10%">正品保障</div>
            <div style="width:60px;float:left"><input id="edit_ser8" type="checkbox" style="float:left;width:10%">24小时内发货</div>
            <div style="width:60px;float:left"><input id="edit_ser9" type="checkbox" style="float:left;width:10%">7+天退换货</div>
            <div style="width:60px;float:left"><input id="edit_ser10" type="checkbox" style="float:left;width:10%">旺旺在线</div>
            <div style="width:60px;float:left"><input id="edit_ser11" type="checkbox" style="float:left;width:10%">新品</div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">排序方式</p></div>
            <div style="width:250px;float:left"><input id="edit_t_sort" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">价格</p></div>          
            <div style="width:120px;float:left"><input id="edit_lower_price" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:30px;float:left">元-</div>
            <div style="width:120px;float:left"><input id="edit_higher_price" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:30px;float:left">元</div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_deposit" style="font-size:24px;width:270px;margin:auto">商品押金:</p></div>
            <div style="width:490px;float:left"><p id="edit_guarantee" style="font-size:24px;width:470px;margin:auto">试用担保金:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_total_money" style="font-size:24px;width:270px;margin:auto">订单合计:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_status" style="font-size:24px;width:270px;margin:auto">状态:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_apply_user" style="font-size:24px;width:270px;margin:auto">申请试客:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_apply_user_suc" style="font-size:24px;width:270px;margin:auto">中奖试客:</p></div>
        </div>
         <div style="overflow:hidden">
            <div style="width:260px;float:left" id="release_activity"><input type="button" style="width:200px;height:55px;font-size:24px;margin-left:95px" value="发布"></div>
            <div style="width:260px;float:left"><input type="button" style="width:200px;height:55px;font-size:24px;margin-left:95px" value="取消" onclick="hide_edit_activity_block()"></div>
            <div style="width:260px;float:left" id="ban_activity"><input type="button" style="width:200px;height:55px;font-size:24px;margin-left:95px" value="驳回"></div>
        </div>
    </div> -->

    <div class="edit_shike_info_block" style="position:absolute;width:280px;height:400px;border:1px solid;background:white;z-index:101;top:500px;right:200px;display:none">
        <img src="images/close.jpg" style="width:30px;height:30px;position:absolute;top:0;right:0;cursor:pointer" onclick="hide_edit_shike_info_block()">
        <div style="overflow:hidden;width:220px;margin:20px auto 0">
            <input style="float:left;border:1px solid;width:100px" type="text" id="shike_search">
            <input type="hidden" id="hidden_act_id">
            <input style="float:left;border:1px solid;width:80px;margin-left:20px" type="button" value="查询" onclick="shike_search()">
        </div>
        <div class="shike_info_block2" style="overflow:hidden;width:220px;height:300px;margin:20px auto 0;overflow-y:scroll">
            <div>试客账号</div>
        </div>
    </div>
    <style>
        .shike_info_block2 div{text-align:center;height:30px;line-height:30px;border:1px solid}
    </style>

    <script>
        function release_activity(count){
            var edit_search_platform_string = $("#edit_search_platform").text();
            if(edit_search_platform_string == '淘宝自然搜索'){
                ser_platformid = 1;
            }else{
                ser_platformid = 2;
            }
            var act_id = $("#tag_"+count).val();
            var product_name = $("#edit_product_name").val();
            var product_link = $("#edit_product_link").val();
            var shop_name = $("#edit_shop_name").val();
            var platform = $("#edit_platform").val();
            if(platform=='淘宝'){
                platform = 1;
            }else{
                platform = 2;
            }
            var key_words = $("#edit_key_words").val();
            var picture_url = $("#edit_picture_url").val();
            var product_classify = $("#edit_product_classify").val();
            var color = $("#edit_color").val();
            var size = $("#edit_size").val();
            var freight = $("#edit_freight").val();
            var t_picture_url = $("#edit_t_picture_url").val();
            var t_classify1 = $("#edit_t_classify1").val();
            var t_classify2 = $("#edit_t_classify2").val();
            var t_classify3 = $("#edit_t_classify3").val();
            var t_classify4 = $("#edit_t_classify4").val();
            var t_classify5 = $("#edit_t_classify5").val();
            if($("#edit_ser1").prop('checked')){
                dis_ser1 = 1;
            }else{
                dis_ser1 = 0;
            }
            if($("#edit_ser2").prop('checked')){
                dis_ser2 = 1;
            }else{
                dis_ser2 = 0;
            }
            if($("#edit_ser3").prop('checked')){
                dis_ser3 = 1;
            }else{
                dis_ser3 = 0;
            }
            if($("#edit_ser4").prop('checked')){
                dis_ser4 = 1;
            }else{
                dis_ser4 = 0;
            }
            if($("#edit_ser5").prop('checked')){
                dis_ser5 = 1;
            }else{
                dis_ser5 = 0;
            }
            if($("#edit_ser6").prop('checked')){
                dis_ser6 = 1;
            }else{
                dis_ser6 = 0;
            }
            if($("#edit_ser7").prop('checked')){
                dis_ser7 = 1;
            }else{
                dis_ser7 = 0;
            }
            if($("#edit_ser8").prop('checked')){
                dis_ser8 = 1;
            }else{
                dis_ser8 = 0;
            }
            if($("#edit_ser9").prop('checked')){
                dis_ser9 = 1;
            }else{
                dis_ser9 = 0;
            }
            if($("#edit_ser10").prop('checked')){
                dis_ser10 = 1;
            }else{
                dis_ser10 = 0;
            }
            if($("#edit_ser11").prop('checked')){
                dis_ser11 = 1;
            }else{
                dis_ser11 = 0;
            }
            if($("#edit_ser12").prop('checked')){
                dis_ser12 = 1;
            }else{
                dis_ser12 = 0;
            }
            if($("#edit_ser13").prop('checked')){
                dis_ser13 = 1;
            }else{
                dis_ser13 = 0;
            }
            if($("#edit_ser14").prop('checked')){
                dis_ser14 = 1;
            }else{
                dis_ser14 = 0;
            }
            if($("#edit_ser15").prop('checked')){
                dis_ser15 = 1;
            }else{
                dis_ser15 = 0;
            }
            if($("#edit_ser1_").prop('checked')){
                dis_ser1_ = 1;
            }else{
                dis_ser1_ = 0;
            }
            if($("#edit_ser3_").prop('checked')){
                dis_ser3_ = 1;
            }else{
                dis_ser3_ = 0;
            }
            var t_sort = $("#edit_t_sort").val();
            var lower_price = $("#edit_lower_price").val();
            var higher_price = $("#edit_higher_price").val();
            var t_delivery_place = $("#edit_t_delivery_place").val();
            var win_url = $("#edit_win_url").val();
            var win_two_url = $("#edit_win_two_url").val();
            $.ajax({
                url:"/admin_activity_manage/release_activity",
                data:{
                    act_id:act_id,
                    product_name:product_name,
                    product_link:product_link,
                    shop_name:shop_name,
                    platform:platform,
                    picture_url:picture_url,
                    product_classify:product_classify,
                    color:color,
                    size:size,
                    freight:freight,
                    t_key_words:key_words,
                    t_picture_url:t_picture_url,
                    t_classify1:t_classify1,
                    t_classify2:t_classify2,
                    t_classify3:t_classify3,
                    t_classify4:t_classify4,
                    t_classify5:t_classify5,
                    dis_ser1:dis_ser1,
                    dis_ser2:dis_ser2,
                    dis_ser3:dis_ser3,
                    dis_ser4:dis_ser4,
                    dis_ser5:dis_ser5,
                    dis_ser6:dis_ser6,
                    dis_ser7:dis_ser7,
                    dis_ser8:dis_ser8,
                    dis_ser9:dis_ser9,
                    dis_ser10:dis_ser10,
                    dis_ser11:dis_ser11,
                    dis_ser12:dis_ser11,
                    dis_ser13:dis_ser11,
                    dis_ser14:dis_ser11,
                    dis_ser15:dis_ser11,
                    dis_ser1_:dis_ser1_,
                    dis_ser3_:dis_ser3_,
                    ser_platformid:ser_platformid,
                    t_sort:t_sort,
                    lower_price:lower_price,
                    higher_price:higher_price,
                    t_delivery_place:t_delivery_place,
                    win_url:win_url,
                    win_two_url:win_two_url,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }

        function save_activity(count){
            var edit_search_platform_string = $("#edit_search_platform").text();
            if(edit_search_platform_string == '淘宝自然搜索'){
                ser_platformid = 1;
            }else{
                ser_platformid = 2;
            }
            var act_id = $("#tag_"+count).val();
            var product_name = $("#edit_product_name").val();
            var product_link = $("#edit_product_link").val();
            var shop_name = $("#edit_shop_name").val();
            var platform = $("#edit_platform").val();
            if(platform=='淘宝'){
                platform = 1;
            }else{
                platform = 2;
            }
            var key_words = $("#edit_key_words").val();
            var picture_url = $("#edit_picture_url").val();
            var product_classify = $("#edit_product_classify").val();
            var color = $("#edit_color").val();
            var size = $("#edit_size").val();
            var freight = $("#edit_freight").val();
            var t_picture_url = $("#edit_t_picture_url").val();
            var t_classify1 = $("#edit_t_classify1").val();
            var t_classify2 = $("#edit_t_classify2").val();
            var t_classify3 = $("#edit_t_classify3").val();
            var t_classify4 = $("#edit_t_classify4").val();
            var t_classify5 = $("#edit_t_classify5").val();
            if($("#edit_ser1").prop('checked')){
                dis_ser1 = 1;
            }else{
                dis_ser1 = 0;
            }
            if($("#edit_ser2").prop('checked')){
                dis_ser2 = 1;
            }else{
                dis_ser2 = 0;
            }
            if($("#edit_ser3").prop('checked')){
                dis_ser3 = 1;
            }else{
                dis_ser3 = 0;
            }
            if($("#edit_ser4").prop('checked')){
                dis_ser4 = 1;
            }else{
                dis_ser4 = 0;
            }
            if($("#edit_ser5").prop('checked')){
                dis_ser5 = 1;
            }else{
                dis_ser5 = 0;
            }
            if($("#edit_ser6").prop('checked')){
                dis_ser6 = 1;
            }else{
                dis_ser6 = 0;
            }
            if($("#edit_ser7").prop('checked')){
                dis_ser7 = 1;
            }else{
                dis_ser7 = 0;
            }
            if($("#edit_ser8").prop('checked')){
                dis_ser8 = 1;
            }else{
                dis_ser8 = 0;
            }
            if($("#edit_ser9").prop('checked')){
                dis_ser9 = 1;
            }else{
                dis_ser9 = 0;
            }
            if($("#edit_ser10").prop('checked')){
                dis_ser10 = 1;
            }else{
                dis_ser10 = 0;
            }
            if($("#edit_ser11").prop('checked')){
                dis_ser11 = 1;
            }else{
                dis_ser11 = 0;
            }
            if($("#edit_ser12").prop('checked')){
                dis_ser12 = 1;
            }else{
                dis_ser12 = 0;
            }
            if($("#edit_ser13").prop('checked')){
                dis_ser13 = 1;
            }else{
                dis_ser13 = 0;
            }
            if($("#edit_ser14").prop('checked')){
                dis_ser14 = 1;
            }else{
                dis_ser14 = 0;
            }
            if($("#edit_ser15").prop('checked')){
                dis_ser15 = 1;
            }else{
                dis_ser15 = 0;
            }
            if($("#edit_ser1_").prop('checked')){
                dis_ser1_ = 1;
            }else{
                dis_ser1_ = 0;
            }
            if($("#edit_ser3_").prop('checked')){
                dis_ser3_ = 1;
            }else{
                dis_ser3_ = 0;
            }
            var t_sort = $("#edit_t_sort").val();
            var lower_price = $("#edit_lower_price").val();
            var higher_price = $("#edit_higher_price").val();
            var t_delivery_place = $("#edit_t_delivery_place").val();
            var win_url = $("#edit_win_url").val();
            var win_two_url = $("#edit_win_two_url").val();
            $.ajax({
                url:"/admin_activity_manage/save_activity",
                data:{
                    act_id:act_id,
                    product_name:product_name,
                    product_link:product_link,
                    shop_name:shop_name,
                    platform:platform,
                    picture_url:picture_url,
                    product_classify:product_classify,
                    color:color,
                    size:size,
                    freight:freight,
                    t_key_words:key_words,
                    t_picture_url:t_picture_url,
                    t_classify1:t_classify1,
                    t_classify2:t_classify2,
                    t_classify3:t_classify3,
                    t_classify4:t_classify4,
                    t_classify5:t_classify5,
                    dis_ser1:dis_ser1,
                    dis_ser2:dis_ser2,
                    dis_ser3:dis_ser3,
                    dis_ser4:dis_ser4,
                    dis_ser5:dis_ser5,
                    dis_ser6:dis_ser6,
                    dis_ser7:dis_ser7,
                    dis_ser8:dis_ser8,
                    dis_ser9:dis_ser9,
                    dis_ser10:dis_ser10,
                    dis_ser11:dis_ser11,
                    dis_ser12:dis_ser11,
                    dis_ser13:dis_ser11,
                    dis_ser14:dis_ser11,
                    dis_ser15:dis_ser11,
                    dis_ser1_:dis_ser1_,
                    dis_ser3_:dis_ser3_,
                    ser_platformid:ser_platformid,
                    t_sort:t_sort,
                    lower_price:lower_price,
                    higher_price:higher_price,
                    t_delivery_place:t_delivery_place,
                    win_url:win_url,
                    win_two_url:win_two_url,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }

        function ban_activity(count){
            var act_id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_activity_manage/ban_activity",
                data:{
                    act_id:act_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }

        function hide_edit_activity_block(){
            $(".edit_activity_block").css("display","none");
        }
        function hide_edit_shike_info_block(){
            $(".edit_shike_info_block").css("display","none");
        }
        function edit_activity(count){
            var act_id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_activity_manage/get_activity_info",
                data:{
                    act_id:act_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_act_id").text(data.act_id);
                    $("#edit_gene_time").text(data.gene_time.substring(0,10));
                    $("#edit_account").text(data.seller_name);
                    $("#edit_product_name").val(data.product_name);
                    $("#edit_product_link").val(data.product_link);
                    $("#edit_shop_name").val(data.shopname);
                    $("#edit_platform").val((data.platformid==1)?'淘宝':'天猫');
                    $("#edit_picture_url").val(data.picture_url);
                    $("#edit_product_classify").val(data.product_classify);
                    $("#edit_color").val(data.color);
                    $("#edit_size").val(data.size);
                    $("#edit_unit_price").text(data.unit_price);
                    $("#edit_buy_sum").text(data.buy_sum);
                    if(data.status == 2){
                        $("#save_activity").css("display","inline-block");
                    }else{
                        $("#save_activity").css("display","none");
                    }
                    if(data.freight>0){
                        $("#edit_freight").val(data.freight);
                        $("#check_freight2").attr('checked','checked');
                        $("#check_freight1").attr('checked',false);
                    }else{
                        $("#check_freight1").attr('checked','checked');
                        $("#check_freight2").attr('checked',false);
                    }

                    if(data.dis_ser1 == 1){
                        $("#edit_ser1").prop('checked','checked');
                        $("#edit_ser1_").prop('checked','checked');
                    }else{
                        $("#edit_ser1").prop('checked',false);
                        $("#edit_ser1_").prop('checked',false);
                    }
                    if(data.dis_ser2 == 1){
                        $("#edit_ser2").prop('checked','checked');
                    }else{
                        $("#edit_ser2").prop('checked',false);
                    }
                    if(data.dis_ser3 == 1){
                        $("#edit_ser3").prop('checked','checked');
                        $("#edit_ser3_").prop('checked','checked');
                    }else{
                        $("#edit_ser3").prop('checked',false);
                        $("#edit_ser3_").prop('checked',false);
                    }
                    if(data.dis_ser4 == 1){
                        $("#edit_ser4").prop('checked','checked');
                    }else{
                        $("#edit_ser4").prop('checked',false);
                    }
                    if(data.dis_ser5 == 1){
                        $("#edit_ser5").prop('checked','checked');
                    }else{
                        $("#edit_ser5").prop('checked',false);
                    }
                    if(data.dis_ser6 == 1){
                        $("#edit_ser6").prop('checked','checked');
                    }else{
                        $("#edit_ser6").prop('checked',false);
                    }
                    if(data.dis_ser7 == 1){
                        $("#edit_ser7").prop('checked','checked');
                    }else{
                        $("#edit_ser7").prop('checked',false);
                    }
                    if(data.dis_ser8 == 1){
                        $("#edit_ser8").prop('checked','checked');
                    }else{
                        $("#edit_ser8").prop('checked',false);
                    }
                    if(data.dis_ser9 == 1){
                        $("#edit_ser9").prop('checked','checked');
                    }else{
                        $("#edit_ser9").prop('checked',false);
                    }
                    if(data.dis_ser10 == 1){
                        $("#edit_ser10").prop('checked','checked');
                    }else{
                        $("#edit_ser10").prop('checked',false);
                    }
                    if(data.dis_ser11 == 1){
                        $("#edit_ser11").prop('checked','checked');
                    }else{
                        $("#edit_ser11").prop('checked',false);
                    }
                    if(data.ser_platformid==1){
                        $("#zkfw1").css("display","block");
                        $("#zkfw2").css("display","none");
                        $("#fhd").css("display","block");
                    }else{
                        $("#zkfw2").css("display","block");
                        $("#zkfw1").css("display","none");
                        $("#fhd").css("display","none");
                    }
                    $("#edit_search_platform").text((data.ser_platformid==1)?'淘宝自然搜索':'天猫自然搜索');
                    $("#edit_key_words").val(data.t_key_words);
                    $("#edit_t_picture_url").val(data.t_picture_url);
                    $("#edit_t_delivery_place").val(data.t_delivery_place);
                    $("#edit_t_classify1").val(data.t_classify1);
                    $("#edit_t_classify2").val(data.t_classify2);
                    $("#edit_t_classify3").val(data.t_classify3);
                    $("#edit_t_classify4").val(data.t_classify4);
                    $("#edit_t_classify5").val(data.t_classify5);
                    $("#edit_t_sort").val(data.t_sort);
                    $("#edit_deposit").text(data.deposit);
                    $("#edit_guarantee").text(data.guarantee);
                    $("#edit_total_money").text(data.total_money);
                    $("#edit_win_money").text(data.win_money);
                    $("#edit_win_url").val(data.win_url);
                    $("#edit_win_two_url").val(data.win_two_url);
                    var status='';
                    $("#edit_apply_user_li").css("display","block");
                    $("#edit_apply_user_suc_li").css("display","block");
                    $("#release_activity").css("display","none");
                    $("#ban_activity").css("display","none");
                    $("#cancle_button").val("确定");
                    switch(data.status){
                        case "1":
                            status='待付款';
                            break;
                        case "2":
                            status='待发布';
                            $("#edit_apply_user_li").css("display","none");
                            $("#edit_apply_user_suc_li").css("display","none");
                            $("#release_activity").css("display","block");
                            $("#ban_activity").css("display","block");
                            $("#cancle_button").val("取消");
                            break;
                        case "3":
                            status='待开奖';
                            break;
                        case "4":
                            status='已开奖';
                            break;
                        case "5":
                            status='已取消';
                            break;
                        case "6":
                            status='审核不通过';
                            break;    
                        default:
                            // ...
                    }
                    $("#edit_status").text(status);
                    $("#edit_apply_user").text("申请试客：查看（"+data.apply_amount+"）");
                    $("#edit_apply_user").bind("click",function(){
                      edit_shike_info(count);
                    });
                    $("#release_activity").bind("click",function(){
                      release_activity(count);
                    });
                    $("#save_activity").bind("click",function(){
                      save_activity(count);
                    });
                    $("#ban_activity").bind("click",function(){
                      ban_activity(count);
                    });
                    $("#edit_apply_user_suc").text("中奖试客");
                    // $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    // $("#edit_account").text("账号: "+data.account);
                    // $("#edit_merchant_phone").val(data.tel);
                    // $("#edit_merchant_qq").val(data.qq);
                    // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));
                    if(data.status !=2){
                        $("#release_activity").css("display","none");
                    }
                    $(".edit_activity_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
        function shike_search(){
            var search = $("#shike_search").val();
            var act_id = $("#hidden_act_id").val();
            $.ajax({
                url:"/admin_activity_manage/get_shike_info_by_apply2",
                data:{
                    user_name:search,
                    act_id:act_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $(".shike_info_block2").children().remove();
                    var html = '<div>试客账号</div>';
                     for(var i=0;i<data.length;i++){
                        html += "<div>"+data[i].user_name+"</div>"
                    }
                     //$(".shike_info_block2").empty();
                    $(".shike_info_block2").append(html);
                    // var html = '';
                    // for(var i=0;i<data.length;i++){
                    //     html += "<div>"+data[i].user_id+"</div>"
                    // }
                    // console.log(html);
                    // $(".shike_info_block2").append(html);
                    // // $("#edit_merchant_id").text("商家ID: "+data.seller_id);
                    // // $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    // // $("#edit_account").text("账号: "+data.account);
                    // // $("#edit_merchant_phone").val(data.tel);
                    // // $("#edit_merchant_qq").val(data.qq);
                    // // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));

                    // $(".edit_shike_info_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
    </script>
<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="/admin">首页</a></li>
            <li><a href="/admin_activity_manage">活动管理</a></li>
        </ul>
    </div>
    
    <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label></label><input name="" type="text" class="scinput1" /></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="search()"/></li>
	    </ul>
    <script>
        function search(){
            var account = $(".scinput1").val();
            location.href="/admin_activity_manage/search?search="+account;
        }
    </script>
	<div class="formtitle1"><span>活动管理</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>活动订单号</th>
        <th>生成时间</th>
        <th>商家账号</th>
        <th>商品名称</th>
        <th>商品链接</th>
        <th>店铺名称</th>
        <th>平台</th>
        <th>试用份数</th>
        <th>商品运费</th>
        <th>商品押金</th>
        <th>试用担保金</th>
        <th>订单合计</th>
        <th>申请试客</th>
        <th>状态</th>
		<th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($activity as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['act_id'];?></td>
        <td><?php echo $v['gene_time'];?></td>
        <td><?php echo $v['user_name'];?></td>
        <td><?php echo $v['product_name'];?></td>
        <td><a target="blank" href="<?php echo $v['product_link'];?>"><?php echo $v['show_product_link'];?></a></td>
        <td><?php echo $v['shopname'];?></td>
        <td><?php echo ($v['platformid']==1 ? '淘宝':'天猫');?></td>
        <td><?php echo $v['apply_amount'];?></td>
        <td><?php echo $v['freight'];?></td>
        <td><?php echo $v['deposit'];?></td>
        <td><?php echo $v['guarantee'];?></td>
        <td><?php echo $v['total_money'];?></td>
        <?php if(!$v['apply_count']):?>
        <td onclick="javascript:void(0)"></td>
        <?php else:?>
        <td style="color:#00a4ac;cursor:pointer" onclick="edit_shike_info(<?php echo $count;?>)">查看（<?php echo $v['apply_count'];?>）</td>
        <?php endif;?>
        <td><?php if($v['status']==1){
            echo "待付款";
        }elseif ($v['status']==2) {
            echo "待发布";
        }elseif ($v['status']==3) {
            echo "待开奖";
        }elseif ($v['status']==4) {
            echo "已开奖";
        }elseif ($v['status']==5) {
            echo "已取消";
        };?></td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_activity(<?php echo $count;?>)">查看</a></td>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['act_id'];?>">
        <?php endforeach ?>
        </tbody>
    </table>
    <?php echo $pagin; ?>
    
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

        function edit_shike_info(count){
            var act_id = $("#tag_"+count).val();
            $("#hidden_act_id").val(act_id);
            $.ajax({
                url:"/admin_activity_manage/get_shike_info_by_apply",
                data:{
                    act_id:act_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    console.log(data[0]);
                    console.log(data.length);
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        html += "<div>"+data[i].user_name+"</div>"
                    }
                    console.log(html);
                    $(".shike_info_block2").empty();
                    $(".shike_info_block2").append(html);
                    // $("#edit_merchant_id").text("商家ID: "+data.seller_id);
                    // $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    // $("#edit_account").text("账号: "+data.account);
                    // $("#edit_merchant_phone").val(data.tel);
                    // $("#edit_merchant_qq").val(data.qq);
                    // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));
                    $(".edit_activity_block").css("display","none");
                    $(".edit_shike_info_block").css("display","block");
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
