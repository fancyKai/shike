<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
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
</script>


</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">订单列表</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
	<ul class="seachform">
		<li><label>商品名</label><input name="" type="text" class="scinput" /></li>
		<li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
		
    </ul>
    
	<div class="formtitle1"><span>商家基本信息</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
        <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>商家ID<i class="sort"><img src="images/px.gif" /></i></th>
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
        <?php foreach($sellers as $v):?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['seller_id'];?></td>
        <td><?php echo $v['reg_time'];?></td>
        <td><?php echo $v['account'];?></td>
        <td><?php echo $v['tel'];?></td>
        <td><?php echo $v['qq'];?></td>
        <td><?php echo ($v['level']==1 ? '试用会员':'正式会员');?></td>
		<td><?php echo $v['end_time'];?></td>
        <td><a href="#" class="tablelink">编辑</a></td>
        </tr>
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
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>
