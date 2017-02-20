<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/select.css" rel="stylesheet" type="text/css" />
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
<script>
function yd_edit_link(link){
    return 1;
}

</script>
<div class="tip-wrapper edit_shop_block" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="cancle_shop_info()"></a></div>
    <form enctype="multipart/form-data" method="post" action="/admin_merchant_shop/edit_shop_info" onsubmit=" return mysubmit();">
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>店铺ID:</label><label id="edit_shop_id"></label></li>
        <li class="li"><label>绑定时间:</label><label id="edit_bind_time"></label></li>
        <li class="li"><label>账号:</label><label id="edit_account"></label></li>
        <li class="li"><label>店铺名称:</label><input id="edit_shop_name"  name="edit_shop_name" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>店铺链接:</label><input id="edit_shop_link"  name="edit_shop_link" id="" value="" type="text" class="scinput" style="width:300px" onblur="set_platform()"/></li>
        <li class="li"><label>平台:</label><label id="edit_shop_platform"></label></li>
        <li class="li"><label>店铺logo:</label><input id="edit_shop_logo" onchange="change_logo_value()" name="edit_shop_logo" id="" value="" type="file" class="scinput" style="float:left;width:115px"/><p id="shop_logo_value" style="float:left;width:180px;z-index:1000;background:white"></p></li>
        <li class="li"><label>旺旺:</label><input id="edit_wangwang" name="edit_wangwang" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>QQ:</label><input id="edit_qq" name="edit_qq" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>微信:</label><input id="edit_wx" name="edit_wx" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <li class="li"><label>手机:</label><input id="edit_tel" name="edit_tel" id="" value="" type="text" class="scinput" style="width:300px"/></li>
        <input type="hidden" name="platformid" id="platformid">
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="sure" type="submit"  class="sure" value="保存"/>&nbsp;
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="cancle_shop_info()"/>
    </div>
    <input type="hidden" id="edit_seller_id" name="edit_seller_id">
    <input type="hidden" id="edit_shop_idd" name="edit_shop_idd">
    </form>
</div>
</div>
<body>
<script>
    function set_platform(){
        var str = $("#edit_shop_link").val();
        var res_taobao = str.indexOf('taobao');
        var res_tmall = str.indexOf('tmall')
        if(res_taobao>=0){
            $("#edit_shop_platform").text('淘宝');
            $("#platformid").val(1);
        }else if(res_tmall>=0){
            $("#edit_shop_platform").text('天猫');
            $("#platformid").val(2);
        }else{

        }
    }
    function mysubmit(){
        set_platform();
        return true;
    }
</script>


<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	   <div class="place">
            <span>位置：</span>
            <ul class="placeul">
                <li><a href="/admin">首页</a></li>
                <li><a href="/admin_merchant_shop">店铺管理</a></li>
            </ul>
        </div>
    
        <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label>店铺名</label><input name="" type="text" class="scinput1" /></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="search()"/></li>
		
        </ul>
        <script>
            function search(){
                var account = $(".scinput1").val();
                location.href="/admin_merchant_shop/search?search="+account;
            }
        </script>
    
	    <div class="formtitle1"><span>商家基本信息</span></div>
        <table class="tablelist">
    	    <thead>
    	    <tr>
                <th><input name="" type="checkbox" value="" checked="checked"/></th>
                <th>店铺ID</th>
                <th>绑定时间</th>
                <th>商家账号</th>
                <th>店铺名称</th>
                <th>店铺链接</th>
                <th>平台</th>
                <th>店铺logo</th>
                <th>旺旺</th>
                <th>负责人QQ</th>
                <th>负责人微信</th>
                <th>负责人手机</th>
        		<th>操作</th>
            </tr>
            </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($shops as $v):?>
        <?php $count++;?>
            <tr>
                <td><input name="" type="checkbox" value="" /></td>
                <td><?php echo $v['shop_id'];?></td>
                <td><?php echo $v['bind_time'];?></td>
                <td><?php echo $v['user_name'];?></td>
                <td><?php echo $v['shop_name'];?></td>
                <td><a target="blank" href="<?php echo $v['shop_link'];?>"><?php echo $v['show_shop_link'];?></a></td>
                <td><?php echo ($v['platform_id']==1 ? '淘宝':'天猫');?></td>
        		<td><img style="width:100px;height:25px" src="<?php echo $v['logo_link'];?>"></td>
                <td><?php echo $v['wangwang'];?></td>
                <td><?php echo $v['chargeqq'];?></td>
                <td><?php echo $v['chargewx'];?></td>
                <td><?php echo $v['chargetel'];?></td>
                <td><a href="javascript:void(0)" class="tablelink" onclick="edit_merchant(<?php echo $count;?>)">编辑</a></td>
            </tr>
             <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['shop_id'];?>">
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

$('.merchant_manage ul>li').find('a').eq(1).addClass('leftNav_active')
	$('.tablelist tbody tr:odd').addClass('odd');
    function change_shop(){
        $('.modify_modal').css('display','block');
    }

     function edit_merchant(count){
            var shop_id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_merchant_shop/get_shop_info",
                data:{
                    shop_id:shop_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_shop_id").text("店铺ID: "+data.shop_id);
                    $("#edit_bind_time").text("绑定时间: "+data.bind_time.substring(0,10));
                    $("#edit_account").text("账号: "+data.user_name);
                    $("#edit_shop_name").val(data.shop_name);
                    $("#edit_shop_link").val(data.shop_link);
                    $("#edit_shop_platform").text(data.platform_id==1?'淘宝':'天猫');
                    $("#shop_logo_value").text(data.logo_link);
                    $("#edit_wangwang").val(data.wangwang);
                    $("#edit_qq").val(data.chargeqq);
                    $("#edit_wx").val(data.chargewx);
                    $("#edit_tel").val(data.chargetel);
                    $("#edit_seller_id").val(data.seller_id);
                    $("#edit_shop_idd").val(data.shop_id);
                    // $("#edit_merchant_qq").val(data.qq);
                    // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));

                    $(".edit_shop_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
        function change_logo_value(){
            $("#shop_logo_value").text($("#edit_shop_logo").val());
        }
        function cancle_shop_info(){
            $(".edit_shop_block").css("display","none");
        }
</script>

</body>

</html>
