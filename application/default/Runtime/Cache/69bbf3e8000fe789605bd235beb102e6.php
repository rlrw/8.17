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
</head>
<body>
<header class="header">
    <a href="__APP__/Login/loginout" class="header_fl fl"><span class="glyphicon glyphicon-off" style="color: #fff"></span></a>
    <!--<a href="" class="header_fl fl"><span class="glyphicon glyphicon-menu-left" style="color: #fff"></span></a>-->
    提现申请
    <a href="__APP__/Core/index" target="_blank" class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
</header>

<section class="section grxg_form">
    <div class="mm_xg">
        <ul>
            <li class="mm_xg_hover"><a href="javascript:">提现申请</a></li>
            <li><a href="<?php echo U('Withdraw/record');?>">提现记录</a></li>
        </ul>
    </div>
    <div>
        <form name="form" method="post" action="<?php echo U('Withdraw/get_withdraw');?>" style="display: block;" class="mm_xg_form">
            <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>">
            <div class="Transfer_Prompt">
                <p style="color: red; font-size: 0.18rem; margin: 0.1rem; line-height: 0.28rem;">
                    提现须知：<br>
                    1、提现金额必须小于等于收益积分；<br>
                    2、单次提现金额要大于等于100元。</p>
            </div>
            <div class="form-group">
                <label for="grxg_ID">用户姓名：</label>
                <input type="text" class="form-control" readonly name="user_name" placeholder="" value="<?php echo ($user["name"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">用户ID：</label>
                <input type="text" class="form-control" readonly name="user_number" placeholder="" value="<?php echo ($user["userid"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">当前收益积分：</label>
                <input type="text" class="form-control" readonly name="profit_integral" placeholder="" value="<?php echo ($user["pay_points"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">冻结收益积分：</label>
                <input type="text" class="form-control" readonly name="freeze_integral" placeholder="" value="<?php echo ($user["dj_points"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">提现银行：</label>
                <input type="text" class="form-control" readonly name="bank" placeholder="" value="<?php echo ($user["bank"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">银行账号：</label>
                <input type="text" class="form-control" readonly name="bank_number" placeholder="" value="<?php echo ($user["bankcard"]); ?>">
            </div>

            <div class="form-group">
                <label for="grxg_ID">提现金额：</label>
                <input type="number" class="form-control"  name="Transfer_amount" placeholder="请输入100的整数金额！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">二级密码：</label>
                <input type="password" class="form-control"  name="rj_Password" placeholder="请输入二级密码！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">备注：</label>
                <input type="text" class="form-control"  name="Remarks" placeholder="" value="">
            </div>
            <div class="form-group" >
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="grxg_checkbox">我已阅读并同意弹窗的《经销商经营守则》
                    </label>
                </div>
            </div>
            <input type="submit" class="btn center-block" id="join_submit" value="提现申请">
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
        //input Verification
        $('form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                Receive_name: {
                    validators: {
                        notEmpty: { message: '请输入收款人姓名!'}
                    }
                },
                Receive_ID: {
                    validators: {
                        notEmpty: { message: '请输入收款人ID!'}
                    }
                },
                Transfer_amount: {
                    validators: {
                        notEmpty: { message: '请输入转账金额!'},
                        regexp:{
                            regexp:/^([1-9]|\d{2,})*00$/,
                            message:'转账金额格式不对!'
                        }
                    }
                },
                rj_Password: {
                    validators: {
                        notEmpty: { message: '请输入二级密码!'},
                        regexp:{
                            regexp:/^\d{6}$/,
                            message:'二级密码格式不对!'
                        }
                    }
                },
                grxg_checkbox: {
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