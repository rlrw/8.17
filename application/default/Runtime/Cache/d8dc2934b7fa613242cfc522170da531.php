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

<section class="section grxg_form">

    <div>
        <form name="form" method="POST" action="__APP__/Core/syzxjup" style="display: block;" class="mm_xg_form">
            <div class="Transfer_Prompt">
                <p style="color: red; font-size: 0.18rem; line-height: 0.28rem;">
                    转换须知：<br>
                    1、收益积分必须大于等于转换积分；<br>
                    2、本次操作不可逆；
            </div>
            <div class="form-group">
                <label for="grxg_ID">用户姓名：</label>
                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($info["name"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">用户ID：</label>
                <input type="text" class="form-control" readonly name="userid" placeholder="" value="<?php echo ($info["userid"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">当前收益积分：</label>
                <input type="text" class="form-control" readonly name="pay_points" placeholder="" value="<?php echo ($info["pay_points"]); ?>.00">
            </div>
            <div class="form-group">
                <label for="grxg_ID">转换金额：</label>
                <input type="number" class="form-control"  name="Transfer_amount" placeholder="请输入100的整数金额！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">二级密码：</label>
                <input type="password" class="form-control"  name="rj_Password" placeholder="请输入二级密码！" value="">
                <input hidden name="act" value="收益转现金">
                 <input hidden name="cash_points" value="<?php echo ($info["cash_points"]); ?>">
            </div>
            <!--<div class="form-group">
	           <label for="grxg_ID">备注：</label>
	           <input type="text" class="form-control"  name="Remarks" placeholder="" value="">
	       </div> 
            <div class="form-group" >
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="grxg_checkbox">我已阅读并同意弹窗的《经销商经营守则》
                    </label>
                </div>
            </div>-->
            <input type="submit" class="btn center-block" id="join_submit" value="提交转换申请">
        </form>
        <div class="mm_xg_form" style="display: none;">
            <table>
                <thead>
                <tr>
                    <th class="w310"><span>姓名</span></th>
                    <th><span>提现金额</span></th>
                    <th><span>提现银行</span></th>
                    <th><span style="border-right: 0px;">银行账号</span></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>李四</td>
                    <td>5000.00</td>
                    <td>中国建设银行（xxx支行）</td>
                    <td>6543516876465313</td>
                </tr>
                <tr>
                    <td>李四</td>
                    <td>5000.00</td>
                    <td>中国建设银行（xxx支行）</td>
                    <td>6543516876465313</td>
                </tr>
                </tbody>
            </table>
            <ul class="grxg_form_ym">
                <li>首页</li>
                <li>上一页</li>
                <li>
                    <span>1</span>/
                    <span>5</span>
                </li>
                <li>下一页</li>
                <li>末页</li>
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
                Transfer_amount: {
                    validators: {
                        notEmpty: { message: '请输入转换金额!'},
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