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
<div class="tip-wrapper edit_role_block" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="hide_edit_role_block()"></a></div>
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>角色名:</label><input id="edit_role_name" name="name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li" style="width:760px">
            <label>模块权限:</label>
            <input name="name" id="pri_merchant_check" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>商家管理</label>
            <input name="name" id="pri_shike_check" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>试客管理</label>
            <input name="name" id="pri_activity_check" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>活动管理</label>
            <input name="name" id="pri_order_check" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>中奖管理</label>
            <input name="name" id="pri_money_check" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>资金管理</label>
            <input name="name" id="pri_msg_check" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>消息管理</label>
            <input name="name" id="pri_pri_check" value="" type="checkbox" class="scinput" style="width:10px;float:left;height:25px;"/><label>权限管理</label>
        </li>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="sure" type="button"  class="sure submit_role_block" value="保存"/>&nbsp;
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="hide_edit_role_block()"/>
    </div>
</div>
</div>
<body>

  <!--   <div class="edit_role_block" style="position:absolute;width:800px;height:300px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p  style="font-size:30px;width:100%;margin:auto">角色名:</p></div>
            <div style="width:200px;float:left"><input id="edit_role_name" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden;height:170px">
             <div style="width:150px;float:left;height:55px"><p  style="font-size:30px;width:100%;margin:auto">模块权限:</p></div>
             <div style="width:300px;float:left;height:170px;">
                <div style="width:50%;float:left;height:55px;font-size:24px"><input id="pri_merchant_check" type="checkbox" style="margin-top:10px">商家管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input id="pri_shike_check" type="checkbox" style="margin-top:10px">试客管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input id="pri_activity_check" type="checkbox" style="margin-top:10px" >活动管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input id="pri_order_check" type="checkbox" style="margin-top:10px">订单管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input id="pri_money_check" type="checkbox" style="margin-top:10px">资金管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input id="pri_msg_check" type="checkbox" style="margin-top:10px">消息管理</div>
             </div>
        </div>
       
         <div style="overflow:hidden">
            <div style="width:200px;float:left"><input class="submit_role_block" type="button" style="width:150px;height:55px;font-size:30px;margin-left:50px" value="保存"></div>
            <div style="width:200px;float:left"><input type="button" style="width:150px;height:55px;font-size:30px;margin-left:50px" value="取消" onclick="hide_edit_role_block()"></div>
        </div>
    </div> -->
<script>
    function hide_edit_role_block(){
        $(".edit_role_block").css("display","none");
    }
    function set_role_info(count){
        if(count == -1){
            var id = -1;
        }else{
            var id = $("#tag_"+count).val();
        }
        var is_merchant_check = $("#pri_merchant_check").is(':checked');
        var is_shike_check = $("#pri_shike_check").is(':checked');
        var is_activity_check = $("#pri_activity_check").is(':checked');
        var is_order_check = $("#pri_order_check").is(':checked');
        var is_money_check = $("#pri_money_check").is(':checked');
        var is_msg_check = $("#pri_msg_check").is(':checked');
        var is_pri_check = $("#pri_pri_check").is(':checked');
        var name = $("#edit_role_name").val();
        $.ajax({
                url:"/admin_role_manage/set_role_info",
                data:{
                    name:name,
                    pri_merchant:is_merchant_check,
                    pri_shike:is_shike_check,
                    pri_activity:is_activity_check,
                    pri_order:is_order_check,
                    pri_money:is_money_check,
                    pri_msg:is_msg_check,
                    pri_pri:is_pri_check,
                    id:id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    if(data == 0){
                        alert("该角色名重复");
                    }else if(data == 2){
                        alert("角色名不得为空");
                    }else{
                        location.reload();
                    }
                    //$(".edit_role_block").css("display","none");
                    // location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });

            // var seller_id =  $("#edit_merchant_id").text().substring(6);
            // var tel = $("#edit_merchant_phone").val();
            // var qq = $("#edit_merchant_qq").val();
            // console.log(seller_id);
            // console.log(typeof seller_id);
            // console.log(tel);
            // console.log(typeof tel);
            // console.log(qq);
            // console.log(typeof qq);
            // return;
            // $.ajax({
            //     url:"/admin_merchant_basic/set_seller_info",
            //     data:{
            //         seller_id:seller_id,
            //         tel:tel,
            //         qq:qq,
            //     },
            //     type:'post',  
            //     cache:false,  
            //     dataType:'json',  
            //     async: false,
            //     success:function(data){
            //         //console.log(data);
            //         location.reload();
            //     },
            //     error: function(XMLHttpRequest, textStatus, errorThrown) {
            //         console.log(XMLHttpRequest);
            //         console.log(textStatus);
            //         console.log(errorThrown);
            //     },
            // });
        }
        function edit_role(count){
            var id = $("#tag_"+count).val();
            $(".edit_role_block").css("display","block");
            $.ajax({
                url:"/admin_role_manage/get_role_info",
                data:{
                    id:id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_role_name").val(data.name);
                    if(data.pri_merchant==1){
                        $("#pri_merchant_check").attr("checked",true);
                    }else{
                        $("#pri_merchant_check").attr("checked",false);
                    }
                    if(data.pri_shike==1){
                        $("#pri_shike_check").attr("checked",true);
                    }else{
                        $("#pri_shike_check").attr("checked",false);
                    }
                    if(data.pri_activity==1){
                        $("#pri_activity_check").attr("checked",true);
                    }else{
                        $("#pri_activity_check").attr("checked",false);
                    }
                    if(data.pri_order==1){
                        $("#pri_order_check").attr("checked",true);
                    }else{
                        $("#pri_order_check").attr("checked",false);
                    }
                    if(data.pri_money==1){
                        $("#pri_money_check").attr("checked",true);
                    }else{
                        $("#pri_money_check").attr("checked",false);
                    }
                    if(data.pri_msg==1){
                        $("#pri_msg_check").attr("checked",true);
                    }else{
                        $("#pri_msg_check").attr("checked",false);
                    }
                    if(data.pri_pri==1){
                        $("#pri_pri_check").attr("checked",true);
                    }else{
                        $("#pri_pri_check").attr("checked",false);
                    }
                    $(".submit_role_block").bind("click",function(){
                        set_role_info(count);
                    });
                    
                    //$("#")
                    // $("#edit_merchant_id").text("商家ID: "+data.seller_id);
                    // $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    // $("#edit_account").text("账号: "+data.account);
                    // $("#edit_merchant_phone").val(data.tel);
                    // $("#edit_merchant_qq").val(data.qq);
                    // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));

                    // $(".edit_merchant_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
        function delete_role(count){
            var id = $("#tag_"+count).val();
             $.ajax({
                url:"/admin_role_manage/delete_role",
                data:{
                    id:id,
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
        function add_role(count){
        // var id = $("#tag_"+count).val();
        $(".edit_role_block").css("display","block");
        $(".submit_role_block").bind("click",function(){
            set_role_info(-1);
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
            <li><a href="/admin_role_manage">角色管理</a></li>
        </ul>
    </div>
    <input type="button" value="新增" style="margin-top: 20px;width: 85px; height: 35px;background: url(../images/btnbg.png)
     no-repeat center;font-size: 14px;font-weight: bold;color: #fff;cursor: pointer;
     border-radius: 3px;margin-left:9px;" onclick="add_role()">
    <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label>角色账号</label><input name="" type="text" class="scinput1" id="scinput"/></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="search()"/></li>
	    </ul>
    
	<div class="formtitle1"><span>角色管理</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>角色</th>
        <th>模块权限</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($role as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['name'];?></td>
        <td>
            <?php $str="";
            if($v['pri_merchant'] == 1){
                $str .="商家管理、";
            };
            if($v['pri_shike']){
                $str .="试客管理、";
            };
            if($v['pri_activity']){
                $str .="活动管理、";
            };
            if($v['pri_order']){
                $str .="订单管理、";
            };
            if($v['pri_money']){
                $str .="资金管理、";
            };
            if($v['pri_msg']){
                $str .="消息管理、";
            };
            if($v['pri_pri']){
                $str .="权限管理、";
            };
            echo $str;?>
        </td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_role(<?php echo $count;?>)">编辑</a>&nbsp;&nbsp;<?php if($v['name'] != 'admin'):?><a href="javascript:void(0)" class="tablelink" onclick="delete_role(<?php echo $count;?>)">删除</a><?php endif;?></td>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['id'];?>">
        <?php endforeach ?>
        </tbody>
    </table>

    
    
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
	$('.authority_manage ul>li').find('a').eq(0).addClass('leftNav_active');
    function search(){
            var account = $(".scinput1").val();
            location.href="/admin_role_manage/search?search="+account;
        }
	</script>

</body>

</html>
