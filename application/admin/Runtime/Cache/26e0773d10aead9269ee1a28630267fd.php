<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>车享惠-后台管理系统登录</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="__PUBLIC__/assets/css/reset.css">
        <link rel="stylesheet" href="__PUBLIC__/assets/css/supersized.css">
        <link rel="stylesheet" href="__PUBLIC__/assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>

        <![endif]-->

    </head>

    <body>
        <div class="page-container" style="margin-top:200px;">
            <h1>Login</h1>
            <form action="<?php echo U('Admin/check_staff');?>" method="post">
                <input type="hidden" value="<?php echo ($_SESSION['token']); ?>" name="token">
                <input type="text" name="account" class="username" placeholder="Username" style="background: #fff; color: #333">
                <input type="password" name="pwd" class="password" placeholder="Password" style="background: #fff; color: #333">
                <!--<div>
                <input type="text" name="yzm" class="" placeholder="" style="width: 40%;float:left;">
                    <div><img src="<?php echo U('Admin/yzm');?>"  style="float:left;margin-left:5px;margin-top:26px;width:140px;height:42px;border-radius: 5px;cursor: pointer;" id="yzm" ></div>
                </div>
                <input type="text" value="<?php echo ($_SESSION['verify']); ?>">-->
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
            </div>
        </div>
        <div align="center">Ownership of<a href="javascript:" target="_blank" title="聚马飞腾" style="text-decoration: none;"> 聚马飞腾</a></div>

        <!-- Javascript -->
        <script src="__PUBLIC__/assets/js/jquery-1.8.2.min.js"></script>
        <script src="__PUBLIC__/assets/js/supersized.3.2.7.min.js"></script>
        <script src="__PUBLIC__/assets/js/supersized-init.js"></script>
        <script src="__PUBLIC__/assets/js/scripts.js"></script>
    </body>
    <script>
        $(function(){
            $("#yzm").click(function(){
                $(this).attr("src",$(this).attr('src'));
            })
        })
    </script>
</html>