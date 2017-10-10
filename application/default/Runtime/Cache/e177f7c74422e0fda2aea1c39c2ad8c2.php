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
       <?php if($act != null): echo ($act); else: ?>首页<?php endif; ?>
        <a href="__APP__/Core/index"  class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
    </header>

<section class="section">
    <form name="form" method="post" action="__APP__/Core/add" class="grxg_form">
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
            <label for="grxg_card">身份证号码：</label>
            <input type="number" class="form-control" disabled name="grxg_card" placeholder="" value="<?php echo ($user["card"]); ?>">
        </div>
        <div class="form-group">
            <label for="old_Bank">提现银行：</label>
            <input type="text" class="form-control" disabled name="old_Bank" placeholder="" value="<?php echo ($user["bank"]); ?>">
        </div>
        <div class="form-group">
            <label for="old_BankNumber">银行卡号：</label>
            <input type="text" class="form-control" disabled name="old_BankNumber" placeholder="" value="<?php echo ($user["bankcard"]); ?>">
        </div>
        <div class="form-group">
            <label for="new_tell">手机号码：</label>
            <input type="tell" class="form-control" name="phone" placeholder="请输入新的手机号码！" value="">
        </div>
        <div class="form-group">
            <label for="new_Bank">新提现银行：</label>
            <select class="form-control" name="new_Bank" data-bv-notempty data-bv-notempty-message="请选择所新的银行!">
                <option  value="">—请选择—</option>
                <option value="中国工商银行">中国工商银行</option>
                <option value="中国建设银行">中国建设银行</option>
                <option value="中国银行">中国银行</option>
                <option value="中国农业银行">中国农业银行</option>
                <option value="交通银行">交通银行</option>
                <option value="招商银行">招商银行</option>
                <option value="中信银行">中信银行</option>
                <option value="中国民生银行">中国民生银行</option>
                <option value="兴业银行">兴业银行</option>
                <option value="上海浦东发展银行">上海浦东发展银行</option>
                <option value="中国邮政储蓄银行">中国邮政储蓄银行</option>
                <option value="中国光大银行">中国光大银行</option>
                <option value="平安银行">平安银行</option>
                <option value="哈尔滨银行">哈尔滨银行</option>
            </select>
        </div>
        <div class="form-group">
            <label for="new_Bank_zh">提现支行：</label>
            <input type="text" class="form-control"  name="new_Bank_zh" placeholder="请输入所属的支行！" value="">
        </div>
        <div class="form-group">
            <label for="new_BankNumber">新银行卡号：</label>
            <input type="text" class="form-control"  name="bankcard" placeholder="请输入正确的银行卡号！" value="">
        </div>
        <div class="form-group">
            <label for="grxg_ejmm">密码验证：</label>
            <input type="password" class="form-control" name="paypwd" placeholder="请输入二级密码" value="">
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
        $('form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                phone: {
                    validators: {
                        notEmpty: { message: '请输入新手机号码!'}
                    }
                },
                new_Bank_zh: {
                    validators: {
                        notEmpty: { message: '请输入所属支行!'}
                    }
                },
                bankcard: {
                    validators: {
                        notEmpty: { message: '请输入正确的银行卡号!'}
                    }
                },
                ejmm: {
                    validators: {
                        notEmpty: { message: '请输入二级密码!'}
                    }
                },
                grxg_checkbox: {
                    validators: {
                        notEmpty: { message: '请选择！！'}
                    }
                }
            }
        });

    });

</script>
</body>
</html>