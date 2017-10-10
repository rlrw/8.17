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
    <script src="__PUBLIC__/js/city.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"  type="text/javascript"></script>
    <link href="__PUBLIC__/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/fileinput.css" rel="stylesheet">
    <script src="__PUBLIC__/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/fileinput.min.js" type="text/javascript"></script>
</head>
<body>
<header class="header">
    <a href="__APP__/Login/loginout" class="header_fl fl"><span class="glyphicon glyphicon-off" style="color: #fff"></span></a>
    <!--<a href="" class="header_fl fl"><span class="glyphicon glyphicon-menu-left" style="color: #fff"></span></a>-->
    服务中心申请
    <a href="__APP__/Core/index" target="_blank" class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
</header>

<section class="section grxg_form">
    <div class="mm_xg">
        <ul>
            <li class="mm_xg_hover"><a href="javascript:">服务中心申请</a></li>
            <li><a href="<?php echo U('Service/record');?>">申请记录</a></li>
        </ul>
    </div>
    <div>
        <form id="form1" name="form" method="post" action="<?php echo U('Service/get_service');?>" style="display: block;" class="mm_xg_form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo ($user["new_id"]); ?>">
            <div class="form-group">
                <label for="yjr_fwzx">申请级别：</label>
                    <?php if($user["agent_level"] == '省级代理'): ?><input type="text" class="form-control" readonly name="service_level" placeholder="" value="省服务中心">
                        <?php elseif($user["agent_level"] == '市级代理'): ?><input type="text" class="form-control" readonly name="service_level" placeholder="" value="市服务中心">
                        <?php elseif($user["agent_level"] == '县级代理'): ?><input type="text" class="form-control" readonly name="service_level" placeholder="" value="县服务中心"><?php endif; ?>
            </div>
            <div class="form-group">
                <label for="yjr_ssqy" style="display: block">所属区域：</label>
                <div class="col-sm-3 col-xs-4" style="padding-right: 10px; padding-left: 0;" >
                    <?php if($user["province"] != NUll): ?><input class="form-control" readonly value="<?php echo ($user["province"]); ?>" name=""><?php endif; ?>
                </div>
                <div class="col-sm-3 col-xs-4" style="padding-right: 10px;padding-left: 0;">
                    <?php if($user["city"] != NUll): ?><input class="form-control" readonly value="<?php echo ($user["city"]); ?>" name=""><?php endif; ?>
                </div>
                <div class="col-sm-3 col-xs-4" style="padding-right: 10px;padding-left: 0;">
                    <?php if($user["county"] != NUll): ?><input class="form-control" readonly value="<?php echo ($user["province"]); ?>" name=""><?php endif; ?>
                </div>
                <div class="clearfix">
                    <input type="hidden" name="area" value="<?php echo ($user["area"]); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="grxg_ID">服务中心图片：</label>
                <input name="yy_zz_pic[]"  value=""  id="file-3" type="file" multiple>
            </div>

            <input  type="submit" class="btn center-block" id="join_submit" value="提交申请">
        </form>
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
<script>
        window.onload=function(){
            var id=$("input[name='id']").val();
            $.post("<?php echo U('Service/check_record');?>",{nid:id},function(e){
                        if(e==1){
                            $("form input").attr("disabled","disabled");
                            $("form select").attr("disabled","disabled");
                            $("#join_submit").val("审核中").attr("disabled","disabled");
                        }else if(e==2){
                            $("form input").attr("disabled","disabled");
                            $("form select").attr("disabled","disabled");
                            $("#join_submit").val("审核通过").attr("disabled","disabled");
                        }else{
                            $("#join_submit").val("提交申请").removeAttr("disabled");
                            $("form input").removeAttr("disabled");
                            $("form select").removeAttr("disabled");
                        }
            })
        };
    $(function(){
        $("#file-3").fileinput({
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-default btn-xm",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
        });
    })
</script>
</body>
</html>