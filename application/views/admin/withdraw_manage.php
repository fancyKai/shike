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
<div class="tip-wrapper edit_merchant_platform_block1" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="hide_edit_merchant_platform_block1()"></a></div>
    <form enctype="multipart/form-data" method="post" action="/admin_withdraw_manage/submit_merchant_picture" onsubmit="return check_merchant_platform_block1()">
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li" style="width:740px">确定已打款？</li>
        <li class="li"><label>打款截图</label><input id="edit_merchant_picture" name="edit_merchant_picture" id="" value="" type="file" class="scinput" style="width:300px"/></li>
        <div style="clear:both;"></div>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="sure"  type="submit"  class="sure" value="已打款" />&nbsp;
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="hide_edit_merchant_platform_block1()"/>
    </div>
    <input type="hidden" id="hidden_merchant_id" name="hidden_id">
    <input type="hidden" id="hidden_merchant_seller_id" name="hidden_seller_id">
    </form>
</div>
</div>
<div class="tip-wrapper edit_shike_platform_block1" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="hide_edit_shike_platform_block1()"></a></div>
    <form enctype="multipart/form-data" method="post" action="/admin_withdraw_manage/submit_shike_picture" onsubmit="return check_shike_platform_block1()">
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li" style="width:740px">确定已打款？</li>
        <li class="li"><label>打款截图</label><input id="edit_shike_picture" name="edit_shike_picture" id="" value="" type="file" class="scinput" style="width:300px"/></li>
        <div style="clear:both;"></div>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="sure"  type="submit"  class="sure" value="已打款" />&nbsp;
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="hide_edit_shike_platform_block1()"/>
    </div>
    <input type="hidden" id="hidden_shike_id" name="hidden_id">
    <input type="hidden" id="hidden_shike_user_id" name="hidden_user_id">
    </form>
</div>
</div>

<div class="tip-wrapper edit_merchant_platform_block2" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="hide_edit_merchant_platform_block2()"></a></div>
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>打款截图</label><img id="edit_merchant_picture2"  src="" class="scinput" style="width:300px;height:200px"/></li>
        <div style="clear:both;"></div>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="hide_edit_merchant_platform_block2()"/>
    </div>
</div>
</div>

<div class="tip-wrapper edit_shike_platform_block2" style="overflow:auto;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,.5);z-index:999;display:none">
<div class="tip" style="width:780px;display:block;height:auto;">
    <div class="tiptop"><span>编辑</span><a onclick="hide_edit_shike_platform_block2()"></a></div>
    <ul class="seachform" style="margin:10px 0px 10px 10px;">
        <li class="li"><label>打款截图</label><img id="edit_shike_picture2"  src="" class="scinput" style="width:300px;height:200px"/></li>
        <div style="clear:both;"></div>
    </ul>
    <input name="Orid" id="Orid1" type="hidden"  value="" />
    <div class="tipbtn" style="margin-left:120px;margin-bottom:20px;">
    <input name="cancel" type="button"  class="cancel" value="取消" style="margin-left:120px;" onclick="hide_edit_shike_platform_block2()"/>
    </div>
</div>
</div>
<script>
    function check_merchant_platform_block1(){
        if(!$("#edit_merchant_picture").val()){
            return false;
        }
        return true;
    }

    function check_shike_platform_block1(){
        if(!$("#edit_shike_picture").val()){
            return false;
        }
        return true;
    }

    function hide_edit_merchant_platform_block1(){
        $(".edit_merchant_platform_block1").css("display","none");
    }

    function hide_edit_merchant_platform_block2(){
        $(".edit_merchant_platform_block2").css("display","none");
    }

    function hide_edit_shike_platform_block1(){
        $(".edit_shike_platform_block1").css("display","none");
    }
    function hide_edit_shike_platform_block2(){
        $(".edit_shike_platform_block2").css("display","none");
    }
</script>
<body>
<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="/admin">首页</a></li>
            <li><a href="/admin_withdraw_manage">提现申请</a></li>
        </ul>
    </div>
    
    <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label>商家账号</label><input name="" type="text" class="scinput" id="merchant_scinput"/></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="merchant_search()"/></li>
	    </ul>
    
	<div class="formtitle1"><span>商家提现管理</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>申请时间</th>
        <th>商家账号</th>
        <th>银行卡号</th>
        <th>所属银行</th>
        <th>开户行支行名称</th>
        <th>开户人姓名</th>
        <th>提现金额</th>
        <th>手续费</th>
        <th>实际到账金额</th>
        <th>状态</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($merchant_withdraws as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['time'];?></td>
        <td><?php echo $v['user_name'];?></td>
        <td><?php echo $v['banknum'];?></td>
        <td><?php 
        if($v['banktype'] == 1){
            echo "中国工商银行";
        }elseif($v['banktype'] == 2){
            echo "中国农业银行";
        }elseif($v['banktype'] == 3){
            echo "中国建设银行";
        }elseif($v['banktype'] == 4){
            echo "中国银行";
        }elseif($v['banktype'] == 5){
            echo "招商银行";
        }elseif($v['banktype'] == 6){
            echo "交通银行";
        }elseif($v['banktype'] == 7){
            echo "中国民生银行";
        }elseif($v['banktype'] == 8){
            echo "兴业银行";
        }elseif($v['banktype'] == 9){
            echo "深圳发展银行";
        }elseif($v['banktype'] == 10){
            echo "北京银行";
        }elseif($v['banktype'] == 11){
            echo "华夏银行";
        }elseif($v['banktype'] == 12){
            echo "广发银行";
        }elseif($v['banktype'] == 13){
            echo "浦发银行";
        }elseif($v['banktype'] == 14){
            echo "中国光大银行";
        }elseif($v['banktype'] == 15){
            echo "广州银行";
        }elseif($v['banktype'] == 16){
            echo "上海农商银行";
        }elseif($v['banktype'] == 17){
            echo "中国邮政储蓄银行";
        }elseif($v['banktype'] == 18){
            echo "中国邮政";
        }elseif($v['banktype'] == 19){
            echo "渤海银行";
        }elseif($v['banktype'] == 20){
            echo "北京农商银行";
        }elseif($v['banktype'] == 21){
            echo "南京银行";
        }elseif($v['banktype'] == 22){
            echo "中信银行";
        }elseif($v['banktype'] == 23){
            echo "宁波银行";
        }elseif($v['banktype'] == 24){
            echo "平安银行";
        }elseif($v['banktype'] == 25){
            echo "杭州银行";
        }elseif($v['banktype'] == 26){
            echo "徽商银行";
        }elseif($v['banktype'] == 27){
            echo "浙商银行";
        }elseif($v['banktype'] == 28){
            echo "上海银行";
        }elseif($v['banktype'] == 29){
            echo "江苏银行";
        }elseif($v['banktype'] == 30){
            echo "BEA东亚银行";
        }
        ?></td>
        <td><?php echo $v['branchbank'];?></td>
        <td><?php echo $v['name'];?></td>
        <td><?php echo $v['money'];?></td>
        <td>1%</td>
        <td><?php echo $v['money']-$v['processfee'];?></td>
        <?php if($v['status'] == 2):?>
            <td>提现中</td>
        <?php elseif($v['status'] == 3):?>
            <td>已提现</td>
        <?php endif;?>
        <?php if($v['status'] == 2):?>
            <td><a href="javascript:void(0)" class="tablelink" onclick="edit_merchant_platform_block1(<?php echo $count;?>)">已打款</a></td>
        <?php elseif($v['status'] == 3):?>
            <td><a href="javascript:void(0)" class="tablelink" onclick="edit_merchant_platform_block2(<?php echo $count;?>)">查看</a></td>
        <?php endif;?>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['id'];?>">
        <input type="hidden" id="tag2_<?php echo $count;?>" value="<?php echo $v['seller_id'];?>">
        <?php endforeach ?>
        </tbody>
    </table>

    <div class="rightinfo">
    
        <ul class="seachform">
          <li><label>试客账号</label><input name="" type="text" class="scinput" id="shike_scinput"/></li>
          <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="shike_search()"/></li>
        </ul>
    
    <div class="formtitle1"><span>试客提现管理</span></div>
    <table class="tablelist">
        <thead>
        <tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>申请时间</th>
        <th>试客账号</th>
        <th>银行卡号</th>
        <th>所属银行</th>
        <th>开户行支行名称</th>
        <th>开户人姓名</th>
        <th>提现金额</th>
        <th>手续费</th>
        <th>实际到账金额</th>
        <th>状态</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <?php $count=-1;?>
        <?php foreach($shike_withdraws as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['time'];?></td>
        <td><?php echo $v['user_name'];?></td>
        <td><?php echo $v['banknum'];?></td>
        <td><?php 
        if($v['banktype'] == 1){
            echo "中国工商银行";
        }elseif($v['banktype'] == 2){
            echo "中国农业银行";
        }elseif($v['banktype'] == 3){
            echo "中国建设银行";
        }elseif($v['banktype'] == 4){
            echo "中国银行";
        }elseif($v['banktype'] == 5){
            echo "招商银行";
        }elseif($v['banktype'] == 6){
            echo "交通银行";
        }elseif($v['banktype'] == 7){
            echo "中国民生银行";
        }elseif($v['banktype'] == 8){
            echo "兴业银行";
        }elseif($v['banktype'] == 9){
            echo "深圳发展银行";
        }elseif($v['banktype'] == 10){
            echo "北京银行";
        }elseif($v['banktype'] == 11){
            echo "华夏银行";
        }elseif($v['banktype'] == 12){
            echo "广发银行";
        }elseif($v['banktype'] == 13){
            echo "浦发银行";
        }elseif($v['banktype'] == 14){
            echo "中国光大银行";
        }elseif($v['banktype'] == 15){
            echo "广州银行";
        }elseif($v['banktype'] == 16){
            echo "上海农商银行";
        }elseif($v['banktype'] == 17){
            echo "中国邮政储蓄银行";
        }elseif($v['banktype'] == 18){
            echo "中国邮政";
        }elseif($v['banktype'] == 19){
            echo "渤海银行";
        }elseif($v['banktype'] == 20){
            echo "北京农商银行";
        }elseif($v['banktype'] == 21){
            echo "南京银行";
        }elseif($v['banktype'] == 22){
            echo "中信银行";
        }elseif($v['banktype'] == 23){
            echo "宁波银行";
        }elseif($v['banktype'] == 24){
            echo "平安银行";
        }elseif($v['banktype'] == 25){
            echo "杭州银行";
        }elseif($v['banktype'] == 26){
            echo "徽商银行";
        }elseif($v['banktype'] == 27){
            echo "浙商银行";
        }elseif($v['banktype'] == 28){
            echo "上海银行";
        }elseif($v['banktype'] == 29){
            echo "江苏银行";
        }elseif($v['banktype'] == 30){
            echo "BEA东亚银行";
        }
        ?></td>
        <td><?php echo $v['branchbank'];?></td>
        <td><?php echo $v['name'];?></td>
        <td><?php echo $v['money'];?></td>
        <td>-</td>
        <td><?php echo $v['money']-$v['processfee'];?></td>
        <?php if($v['status'] == 2):?>
            <td>提现中</td>
        <?php elseif($v['status'] == 3):?>
            <td>已提现</td>
        <?php endif;?>
        <?php if($v['status'] == 2):?>
            <td><a href="javascript:void(0)" class="tablelink" onclick="edit_shike_platform_block1(<?php echo $count;?>)">已打款</a></td>
        <?php elseif($v['status'] == 3):?>
            <td><a href="javascript:void(0)" class="tablelink" onclick="edit_shike_platform_block2(<?php echo $count;?>)">查看</a></td>
        <?php endif;?>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['id'];?>">
        <input type="hidden" id="tag2_<?php echo $count;?>" value="<?php echo $v['seller_id'];?>">
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
	$('.account_information ul>li').find('a').eq(1).addClass('leftNav_active');
    function merchant_search(){
            var account = $("#merchant_scinput").val();
            location.href="/admin_withdraw_manage/merchant_search?search="+account;
        }
     function shike_search(){
            var account = $("#shike_scinput").val();
            location.href="/admin_withdraw_manage/shike_search?search="+account;
        }

    function edit_merchant_platform_block1(count){
            var id = $("#tag_"+count).val();
            var seller_id = $("#tag2_"+count).val();
            $("#hidden_merchant_id").val(id);
            $("#hidden_merchant_seller_id").val(seller_id);
            $(".edit_merchant_platform_block1").css("display","block");
    }

    function edit_merchant_platform_block2(count){
            var id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_withdraw_manage/get_merchant_info",
                data:{
                    id:id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_merchant_picture2").attr('src',data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
            $(".edit_merchant_platform_block2").css("display","block");
    }

    function edit_shike_platform_block1(count){
        var id = $("#tag_"+count).val();
        var user_id = $("#tag2_"+count).val();
        $("#hidden_shike_id").val(id);
        $("#hidden_shike_user_id").val(user_id);
        $(".edit_shike_platform_block1").css("display","block");
    }

     function edit_shike_platform_block2(count){
            var id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_withdraw_manage/get_shike_info",
                data:{
                    id:id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_shike_picture2").attr('src',data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
            $(".edit_shike_platform_block2").css("display","block");
    }
	</script>

</body>

</html>
