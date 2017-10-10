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
        .mm_xg_form tbody tr{ overflow: hidden; cursor: pointer;}
        .mm_xg_form tbody tr:nth-of-type(odd){background: #F4F4F4;}
        .mm_xg_form tbody tr:hover{ background: #F4F4F4;}
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
                        <th class="w310"><span>提现时间</span></th>
                        <th><span>姓名</span></th>
                        <th><span>提现金额</span></th>
                        <th><span style="border-right: 0px;">状态</span></th>
                    </tr>
                </thead>
                <tbody>

                <?php if(is_array($info)): foreach($info as $key=>$info): ?><tr data-toggle="modal" data-target="#r<?php echo ($info["withdraw_id"]); ?>" class="txsh">
                        <td><?php echo (date("Y-m-d H:i",$info["time"])); ?></td>
                        <td><?php echo ($info["user_name"]); ?></td>
                        <td><?php echo ($info["total"]); ?></td>
                        <td><?php echo ($info["state"]); ?></td>
                        <td id="withdrawid" class="hidden"><?php echo ($info["withdraw_id"]); ?></td>
                    </tr>

                  <div class="container" id="mmdo">
                <div class="modal fade" id="r<?php echo ($info["withdraw_id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                <span><?php echo (date('Y-m-d',$info["time"])); ?></span>
                                <span>
                                <?php if($info["state"] == 0 ): ?>审核中<?php elseif($info["state"] == 1 ): ?> 通过<?php else: ?>未通过<?php endif; ?>
                                </span>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form name="form" method="post" action="" style="display: block;" class="mm_xg_form">
                                <div class="form-group">
                                    <label for="grxg_ID">用户姓名：</label>
                                    <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($info["user_name"]); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="grxg_ID">用户ID：</label>
                                    <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($info["user_number"]); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="grxg_ID">提现银行：</label>
                                    <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($info["bank"]); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="grxg_ID">银行账号：</label>
                                    <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($info["bank_number"]); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="grxg_ID">提现金额：</label>
                                    <input type="number" class="form-control" readonly  name="Transfer_amount" placeholder="" value="<?php echo ($info["total"]); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="grxg_ID">备注：</label>
                                    <input type="text" class="form-control" readonly  name="Remarks" placeholder="" value="<?php echo ($info["remarks"]); ?>">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div><?php endforeach; endif; ?>


                 
                </tbody>
            </table>

            <!-- Modal -->
 
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
//点击跳出
       /* $('.txsh').on('click',function(){
           
            
            var wid=$("#withdrawid").val();
           
            $.post("<?php echo U('List/ajaxr');?>",{'value':wid},function(){
                $('#mmdo').empty().append($data).show();
            })
    });*/
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