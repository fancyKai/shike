/**
 * Created by 二更 on 2016/12/3.
 */
$(function(){
    $('.mask_layer').height(document.body.clientHeight);
    $('.close,.cancel,.confirm').bind('click',function(){
        $('.delivery_modal').css('display','none');
        enableScroll();
    });
});