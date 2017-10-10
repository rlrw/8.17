<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
            <h1  class="text-center">审核流程管理</h1>

            <div class="Audit_management form-inline" >
                <div class="form-group" >
                    <label>审核流程：</label>
                    <select class="form-control" name="Audit_management" id="Audit_sec">
                        <?php if(is_array($menu_list)): foreach($menu_list as $key=>$val): ?><option value="<?php echo ($val["menu_id"]); ?>" class="menu"><?php echo ($val["menu_name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>职员列表：</label>
                    <select class="form-control" name="" id="Audit_zy_list">
                        <?php if(is_array($role_list)): foreach($role_list as $key=>$val): ?><option value="<?php echo ($val["role_id"]); ?>" class="role"><?php echo ($val["role_name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-success">新增流程节点</button>
                </div>
                <span style="color: red; display: block; margin-top: 20px;">注：如果有任何流程被修改，都会将现有正在审核中的数据全部从新审核</span>
            </div>
            <div class="Audit_management_menu">
                <ul>
                    <li>
                        <table>
                            <?php if(is_array($examine_remit)): foreach($examine_remit as $key=>$val): ?><tr>
                                    <td><span>第<?php echo ($val["sort"]); ?>步</span></td>
                                    <td><span>审核人：<?php echo ($val["role_name"]); ?></span></td>
                                    <td>删除</td>
                                </tr><?php endforeach; endif; ?>
                        </table>
                    </li>
                    <li>
                        <table>
                            <?php if(is_array($examine_cash)): foreach($examine_cash as $key=>$val): ?><tr>
                                    <td><span>第<?php echo ($val["sort"]); ?>步</span></td>
                                    <td><span>审核人：<?php echo ($val["role_name"]); ?></span></td>
                                    <td>删除</td>
                                </tr><?php endforeach; endif; ?>
                        </table>
                    </li>
                    <li>
                        <table>
                            <?php if(is_array($examine_agent)): foreach($examine_agent as $key=>$val): ?><tr>
                                    <td><span>第<?php echo ($val["sort"]); ?>步</span></td>
                                    <td><span>审核人：<?php echo ($val["role_name"]); ?></span></td>
                                    <td>删除</td>
                                </tr><?php endforeach; endif; ?>
                        </table>
                    </li>
                    <li>
                        <table>
                            <?php if(is_array($examine_service)): foreach($examine_service as $key=>$val): ?><tr>
                                    <td><span>第<?php echo ($val["sort"]); ?>步</span></td>
                                    <td><span>审核人：<?php echo ($val["role_name"]); ?></span></td>
                                    <td>删除</td>
                                </tr><?php endforeach; endif; ?>
                        </table>
                    </li>
                    <li>
                        <table>
                            <?php if(is_array($examine_buy)): foreach($examine_buy as $key=>$val): ?><tr>
                                    <td><span>第<?php echo ($val["sort"]); ?>步</span></td>
                                    <td><span>审核人：<?php echo ($val["role_name"]); ?></span></td>
                                    <td>删除</td>
                                </tr><?php endforeach; endif; ?>
                        </table>
                    </li>
                    <li>
                        <table>
                            <?php if(is_array($examine_back)): foreach($examine_back as $key=>$val): ?><tr>
                                    <td><span>第<?php echo ($val["sort"]); ?>步</span></td>
                                    <td><span>审核人：<?php echo ($val["role_name"]); ?></span></td>
                                    <td>删除</td>
                                </tr><?php endforeach; endif; ?>
                        </table>
                    </li>
                </ul>
            </div>
        </div>
<script>
            +function () {
                $("#Audit_sec").get(0).selectedIndex=0;
                $(".Audit_management_menu li:first-child").siblings().addClass("hidden");
                $("#Audit_sec").change(function () {
                    var checkIndex=$("#Audit_sec ").get(0).selectedIndex;
                    $(".Audit_management_menu li").each(function (k) {
                        if(k==checkIndex){
                            $(this).removeClass("hidden").siblings().addClass("hidden")
                        }else {
                            return;
                        }
                    });
                });

                $("button[type='button']").click(function () {
                        var text=$("#Audit_zy_list").find("option:selected").text();
                        if(confirm("确认要添加吗？")){
                            var menu=$(".menu:selected").val();
                            var role=$(".role:selected").val();
                            var len;
                            $(".Audit_management_menu li").each(function(){
                                if($(this).attr("class")!="hidden"){
                                    len=$(this).find("tr").length+1;
                                }
                            });
                            $.ajax({
                                url: "<?php echo U('Examine/add_examine');?>",
                                type: 'post',
                                data: {m: menu, r: role, l: len},
                                success: function () {
                                    $(".Audit_management_menu li").each(function(){
                                        if($(this).attr("class")!="hidden"){
                                            var length=$(this).find("tr").length+1;
                                            var html="<tr><td><span>第"+length+"步</span></td><td><span>审核人：" + text + "</span></td><td>删除</td> </tr>";
                                            $(this).find("table").append(html);
                                            $(".Audit_management_menu li tr:last-child td:last-child").click(RemoveProcess);
                                        }else {
                                            return;
                                        }
                                    });
                                },
                                error:function(){
                                    alert('操作有误!');
                                    return;
                                }
                            })

                            }else {
                            return;
                        }

                });
                $(".Audit_management_menu li tr td:last-child").on("click",RemoveProcess);
                function RemoveProcess() {
                    if(confirm("确认要删除吗？")){
                        var x=$(this);
                        var menu=$(".menu:selected").val();
                        var h=$(this).parent().find("td:first-child").find("span").html();
                        var n=h.substring(1, h.length-1);
                        $.ajax({
                            url:"<?php echo U('Examine/del_examine');?>",
                            type:'post',
                            data:{m:menu,sort:n},
                            success:function(e){
                                x.parent().nextAll().find("td:first-child").each(function (j,data) {
                                    var Fhtml=$(data).children().html();
                                    var num=Fhtml.substring(1,Fhtml.length-1);
                                    num--;
                                    var fHtml="第"+num+"步";
                                    $(this).find("span").html(fHtml);
                                });
                                x.parent().remove();
                            }
                        });
                    }else {
                        return;
                    }
                }
            }();
        </script>
</body>
</html>