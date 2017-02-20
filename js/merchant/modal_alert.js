/**
 * Created by 二更 on 2016/12/3.
 */
$(function(){
    $('.mask_layer').height(document.body.scrollHeight+1600);
    $('.close,.cancel,.confirm').bind('click',function(){
        $('.delivery_modal').css('display','none');
        enableScroll();
    });
});