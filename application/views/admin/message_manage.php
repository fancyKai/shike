<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="css/admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="css/admin/js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url('assets/ueditor/ueditor.config.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/ueditor/ueditor.all.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/common.js')?>"></script>
</head>

<style>
    .seachform .li{width:370px;}
         .leftNav_active{
                          color:#f10180 !important ;
                          text-decoration:underline ;
                        }
</style>
<div class="tip-wrapper edit_message_block" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="cancle_message_info()"></a></div>
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>发送对象</label>
            <select id="edit_message_usertype" class="scinput" style="width:300px;border:1px solid;opacity:1" />
                <option value ="0" style="height:40px;border:1px solid;width:100%">商家</option>
                <option value ="1" style="height:40px;border:1px solid;width:100%">试客</option>
            </select>
        </li>
        <li class="li"><label>标题:</label><input id="edit_message_title"  name="name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li>
            <style>
                #edui1_iframeholder{height:200px; padding-top:20px;}
                #container{width:760px;}
            </style>
            <script id="container" name="content" type="text/plain">
            </script>
            <script type="text/javascript">
                var editor = UE.getEditor('container');
            </script>
        </li>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="sure" id="send" type="button"  class="sure" value="发送" />&nbsp;
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="cancle_message_info()"/>
    </div>
</div>
</div>

<body>

    <!-- <div class="edit_message_block" style="position:absolute;width:800px;height:300px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p style="font-size:30px;width:270px;margin:auto">发送对象</p>
            </div>
            <div style="width:350px;float:left">
                <select id="edit_message_usertype" style="height:40px;border:1px solid;width:100%;opacity:1">
                    <option value ="0" style="height:40px;border:1px solid;width:100%">商家</option>
                    <option value ="1" style="height:40px;border:1px solid;width:100%">试客</option>
                </select>    
            </div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left">
                <p style="font-size:30px;width:250px;margin:auto">标题:</p>
            </div>
            <div style="width:370px;float:left"><input id="edit_message_title" type="text" style="height:40px;border:1px solid;width:100%">
            </div>
        </div>
        <div style="overflow:hidden">
            <div style="margin-left:50px;width:700px;"><textarea id="edit_message_desc" style="height:100px;border:1px solid;width:100%"></textarea></div>
        </div>
         <div style="overflow:hidden">
            <div style="width:390px;float:left"><input id="send" type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="发送"></div>
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="取消" onclick="cancle_message_info()"></div>
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
    
	    <ul>
		  <li><label>&nbsp;</label><input style="margin-top:15px;" name="" type="button" class="scbtn" value="创建消息" onclick="create_table()"/></li>
	    </ul>
    
	<div class="formtitle1"><span>消息管理</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>时间</th>
        <th>发送对象</th>
        <th>标题</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($messages as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['time'];?></td>
        <td><?php echo ($v['user_type']==1 ? '试客':'商家');?></td>
        <td><?php echo $v['title'];?></td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_message(<?php echo $count;?>)">编辑</a></td>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['message_id'];?>">
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
	$('.message_manage').find('a').eq(0).addClass('leftNav_active');

    function create_table(){
        $(".edit_message_block").css("display","block");
        $("#send").unbind("click").bind("click",function(){
            set_message_info(-1);
        });
    }
    function cancle_message_info(){
        $(".edit_message_block").css("display","none");
    }

    function edit_message(count){
        var message_id = $("#tag_"+count).val();

        $.ajax({
            url:"/admin_message_manage/get_message_info",
            data:{
                message_id:message_id,
            },
            type:'post',  
            cache:false,  
            dataType:'json',  
            async: false,
            success:function(data){
                console.log(data);
                //data.user_type = (data.user_type==1?试客:商家);
                $("#edit_message_usertype").val(data.user_type);
                $("#edit_message_title").val(data.title);
                editor.setContent(data.description);
                // $("#edit_merchant_id").text("商家ID: "+data.seller_id);
                // $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                // $("#edit_account").text("账号: "+data.account);
                // $("#edit_merchant_phone").val(data.tel);
                // $("#edit_merchant_qq").val(data.qq);
                // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));

                $("#send").unbind("click").bind("click",function(){
                    set_message_info(message_id);
                });
                $(".edit_message_block").css("display","block");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
            },
        });
    }

    function set_message_info(message_id){
        if(message_id>0){
            var usertype=  $("#edit_message_usertype").val();
            var title = $("#edit_message_title").val();
            //var desc = $("#ueditor_textarea_content").val();
            //console.log(desc);
            var desc = editor.getContent();
            $.ajax({
                url:"/admin_message_manage/edit_message",
                data:{
                    message_id:message_id,
                    title:title,
                    description:desc,
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
        }else{
            var usertype=  $("#edit_message_usertype").val();
            var title = $("#edit_message_title").val();
            //var desc = $("textarea[name=content]").val();
            var desc = editor.getPlainTxt();
            alert(desc);
            $.ajax({
                url:"/admin_message_manage/create_message",
                data:{
                    user_type:usertype,
                    title:title,
                    description:desc,
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
    }
</script>
</body>

</html>
