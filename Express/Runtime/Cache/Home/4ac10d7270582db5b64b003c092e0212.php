<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0062)http://www.17sucai.com/preview/643619/2018-04-13/xc/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>关于我们</title>
    <link rel="stylesheet" href="/Express/Home/Public/css/swiper.min.css">
    <link rel="stylesheet" href="/Express/Home/Public/css/common.css">
    <link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_829016_njyq8fcdrz.css" />
    <style>
        html{font-size: 11px;}
        @media screen and (min-width: 330px) {
            html{font-size: 13px;}
        }
        html,body{width: 100%; height: 100%;}
        body {
            /*background: #eee;*/
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color:#fff;
            margin: 0;
            padding: 0;
        }
        .swiper-wrapper{
            transition-delay:.3s;
        }
        .swiper-container {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        .swiper-slide .text_top{
            transform:translateY(-200px);
            opacity:0;
            transition:all 1s;
        }
        .swiper-slide .text_bottom{
            transform:translateY(200px);
            opacity:0;
            transition:all 1s ease-out 1.6s;;
        }
        .swiper-slide .text_left{
            transform:translateX(-200px);
            opacity:0;
            transition:all 1s ease-out 1s;;
        }
        .swiper-slide .text_right{
            transform:translateX(200px);
            opacity:0;
            transition:all 1s ease-out 1s;;
        }

        .ani-slide .text_left,.ani-slide .text_right,.ani-slide .text_top,.ani-slide .text_bottom{
            transform:translate(0,0) ;
            opacity:1;
        }

        /*.swiper-slide .swiper-container {*/
            /*width: 100%;*/
            /*height: 48%;*/
        /*}*/
        .swiper-container-h{top: 0%; height: auto;}
        /*公共样式*/
        .div_up{ position: fixed; bottom: 2%; width: 40px;left: 50%; margin-left: -20px; opacity: 0.6; z-index: 99;animation:div_up 2s infinite;}
        @keyframes div_up
        { 0% {bottom: 2%} 50% {bottom: 4%}  100% {bottom: 2%} }
        div{position: absolute;}
        img{width: 100%;}
        .img_bg{ position: absolute; width: 100%; height: 100%; left: 0%;top: 0;}
        .shade{ width: 100%; height: 100%; left: 0%; top: 0%;background: #000; opacity: 0.2;}
        .text_title{ font-size: 2rem; top: 8%; left: 0%; width: 100%; text-align: center;}
        .text_bottom_m{ font-size: 20px; bottom: 14%; left: 0%; width: 100%; text-align: center;}
        .content{top: 20%; width: 70%;left: 15%;}
        .content p{background: rgba(74, 93, 99, 0.78); text-align: left; font-size: 1.4rem; line-height: 2.4rem; text-indent: 3.2rem; margin: 0 0 2rem 0; border: 2px solid #fff; padding: 0.6rem;}
        .text_center p{ text-indent: 0; text-align: center;}
        .span_yinyue{ position: fixed; right: 5%; top: 5%; z-index: 100;}
        .span_yinyue i{ width: 2rem ;height: 2rem; font-size: 1.6rem ; padding: 0.2rem; line-height: 1.6rem; text-align: center; color: #fff; border: 0.2rem solid #fff; border-radius: 2rem;}
        .swiper-container .c3{ animation: zhuan 2s infinite linear; }
        @keyframes zhuan
        {
            0% {transform: rotate(0deg);}
            100% {transform: rotate(360deg);}
        }
        /*合作样式*/
        .swiper-slide .hz p{ display: flex; justify-content: space-between; border: none; text-indent: 0; margin: 0 0 3% 0; background: none;}
        .swiper-slide .hz p span{ width: 44%;}

        /*功能样式*/
        .swiper-slide .gn p{border: none; display: flex; justify-content: space-between; background: none;}
        .swiper-slide .gn span{border: none;  text-indent: 0;}
        .swiper-slide .gn p b{ display: block; margin-top: 1.4rem; text-align: center;width: 100%;font-size: 1.6rem;}
        .swiper-slide .gn p i{font-size: 4rem; padding: 1rem; text-align: center; line-height: 4rem; border: 4px solid #fff; border-radius: 6rem; text-indent: 0; }

        .slide9{ width: 80%; left: 10%; bottom: 6%; display: flex; justify-content: space-around; }
        .slide9 p{ width: 32%; }
        .slide9 p b{ width: 100%; font-size: 1.4rem; font-weight: 400;}
        .onload{ position: fixed; background: #fff;left: 0; top: 0; width: 100%; height: 100%; z-index: 100;}
        .onload p{ width: 6rem; top: 50%; margin-top: -3rem; left: 50%; margin-left: -3rem; position: absolute;}
        /*产品服务*/
        .fuwu p{ margin-bottom: 1.4rem;}
    </style>
</head>
<body>
<audio id="music" controls="controls" loop="true" style="display: none">
    <source src="/Public/Refrain.mp3" type="audio/mpeg">
</audio>
<div class="swiper-container swiper-container-v swiper-container-vertical">
    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
        <div class="swiper-slide swiper-slide-active ani-slide" style="background: rgb(0, 0, 0); height: 589px;">
            <img class="img_bg" src="/Public/img/1.jpg" style="width: 100%; height: auto;"><div class="shade"></div>
            <div class="text_title text_top">我们是谁?</div>
            <div class="content text_left">
                <p>一群有活力有梦想的校园创业团队</p>
                <p>一群把梦想带进现实的西译学子</p>
            </div>
        </div>
        <div class="swiper-slide swiper-slide-next" style="height: 589px;">
            <img class="img_bg" src="/Public/img/2.jpg"><div class="shade"></div>
            <div class="text_title text_top">团队目标</div>
            <div class="content text_right">
                <p>打造校园全方位的校内服务平台，为您提供您能想到的想不到的乐享服务。</p>
            </div>
        </div>
        <div class="swiper-slide" style="height: 589px;">
            <img class="img_bg" src="/Public/img/3.jpg"><div class="shade"></div>
            <div class="text_title text_top">有爱简介</div>
            <div class="content text_left fuwu">
               <p>有爱所属：陕西染堇网络科技有限责任公司
               <p>公司坐标：西安翻译学院
               <p>有爱团队：西译校园有实干精神的年轻人
            </div>
        </div>
        <div class="swiper-slide" style="height: 589px;">
            <img class="img_bg" src="/Public/img/4.jpg"><div class="shade"></div>
            <div class="text_title text_top">名字由来</div>
            <div class="content text_left fuwu">
               <p>UiDoer  U（你） I（我） Doer（实干家）  在西译 你我都是实干家，一群实干家搭建的服务平台，“足不出舍”，
有爱就到了，在这里看西译，交流在西译，社团比赛报名信息，找同好，有爱都想到了。
            </div>
        </div>
       


        <div class="swiper-slide" style="height: 589px;">
            <img class="img_bg" src="/Public/img/5.jpg"><div class="shade"></div>
            <div class="text_title text_top">平台功能</div>
            <div class="content text_right gn">
                <p>
                    <span><i class="iconfont icon-kuaidi"></i><b>校园快递</b></span>
                    <span><i class="iconfont icon-canyin"></i><b>线上订餐</b></span>
                </p>
                <p>
                    <span><i class="iconfont icon-xiangji"></i><b>全景校园</b></span>
                    <span><i class="iconfont icon-tieba"></i><b>校园贴吧</b></span>
                </p>
                <p>
                    <span><i class="iconfont icon-xinwen"></i><b>社团新闻</b></span>
                    <span><i class="iconfont icon-kehu"></i><b>客户评价</b></span>
                </p>

            </div>
        </div>
        <div class="swiper-slide" style="height: 589px;">
            <img class="img_bg" src="/Public/img/6.jpg"><div class="shade"></div>
            <div class="text_title text_top">产品展示</div>
            <div class="swiper-container swiper-container-h text_right swiper-container-horizontal swiper-container-autoheight">
                <div class="swiper-wrapper" style="height: 1155px; transform: translate3d(0px, 0px, 0px);">
                    <div class="swiper-slide swiper-slide-active" style="width: 649.5px; margin-right: 50px;"><img src="/Public/img/a1.png"></div>
                    <div class="swiper-slide swiper-slide-next" style="width: 649.5px; margin-right: 50px;"><img src="/Public/img/a2.png"></div>
                    <div class="swiper-slide" style="width: 649.5px; margin-right: 50px;"><img src="/Public/img/a3.png"></div>
                </div>
                <div class="swiper-pagination swiper-pagination-h"></div>
            </div>
            <div class="text_bottom_m text_bottom">更多功能，敬请期待...</div>
        </div>
        
        <!-- <div class="swiper-slide" style="height: 589px;">
            <img class="img_bg" src="/Public/img/7.jpg"><div class="shade"></div>
            <div class="text_title text_top">解决方案</div>
            <div class="content text_right text_center fuwu">
                <p>智能运维综合监控平台</p>
                <p>智能管理系统</p>
                <p>智能管理系统</p>
                <p>监控系统</p>
            </div>
            <div class="text_bottom_m text_bottom">期待你的加入...</div>
            <div class="slide9 text_bottom">
                <!--<p>-->
                    <!--<span><b><img src="img/index/app_code.jpg"/></b><b>下载APP</b></span>-->
                <!--</p>-->
                <p>
                    <span><b><img src="/Public/img/公众号二维码500.png" style="width:100px;"></b><b>关注公众号</b></span>
                </p>
            </div>
        </div> -->
    </div>
    <div class="div_up"><img src="/Public/img/up.png"></div>
   
    <div class="swiper-pagination swiper-pagination-v"></div>
</div>
<script src="/Express/Home/Public/JS/swiper.min.js"></script>
<script type="text/javascript" src="/Public/Script/jquery-3.3.1.min.js"></script>
<script>
    $(function(){

        $('.img_bg').each(function (i,v) {
            $(this).after('<div class="shade"></div>');
        })
        function audioAutoPlay(id){
            var audio = document.getElementById(id);
            audio.play();
            document.addEventListener("WeixinJSBridgeReady", function () {
                audio.play();
            }, false);
        }
        audioAutoPlay('music');
        function audioAutoPause(id){
            var audio = document.getElementById(id);
            audio.pause();
            document.addEventListener("WeixinJSBridgeReady", function () {
                audio.pause();
            }, false);
        }
        $(".span_yinyue").click(function () {
            var type = $(this).attr('data-type');
            if(type == 1){
                audioAutoPause('music');
                $(this).attr('data-type',0);
                $(this).removeClass('c3');
            }else{
                audioAutoPlay('music');
                $(this).attr('data-type',1);
                $(this).addClass('c3');
            }
        })
    })

        var swiperV = new Swiper('.swiper-container-v', {
        initialSlide :0,
        direction : 'vertical',
        followFinger : false,
        speed:600,
        mousewheelControl : true,
        pagination : '.swiper-pagination-v',
            on:{
                init:function(swiper){
                    slide=this.slides.eq(0);
                    slide.addClass('ani-slide');
                },
                transitionStart: function(){
                    for(i=0;i<this.slides.length;i++){
                        slide=this.slides.eq(i);
                        slide.removeClass('ani-slide');
                    }
                },
                transitionEnd: function(){
                    slide=this.slides.eq(this.activeIndex);
                    slide.addClass('ani-slide');
                    (this.activeIndex==9)? $('.div_up').hide() :  $('.div_up').show();
                }
            },
    });
    var swiperH = new Swiper('.swiper-container-h', {
        autoHeight: true,
        slidesPerView: 2,
        spaceBetween: 50,
        pagination : '.swiper-pagination-h',
    });
    window.onload = function(){
        $('.onload').fadeOut(500);
    }
</script>
</body></html>