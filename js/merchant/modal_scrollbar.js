/**
 * Created by 二更 on 2016/10/28.
 */


    var keys = { 32: 1, 37: 1, 38: 1, 39: 1, 40: 1 };//左右 tab 上下键盘code号

    function preventDefault(e){
        e = e || window.event;
        e.preventDefault && e.preventDefault();//阻止元素发生默认行为
        e.returnValue = false;// 设置事件的返回值为false,即取消事件处理
    }

    function preventDefaultForScrollKeys(e){
        if(keys[e.keyCode]){
            preventDefault(e);
            return false;
        }
    }

    // 记录原来的事件函数，以便恢复
    var oldonwheel, oldonmousewheel1, oldonmousewheel2, oldontouchmove, oldonkeydown;
    var isDisabled;

    var disableScroll = function(){
        if(window.addEventListener){ // older FF
            window.addEventListener('DOMMouseScroll', preventDefault, false);
        }

        oldonwheel = window.onwheel;
        window.onwheel = preventDefault; //现代化的标准

        oldonmousewheel1 = window.onmousewheel;
        window.onmousewheel = preventDefault; // 旧的, IE
        oldonmousewheel2 = document.onmousewheel;
        document.onmousewheel = preventDefault; //旧的, IE

        oldontouchmove = window.ontouchmove;
        window.ontouchmove = preventDefault; // mobile

        oldonkeydown = document.onkeydown;
        document.onkeydown = preventDefaultForScrollKeys;
        isDisabled = true;
    };

    var enableScroll = function(){
        if(!isDisabled){
            return;
        }
        if(window.removeEventListener){
            window.removeEventListener('DOMMouseScroll', preventDefault, false);
        }

        window.onwheel = oldonwheel; // 现代化的标准

        window.onmousewheel = oldonmousewheel1; // 旧的, IE
        document.onmousewheel = oldonmousewheel2; // 旧的, IE

        window.ontouchmove = oldontouchmove; // mobile

        document.onkeydown = oldonkeydown;
        isDisabled = false;
    };
