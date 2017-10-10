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
            <li class="mm_xg_hover" style="background: none;"><a href="<?php echo U('Remittance/index');?>" style="color: #333;">汇款申请</a></li>
            <li style="background: #85c125;"><a href="javascript:" style="color: #fff">汇款记录</a></li>
        </ul>
    </div>
    <div>
        <div class="mm_xg_form">
            <table>
                <thead>
                <tr>
                    <th class="w310"><span>汇款时间</span></th>
                    <th><span>汇款金额</span></th>
                    <th><span>汇款账号</span></th>
                    <th><span style="border-right: 0px;">状态</span></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($remittance)): foreach($remittance as $key=>$val): ?><tr data-toggle="modal" data-target="#r<?php echo ($val["remittance_id"]); ?>">
                        <td><?php echo (date("Y-m-d",$val["remit_time"])); ?></td>
                        <td><?php echo ($val["remit_total"]); ?></td>
                        <td><?php echo ($val["remit_number"]); ?></td>
                        <td>
                            <?php if($val["remit_state"] == 0): ?>审核中
                                <?php elseif($val["remit_state"] == 1): ?>已通过
                                    <?php else: ?>未通过<?php endif; ?>
                        </td>
                    </tr>
                    <div class="container" id="mmdo">
                        <div class="modal fade" id="r<?php echo ($val["remittance_id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            <span><?php echo (date('Y-m-d',$val["time"])); ?></span>
                                <span>
                                <?php if($val["remit_state"] == 0 ): ?>审核中<?php elseif($val["remit_state"] == 1 ): ?> 通过<?php else: ?>未通过<?php endif; ?>
                                </span>
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <form name="form" method="post" action="" style="display: block;" class="mm_xg_form">
                                            <div class="form-group">
                                                <label for="grxg_ID">收款账户：</label>
                                                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($val["payee_number"]); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="grxg_ID">汇款姓名：</label>
                                                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($val["remitter"]); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="grxg_ID">汇款账号：</label>
                                                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($val["remit_number"]); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="grxg_ID">汇款金额：</label>
                                                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($val["remit_total"]); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="grxg_ID">汇款日期：</label>
                                                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo (date('Y-m-d',$val["remit_time"])); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="grxg_ID">汇款单号：</label>
                                                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($val["remit_order"]); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="grxg_ID">联系电话：</label>
                                                <input type="number" class="form-control" readonly  name="Transfer_amount" placeholder="" value="<?php echo ($val["remitter_phone"]); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="grxg_ID">备注：</label>
                                                <input type="text" class="form-control" readonly  name="Remarks" placeholder="" value="<?php echo ($val["remarks"]); ?>">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><?php endforeach; endif; ?>
                </tbody>
            </table>
            <div class="grxg_form_ym">
                <?php echo ($page); ?>
            </div>

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
</body>
</html>