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
    汇款申请
    <a href="__APP__/Core/index" target="_blank" class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
</header>


<section class="section grxg_form">
    <div class="mm_xg">
        <ul>
            <li class="mm_xg_hover"><a href="javascript:">汇款申请</a></li>
            <li><a href="<?php echo U('Remittance/record');?>">汇款记录</a></li>
        </ul>
    </div>
    <div>

        <form name="form" method="post" action="<?php echo U('Remittance/insert_remittance');?>" style="display: block;" class="mm_xg_form">
            <input type="hidden" name="user_id" value="<?php echo ($user_id); ?>">
            <div class="Transfer_Prompt">
                <p style="color: red; font-size: 0.18rem; margin: 0.1rem; line-height: 0.28rem;">
                    汇款车须知：<br>
                    1、如果您已经通过银行汇款，则在此填写相应资料<br>
                    2、财务审核成功后款项将进入您的现金积分账户！（*号为必填）</p>
            </div>
            <div class="form-group">
                <label for="grxg_ID">收款账户：</label>
                <input type="text" class="form-control" readonly  name="payee" placeholder="请输入车牌号" value="(中国农业银行绵阳西南科技大学支行)2224  0901  0400  05489 (四川车享惠网络科技有限公司))">
            </div>
            <div class="form-group">
                <label for="grxg_ID">* 汇款银行：</label>
                <select class="form-control" name="yjr_fwzx" data-bv-notempty data-bv-notempty-message="请选择所汇款银行!">
                    <option  value="">—请选择—</option>
                    <?php if(is_array($bankList)): foreach($bankList as $key=>$val): ?><option value="<?php echo ($val["bank_id"]); ?>"><?php echo ($val["bank_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="grxg_ID">* 支行：</label>
                <input type="text" class="form-control"  name="sub_address" placeholder="请输入汇款支行" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">* 汇款姓名：</label>
                <input type="text" class="form-control"  name="remit_name" placeholder="请输入汇款账户密" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">* 汇款账号：</label>
                <input type="text" class="form-control"  name="remit" placeholder="请输入汇款账号" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">* 汇款金额：</label>
                <input type="text" class="form-control"  name="remit_money" placeholder="请输入汇款金额" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">* 汇款日期：</label>
                <input type="date" class="form-control"  name="remit_time" placeholder="请输入汇款日期" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">汇款单号：</label>
                <input type="text" class="form-control"  name="order" placeholder="请输入汇款单号" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">联系电话：</label>
                <input type="text" class="form-control"  name="phone" placeholder="请输入联系电话" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">备注：</label>
                <input type="text" class="form-control"  name="remarks" placeholder="请输入汇款支行" value="">
            </div>

            <div class="form-group" >
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="grxg_checkbox">我已阅读并同意弹窗的《经销商经营守则》
                    </label>
                </div>
            </div>
            <input type="submit" class="btn center-block" id="join_submit" value="提交汇款通知">
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
                car_ID: {
                    validators: {
                        notEmpty: { message: '未填写'}
                    }
                },
                Vin_ID: {
                    validators: {
                        notEmpty: { message: '未填写'}
                    }
                },
                car_Models: {
                    validators: {
                        notEmpty: { message: '未填写'}
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