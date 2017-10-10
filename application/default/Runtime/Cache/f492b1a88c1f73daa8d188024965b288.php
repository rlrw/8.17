<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
    <div class="mm_xg">
        <ul>
            <li >现金互转</li>
            <li class="mm_xg_hover">互转记录</li>
            
        </ul>
    </div>
    <div>

        <form name="form" method="post" action="__APP__/List/xjhz/act/现金互转" style="display:none;" class="mm_xg_form">
            <div class="Transfer_Prompt">
                <p style="color: red; font-size: 0.18rem; margin: 0.1rem; line-height: 0.28rem;">
                    转账须知：<br>
                    1、现金积分互转接受经销商编号必须与接受会员姓名相匹配；<br>
                    2、转账金额必须小于或等于当前余额；</p>
            </div>
            <div class="form-group">
                <label for="grxg_ID">用户姓名：</label>
                <input type="text" class="form-control" readonly name="name" placeholder="" value="<?php echo ($infoo["name"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">用户ID：</label>
                <input type="text" class="form-control" readonly name="userid" placeholder="" value="<?php echo ($infoo["userid"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">当前现金积分：</label>
                <input type="text" class="form-control" readonly name="cash_points" placeholder="" value="<?php echo ($infoo["cash_points"]); ?>">
            </div><div class="form-group">
                <label for="grxg_ID">接收人ID：</label>
                <input type="text" class="form-control"  name="Receive_ID" placeholder="请输入接收人ID" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">接收人姓名：</label>
                <input type="text" class="form-control"  name="Receive_name" placeholder="请输入接收人姓名" value="">
            </div>
            
            <div class="form-group">
                <label for="grxg_ID">转账金额：</label>
                <input type="number" class="form-control"  name="Transfer_amount" placeholder="请输入100的整数金额！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">二级密码：</label>
                <input type="password" class="form-control"  name="paypwd" placeholder="请输入二级密码！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">备注：</label>
                <input type="text" class="form-control"  name="Remarks" placeholder="" value="">
            </div>
            <input type="submit" class="btn center-block" id="join_submit" value="提交转账">
        </form>
        <div class="mm_xg_form" style="display: block;">
            <table>
                <thead>
                <tr>
                    <th class="w310"><span>接收人ID</span></th>
                    <th><span>接收人</span></th>
                    <th><span>转账金额</span></th>
                    <th><span style="border-right: 0px;">备注</span></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($info)): foreach($info as $key=>$info): ?><tr>
                    <td><?php echo ($info["cid"]); ?></td>
                    <td><?php echo ($info["name"]); ?></td>
                    <td><?php echo ($info["money"]); ?></td>
                    <td><?php echo ($info["remark"]); ?></td>
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
<script>
    $(function () {
    	$("input[name='Receive_ID']").blur(function(){
    		$.ajax({
    			type:"post",
    			url:"<?php echo U('List/get_aname');?>",
    			data:{v:$(this).val()},
                success:function(e){
                    console.log(e);
                	$("input[name='Receive_name']").val(e);
                }
    		});
    	})
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
                ejmm: {
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