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

        #menu{ overflow: hidden; margin: 90px auto; width: 640px;}
        #menu h1 {  cursor: pointer;  color: #FFF;  font-size: 22px;  padding: 10px; background-color: #F93;  border-radius: 5px; line-height: 30px;}
        #menu h1 span{ margin-right: 0;}
        #menu h2 {  cursor: pointer;  color: #666;  font-size: 22px;  padding: 10px 0 10px 15px;  border: #E7E7E7 1px solid;  border-top-color: #FFF;  background-color: #F4F4F4; margin-left: 15px;  line-height: 30px;}
        #menu ul {  padding-left: 15px;    overflow: auto; margin-left: 25px;}
        #menu ul li {  padding: 10px 0 10px 10px; font-size: 22px; line-height: 30px; color: #666;border-bottom: #E7E7E7 1px solid;}
        .no {  display: none;}
    </style>
</head>
<body>
  <header class="header">
    <a href="__APP__/Login/loginout" class="header_fl fl"><span class="glyphicon glyphicon-off" style="color: #fff"></span></a>
        <!--<a href="" class="header_fl fl"><span class="glyphicon glyphicon-menu-left" style="color: #fff"></span></a>-->
       <?php if($act != null): echo ($act); else: ?>首页<?php endif; ?>
        <a href="__APP__/Core/index"  class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
    </header>
<div id="menu">
    <h1>
        <i class="glyphicon-minus"></i>
        <span>【<?php echo ($user["name"]); ?>】</span>
        <span>[<?php echo ($user["userid"]); ?>]</span>
        <span>[<?php echo ($user["lv1"]); ?>]</span>
      
        <span>[注册时间：<?php echo ($user["reg_time"]); ?>]</span>
        <span>[直推人数：<?php echo ($count); ?>]</span>
        <span>[间推人数：<?php echo ($uuss); ?>]</span>
    </h1>

    <section id="NO0" class="no">
<?php if(is_array($tree)): foreach($tree as $key=>$v): ?><h2>
            <i class="glyphicon-plus"></i>
            <span>【<?php echo ($v["name"]); ?>】</span><span>[<?php echo ($v["userid"]); ?>]</span><span>[<?php if($v["lv"] == 20000 ): ?>VIP经销商<?php elseif($v["lv"] == 3000 ): ?>会员<?php endif; ?>]</span>

            <span>[注册时间：<?php echo ($v["reg_time"]); ?>]</span></h1>
        </h2>
        
         <ul id="NO00" class="no">
    <?php if(is_array($v["ppid"])): foreach($v["ppid"] as $key=>$vv): ?><li>
               <span>【<?php echo ($vv["name"]); ?>】</span><span>[<?php echo ($vv["userid"]); ?>]</span><span>[<?php echo ($vv["lv"]); ?>]</span>
                <span>[注册时间：<?php echo ($vv["reg_time"]); ?>]</span></h1>
            </li><?php endforeach; endif; ?>
      </ul><?php endforeach; endif; ?>
    </section>


</div>
<script>
    +function () {
        $("#NO0").removeClass("no");
        $("#menu h1").click(function(){
            if($("#NO0").attr("class")=="no"){
                $("#NO0").removeClass("no");
                $("#menu h1 i").removeClass("glyphicon-plus").addClass("glyphicon-minus");
            }else {
                $("#NO0").addClass("no");
                $("#menu h1 i").removeClass("glyphicon-minus").addClass("glyphicon-plus");
            }
        });
        if($("#NO0").attr("class")!="no"){
            $("#NO0 h2").click(function(){
                if($(this).children("i").attr("class")=="glyphicon-plus"){
                    $(this).children("i").removeClass("glyphicon-plus").addClass("glyphicon-minus");//+ -
                    if($(this).next("ul").attr("class")=="no"){
                        $(this).next("ul").removeClass("no");
                    }else {
                        $(this).next("ul").addClass("no");
                    }
                }else {
                    $(this).children("i").removeClass("glyphicon-minus").addClass("glyphicon-plus");
                    if($(this).next("ul").attr("class")=="no"){
                        $(this).next("ul").removeClass("no");
                    }else {
                        $(this).next("ul").addClass("no");
                    }
                }
            })
        }else {
            return false;
        }
    }();
</script>

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