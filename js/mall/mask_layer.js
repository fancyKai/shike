/**
 * Created by 二更 on 2016/12/21.
 */
$(function(){
    $('.mask_layer').height(document.body.scrollHeight);

   $('.close,.cancel,.confirm').bind('click',function(){
        $('.modal').css('display','none');
        enableScroll();
    });
    $('.myAlert').on('click','.close,.cancel,.confirm',function(){
        $('.modal').css('display','none');
        enableScroll();
    });
});