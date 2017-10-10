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
<div class="content_menu_fr" style="width: 100%">
                <h1  class="text-center">职员列表</h1>
                <!--职员查询-->
                <form action="<?php echo U('Staff/search_staff');?>" method="get">
                <div class="content_menu_search form-inline">
                    <div class="form-group">
                        <label>职员编号：</label>
                        <input type="text" class="form-control"  name="num"  placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label>职员姓名：</label>
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
                        <button type="button" class="btn btn-danger" id="add_staff">新增职员</button>
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
                                            <label>职员编号：</label>
                                            <input type="text" class="form-control"  name="number" placeholder="" readonly value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员账号：</label>
                                            <input type="text" class="form-control"  name="account" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员密码：</label>
                                            <input type="password" class="form-control"  name="pwd" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员姓名：</label>
                                            <input type="text" class="form-control"  name="name" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员电话：</label>
                                            <input type="tel" class="form-control"  name="phone" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员地址：</label>
                                            <input type="text" class="form-control"  name="address" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员职位：</label>
                                            <select class="form-control" name="role">
                                                <option value="">— 不限制 —</option>
                                                <?php if(is_array($role_list)): foreach($role_list as $key=>$val): ?><option  value="<?php echo ($val["role_id"]); ?>"><?php echo ($val["role_name"]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>职员性别：</label>
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
                                    <td><?php echo ($val["staff_name"]); ?>(<?php echo ($val["staff_account"]); ?>)</td>
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
                                            <label>职员编号：</label>
                                            <input type="text" class="form-control"  readonly name="staff_number" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员账号：</label>
                                            <input type="text" class="form-control"  name="staff_account" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员姓名：</label>
                                            <input type="text" class="form-control"  name="staff_name" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>用户电话：</label>
                                            <input type="tel" class="form-control"  name="staff_phone" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员地址：</label>
                                            <input type="text" class="form-control"  name="staff_address" placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>职员职位：</label>
                                            <select class="form-control" name="staff_role" style="width: 50%">
                                                <option value="">— 不限制 —</option>
                                                <?php if(is_array($role_list)): foreach($role_list as $key=>$val): ?><option  value="<?php echo ($val["role_id"]); ?>" class="role"><?php echo ($val["role_name"]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>职员性别：</label>
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
<script>


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
            });
            $("#add_staff").click(function(){
                $("#New_staff").modal("show");
                $.post("<?php echo U('Staff/get_last_id');?>",function(e){
                    if(e.length==1 && e!=9){
                        $("input[name='number']").val("CXH00000"+(parseInt(e)+1));
                    }else if(e.length==2 || e==9){
                        $("input[name='number']").val("CXH0000"+(parseInt(e)+1));
                    }else if(e.length==3 || e.substr(e.length-1,1)==9){
                        $("input[name='number']").val("CXH000"+(parseInt(e)+1));
                    }

                })
            });
            $("input[name='account']").on("blur",function(){
                var a=$(this);
                $.post("<?php echo U('Staff/check_account');?>",{account:$(this).val()},function(e){
                    if(e==1){
                        if(a.siblings().is("small")==false){
                            a.parent().append("<small style='color:orangered'><br>已经有该账号了，请重新输入！</small>");
                            $("#join_submit").attr("disabled",true);
                        }else{
                            return;
                        }
                    }else{
                        $("#join_submit").removeAttr("disabled");
                        a.parent().find("small").remove();
                    }
                })
            })


        </script>
</body>
</html>