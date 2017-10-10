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
       .grxg_form .mm_xg ul{ overflow: hidden; border: 1px solid #ddd; color: #333; margin-bottom: 0.15rem; border-radius: 5px; width: 100%; font-size: 0.2rem;}
       .grxg_form .mm_xg li{ float: left; width: 50%; height: 0.6rem; line-height: 0.6rem; text-align: center; cursor: pointer;}
       .grxg_form .mm_xg li:first-child{ border-right: 1px solid #ddd;}
       .grxg_form .mm_xg li:hover{  background: #85c125; color: #fff;}
       .grxg_form .mm_xg .mm_xg_hover{background: #85c125; color: #fff;}
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
    <div class="mm_xg">
        <ul>
            <li class="mm_xg_hover">修改密码</li>
            <li>修改二级密码</li>
        </ul>
    </div>
    <div>
        <form name="form" method="post" action="__APP__/Core/up" style="display: block;" class="mm_xg_form">
           <div class="form-group">
                <label for="grxg_name">用户姓名：</label>
                <input type="text" class="form-control" disabled name="grxg_name"  placeholder="" value="<?php echo ($user["name"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">用户ID：</label>
                <input type="text" class="form-control" disabled name="grxg_ID" placeholder="" value="<?php echo ($user["userid"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_tell">手机号码：</label>
                <input type="tell" class="form-control"  disabled name="grxg_tell" placeholder="" value="<?php echo ($user["phone"]); ?>">
            </div>
            <div class="form-group">
                <label for="mmxg_old">用户原密码：</label>
                <input type="password" class="form-control" name="mm" placeholder="请输入原密码" value="">
            </div>
            <div class="form-group">
                <label for="mmxg_new">新密码：</label>
                <input type="password" class="form-control" name="mmxg_new" placeholder="请输入新密码" value="">
            </div>
            <div class="form-group">
                <label for="mmxg_new">确认密码：</label>
                <span class="mmsr_new_ts fr hidden" style="color: red">两次输入密码不一致！</span>
                <input type="password" class="form-control" name="mmsr_new" placeholder="请再次输入新密码" value="">
            </div>
            <div class="form-group" >
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="grxg_checkbox">我已阅读并同意弹窗的《经销商经营守则》
                    </label>
                </div>
            </div>
            <input type="submit" class="btn center-block" id="join_submit" value="提交修改">
        </form>
        <form name="form" method="post" action="__APP__/Core/up" class="mm_xg_form" style="display: none;">
            <div class="form-group">
                <label for="grxg_name">用户姓名：</label>
                <input type="text" class="form-control" disabled name="grxg_name"  placeholder="" value="<?php echo ($user["name"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">用户ID：</label>
                <input type="text" class="form-control" disabled name="grxg_ID" placeholder="" value="<?php echo ($user["userid"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_tell">手机号码：</label>
                <input type="tell" class="form-control"  disabled name="grxg_tell" placeholder="" value="<?php echo ($user["phone"]); ?>">
            </div>
            <div class="form-group">
                <label for="mmxg_old">用户原二级密码：</label>
                <input type="password" class="form-control" name="ejmm" placeholder="请输入原密码" value="">
            </div>
            <div class="form-group">
                <label for="mmxg_new">新二级密码：</label>
                <input type="password" class="form-control" name="ejmm_new" placeholder="请输入新密码" value="">
            </div>
            <div class="form-group">
                <label for="mmxg_new">确认二级密码：</label>
                <span class="ejmm_new_ts fr hidden" style="color: red">两次输入二级密码不一致！</span>
                <input type="password" class="form-control" name="ejxm_new" placeholder="请再次输入新密码" value="">
            </div>
            <div class="form-group" >
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="grxg_checkbox">我已阅读并同意弹窗的《经销商经营守则》
                    </label>
                </div>
            </div>
            <input type="submit" class="btn center-block" id="join_submit" value="提交修改">
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
    $(function () {
        //table toggle
        $(".mm_xg li").click(function(){
            $(this).addClass("mm_xg_hover").siblings().removeClass("mm_xg_hover");
            var text=$(this).html();
            var index;
            $(".mm_xg li").each(function(key){
                if(text==$(this).html()){
                    return index=key;
                }
            });
            $(".mm_xg_form").each(function(k){
                if(k==index){
                    $(this).css({ "display": "block" }).siblings().css({ "display": "none" });
                }
            });
        });
        //二次输入 Verification
        +function () {
            $("input[name='mmsr_new']").on("blur",function(){
                RepVer();
            });
            $("input[name='mmxg_new']").on("blur",function(){
                RepVer();
            });
            function RepVer(){
                var mmxg_new = $("input[name='mmxg_new']").val();
                var mmsr_new = $("input[name='mmsr_new']").val();
                if (!(mmxg_new == mmsr_new)) {
                    $(".mmsr_new_ts").addClass("show").removeClass("hidden");
                } else {
                    $(".mmsr_new_ts").addClass("hidden").removeClass("show");
                }
            };
        }();
        +function () {
            $("input[name='ejxm_new']").on("blur",function(){
                RepVer();
            });
            $("input[name='ejmm_new']").on("blur",function(){
                RepVer();
            });
            function RepVer(){
                var mmxg_new = $("input[name='ejxm_new']").val();
                var mmsr_new = $("input[name='ejmm_new']").val();
                if (!(mmxg_new == mmsr_new)) {
                    $(".ejmm_new_ts").addClass("show").removeClass("hidden");
                } else {
                    $(".ejmm_new_ts").addClass("hidden").removeClass("show");
                }
            };
        }();
        //input Verification
        $('form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                mm_old: {
                    validators: {
                        notEmpty: { message: '请输入原密码!'}
                    }
                },
                 ejmm_old: {
                    validators: {
                        notEmpty: { message: '请输入原密码!'}
                    }
                },
                mmxg_new: {
                    validators: {
                        notEmpty: { message: '请输入新密码!'}
                    }
                },
                mmsr_new: {
                    validators: {
                        notEmpty: { message: '请重复输入新密码!'}
                    }
                },
                grxg_checkbox: {
                    validators: {
                        notEmpty: { message: '请选择!'}
                    }
                },
                ejmm_new: {
                    validators: {
                        notEmpty: { message: '请重复输入新密码!'}
                    }
                },
                mmxg_new:{
                    validators: {
                        notEmpty: { message: '二级密码不能为空!'},
                        regexp:{
                            regexp:/^\d{6}$/,
                            message:'二级密码格式不对!'
                        }
                    }
                },
                ejmm_new:{
                    validators: {
                        notEmpty: { message: '密码不能为空!'},
                        regexp:{
                            regexp:/^\d{6}$/,
                            message:'密码格式不对!'
                        }
                    }
                },
                ejxm_new: {
                    validators: {
                        notEmpty: { message: '请选择!'}
                    }
                }
            }
        });

    });

</script>
</body>
</html>