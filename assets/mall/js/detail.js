/**
 * Created by 二更 on 2017/2/13.
 */
// 积分兑换
$('.mask_layer').height(document.body.scrollHeight+1000);
$('.integral_button').bind('click',function(){
    $('.exchange_modal').css('display','block');
    disableScroll();
});
// 积分兑换成功弹框js
$('.confirm_exchange').bind('click',function(){
    $('.exchangeSucceed_modal').css('display','block');
    $('.exchange_modal').css('display','none');
    disableScroll();
});
// 积分兑换失败弹框js
//        $('.confirm_exchange').bind('click',function(){
//            $('.exchangeFailure_modal').css('display','block');
//            $('.exchange_modal').css('display','none');
//            disableScroll();
//        });

$('.close,.cancel,.confirm').bind('click',function(){
    $('.exchangeFailure_modal,.exchangeSucceed_modal,.exchange_modal').css('display','none');
    enableScroll();
});