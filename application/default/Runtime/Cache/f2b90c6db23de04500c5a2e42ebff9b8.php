<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>车享惠-用户登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" >
    <link href="__PUBLIC__/css/index.css" rel="stylesheet">
    <script src="__PUBLIC__/js/index.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"  type="text/javascript"></script>

    <!--<link href="__PUBLIC__/css/drag.css" rel="stylesheet" type="text/css">
    <script src="__PUBLIC__/js/drag.js" type="text/javascript"></script>-->

    <style>
        .login{  width: 100%;  background: url("__PUBLIC__/images/login_back.png") no-repeat;  background-size: cover;  overflow: hidden; font-family:"微软雅黑","SimSun","宋体","Arial Narrow"; }
        .login:after{  content: "";  display: block;  padding-top: 160%;  }
        .login_logo{ width:100%;  height: 1.22rem; background: url("__PUBLIC__/images/login_logo.png") no-repeat center; background-size: contain; margin-top: 1.5rem;}
        .form{ overflow: hidden; margin-top: 1.2rem;}
        .name_login,.password_login{ width: 70%; margin: 0 auto 0.5rem auto; height: 0.5rem; border-bottom: 1px solid #fff;}
        .name_login span,.password_login span{ color: #fff; font-size: 0.2rem; line-height: 0.46rem;}
        #username,#password{width: 70%; height: 0.5rem; background: none; border:0; color: #fff; padding-left: 0.15rem; outline:none; font-size: 0.2rem; letter-spacing: 0.01rem}
        input::-webkit-input-placeholder { color:#f4f4f4;}
        input::-moz-placeholder {  color:#fff;}
        input::-moz-placeholder {  color:#fff; }
        input:-ms-input-placeholder {  color:#fff;}

        #submit{width: 70%; height: 0.7rem; background: none;color: #fff;text-align: center;
            font-size: 0.28rem; border: 1px solid #fff; display: block; margin: 0.2rem auto 0.2rem auto; outline:none;letter-spacing: 1px; border-radius: 100px;}
        .login_Prompt{  color: red; font-size: 0.16rem; opacity: 0.8; float: right; overflow: hidden; margin-right: 15%; margin-top: 0.15rem;}

        .password_forget{width: 70%;  background: none; margin: 0.8rem auto 0.2rem auto; overflow: hidden;letter-spacing: 0.01rem;}
        .password_forget a{ color: #fff; opacity: 0.9; font-size: 0.16rem; }
        .password_forget a:hover{ opacity: 1; }
        .password_forget a input{ margin-top: 0; margin-right: 0.1rem;}

        .drag_login{ width: 70%; margin: 0 auto; position: relative;}
        #drag{ height: 0.5rem; opacity: 0.8; width: 100%; cursor: pointer;}
        #drag .drag_text{ line-height: 0.5rem;text-align: center; width: 100%; font-size: 0.16rem;}
        #drag .drag_bg{ height: 0.5rem;}
        #drag .handler{ width: 0.6rem; height: 0.5rem;border: 1px solid #bbb;}
        .drag_login p{color: red; font-size: 0.16rem; letter-spacing: 1px;opacity: 0.8; position: absolute;bottom: -0.25rem; left: 0;}
        @media screen and (min-width: 640px) {
            
            html{ max-width: 640px; margin: 0 auto;}
            .login_logo{ width:100%;  height: 122px; margin-top: 150px;}
            .form{  margin-top: 120px;}
            .name_login,.password_login{  margin: 0 auto 50px auto; height: 55px;}
            .name_login span,.password_login span{ color: #fff; font-size: 20px; line-height: 50px; margin-left: 10px;}
            #username,#password{ height: 55px;  padding-left: 15px;  font-size: 20px; letter-spacing: 1px; background: none;}
            #submit{ height: 70px; font-size: 24px;margin: 0 auto 20px auto; letter-spacing: 1px; border-radius: 100px;}
            .password_forget{width: 70%;  background: none; margin: 80px auto 20px auto; color: #fff; letter-spacing: 1px;}
            .password_forget a{ color: #fff; opacity: 0.8;font-size: 16px; text-decoration: none;}
            .password_forget a:hover{ opacity: 1; }
            .login_Prompt{ font-size: 16px;float: right; margin-top: 15px;}
            .password_forget a input{ margin-top: 0; margin-right: 10px;}
            #drag{ height: 50px; }
            #drag .drag_text{ line-height: 50px;font-size: 16px;}
            #drag .drag_bg{ height: 50px;}
            #drag .handler{ width: 60px; height: 50px;}
            .drag_login p{ font-size: 16px;bottom: -25px; }
        }
    </style>
</head>
<body onload="setHeight()" onresize="setHeight()">
    <div class="login" id="login">
        <div class="login_logo"></div>
        <form name="form" method="post" action="__APP__/Login/login" class="form">
            <p class="login_Prompt"></p><!--.show显示-->
            <div class="name_login">
                <span class="glyphicon glyphicon-user fl"></span>
                <input type="text" name="userName" id="username" class="fl" value="" placeholder="用户ID"/>
            </div>
            <p class="login_Prompt"></p>
            <div class="password_login">
                <span class="glyphicon glyphicon-lock fl"></span>
                <input type="password" name="password" id="password" class="fl" value="" placeholder="用户密码" />
            </div>
            <!--<div class="drag_login">
                <div id="drag"></div>
                <p></p>
            </div>-->
            <!-- <div class="password_forget">
                <a href="" class="fl"><input type="checkbox">Remember</a>
                <a href="" class="fr">Forgot password？</a>
            </div> -->
            <button  type="submit" class="" id="submit">登录</button>
        </form>
    </div>
    <script>
        +function () {
            var ok1=false,ok2=false;
            $('#username').focus(function(){
                $(this).parent().prev().text('4-20位');
            }).blur(function(){
                var reg=/^[0-9a-zA-Z]{4,20}$/;
                if($(this).val()==""){
                    $(this).parent().prev().text('未填写');
                }else if(!( reg.test($(this).val()) ) ){
                    $(this).parent().prev().text('格式错误');
                }else{
                    $(this).parent().prev().text('');
                    ok1=true;
                }
            });
            $('#password').focus(function(){
                $(this).parent().prev().text('3-9位');
            }).blur(function(){
                var reg=/^[0-9a-zA-Z]{3,9}$/;
                if($(this).val()==""){
                    $(this).parent().prev().text('未填写');
                }else if( !(reg.test($(this).val())) ){
                    $(this).parent().prev().text('格式错误');
                }else{
                    $(this).parent().prev().text('');
                    ok2=true;
                }
            });
            $("#submit").click(function(){
                if( (ok1 && ok2)==true ){
                    return true;
                }else{
                    if($('#username').val()==""){
                        $('#username').parent().prev().text('未填写');
                    }
                    if($('#password').val()==""){
                        $('#password').parent().prev().text('未填写');
                    }
                    /*e.preventDefault();*/
                    return false;
                }
            });
            /*$('#drag').drag();*/
        }();
        function setHeight() {
            var max_height = $(window).height();
            var primary =$("#login");
            primary.css("min-height",max_height+"px");
            primary.css("max-height",max_height+"px")
        }
    </script>

</body>
</html>