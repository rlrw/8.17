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
            <h1  class="text-center">汇款审核</h1>
            <form action="<?php echo U('Remit/show_remit');?>" method="get">
            <div class="content_menu_search form-inline">
                <div class="form-group">
                    <label>汇款人ID：</label>
                    <input type="text" class="form-control"  name="userid"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>汇款人姓名：</label>
                    <input type="text" class="form-control"  name="n"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>汇款单号：</label>
                    <input type="text" class="form-control"  name="order"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>汇款日期：</label>
                    <input type="date" class="form-control"  name="st"  placeholder="" value="">
                    <label style="color: #666"> — </label>
                    <input type="date" class="form-control"  name="lt"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <button  class="btn btn-success"> 查询 </button>
                </div>
            </div>
            </form>
            <div class="hk_list">
                <ul>
                    <?php if($remit_list == NULL): ?><span style="color:orangered">暂无需要审核的记录！</span>
                        <?php else: if(is_array($remit_list)): foreach($remit_list as $key=>$val): ?><li>
                                <p>
                                    <span class="col-lg-6 col-sm-6">收款账号：<strong><?php echo ($val["payee_number"]); ?></strong></span>
                                    <span class="col-lg-3 col-sm-3">汇款金额：<strong><?php echo ($val["remit_total"]); ?></strong></span>
                                    <span class="col-lg-3 col-sm-3">当前状态：<strong>审核中</strong></span>
                                </p>
                                <p>
                                    <span class="col-lg-6 col-sm-6">汇款银行：<strong><?php echo ($val["bank_name"]); ?>（<?php echo ($val["subBranch"]); ?>）<?php echo ($val["remit_number"]); ?></strong></span>
                                    <span class="col-lg-3 col-sm-3">汇款单号：<strong><?php echo ($val["remit_order"]); ?></strong></span>
                                    <span class="col-lg-3 col-sm-3">汇款日期：<?php echo (date("Y-m-d",$val["remit_time"])); ?></span>
                                </p>
                                <p>
                                    <span class="col-lg-6 col-sm-6">汇款人：<strong><?php echo ($val["remitter"]); ?>（<?php echo ($val["userid"]); ?>）</strong></span>
                                    <span class="col-lg-3 col-sm-3">备注：<?php echo ($val["remarks"]); ?></span>
                            <span class="col-lg-3 col-sm-3">
                                <input type="hidden" name="state" value="<?php echo ($level); ?>">
                                <button class="btn btn-default" id="go" nid="<?php echo ($val["remittance_id"]); ?>">通过</button>
                                <button class="btn btn-default" id="pass"  nid="<?php echo ($val["remittance_id"]); ?>">不通过</button>
                                <button class="btn hidden"></button>
                            </span>
                                </p>
                            </li><?php endforeach; endif; endif; ?>
                </ul>
                <div class="grxg_form_ym"><?php echo ($page); ?></div>
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
        </div>
 <script>
        +function () {
            $(".hk_list .btn-default").click(function () {
                if($(this).attr("id")==="go"){
                    var x=$(this);
                    if(confirm("确认审核通过吗？")){
                        $.post("<?php echo U('Remit/r_adopt');?>",{nid: x.attr('nid'),state:$("input[name='state']").val()},function(e){
                            if(e==1){
                                x.parent().find("button:last-child").css({
                                    "border":"none",
                                    "background":"#5cb85c",
                                    "outline":"medium",
                                    "color":"#fff"
                                }).html("已审核").removeClass("hidden").siblings("button").remove();
                            }else{
                                alert('操作失败！');
                            }

                        });
                    }else {
                        $(this).css({
                            "outline":"medium",
                            "background":"#fff"
                        });
                        return;
                    }
                }else if($(this).attr("id")==="pass"){
                    var y=$(this);
                        $("#remarks").modal("show");
                        $("#sub").click(function(){
                            $("#remarks").modal("hide");
                            $("input[name='remark']").val($("textarea").val());
                            var remark=$("input[name='remark']").val();
                            $.post("<?php echo U('Remit/r_not_pass');?>",{nid: y.attr('nid'),remarks:remark},function(e){
                                 if(e==1){
                                 y.parent().find("button:last-child").css({
                                 "border":"none",
                                 "background":"#333",
                                 "outline":"medium",
                                 "color":"#fff"
                                 }).html("未通过").removeClass("hidden").siblings("button").remove();
                                 }else{
                                 alert("操作失败！");
                                 }
                            });
                        });
                }

            });
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
            })
        }();
    </script>
</body>
</html>