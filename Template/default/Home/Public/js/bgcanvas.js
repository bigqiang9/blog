$(function(){

    var canvas = document.getElementById("canvas"),
        ctx = canvas.getContext("2d");
    setSize();
    var arr = "0123456789abcdefghijklmnopqrstuvwxyz".split("");
    var font_size = 16;
    var column = Math.floor(canvas.width / font_size) ;
    var drop = [];
    for(let i = 0;i<column ; i++){
        drop[i] = 1;
    }

    init();

    //初始化
    function init(){
        setSize();
        setInterval(draw,50);
    }

    //输出文字
    function draw(){
        ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
        ctx.fillRect(0,0,canvas.width,canvas.height);

        ctx.fillStyle = "#0F0";  //文字颜色
        ctx.font = font_size + "px arial";

        //逐行输出文字
        for(var i = 0;i<drop.length ; i++){
            //随机输出文字
            var text = arr[Math.floor(Math.random()*arr.length)];

            //输出文字，坐标重新计算
            ctx.fillText(text,i*font_size, drop[i]*font_size);

            //如果绘满一页或者随机数超过0.9则重新绘制
            if(drop[i] * font_size >canvas.height || Math.random() > 0.9){
                drop[i] = 0;
            }
            drop[i] ++ ;
        }
    }

    window.onresize = function(){
        setSize();
    }

    function setSize(){
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

});

