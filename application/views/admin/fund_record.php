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
            <li><a href="/admin_bankcard_manage">资金记录</a></li>
        </ul>
    </div>
    
    <div class="rightinfo">
    
        <ul class="seachform">
          <li><label></label><input name="" type="text" class="scinput" id="merchant_scinput"/></li>
          <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="merchant_search()"/></li>
        </ul>
    
    <div class="formtitle1"><span>资金记录</span></div>
    <table class="tablelist">
        <thead>
        <tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
            <th>时间</th>
            <th>商家账号</th>
            <th>入款</th>
            <th>扣款</th>
            <th>账户结余</th>
            <th>流水号</th>
            <th>提现手续费</th>
            <th>提现实际到账金额</th>
            <th>备注</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($merchant_orders as $v):?>
        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td><?php echo $v['time'];?></td>
            <td><?php echo $v['user_name'];?></td>
            <td><?php if($v['money_type'] == 1){ echo $v['money'];}else{echo "";}?></td>
            <td><?php if($v['money_type'] == 2){ echo $v['money'];}else{echo "";}?></td>
            <td><?php echo $v['money_remain'];?></td>
            <td><?php echo $v['flowid'];?></td>
            <td><?php if($v['money_type'] == 2){ echo $v['processfee'];}else{echo "";}?></td>
            <td><?php if($v['money_type'] == 2){ echo $v['money']-$v['processfee'];}else{echo "";}?></td>
            <?php if($v['remarks'] == 3):?>
                <td>押金充值</td>
            <?php elseif($v['remarks'] == 4):?>
                <td>押金冻结</td>
            <?php elseif($v['remarks'] == 5):?>
                <td>试用担保金冻结</td>
            <?php elseif($v['remarks'] == 6):?>
                <td>试用担保金返款</td>
            <?php elseif($v['remarks'] == 7):?>
                <td>押金返款</td>
            <?php elseif($v['remarks'] == 8):?>
                <td>押金提现</td>
            <?php endif;?>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <ul class="seachform">
          <li><label></label><input name="" type="text" class="scinput" id="merchant_scinput"/></li>
          <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="shike_search()"/></li>
    </ul>

    <div class="formtitle1"><span>试客信息</span></div>
    <table class="tablelist">
        <thead>
        <tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
            <th>时间</th>
            <th>试客账号</th>
            <th>入款</th>
            <th>扣款</th>
            <th>账户结余</th>
            <th>流水号</th>
            <th>提现手续费</th>
            <th>提现实际到账金额</th>
            <th>备注</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($shike_orders as $v):?>
        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td><?php echo $v['time'];?></td>
            <td><?php echo $v['user_name'];?></td>
            <td><?php if($v['money_type'] == 1){ echo $v['money'];}else{echo "";}?></td>
            <td><?php if($v['money_type'] == 2){ echo $v['money'];}else{echo "";}?></td>
            <td><?php echo $v['money_remain'];?></td>
            <td><?php echo $v['flowid'];?></td>
            <td><?php if($v['money_type'] == 2){ echo $v['processfee'];}else{echo "";}?></td>
            <td><?php if($v['money_type'] == 2){ echo $v['money']-$v['processfee'];}else{echo "";}?></td>
            <?php if($v['remarks'] == 1):?>
                <td>试用返款</td>
            <?php elseif($v['remarks'] == 2):?>
                <td>本金提现</td>
            <?php endif;?>
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
    $('.account_information ul>li').find('a').eq(3).addClass('leftNav_active');
    function merchant_search(){
            var account = $("#merchant_scinput").val();
            location.href="/admin_fund_record/merchant_search?search="+account;
        }
     function shike_search(){
            var account = $("#shike_scinput").val();
            location.href="/admin_fund_record/shike_search?search="+account;
        }
    </script>

</body>

</html>
