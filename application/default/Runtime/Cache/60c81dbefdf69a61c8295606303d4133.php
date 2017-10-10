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
    <style>
        .mm_xg_form thead tr th{ width:15%; padding: 0.13rem 0;}
        .mm_xg_form thead tr th span{ padding: 0 0.18rem;}
        .grxg_form tbody td{  padding: 0.2rem 0.15rem;}
    </style>
</head>
<body>
  <header class="header">
    <a href="__APP__/Login/loginout" class="header_fl fl"><span class="glyphicon glyphicon-off" style="color: #fff"></span></a>
        <!--<a href="" class="header_fl fl"><span class="glyphicon glyphicon-menu-left" style="color: #fff"></span></a>-->
       <?php if($act != null): echo ($act); else: ?>首页<?php endif; ?>
        <a href="__APP__/Core/index"  class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
    </header>

<section class="section grxg_form">
    <div>
        <div class="mm_xg_form" >
            <table>
                <thead>
                <tr>
                    <th class="w310"><span>产生时间</span></th>
                    <th><span>产生金额</span></th>
                    <th><span>扣税</span></th>
                    <th><span>重消积分</span></th>
                    <th><span>应得积分</span></th>
                    <th><span style="border-right: 0px;">来源</span></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($inf)): foreach($inf as $key=>$v): ?><tr>
                    <td><?php echo ($v["datetime"]); ?></td>
                    <td><?php echo ($v["money"]); ?></td>
                    <td><?php echo ($v["tax"]); ?></td>
                    <td><?php echo ($v["no_points"]); ?></td>
                    <td><?php echo ($v["pay_points"]); ?></td>
                    <td><?php if($v["status"] == 0 ): ?>每月分红<?php elseif($v["status"] == 1 ): ?>直推收益<?php elseif($v["status"] == 2 ): ?>间推收益<?php elseif($v["status"] == 3 ): ?>经销商返点<?php elseif($v["status"] == 4 ): ?>服务中心收益<?php endif; ?></td>
                    <!--<td><?php echo ($v["sum_pay"]); ?></td>-->
                </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <ul class="grxg_form_ym">
               <?php echo ($page); ?>
            </ul>

        </div>
    </div>
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