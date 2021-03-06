<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>车享惠-管理中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link href="__PUBLIC__/css/admin_index.css" rel="stylesheet">
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
    <script src="__PUBLIC__/js/admin_index.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/city.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js" ></script>
</head>





<body>
<header class="header">
    <div class="container">
        <div class="fl">
            <span>你好，欢迎进入车享惠系统！</span>
            <span> | </span>
            <span>24小时免费电话：400-1166-167</span>
        </div>
        <div class="fr">
            <a href="javascript:" style="color:#9AB89D;margin-right: 10px;" data-toggle="modal" data-target="#update_pwd">修改密码</a>
            <span class="glyphicon glyphicon-user" style=" margin: 0 5px;"></span>
            <span><?php echo ($_SESSION['role_name']); ?></span>
            <span style="text-decoration: underline;">(<?php echo ($_SESSION['staff_account']); ?>)</span>
            <div class="fr">
                <span class="glyphicon glyphicon-log-out"></span>
                <a href="<?php echo U('Admin/take_out');?>" style="color: #D4DDBF">退出</a>
            </div>
        </div>
    </div>
</header>
<section class="container_box">
    <!--<div class="cont_header">
        <ul>
            <li><span class="glyphicon glyphicon-home"></span></li>
            <li>系统</li>
            <li>></li>
            <li>管理中心</li>
        </ul>
    </div>-->
    <div class="content_menu">
        <div class="content_menu_fl fl">
            <?php if($_SESSION['status'] == 0): ?><p>
                    <span class="glyphicon glyphicon-home"></span>
                    Home
                    <i class="glyphicon-plus"></i><!--glyphicon-minus-->
                </p>

                <p>
                    <span class="glyphicon glyphicon-send"></span>
                    审核中心
                    <i class="glyphicon-plus"></i>
                </p>
                <div class="content_menu_fl_ct" style="display: none;">
                    <a hrf="<?php echo U('Remit/show_remit');?>">汇款审核</a>
                    <a hrf="<?php echo U('Remit/show_tx');?>">提现审核</a>
                    <a hrf="<?php echo U('Remit/show_agent');?>">代理商审核</a>
                    <a hrf="<?php echo U('Remit/show_service');?>">服务中心审核</a>
                    <a hrf="<?php echo U('Remit/show_buy');?>">购车信息审核</a>
                    <a hrf="<?php echo U('Remit/show_agent_back');?>">代理商返款审核</a>
                </div>
                <p>
                    <span class="glyphicon glyphicon-flag"></span>
                    服务中心
                    <i class="glyphicon-plus"></i>
                </p>
                <div class="content_menu_fl_ct" style="display: none;">
                    <a hrf="<?php echo U('Core/index');?>">账号管理</a>
                </div>
           <?php else: ?>
                <p>
                    <span class="glyphicon glyphicon-home"></span>
                    Home
                    <i class="glyphicon-plus"></i><!--glyphicon-minus-->
                </p>

                <p>
                <span class="glyphicon glyphicon-tags"></span>
                管理中心
                <i class="glyphicon-plus"></i><!--glyphicon-minus-->
            </p>
            <div class="content_menu_fl_ct" style="display: none;">
                <a hrf="<?php echo U('Index/add_client');?>">添加客户</a>
                <a hrf="<?php echo U('Index/show_level_setting');?>">用户等级设置</a>
                <a hrf="<?php echo U('Index/show_basics');?>">基础参数设置</a>
                <a hrf="<?php echo U('Staff/show');?>">公司职员管理</a>
                <a hrf="<?php echo U('Examine/show_examine');?>">审核流程管理</a>
            </div>

            <p>
                <span class="glyphicon glyphicon-send"></span>
                审核中心
                <i class="glyphicon-plus"></i>
            </p>
            <div class="content_menu_fl_ct" style="display: none;">
                <a hrf="<?php echo U('Remit/show_remit');?>">汇款审核</a>
                <a hrf="<?php echo U('Remit/show_tx');?>">提现审核</a>
                <a hrf="<?php echo U('Remit/show_agent');?>">代理商审核</a>
                <a hrf="<?php echo U('Remit/show_service');?>">服务中心审核</a>
                <a hrf="<?php echo U('Remit/show_buy');?>">购车信息审核</a>
                <a hrf="<?php echo U('Remit/show_agent_back');?>">代理商返款审核</a>
            </div>
            <p>
                <span class="glyphicon glyphicon-flag"></span>
                服务中心
                <i class="glyphicon-plus"></i>
            </p>
            <div class="content_menu_fl_ct" style="display: none;">
                <a hrf="<?php echo U('Core/index');?>">账号管理</a>
            </div>
            <p>
                <span class="glyphicon glyphicon-signal"></span>
                统计中心
                <i class="glyphicon-plus"></i>
            </p>
            <div class="content_menu_fl_ct" style="display: none;">
            	<a hrf="<?php echo U('List/pay');?>">收益报表</a>
                <a hrf="cash_statement.html">提现报表</a>
                <a hrf="gcfk_bb.html">购车返款报表</a>
                <a hrf="dlsfk_bb.html">代理商返款报表</a>
                <a hrf="<?php echo U('List/djts');?>">等级提升报表</a>
                <a hrf="xtkd_bb.html">系统空单报表</a>
                <a hrf="<?php echo U('List/user');?>">注册会员报表</a>
                <a hrf="corporate_income.html">公司总报表</a>
            </div><?php endif; ?>
        </div>
        <div class="content_menu_border fl">
            <iframe src="" frameborder="" width="100%" height="" id="iframe01" name="iframe01" ></iframe>
        </div>
    </div>

        <div class="modal fade" id="update_pwd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            <span>修改密码</span>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo U('Staff/update_pwd');?>" method="post">
                            <div>
                                <label>原密码:</label>
                                    <input type="password" class="form-control" name="pwd">
                            </div>
                            <div>
                                <label>新密码:</label>
                                <input type="password" class="form-control"  placeholder="" name="pwd1">
                            </div>
                            <div>
                                <label>重复新密码:</label>
                                <input type="password" class="form-control"  placeholder="" name="pwd2">
                            </div>
                            <br>
                            <div>
                                <input type="submit" class="btn center-block btn-success" id="join_submit" value="确认修改">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<script>
    +function () {
        $(".content_menu_border iframe").attr("src","/application/Admin/Tpl/index/first.html");
        $(".content_menu_fl p:first-child").addClass("p_first-child").children("i").removeClass("glyphicon-plus").addClass("glyphicon-minus");
        $(".content_menu_fl p:first-child").click(function () {
            window.location.href="<?php echo U('Index/index');?>";
        });
        var iframeHeight = $(window).height();
        $("body").css("height",iframeHeight);
        $(".content_menu_border iframe").height(iframeHeight-200);
        $(".content_menu_fl p").click(function(){
            if($(this).attr("class")=="p_first-child"){
                $(this).removeClass("p_first-child").children("i").addClass("glyphicon-plus").removeClass("glyphicon-minus");
                $(this).next("div").slideUp();
                $(this).siblings("p").each(function () {
                    if($(this).attr("class")=="p_first-child"){
                        $(this).removeClass("p_first-child").children("i").addClass("glyphicon-plus").removeClass("glyphicon-minus");
                        $(this).next("div").slideDown();
                    }
                });
            }else {
                $(this).addClass("p_first-child").children("i").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                $(this).next("div").slideDown().find("a").click(function () {
                    $(".content_menu_border iframe").height("");
                    $(this).addClass("a_hover").siblings("a").removeClass("a_hover").parent().siblings(".content_menu_fl_ct").find("a").removeClass("a_hover");
                    var url=$(this).attr("hrf");
                    $(".content_menu_border iframe").attr("src",url);
                    $(".content_menu_border iframe").height(iframeHeight-200);
                });
                $(this).siblings("p").each(function () {
                    if($(this).attr("class")=="p_first-child"){
                        $(this).removeClass("p_first-child").children("i").addClass("glyphicon-plus").removeClass("glyphicon-minus");
                        $(this).next("div").slideUp();
                    }
                });

            }

        })
    }();

    $(function(){
        function test(t){
            t.blur(function(){
                if($(this).val()==""){
                    if($(this).next().is("small")) {
                        return;
                    }else{
                        $(this).parent().append("<small style='color:orangered'>不能为空！</small>");
                    }
                    $("#join_submit").attr("disabled",true);
                }else{
                    $(this).parent().find("small").remove();
                    $("#join_submit").attr("disabled",false);
                }
            })
        }
        test($("input[name='pwd']"));
        test($("input[name='pwd1']"));
        $("input[name='pwd2']").blur(function(){
            if($(this).val()==""){
                if($(this).next().is("small")){
                    return;
                }else{
                    $(this).parent().append("<small style='color:orangered'>不能为空！</small>");
                }
                $("#join_submit").attr("disabled",true);
            }else if($(this).val()!="" && $(this).val()!=$("input[name='pwd1']").val()){
                if($(this).next().is("small")){
                    $(this).parent().find("small").remove();
                    $(this).parent().append("<span style='font-size: 12px;color:orangered'>两次新密码必须相同！</span>");
                }else if($(this).next().is("span")){
                    return;
                }else{
                    $(this).parent().append("<span style='font-size: 12px;color:orangered'>两次新密码必须相同！</span>");
                }
                $("#join_submit").attr("disabled",true);
            }else{
                $(this).parent().find("small").remove();
                $(this).parent().find("span").remove();
                $("#join_submit").attr("disabled",false);
            }
        })

    })

</script>

</body>
</html>