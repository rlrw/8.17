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
            <h1  class="text-center">服务中心审核</h1>

            <form action="<?php echo U('Remit/show_service');?>" method="get">
            <div class="content_menu_search form-inline">
                <div class="form-group">
                    <label>申请ID：</label>
                    <input type="text" class="form-control"  name="num"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>联系电话：</label>
                    <input type="text" class="form-control"  name="n"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>申请日期：</label>
                    <input type="date" class="form-control"  name="st"  placeholder="" value="">
                    <label style="color: #666"> — </label>
                    <input type="date" class="form-control"  name="lt"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <button  class="btn btn-success"> 查询 </button>
                </div>

            </div>
            </form>
     <input type="hidden" name="state" value="<?php echo ($level); ?>">
            <div class="hk_list">
                <ul>
                    <?php if($service_list == NULL): ?><span style="color:orangered">暂无需要审核的记录！</span>
                        <?php else: if(is_array($service_list)): foreach($service_list as $key=>$val): ?><li>
                                <p>
                                    <span class="col-lg-5 col-sm-5">申请ID：<strong><?php echo ($val["userid"]); ?></strong></span>
                                    <span class="col-lg-5 col-sm-5">申请时间：<strong><?php echo (date("Y-m-d",$val["service_time"])); ?></strong></span>
                                    <span class="col-lg-2 col-sm-2"><a style=" border: 1px solid #ccc; background: #eee; padding: 3px 6px;text-decoration: none;" data-toggle="modal" data-target="#Agent_image<?php echo ($val["service_id"]); ?>">审核附件</a></span>

                                <div class="modal fade" id="Agent_image<?php echo ($val["service_id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">服务中心审核图片</h4>
                                            </div>
                                            <div class="Agent_image_box" style=" padding: 20px; overflow: hidden;">
                                                <div class="Agent_image">
                                                    <?php if(is_array($val["url"])): foreach($val["url"] as $key=>$vo): ?><a href=""><img src="__UPLOAD__/service_images/<?php echo ($vo["name"]); ?>" width="100%" height="100%" alt="" data-target="_blank"></a><?php endforeach; endif; ?>
                                                </div>
                                            </div>
                                            <script>
                                                $("#Agent_image<?php echo ($val["service_id"]); ?> .Agent_image a").each(function (k) {
                                                    k=k+1;
                                                    if(k==1){
                                                        $(this).css("z-index","1").siblings("a").css("display","none");
                                                        $("#Agent_image<?php echo ($val["service_id"]); ?> .Agent_image_box").append("<i class='hover_i'>"+k+"</i>");
                                                    }else {
                                                        $("#Agent_image<?php echo ($val["service_id"]); ?> .Agent_image_box").append("<i>"+k+"</i>");
                                                    }
                                                });
                                                $("#Agent_image<?php echo ($val["service_id"]); ?> .Agent_image_box i").on("click",function () {
                                                    var index=$(this).index()-1;
                                                    $(this).addClass("hover_i").siblings("i").removeClass("hover_i");
                                                    $("#Agent_image<?php echo ($val["service_id"]); ?> .Agent_image a").each(function (j) {
                                                        if(index==j){
                                                            $(this).fadeIn(1500).css("display","block").siblings("a").fadeOut().css("display","none");
                                                        }
                                                    });

                                                })
                                            </script>

                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>
                                </p>
                                <!--<p>
                                    <span class="col-lg-6 col-sm-6">公司地址：<strong><?php echo ($val["corporate_address"]); ?></strong></span>
                                    <span class="col-lg-3 col-sm-3">联系电话：<strong><?php echo ($val["corporate_phone"]); ?></strong></span>
                                </p>-->
                                <!--<p>
                                    <span class="col-lg-6 col-sm-6">申请ID：<strong><?php echo ($val["user_number"]); ?></strong></span>
                                    <span class="col-lg-3 col-sm-3">申请时间：<strong><?php echo (date("Y-m-d",$val["time"])); ?></strong></span>
                                    <span class="col-lg-3 col-sm-3">审核中</span>
                                </p>-->
                                <div id="Agent_list">
                                    <div class="col-lg-4 col-sm-4">
                                        <span>销售总额：<?php echo ($val["perf"]); ?></span>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <span>联系电话：<strong><?php echo ($val["corporate_phone"]); ?></strong></span>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <span>审核：</span>
                                        <button class="btn btn-default" id="go" nid="<?php echo ($val["service_id"]); ?>">通过</button>
                                        <button class="btn btn-default" id="pass" nid="<?php echo ($val["service_id"]); ?>">不通过</button>
                                        <button class="btn hidden"></button>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; endif; ?>
                </ul>
                <div class="grxg_form_ym"><?php echo ($page); ?></div>
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
            $("#Agent_list .btn-default").click(function () {
                var x=$(this);
                if($(this).attr("id")==="go"){
                    if(confirm("确认审核通过吗？")){
                        $.post("<?php echo U('Remit/s_adopt');?>",{nid: x.attr('nid'),state:$("input[name='state']").val()},function(e){
                            if(e==1){
                                x.parent().find("button:last-child").css({
                                    "border":"none",
                                    "background":"#5cb85c",
                                    "outline":"medium",
                                    "color":"#fff"
                                }).html("已审核").removeClass("hidden").siblings("button").remove();
                            }else{
                                alert("操作失败!");
                            }
                        })

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
                        $.post("<?php echo U('Remit/s_not_pass');?>",{nid: y.attr('nid'),remarks:remark},function(e){
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
    </script>
</body>
</html>