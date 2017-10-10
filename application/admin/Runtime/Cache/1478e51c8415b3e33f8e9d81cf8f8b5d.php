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
 <div class="content_menu_fr fr" style="width: 100%">
            <h1  class="text-center">用户等级设置</h1>

     <form action="<?php echo U('Index/add_level');?>" method="post">
            <div class="content_menu_setting form-inline">
                <div class="form-group">
                    <label>等级名称：</label>
                    <input type="text" class="form-control"  name="level_name"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>业绩要求：</label>
                    <input type="text" class="form-control"  name="demand"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>提成比例：</label>
                    <input type="text" class="form-control"  name="commission"  placeholder="" value="">
                </div>

                <div class="form-group">
                    <label>下级数量：</label>
                    <input type="text" class="form-control"  name="lower_number"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>下级业绩：</label>
                    <input type="text" class="form-control"  name="lower_achievement"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>下级业绩组：</label>
                    <input type="number" class="form-control"  name="lower_group"  placeholder="" value="">
                </div>
                <!--<button class="btn btn-success center-block">立即添加</button>
-->
            </div>
     </form>
            <div class="user_setting">
                <table>
                    <thead>
                        <tr>
                            <th><span>等级名称</span></th>
                            <th><span>业绩要求</span></th>
                            <th><span>提成比例</span></th>
                            <th><span>下级数量</span></th>
                            <th><span>下级业绩</span></th>
                            <th><span style="border-right: 0">操作</span></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($level_list)): foreach($level_list as $key=>$val): ?><tr>
                            <td><?php echo ($val["level_name"]); ?></td>
                            <td><?php echo ($val["demand"]); ?></td>
                            <td><?php echo ($val["commission"]); ?></td>
                            <td><?php echo ($val["lower_number"]); ?></td>
                            <td><?php echo ($val["lower_achievement"]); ?>（<?php echo ($val["lower_group"]); ?>组）</td>
                            <td><a href="javascript:" nid="<?php echo ($val["level_id"]); ?>" class="update">修改</a></td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

 <!--修改模态框-->
 <div class="modal fade" id="level" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">
                     <span>修改等级信息</span>
                 </h4>
             </div>
             <div class="">
                 <form class="form-horizontal" action="<?php echo U('Index/update_level');?>" method="post">
                     <input type="hidden" name="id">
                     <!--<div class="form-group">
                         <label class="col-sm-3 control-label">等级名称:</label>
                         <div class="col-sm-8">
                             <input type="text" class="form-control"  name="name">
                         </div>
                     </div>-->
                     <div class="form-group">
                         <label class="col-sm-3  control-label">业绩要求:</label>
                         <div class="col-sm-8">
                             <input type="text" class="form-control"  name="ask">
                         </div>
                     </div>
                     <!--<div class="form-group">
                         <label class="col-sm-3  control-label">提成比例:</label>
                         <div class="col-sm-8">
                             <input type="text" class="form-control"  name="scale">
                         </div>
                     </div>-->
                     <div class="form-group">
                         <label class="col-sm-3  control-label" >下级数量:</label>
                         <div class="col-sm-8">
                             <input type="number" class="form-control"  name="number">
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="col-sm-3 control-label">下级业绩:</label>
                         <div class="col-sm-8">
                             <input type="text" class="form-control"  name="achievement">
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="col-sm-3 control-label"></label>
                         <input type="submit" class="btn center-block btn-success " id="join_submit" value="确认修改">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>


</body>
<script>
    $(function(){
        $(".update").click(function(){
            $("#level").modal("show");
            $("input[name='id']").val($(this).attr("nid"));
            $.ajax({
                url:"<?php echo U('Index/get_level');?>",
                type:"post",
                data:{id:$(this).attr("nid")},
                success:function(data){
                    $("input[name='name']").val(data.level_name);
                    $("input[name='ask']").val(data.demand);
                    $("input[name='scale']").val(data.commission);
                    $("input[name='number']").val(data.lower_number);
                    $("input[name='achievement']").val(data.lower_achievement);
                }
            })
        })
    })
</script>
</html>