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
            <h1  class="text-center">购车信息审核</h1>

            <form action="<?php echo U('Remit/show_buy');?>" method="get">
            <div class="content_menu_setting form-inline">
                <div class="form-group">
                    <label>车牌号：</label>
                    <input type="text" class="form-control"  name="car_n"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>车型：</label>
                    <input type="text" class="form-control"  name="car_m"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>用户ID：</label>
                    <input type="text" class="form-control"  name="num"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>购车时间：</label>
                    <input type="date" class="form-control"  name="st"  placeholder="" value="">
                    <label style="color: #666"> — </label>
                    <input type="date" class="form-control"  name="lt"  placeholder="" value="">
                </div>
                <button  class="btn btn-success" style=" margin-left: 10px;">查询</button>

            </div>
            </form>
            <input type="hidden" name="state" value="<?php echo ($level); ?>">
            <div class="user_setting user_car">
                <table>
                    <thead>
                    <tr>
                        <th><span>用户ID</span></th>
                        <th><span>车牌号</span></th>
                        <th><span>Vin号</span></th>
                        <th><span>发动机</span></th>
                        <th><span>车型</span></th>
                        <th><span>是否返款</span></th>
                        <th><span>金额</span></th>
                        <th><span>返款金额</span></th>
                        <th><span>返款比例</span></th>
                        <th><span>时间</span></th>
                        <th><span style="border-right: 0">审核</span></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if($buy_list == NULL): ?><tr><td colspan="7"><span style="color:orangered">暂无需要审核的记录！</span></td></tr>
                        <?php else: if(is_array($buy_list)): foreach($buy_list as $key=>$val): ?><tr>
                                <td><?php echo ($val["userid"]); ?></td>
                                <td><?php echo ($val["plate_number"]); ?></td>
                                <td><?php echo ($val["vin_number"]); ?></td>
                                <td></td>
                                <td><?php echo ($val["car_model"]); ?></td>
                                <td class="buy_type"><?php if($val["buy_type"] == 1): ?>返款
                                    <?php else: ?>不返款<?php endif; ?></td>
                                <td><?php echo ($val["buy_total"]); ?></td>
                                <td style="padding:0 10px;"><input style="width: 85px; padding-left: 5px;" type="text" name="total_points" value="<?php echo ($val["total_points"]); ?>" size="15px"></td>
                                <td><input style="width: 85px;padding-left: 5px;" type="text" name="ratio" value="<?php echo ($val["ratio"]); ?>" size="15px"><button type="button" class="update" nid="<?php echo ($val["buying_id"]); ?>">修改</button></td>
                                <td><?php echo (date("Y-m-d",$val["buy_time"])); ?></td>
                                <td>
                                    <span class="btn" id="go" nid="<?php echo ($val["buying_id"]); ?>">通过</span>
                                    <span class="btn" id="pass" nid="<?php echo ($val["buying_id"]); ?>">不通过</span>
                                    <button class="btn hidden btn-success"></button>
                                </td>
                            </tr><?php endforeach; endif; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
<div class="modal fade" id="remarks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        <span>填写不通过的原因</span>
                    </h4>
                </div>
                <div class="modal-body">
                    <textarea name="" style="width: 100%;resize: none;overflow: hidden;height:100px;" ></textarea>
                    <input type="hidden" name="remark">
                </div>
                <div style="margin-bottom: 20px;">
                    <button  class="btn center-block btn-success" data-dismiss="modal" id="sub">提交</button>
                </div>
            </div>
        </div>
    </div>
<script>
        +function () {
            +function () {
                $(".user_setting tbody tr td:last-child span").click(function () {
                    var x=$(this);
                    if($(this).attr("id")==="go"){
                        if(confirm("确认审核通过吗？")){
                            $.post("<?php echo U('Remit/b_adopt');?>",{nid: x.attr('nid'),state:$("input[name='state']").val()},function(e){
                                if(e==1){
                                    x.parent().find("button").html("已审核").removeClass("hidden").siblings("span").remove();
                                }else{
                                    alert("操作失败！");
                                }
                            })
                        }else {
                            return;
                        }
                    }else if($(this).attr("id")==="pass"){
                        var y=$(this);
                        $("#remarks").modal("show");
                        $("#sub").click(function(){
                            $("#remarks").modal("hide");
                            $("input[name='remark']").val($("textarea").val());
                            var remark = $("input[name='remark']").val();
                            $.post("<?php echo U('Remit/b_not_pass');?>", {nid: y.attr('nid'),remarks:remark}, function (e) {
                                if (e == 1) {
                                    y.parent().find("button").html("未通过").removeClass("hidden").siblings("span").remove();
                                } else {
                                    alert("操作失败!");
                                }
                            })
                        })
                    }
                });

                $(".content_menu_fl p").click(function(){
                    var index=$(this).index("p");
                    if($(this).attr("class")=="p_first-child"){
                        $(this).removeClass("p_first-child").children("i").addClass("glyphicon-plus").removeClass("glyphicon-minus");
                        $(".content_menu_fl_ct").each(function (k) {
                            if(index==k){
                                $(this).slideUp();
                            }
                        })
                    }else {
                        $(this).addClass("p_first-child").children("i").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                        $(".content_menu_fl_ct").each(function (k) {
                            if(index==k){
                                $(this).slideDown();
                            }
                        })
                    }

                })
            }();
        }();
    $(function(){
        $(".update").click(function(){
            var nid=$(this).attr("nid");
            var total=$(this).parent().parent().find("input[name='total_points']").val();
            var ratio=$(this).parent().parent().find("input[name='ratio']").val();
            $.ajax({
                url:"<?php echo U('Remit/update_points');?>",
                type:"post",
                data:{total_points:total,ratio:ratio,nid:nid},
                success:function(e){
                    if(e==1){
                        alert("修改成功")
                    }else if(e==0){
                        alert("操作失败");
                    }else{
                        alert(e);
                    }
                }
            })
        });
    });
    $(function(){
        var t=$(".buy_type");
        t.each(function(){
            if($(this).text()==="不返款"){
                $(this).parent().find("input").attr("disabled","true");
                $(this).parent().find("button").addClass("hidden").attr("disabled","true");
            }
        })
    })
    </script>
</body>
</html>