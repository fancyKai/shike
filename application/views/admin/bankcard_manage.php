<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<style>
     .leftNav_active{
                  color:#f10180 !important ;
                  text-decoration:underline ;
                }
</style>
</head>
<body>
<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="/admin">首页</a></li>
            <li><a href="/admin_bankcard_manage">银行卡管理</a></li>
        </ul>
    </div>
    
    <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label>商家账号</label><input name="" type="text" class="scinput" id="merchant_scinput"/></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="merchant_search()"/></li>
	    </ul>
    
	<div class="formtitle1"><span>消息管理</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>绑定时间</th>
        <th>商家账号</th>
        <th>银行卡号</th>
        <th>所属银行</th>
        <th>开户行支行名称</th>
        <th>开户人姓名</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($merchant_cards as $v):?>
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
        ?>
        </td>
        <td><?php echo $v['branchbank'];?></td>
        <td><?php echo $v['name'];?></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <div class="rightinfo">
    
        <ul class="seachform">
          <li><label>试客账号</label><input name="" type="text" class="scinput" id="shike_scinput"/></li>
          <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="shike_search()"/></li>
        </ul>
    
    <div class="formtitle1"><span>消息管理</span></div>
    <table class="tablelist">
        <thead>
        <tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>绑定时间</th>
        <th>试客账号</th>
        <th>银行卡号</th>
        <th>所属银行</th>
        <th>开户行支行名称</th>
        <th>开户人姓名</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($shike_cards as $v):?>
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
        ?>
        <td><?php echo $v['branchbank'];?></td>
        <td><?php echo $v['name'];?></td>
        </tr>
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
	$('.account_information ul>li').find('a').eq(0).addClass('leftNav_active');
    function merchant_search(){
            var account = $("#merchant_scinput").val();
            location.href="/admin_bankcard_manage/merchant_search?search="+account;
        }
     function shike_search(){
            var account = $("#shike_scinput").val();
            location.href="/admin_bankcard_manage/shike_search?search="+account;
        }
	</script>

</body>

</html>
