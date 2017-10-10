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
            <h1 class="text-center">代理商返款审核</h1>
            <form action="" method="get">
	            <div class="content_menu_search form-inline">
	                <div class="form-group">
	                    <label>用户ID：</label>
	                    <input type="text" class="form-control"  name="number"  placeholder="" value="">
	                </div>
	                <div class="form-group">
	                    <label>用户姓名：</label>
	                    <input type="text" class="form-control"  name="name"  placeholder="" value="">
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
            <div class="hk_list Agent_list">
                <ul>
                    <?php if($back_list == NULL): ?><span style="color:orangered">暂无需要审核的记录！</span>
                        <?php else: ?>
                    <?php if(is_array($back_list)): foreach($back_list as $key=>$val): ?><li>
                        <p>
                            <span class="col-lg-3 col-sm-3">用户ID：<strong><?php echo ($val["userid"]); ?></strong></span>
                            <span class="col-lg-3 col-sm-3">用户姓名：<strong><?php echo ($val["user_name"]); ?></strong></span>
                            <span class="col-lg-4 col-sm-4">申请时间：<strong><?php echo (date("Y-m-d",$val["time"])); ?></strong></span>
                            <span class="col-lg-2 col-sm-2"><a style=" border: 1px solid #ccc; background: #eee; padding: 3px 6px;text-decoration: none;" data-toggle="modal" data-target="#Agent_image<?php echo ($val["back_id"]); ?>">审核附件</a></span>
                        <div class="modal fade" id="Agent_image<?php echo ($val["back_id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">代理商审核图片</h4>
                                    </div>
                                    <div class="Agent_image_box" style=" padding: 20px; overflow: hidden;">
                                        <div class="Agent_image">
                                            <?php if(is_array($val["url"])): foreach($val["url"] as $key=>$vo): ?><a href=""><img src="__UPLOAD__/agent_back_images/<?php echo ($vo["name"]); ?>" width="100%" height="100%" alt="" data-target="_blank"></a><?php endforeach; endif; ?>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div>
                        </p>
                        <div id="Agent_list">
                            <div class="col-lg-3 col-sm-3">
                                <label>返款金额：</label>
                                <input name="total" placeholder="" value="<?php echo ($val["total_points"]); ?>"/>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <label style="padding-right: 0;">返款比例：</label>
                                <input type="text" name="bl" placeholder="" value="<?php echo ($val["ratio"]); ?>"/>
                            </div>
                            <div class="col-lg-2 col-sm-2">
                                <!--<small style="color: orangered">设置成小数位<br> 如：0.0005</small>-->
                                <button class="update" style="text-decoration: underline;" nid="<?php echo ($val["back_id"]); ?>">修改比例</button>
                            </div>
                            <div class="col-lg-2 col-sm-2">
                                <button class="btn-default" id="go" nid="<?php echo ($val["back_id"]); ?>">通过</button>
                                <button class="btn-default" id="pass" nid="<?php echo ($val["back_id"]); ?>">不通过</button>
                                <button class="hidden"></button>
                            </div>
                            <div class="col-lg-2 col-sm-2">
                            	<label style="width: 35%;">状态：</label>
                                <label style="width: 60%; color: red;">审核中....</label>
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
    $("#Agent_image<?php echo ($val["back_id"]); ?> .Agent_image a").each(function (k) {
        k=k+1;
        if(k==1){
            $(this).css("z-index","1").siblings("a").css("display","none");
            $("#Agent_image<?php echo ($val["back_id"]); ?> .Agent_image_box").append("<i class='hover_i'>"+k+"</i>");
        }else {
            $("#Agent_image<?php echo ($val["back_id"]); ?> .Agent_image_box").append("<i>"+k+"</i>");
        }
    });
    $("#Agent_image<?php echo ($val["back_id"]); ?> .Agent_image_box i").on("click",function () {
        var index=$(this).index()-1;
        $(this).addClass("hover_i").siblings("i").removeClass("hover_i");
        $("#Agent_image<?php echo ($val["back_id"]); ?> .Agent_image a").each(function (j) {
            if(index==j){
                $(this).fadeIn(1500).css("display","block").siblings("a").fadeOut().css("display","none");
            }
        });

    })
</script>
<script>

        +function () {
            $("#Agent_list .btn-default").click(function () {
                var x=$(this);
                if($(this).attr("id")==="go"){
                    if(confirm("确认审核通过吗？")){
                       var t= $(this).parent().siblings().find("input[name='total']").val();
                       var b= $(this).parent().siblings().find("input[name='bl']").val();
                        $.post("<?php echo U('Remit/ab_adopt');?>",{nid: x.attr('nid'),state:$("input[name='state']").val(),total:t,ratio:b},function(e){
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
                        $.post("<?php echo U('Remit/ab_not_pass');?>",{nid: y.attr('nid'),remarks:remark},function(e){
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
        $(function(){
            $(".update").click(function(){
                var nid=$(this).attr("nid");
                var total=$(this).parent().parent().find("input[name='total']").val();
                var ratio=$(this).parent().parent().find("input[name='bl']").val();
                $.ajax({
                    url:"<?php echo U('Remit/update_back_ratio');?>",
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
    </script>
</body>
</html>