<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="css/admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="css/admin/js/jquery.js"></script>
</head>
<style>
    .seachform .li{width:370px;}
    .leftNav_active{
          color:#f10180 !important ;
          text-decoration:underline ;
        }
</style>
<div class="tip-wrapper edit_shike_block" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="cancle_shike_info()"></a></div>
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>试客ID:</label><label id="edit_shike_id"></label></li>
        <li class="li"><label>注册时间:</label><label id="edit_reg_time"></label></li>
        <li class="li"><label>账号:</label><label id="edit_account"></label></li>
        <li class="li"><label>手机号</label><input id="edit_shike_phone" name="name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>QQ号</label><input id="edit_shike_qq" name="name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>会员类型ID:</label><label id="edit_shike_type"></label></li>
        <li class="li"><label>会员到期时间:</label><label id="edit_end_time"></label></li>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="sure" type="button"  class="sure" value="保存" onclick="set_shike_info()"/>&nbsp;
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="cancle_shike_info()"/>
    </div>
</div>
</div>
<body>
    <!-- <div class="edit_shike_block" style="position:absolute;width:800px;height:300px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_shike_id" style="font-size:30px;width:270px;margin:auto">试客ID:</p></div>
            <div style="width:490px;float:left"><p id="edit_reg_time" style="font-size:30px;width:470px;margin:auto">注册时间:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_account" style="font-size:30px;width:250px;margin:auto">账号:</p></div>
            <div style="width:120px;float:left"><p style="font-size:30px;width:120px;margin:auto">手机号:</p></div>
            <div style="width:370px;float:left"><input id="edit_shike_phone" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:30px;width:90px;margin:auto">QQ号:</p></div>
            <div style="width:370px;float:left"><input id="edit_shike_qq" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_shike_type" style="font-size:30px;width:270px;margin:auto">会员类型:</p></div>
            <div style="width:490px;float:left"><p id="edit_end_time" style="font-size:30px;width:470px;margin:auto">会员到期时间:</p></div>
        </div>
         <div style="overflow:hidden">
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="保存" onclick="set_shike_info()"></div>
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="取消" onclick="cancle_shike_info()"></div>
        </div>
    </div> -->
<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="javascript:void(0)">首页</a></li>
            <li><a href="/aadmin_shike_basic">订单列表</a></li>
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
            location.href="/admin_shike_basic/search?search="+account;
        }
    </script>
	<div class="formtitle1"><span>试客基本信息</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>试客ID</th>
        <th>注册时间</th>
        <th>试客账号</th>
        <th>手机号</th>
        <th>QQ号</th>
        <th>淘宝账号</th>
        <th>淘宝账号状态</th>
        <th>淘宝账号审核</th>
        <th>会员类型</th>
        <th>会员到期时间</th>
		<th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($users as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['user_id'];?></td>
        <td><?php echo $v['reg_time'];?></td>
        <td><?php echo $v['user_name'];?></td>
        <td><?php echo $v['phone'];?></td>
        <td><?php echo $v['user_qq'];?></td>
        <td><?php echo $v['taobao_id'];?></td>
        <td><?php 
        if(!$v['taobao_status']){
            echo "未绑定";
        }elseif($v['taobao_status'] == 1){
            echo "待审核";
        }else{
            echo "已审核";
        }?>
        </td>
        <td>
        <?php if($v['taobao_status'] == 1):?>
            <a href="javascript:void(0)" class="tablelink" onclick="check_taobao(<?php echo $v['user_id'];?>)">审核</a>
        <?php else:?>
            --
        <?php endif;?>
        </td>
        <td><?php echo ($v['level']==1 ? '普通会员':'VIP会员');?></td>
		<td><?php echo $v['vip_endtime'];?></td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_shike(<?php echo $count;?>)">编辑</a></td>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['user_id'];?>">
        <input type="hidden" id="shike_user_id" value="hello">
        <?php endforeach ?>
        </tbody>
    </table>
    <?php echo $pagin; ?>
    
    <div class="tip" id="tip1">
    	<div class="tiptop"><span>提示信息</span><a onclick="hide_tip1()"></a></div>
        
      <div class="tipinfo">
        <!-- <span><img src="images/ticon.png" /></span> -->
        <div class="tipright">
        <p>淘宝账号：<input style="border:1px solid black" type="text" id="taobao_id"></p>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="cancel" value="审核通过" onclick="pass_check()"/>
        <input name="" type="button"  class="cancel" value="取消" onclick="cacel_check()"/>
        <input name="" type="button"  class="cancel" value="驳回" onclick="fail_check()"/>
        </div>

    </div> 
    </div>   
    </div>
</section>
<script src="js/shike/jquery-1.10.2.js"></script>
<script>
	$('.tablelist tbody tr:odd').addClass('odd');
    $('.shike_manage ul>li').find('a').eq(0).addClass('leftNav_active')
    function edit_shike(count){
            var user_id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_shike_basic/get_user_info",
                data:{
                    user_id:user_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_shike_id").text(data.user_id);
                    if(data.reg_time){
                        $("#edit_reg_time").text(data.reg_time.substring(0,10));
                    }
                    $("#edit_account").text(data.user_name);
                    $("#edit_shike_phone").val(data.phone);
                    $("#edit_shike_qq").val(data.user_qq);
                    $("#edit_shike_type").text((data.level==1 ? '试用会员':'正式会员'));
                    $("#edit_end_time").text(data.vip_endtime.substring(0,10));

                    $(".edit_shike_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
        function set_shike_info(){
            var user_id =  $("#edit_shike_id").text();
            var tel = $("#edit_shike_phone").val();
            var qq = $("#edit_shike_qq").val();
            // console.log(seller_id);
            // console.log(typeof seller_id);
            // console.log(tel);
            // console.log(typeof tel);
            // console.log(qq);
            // console.log(typeof qq);
            // return;
            $.ajax({
                url:"/admin_shike_basic/set_user_info",
                data:{
                    user_id:user_id,
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

        function cancle_shike_info(){
            $(".edit_shike_block").css("display","none");
        }
        function check_taobao(o){
            
            $("#tip1").css("display","block");
            $.ajax({
                url:"/admin_shike_basic/get_user_info",
                data:{
                    user_id:o,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#taobao_id").val(data.taobao_id);
                    // $("#edit_shike_id").text(data.user_id);
                    // if(data.reg_time){
                    //     $("#edit_reg_time").text(data.reg_time.substring(0,10));
                    // }
                    // $("#edit_account").text(data.user_name);
                    // $("#edit_shike_phone").val(data.phone);
                    // $("#edit_shike_qq").val(data.user_qq);
                    // $("#edit_shike_type").text((data.level==1 ? '试用会员':'正式会员'));
                    // $("#edit_end_time").text(data.vip_endtime.substring(0,10));

                    // $(".edit_shike_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
             $("#shike_user_id").val(o);

        }
        function hide_tip1(){
            $("#tip1").css("display","none");
        }
        function cacel_check(){
            $(".tip").css("display","none");
        }
        function pass_check(){
            var user_id = $("#shike_user_id").val();
            $.ajax({
                url:"/admin_shike_basic/pass_check",
                data:{
                    user_id:user_id,
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
        function fail_check(){
            var user_id = $("#shike_user_id").val();
            $.ajax({
                url:"/admin_shike_basic/fail_check",
                data:{
                    user_id:user_id,
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
	</script>

</body>

</html>
