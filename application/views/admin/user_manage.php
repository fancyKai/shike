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
<div class="tip-wrapper edit_user_block" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="hide_edit_user_block()"></a></div>
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>用户名:</label><input id="edit_user_name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>密码:</label><input id="edit_user_pwd" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>角色</label>
            <select id="edit_user_role" class="scinput" style="width:300px;border:1px solid;opacity:1" />
            <?php foreach($role as $v):?>
                <option id="option_<?php echo $v['id'];?>" value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
            <?php endforeach ?>
            </select>
        </li>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="sure" type="button"  class="sure submit_user_block" value="保存" />&nbsp;
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="cancle_message_info()"/>
    <input name="cancel" id="delete_user_button" type="button"  class="sure" value="删除用户" style="margin-left:120px;" />
    </div>
</div>
</div>
<body>

   <!--  <div class="edit_user_block" style="position:absolute;width:800px;height:300px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
        <div style="overflow:hidden">
            <div style="width:120px;float:left;margin-top:20px"><p  style="font-size:30px;width:100%;margin:auto">用户名:</p></div>
            <div style="width:200px;float:left"><input id="edit_user_name" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left;margin-top:20px"><p  style="font-size:30px;width:100%;margin:auto">密码:</p></div>
            <div style="width:200px;float:left"><input id="edit_user_pwd" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left;margin-top:20px"><p  style="font-size:30px;width:100%;margin:auto">角色:</p></div>
            <div style="width:200px;float:left"><select style="opacity:1" id="edit_user_role"><?php foreach($role as $v):?><option id="option_<?php echo $v['id'];?>" value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option><?php endforeach ?></select></div>
        </div>
       
         <div style="overflow:hidden">
            <div style="width:200px;float:left"><input class="submit_user_block" type="button" style="width:150px;height:55px;font-size:30px;margin-left:50px" value="保存"></div>
            <div style="width:200px;float:left"><input type="button" style="width:150px;height:55px;font-size:30px;margin-left:50px" value="取消" onclick="hide_edit_user_block()"></div>
            <div id="delete_user_button" style="width:200px;float:left;"><input type="button" style="width:150px;height:55px;font-size:30px;margin-left:50px" value="删除用户"></div>
        </div>
    </div> -->
<script>
    function delete_user(count){
        var id = $("#tag_"+count).val();
        $.ajax({
                url:"/admin_user_manage/delete_user",
                data:{
                    id:id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    // $(".edit_user_block").css("display","none");
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });

    }
    function hide_edit_user_block(){
        $(".edit_user_block").css("display","none");
    }
    function set_user_info(count){
        if(count == -1){
            var id = -1;
        }else{
            var id = $("#tag_"+count).val();
        }
        var name = $("#edit_user_name").val();
        var pwd = $("#edit_user_pwd").val();
        var role = $("#edit_user_role").val();
        $.ajax({
                url:"/admin_user_manage/set_user_info",
                data:{
                    name:name,
                    pwd:pwd,
                    role:role,
                    id:id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    // $(".edit_user_block").css("display","none");
                    location.reload();
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
        function edit_user(count){
            var id = $("#tag_"+count).val();
            $(".edit_user_block").css("display","block");
            $.ajax({
                url:"/admin_user_manage/get_user_info",
                data:{
                    id:id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_user_name").val(data.name);
                    $("#edit_user_pwd").val(data.pwd);
                    $("#edit_user_role").val(data.role);
                    $(".submit_user_block").bind("click",function(){
                        set_user_info(count);
                    });
                    $("#delete_user_button").bind("click",function(){
                        delete_user(count);
                    });
                    // if(data.role == 1){
                    //     $("#delete_user_button").css("display","block");
                    // }else{
                    //     $("#delete_user_button").css("display","none");
                    // }
                    if(data.name == 'admin'){
                        // alert(1);
                        $("#edit_user_name").attr("readonly","readonly");
                        $("#edit_user_name").attr("disabled",true);
                        $("#edit_user_role").attr("readonly","readonly");
                        $("#edit_user_role").attr("disabled",true);
                    }else{
                        // alert(2);
                        $("#edit_user_name").removeAttr("readonly");
                        $("#edit_user_name").attr("disabled",false);
                        $("#edit_user_role").removeAttr("readonly");
                        $("#edit_user_role").attr("disabled",false);
                    }
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
                url:"/admin_user_manage/mydelete_user",
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

        function add_admin(count){
        // var id = $("#tag_"+count).val();
        $(".edit_user_block").css("display","block");
        $("#delete_user_button").css("display","none");
        $(".submit_user_block").bind("click",function(){
            alert(1);
            set_user_info(-1);
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
            <li><a href="/admin_user_manage">用户管理</a></li>
        </ul>
    </div>
    <input type="button" value="新增" style="margin-top: 20px;width: 85px; height: 35px;background: url(../images/btnbg.png)
                                         no-repeat center;font-size: 14px;font-weight: bold;color: #fff;cursor: pointer;
                                         border-radius: 3px;margin-left:9px;" onclick="add_admin()">
    <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label>用户账号</label><input name="" type="text" class="scinput1" id="scinput"/></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="search()"/></li>
	    </ul>
    
	<div class="formtitle1"><span>用户管理</span></div>
    <?php $change=array();?>
    <?php foreach($role as $v):?>
    <?php $change[$v['id']] = $v['name'];?>
    <?php endforeach?>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>用户</th>
        <th>角色</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($user as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['name'];?></td>
        <td><?php echo $change[$v['role']];?></td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_user(<?php echo $count;?>)">编辑</a>&nbsp;&nbsp;<?php if($v['name'] != 'admin'):?><a href="javascript:void(0)" class="tablelink" onclick="delete_user(<?php echo $count;?>)">删除</a><?php endif;?></td>
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
	$('.authority_manage ul>li').find('a').eq(1).addClass('leftNav_active');
    function search(){
            var account = $(".scinput1").val();
            location.href="/admin_user_manage/search?search="+account;
        }
	</script>

</body>

</html>
