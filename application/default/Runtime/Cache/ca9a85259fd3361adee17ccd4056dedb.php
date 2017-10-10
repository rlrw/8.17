<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>车享惠-用户中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link href="__PUBLIC__/css/index.css" rel="stylesheet">
    <script src="__PUBLIC__/js/index.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/jquery-3.2.1.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" >
    <script src="__PUBLIC__/js/bootstrap.min.js"  type="text/javascript"></script>

    <link href="__PUBLIC__/css/bootstrapValidator.min.css" rel="stylesheet">
    <script src="__PUBLIC__/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/city.js" type="text/javascript"></script>

</head>
<body>
  <header class="header">
    <a href="__APP__/Login/loginout" class="header_fl fl"><span class="glyphicon glyphicon-off" style="color: #fff"></span></a>
        <!--<a href="" class="header_fl fl"><span class="glyphicon glyphicon-menu-left" style="color: #fff"></span></a>-->
       <?php if($act != null): echo ($act); else: ?>首页<?php endif; ?>
        <a href="__APP__/Core/index"  class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
    </header>

<section class="section">
    <form name="form" class="join_form">
        <div class="form-group">
            <label for="tjr_name">姓名：</label>
            <input type="text" class="form-control" disabled name="tjr_name"  placeholder="" value="<?php echo ($info["name"]); ?>">
        </div>
        <div class="form-group">
            <label for="tjr_ID">ID：</label>
            <input type="text" class="form-control" disabled name="tjr_ID" placeholder="" value="<?php echo ($info["userid"]); ?>">
        </div>
       
        <div class="form-group">
            <label for="yjr_tell">手机号码：</label>
            <input type="tel" class="form-control" disabled name="yjr_tell" placeholder="" value="<?php echo ($info["phone"]); ?>">
        </div>
        <div class="form-group">
            <label for="yjr_card">身份证号码：</label>
            <input type="number" class="form-control" disabled name="yjr_card" placeholder="" value="<?php echo ($info["card"]); ?>">
        </div>
        <div class="form-group">
            <label for="yjr_fwzx">服务中心：</label>
            <input type="text" class="form-control" disabled name="yjr_card" placeholder="" value="<?php echo ($info["area"]); ?>">
        </div>
        <div class="form-group">
            <label for="yjr_ssqy" style="display: block">所属区域：</label>
            <div class="col-sm-3 col-xs-4" style="padding-right: 10px; padding-left: 0;" >
                <input type="text" disabled class="form-control" name="yjr_card" placeholder="" value="<?php echo ($info["province"]); ?>">
            </div>
            <div class="col-sm-3 col-xs-4" style="padding-right: 10px;padding-left: 0;">
                <input type="text" disabled class="form-control" name="yjr_card" placeholder="" value="<?php echo ($info["city"]); ?>">
            </div>
            <div class="col-sm-3 col-xs-4" style="padding-right: 10px;padding-left: 0;">
                <input type="text" disabled class="form-control" name="yjr_card" placeholder="" value="<?php echo ($info["county"]); ?>">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="yjr_zcdj">等级：</label>
            <input type="text"  disabled class="form-control" name="yjr_card" placeholder="" value="<?php echo ($info["lv"]); ?>">
        </div>
        <div class="form-group">
            <label for="yjr_dlmm">登录密码：</label>
            <input type="text" disabled class="form-control" name="yjr_dlmm" placeholder="" value="<?php echo ($info["password2"]); ?>">
        </div>
        <div class="form-group">
            <label for="yjr_ejmm">二级密码：</label>
            <input type="number"  disabled class="form-control" name="yjr_ejmm" placeholder="" value="<?php echo ($info["paypwd"]); ?>">
        </div>
    </form>
</section>
   <footer class="footer">
        <ul>
            <li>
                <a href="__APP__/Index/index/act/首页" >
                    <i class="glyphicon glyphicon-home"></i>
                    <span>首页</span>
                </a>
            </li>
            <li>
                <a href="__APP__/Join/index/act/定金加盟" >
                    <i class="glyphicon glyphicon-usd"></i>
                    <span>定金加盟</span>
                </a>
            </li>
            <li>
                <a href="__APP__/List/xjhz/act/现金互转" >
                    <i class="glyphicon glyphicon-send"></i>
                    <span>现金互转</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Withdraw/index');?>" >
                    <i class="glyphicon glyphicon-tags"></i>
                    <span>提现申请</span>
                </a>
            </li>
            <li>
                <a href="__APP__/Core/syzxj/act/收益转现金" >
                    <i class="glyphicon glyphicon-paperclip"></i>
                    <span>收益转现金</span>
                </a>
            </li>
        </ul>
    </footer>

</body>
</html>