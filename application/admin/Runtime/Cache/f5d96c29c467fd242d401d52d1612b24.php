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
            <h1  class="text-center">基础参数设置</h1>
            <div class="content_menu_setting form-inline">
                <div class="form-group">
                    <label>银行名称：</label>
                    <select  class="form-control">
                        <?php if(is_array($bank_list)): foreach($bank_list as $key=>$val): ?><option value="<?php echo ($val["bank_name"]); ?>" class="bank"><?php echo ($val["bank_name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>户主：</label>
                    <input type="text" class="form-control"  name="user"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>银行卡号：</label>
                    <input type="text" class="form-control"  name="card"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-danger" id="Basics_add">添加</button>
                </div>
            </div>
            <div class="Basics_setting">
                <div class="staff_information-menu" >
                    <table>
                        <thead>
                        <tr>
                            <th><span>银行名称</span></th>
                            <th><span>户主</span></th>
                            <th><span>银行卡号</span></th>
                            <th><span style="border-right: 0px;">操作</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($user)): foreach($user as $key=>$val): ?><tr>
                                <td><?php echo ($val["bank_name"]); ?></td>
                                <td><?php echo ($val["user_name"]); ?></td>
                                <td><?php echo ($val["bank_card"]); ?></td>
                                <td nid="<?php echo ($val["b_id"]); ?>">删除</td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        +function () {
            $("#Basics_add").click(function () {
                if($(".form-control").val()===""){
                    alert("请填写要添加的内容！")
                }else {
                    if(confirm("确认要添加吗？")){
                        var bank=$(".bank:selected").val();
                        var user=$("input[name='user']").val();
                        var card=$("input[name='card']").val();
                        $.post("<?php echo U('Index/add_basics');?>",{bank_name:bank,user_name:user,bank_card:card},function(e){
                            if(e==1){
                                var html="";
                                $(".form-control").each(function () {
                                    var val=$(this).val();
                                    html+="<td>"+val+"</td>";
                                });
                                $(".Basics_setting tbody").append("<tr>"+html+"<td>删除</td></tr>");
                            }else{
                                alert("添加失败！");
                            }
                        });
                    }else {
                        return;
                    }
                }
            });
            $(document).on("click",".Basics_setting tr td:last-child",RemoveProcess);
            function RemoveProcess() {
                if(confirm("确认要删除吗？")){
                    var x=$(this);
                    $.post("<?php echo U('Index/del_basics');?>",{nid:$(this).attr("nid")},function(e){
                        if(e==1){
                            x.parent().remove();
                        }else{
                            alert("删除失败，请重新尝试！");
                        }
                    });

                }else {
                    return;
                }
            }
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
                    $(this).next("div").slideDown();
                    $(this).siblings("p").each(function () {
                        if($(this).attr("class")=="p_first-child"){
                            $(this).removeClass("p_first-child").children("i").addClass("glyphicon-plus").removeClass("glyphicon-minus");
                            $(this).next("div").slideUp();
                        }
                    });
                }
            });

        }();
    </script>
</body>
</html>