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
            <span class="glyphicon glyphicon-user" style=" margin: 0 5px;"></span>
            <span><?php echo ($_SESSION['role_name']); ?></span>
            <span style="text-decoration: underline;">(<?php echo ($_SESSION['staff_number']); ?>)</span>
            <div class="fr">
                <span class="glyphicon glyphicon-log-out"></span>
                <a href="<?php echo U('Admin/take_out');?>" style="color: #D4DDBF">退出</a>
            </div>
        </div>
    </div>
</header>




<!--boody-->
    <section class="container">
        <div class="cont_header">
            <ul>
                <li><span class="glyphicon glyphicon-home"></span></li>
                <li>系统</li>
                <li>></li>
                <li>管理中心</li>
            </ul>
        </div>
        <div class="content_menu">
                <div class="content_menu_fl fl">
                <p class="p_first-child">
                    <span class="glyphicon glyphicon-tags"></span>
                    管理中心
                    <i class="glyphicon-minus"></i>
                </p>
                <div class="content_menu_fl_ct">
                    <a href="Add_client.html">添加客户</a>
                    <a href="User_level_settings.html">用户等级设置</a>
                    <a href="Basics_setting.html">基础参数设置</a>
                    <a <?php if($color == '公司'): ?>class="a_hover"<?php endif; ?> href="<?php echo U('Staff/show?color=公司');?>" >公司职员管理</a>
                   <a <?php if($color == '审核'): ?>class="a_hover"<?php endif; ?> href="<?php echo U('Examine/show_examine?color=审核');?>">审核流程管理</a>
                </div>
                <p>
                    <span class="glyphicon glyphicon-send"></span>
                    审核中心
                    <i class="glyphicon-plus"></i>
                </p>
                <div class="content_menu_fl_ct" style="display: none;">
                      <a <?php if($color == '汇款'): ?>class="a_hover"<?php endif; ?> href="<?php echo U('Remit/show_remit?color=汇款');?>">汇款列表</a>
                   <a <?php if($color == '提现'): ?>class="a_hover"<?php endif; ?> href="<?php echo U('Remit/show_tx?color=提现');?>">提现列表</a>
                    <a <?php if($color == '代理'): ?>class="a_hover"<?php endif; ?> href="<?php echo U('Remit/show_agent?color=代理');?>">代理商列表</a>
                    <a <?php if($color == '服务'): ?>class="a_hover"<?php endif; ?> href="<?php echo U('Remit/show_service?color=服务');?>">服务中心列表</a>
                    <a <?php if($color == '购车'): ?>class="a_hover"<?php endif; ?> href="<?php echo U('Remit/show_buy?color=购车');?>">购车信息列表</a>
                </div>
                <p>
                    <span class="glyphicon glyphicon-flag"></span>
                    服务中心
                    <i class="glyphicon-plus"></i>
                </p>
                <div class="content_menu_fl_ct" style="display: none;">
                    <a href="ZH_management.html">账号管理</a>
                </div>
            </div>

        <!--boody-->
            <div class="content_menu_fr fr">
                <h1  class="text-center">职员列表</h1>
                <!--职员查询-->
                <form action="<?php echo U('Staff/search_staff');?>" method="get">
                <div class="content_menu_search form-inline">
                    <div class="form-group">
                        <label>用户编号：</label>
                        <input type="text" class="form-control"  name="num"  placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>用户姓名：</label>
                        <input type="text" class="form-control"  name="n"  placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>是否激活：</label>
                        <select class="form-control" name="state">
                            <option value="">— 不限制 —</option>
                            <option value="1">启用</option>
                            <option value="2">禁用</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>添加时间：</label>
                        <input type="date" class="form-control"  name="st"  placeholder="" >
                        <label style="color: #666"> — </label>
                        <input type="date" class="form-control"  name="lt"  placeholder="" >
                    </div>
                    <div class="form-group">
                        <button  class="btn btn-success">查询</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#New_staff">新增职员</button>
                    </div>
                </div>
                </form>
                <input type="hidden" name="sta" value="<?php echo ($_SESSION['status']); ?>">
                <!--新增职员模态框-->
                <div class="container form-inline">
                    <div class="modal fade" id="New_staff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        <span>新增职员</span>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form name="form" method="post" action="<?php echo U('Staff/add_staff');?>" style="display: block;" class="mm_xg_form">
                                        <div class="form-group">
                                            <label>员工编号：</label>
                                            <input type="text" class="form-control"  name="number" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>员工账号：</label>
                                            <input type="text" class="form-control"  name="account" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>登录密码：</label>
                                            <input type="password" class="form-control"  name="pwd" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>员工姓名：</label>
                                            <input type="text" class="form-control"  name="name" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>用户电话：</label>
                                            <input type="tel" class="form-control"  name="phone" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>员工地址：</label>
                                            <input type="text" class="form-control"  name="address" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>员工职位：</label>
                                            <select class="form-control" name="role">
                                                <option value="">— 不限制 —</option>
                                                <?php if(is_array($role_list)): foreach($role_list as $key=>$val): ?><option  value="<?php echo ($val["role_id"]); ?>"><?php echo ($val["role_name"]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>员工性别：</label>
                                            <label for="">
                                                <input type="radio" class="form-control" style="margin-left: 5px;outline: medium; border: none;" name="sex" placeholder="" value="1">男
                                                <input type="radio" class="form-control" style="margin-left: 5px;outline: medium; border: none;"  name="sex" placeholder="" value="0">女
                                            </label>

                                        </div>
                                        <input type="submit" class="btn center-block btn-success" id="join_submit" value="添加职员">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="staff_information">
                    <div class="staff_information-menu" >
                        <table>
                            <thead>
                            <tr>
                                <th><span>职员编号</span></th>
                                <th><span>职员姓名</span></th>
                                <th><span>职员电话</span></th>
                                <th><span style="border-right: 0px;">操作</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($staff_list)): foreach($staff_list as $key=>$val): ?><tr>
                                    <td><?php echo ($val["staff_number"]); ?><br>（<?php echo ($val["role_name"]); ?>）</td>
                                    <td><?php echo ($val["staff_name"]); ?>
                                        <?php if($val["staff_sex"] == 1): ?>(男)
                                            <?php else: ?> (女)<?php endif; ?>
                                        </td>
                                    <td><?php echo ($val["staff_phone"]); ?></td>
                                    <td>
                                        <a href="javascript:" nid=<?php echo ($val["staff_id"]); ?> data-toggle="modal" data-target="#update_staff" class="update_staff">修改</a>|
                                        <a href="javascript:" nid=<?php echo ($val["staff_id"]); ?> class="rest">重置密码</a>|
                                        <a href="javascript:" class="update_state" state="<?php echo ($val["staff_state"]); ?>" nid="<?php echo ($val["staff_id"]); ?>">
                                            <?php if($val["staff_state"] == 2): ?>启用
                                                <?php else: ?>禁用<?php endif; ?>
                                        </a>
                                    </td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>

                        <div class="grxg_form_ym">
                            <?php echo ($page); ?>
                        </div>

                    </div>
                </div>
                <!--修改信息模态框-->
                    <div class="modal fade" id="update_staff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        <span>修改员工信息</span>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form name="form" method="post" action="" style="display: block;" class="mm_xg_form">
                                        <input type="hidden" value="" name="nid">
                                        <div class="form-group">
                                            <label>员工编号：</label>
                                            <input type="text" class="form-control"  name="staff_number" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>员工账号：</label>
                                            <input type="text" class="form-control"  name="staff_account" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>员工姓名：</label>
                                            <input type="text" class="form-control"  name="staff_name" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>用户电话：</label>
                                            <input type="tel" class="form-control"  name="staff_phone" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>员工地址：</label>
                                            <input type="text" class="form-control"  name="staff_address" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>员工职位：</label>
                                            <select class="form-control" name="staff_role" style="width: 50%">
                                                <option value="">— 不限制 —</option>
                                                <?php if(is_array($role_list)): foreach($role_list as $key=>$val): ?><option  value="<?php echo ($val["role_id"]); ?>" class="role"><?php echo ($val["role_name"]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>员工性别：</label>
                                                <input type="radio"  style="margin-left: 5px;outline: medium; border: none;" name="staff_sex" placeholder="" value="1">男
                                                <input type="radio"  style="margin-left: 5px;outline: medium; border: none;"  name="staff_sex" placeholder="" value="0">女
                                        </div>
                                        <input type="button" class="btn center-block btn-success"  name="save_staff" value="保存修改">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <script>

            $(".content_menu_fl p").click(function(){
                var index=$(this).index("p");
                if($(this).attr("class")=="p_first-child"){
                    $(this).removeClass("p_first-child").children("i").addClass("glyphicon-plus").removeClass("glyphicon-minus");
                    $(this).next("div").slideUp();
                    $(this).siblings("p").each(function () {
                        if ($(this).attr("class") == "p_first-child") {
                            $(this).removeClass("p_first-child").children("i").addClass("glyphicon-plus").removeClass("glyphicon-minus");                         $(this).next("div").slideDown();
                        }
                    });
                }else {
                    $(this).addClass("p_first-child").children("i").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                    $(this).next("div").slideDown();
                    $(this).siblings("p").each(function () {
                        if($(this).attr("class")=="p_first-child"){
                            $(this).removeClass("p_first-child").children("i").addClass("glyphicon-plus").removeClass("glyphicon-minus");
                            $(this).next("div").slideUp();
                        }
                    });

                }
            });
            $(".update_staff").click(function(){
                var id=$(this).attr("nid");
                $.post("<?php echo U('Staff/show_update_staff');?>",{nid:id},function(data){
                    $("input[name='staff_number']").val(data.staff_number);
                    $("input[name='staff_account']").val(data.staff_account);
                    $("input[name='staff_phone']").val(data.staff_phone);
                    $("input[name='staff_address']").val(data.staff_address);
                    $("input[name='staff_name']").val(data.staff_name);
                    $("input[name='nid']").val(data.staff_id);
                    $(".role").each(function(){
                        if($(this).val()==data.staff_role){
                            $(this).prop("selected",true);
                        }
                    });
                    $("input[name='staff_sex']").each(function(){
                        if($(this).val()==data.staff_sex){
                            $(this).prop("checked",true);
                        }
                    });
                })
            });
            $("input[name='save_staff']").click(function(){
                $.ajax({
                    url:"<?php echo U('save_staff');?>",
                    type:'post',
                    data:{number:$("input[name='staff_number']").val(),
                        name:$("input[name='staff_name']").val(),
                        account:$("input[name='staff_account']").val(),
                        address:$("input[name='staff_address']").val(),
                        phone:$("input[name='staff_phone']").val(),
                        role:$(".role:selected").val(),
                        sex:$("input[name='staff_sex']:checked").val(),
                        id:$("input[name='nid']").val()
                    },
                    success:function(e){
                            if(e==1){
                                alert("修改成功");
                                $("#update_staff").modal("hide");
                                location.reload();
                            }else{
                                alert("修改失败");
                            }
                    },
                    error:function(){
                        alert('操作有误！');
                    }
                })
            });

            +function(){
                $(".update_state").click(function (){
                    var t=$(this);
                    var id=t.attr('nid');
                    var state=parseFloat(t.attr("state"));
                    if(state===1){
                        /*启用状态，值是禁止*/
                        if(confirm("确认要禁止吗？")){
                            state=state+1;
                            console.log(state);
                            $.post("<?php echo U('Staff/update_state');?>",{nid:id,state:state},function(e){
                                if(e==1){
                                    t.html("启用");
                                    state=t.attr("state",state);
                                    return;
                                }
                            });
                        }
                    }else if(state===2){
                        if(confirm("确认启用吗？")){
                            state=state-1;
                            $.post("<?php echo U('Staff/update_state');?>",{nid:id,state:state},function(e){
                                if(e==1){
                                    t.html("禁用");
                                    state=t.attr("state",state);
                                    return;
                                }
                            });
                        }
                    }
                });
            }();


            $(".rest").click(function(){
                var id=$(this).attr("nid");
                $.post("<?php echo U('Staff/reset_pwd');?>",{nid:id},function(e){
                    if(e==1){
                        alert('重置成功，请提醒员工修改！');
                    }else{
                        alert('重置失败！已经是默认密码！');
                    }
                })
            })
        </script>
    </section>
    <footer class="footer hidden">
        <ul>
            <li>
                <a href="index.html">
                    <i class="glyphicon glyphicon-home"></i>
                    <span>首页</span>
                </a>
            </li>
            <li>
                <a href="user_Join.html" >
                    <i class="glyphicon glyphicon-usd"></i>
                    <span>定金加盟</span>
                </a>
            </li>
            <li>
                <a href="Uer_Cash_Transfer.html">
                    <i class="glyphicon glyphicon-send"></i>
                    <span>现金互转</span>
                </a>
            </li>
            <li>
                <a href="Uer_txsq.html">
                    <i class="glyphicon glyphicon-tags"></i>
                    <span>提现申请</span>
                </a>
            </li>
            <li>
                <a href="Uer_syzxj.html">
                    <i class="glyphicon glyphicon-paperclip"></i>
                    <span>收益转现金</span>
                </a>
            </li>
        </ul>
    </footer>

















</body>
</html>