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

<style>
    .seachform .li{width:370px;}

    .leftNav_active{
      color:#f10180 !important ;
      text-decoration:underline ;
    }
</style>
<div class="tip-wrapper edit_merchant_block" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="cancle_seller_info()"></a></div>
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>商家ID:</label><label id="edit_merchant_id"></label></li>
        <li class="li"><label>注册时间:</label><label id="edit_reg_time"></label></li>
        <li class="li"><label>账号:</label><label id="edit_account"></label></li>
        <li class="li"><label>手机号</label><input id="edit_merchant_phone" name="name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>QQ号</label><input id="edit_merchant_qq" name="name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>会员类型ID:</label><label id="edit_merchant_type"></label></li>
        <li class="li"><label>会员到期时间:</label><label id="edit_end_time"></label></li>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="sure" type="button"  class="sure" value="保存" onclick="set_seller_info()"/>&nbsp;
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="cancle_seller_info()"/>
    </div>
</div>
</div>
<body>
   <!--  <div class="edit_merchant_block" style="position:absolute;width:800px;height:300px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
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
            <li><a href="/admin">首页</a></li>
            <li><a href="/admin_merchant_basic">商家管理</a></li>
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
            location.href="/admin_merchant_basic/search?search="+account;
        }
    </script>
	<div class="formtitle1"><span>商家基本信息</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>商家ID</th>
        <th>注册时间</th>
        <th>商家账号</th>
        <th>手机号</th>
        <th>QQ号</th>
        <th>会员类型</th>
        <th>会员到期时间</th>
		<th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($sellers as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['seller_id'];?></td>
        <td><?php echo $v['reg_time'];?></td>
        <td><?php echo $v['user_name'];?></td>
        <td><?php echo $v['tel'];?></td>
        <td><?php echo $v['qq'];?></td>
        <td><?php echo ($v['level']==1 ? '试用会员':'正式会员');?></td>
		<td><?php echo $v['end_time'];?></td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_merchant(<?php echo $count;?>)">编辑</a></td>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['seller_id'];?>">
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


	 $('.merchant_manage ul>li').find('a').eq(0).addClass('leftNav_active')
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
                    $("#edit_merchant_id").text(data.seller_id);
                    $("#edit_reg_time").text(data.reg_time.substring(0,10));
                    $("#edit_account").text(data.user_name);
                    $("#edit_merchant_phone").val(data.tel);
                    $("#edit_merchant_qq").val(data.qq);
                    $("#edit_merchant_type").text((data.level==1 ? '试用会员':'正式会员'));
                    $("#edit_end_time").text(data.end_time.substring(0,10));

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
            var seller_id =  $("#edit_merchant_id").text();
            var tel = $("#edit_merchant_phone").val();
            var qq = $("#edit_merchant_qq").val();
            // console.log(seller_id);
            // console.log(typeof seller_id);
            // console.log(tel);
            // console.log(typeof tel);
            // console.log(qq);
            // console.log(typeof qq);
            // alert(seller_id);
            // alert(tel);
            // alert(qq);
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
