var admin = {url:$('base').attr('href')};
var base_url = 'http://localhost/shike_php/';
//var base_url = 'http://www.shike8888.com/';

// window.UEDITOR_HOME_URL = '../plugins/ueditor/';

$(function() {

    //$('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
$(function() {
    $(window).bind("load resize", function() {
        if ($(this).width() < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    });

    $(document).keydown(function(event){
        var code=event.keyCode;
//        alert(code);
        if(code==13){
            $('.enter').click(); //调用登录按钮的登录事件
        }
    })

});