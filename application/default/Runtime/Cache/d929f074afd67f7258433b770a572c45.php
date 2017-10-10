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
    <form name="form" method="post" action="__APP__/Core/upgrade" class="hysj_form">
        <div class="form-group">
            <label for="hysj_name">用户姓名：</label>
            <input type="text" class="form-control" disabled name="hysj_name"  placeholder="" value="<?php echo ($user["name"]); ?>">
        </div>
        <div class="form-group">
            <label for="hysj_ID">用户ID：</label>
            <input type="text" class="form-control" disabled name="hysj_ID" placeholder="" value="<?php echo ($user["userid"]); ?>">
        </div>
        <div class="form-group">
            <label class="control-label">当前可用现金积分：</label>
            <input type="text" class="form-control" name="hysj_dqxjjf" readonly placeholder="" value="<?php echo ($user["cash_points"]); ?>">
        </div>
        <div class="form-group">
            <label for="hysj_dqjb">当前级别：</label>
            <input type="text" class="form-control" disabled name="hysj_dqjb" placeholder="" value="<?php echo ($user["lv1"]); ?>">
        </div>
        <div class="form-group">
            <label for="hysj_sj">升级等级：</label>
            <select class="form-control" name="hysj_sj">
                <option>VIP经销商</option>
            </select>
        </div>
        <div class="form-group">
            <label for="hysj_ejmm">二级密码验证：</label>
            <input type="password" class="form-control" name="hysj_paypwd" placeholder="请输入二级密码" value="">
        </div>
      <!--    <div class="form-group" >
          <div class="checkbox">
              <label>
                  <input type="checkbox" name="hysj_checkbox">我已阅读并同意弹窗的《经销商经营守则》
              </label>
          </div>
      </div> -->
    <?php if($user["lv"] == 3000 ): ?><input type="submit" class="btn center-block" id="join_submit" value="立即升级">
    <?php else: ?> <div class="btn center-block"  id="join_submit" style="background: #777; line-height: 35px;">无需升级</div><?php endif; ?>
        

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
                hysj_ejmm: {
                    message: '密码验证失败',
                    validators: {
                        notEmpty: { message: '请输入二级密码!'}
                    }
                },
                hysj_checkbox: {
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