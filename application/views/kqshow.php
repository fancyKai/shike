<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="/js/jquery.js"></script>
</head>



<body>


<!doctype html public "-//w3c//dtd html 4.0 transitional//en" >
<html>
	<head>
		<title>快钱支付结果</title>
			<meta http-equiv=Content-Type content="text/html;charset=utf-8">
		<style type="text/css">
			td{text-align:center}
		</style>
	</head>
	
<BODY>
	<div align="center">
		<h2 align="center">快钱支付结果页面</h2>
		<font color="#ff0000">（该页面仅做参考）</font>
    	<table width="500" border="1" style="border-collapse: collapse" bordercolor="green" align="center">
			<tr>
				<td id="dealId">
					快钱交易号
				</td>
				<td>
					<?PHP echo $dealId; ?>
				</td>
			</tr>
			<tr>
				<td id="orderId">
					订单号
				</td>
				<td>
					<?PHP echo $orderId; ?>
				</td>
			</tr>
			<tr>
				<td id="orderAmount">
					订单金额
				</td>
				<td>
					<?PHP echo $orderAmount; ?>
				</td>
			</tr>
			<tr>
				<td id="orderTime">
					下单时间
				</td>
				<td>
					<?PHP echo $orderTime; ?>
				</td>
			</tr>
			<tr>
				<td id="payResult">
					处理结果
				</td>
				<td>
					<?PHP echo $msg; ?>
				</td>
			</tr>	
		</table>
	</div>
	<script>
$(function(){
	var msg = '<?PHP echo $msg; ?>';
	var flag = '<?PHP echo $flag; ?>';
	var mess = '<?PHP echo $mess; ?>';
	/*alert(msg);
	alert(flag);
	alert(mess);*/
	/*if(msg == "success"){
		if(flag == 1){
			//试客的会员充值
            $.ajax({
            url : '/Shike_member_recharge/pay_recharge',
            data:{recharge_year:mess},
            type : 'post',
            dataType : 'json',
            cache : false,
            success : function (result){

            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
		}else if(flag == 2){
            //商家的会员充值
            $.ajax({
            url : '/Merchant_member_recharge/pay_recharge',
            data:{recharge_year:mess},
            type : 'post',
            dataType : 'json',
            cache : false,
            success : function (result){

            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
		}else if(flag == 3){
            //商家的押金充值
            $.ajax({
            url : '/Merchant_deposit_recharge/check_recharge',
            data:{money:mess},
            type : 'post',
            dataType : 'json',
            cache : false,
            success : function (result){

            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
		}*/
	}
});
        
</script>
</BODY>
</HTML>

</body>
</html>


