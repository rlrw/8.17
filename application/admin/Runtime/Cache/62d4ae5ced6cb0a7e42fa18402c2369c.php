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
            <h1  class="text-center">账号管理</h1>
            <form action="<?php echo U('Core/sele');?>" method="get">
            <div class="content_menu_setting form-inline">
                <div class="form-group">
                    <label>用户ID：</label>
                    <input type="text" class="form-control"  name="userid"  placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>用户姓名：</label>
                    <input type="text" class="form-control"  name="name"  placeholder="" value="">
                </div>
                <div class="form-group">
                        <label for="yjr_zcdj">用户类型</label>
                        <select class="form-control" name="lv">
                            <option value="">—不限—</option>
                            <option value="20000">VIP经销商</option>
                            <option value="3000">会员</option>
                        </select>
                    </div>
                <div class="form-group">
                        <label for="yjr_zcdj">服务中心</label>
                        <select class="form-control" name="fwzx">
                            <option value="">—不限—</option>
                            <?php if(is_array($service)): foreach($service as $key=>$v): ?><option value="<?php echo ($v["new_id"]); ?>"><?php echo ($v["area"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                <div class="form-group">
                        <label>用户级别：</label>
                        <select class="form-control" name="dls_lv" >
                                <option value="">—不限—</option>
                                <option value="1">零星经销商</option>
                                <option value="2">一星经销商</option>
                                <option value="3">二星经销商</option>
                                <option value="4">三星经销商</option>
                                <option value="5">四星经销商</option>
                                <option value="6">五星经销商</option>
                                <option value="7">六星经销商</option>
                                <option value="8">七星经销商</option>
                        </select>
                    </div>
                <div class="form-group">
                    <label>注册时间：</label>
                    <input type="date" class="form-control"  name="time1"  placeholder="" value="">
                    <label style="color: #666"> — </label>
                    <input type="date" class="form-control"  name="time2"  placeholder="" value="">
                </div>
                <button  class="btn btn-success" style=" margin-left: 10px;">查询</button>

            </div>
            </form>
            <div class="user_setting" id="use_zh">
                <table>
                    <thead>
                    <tr>
                        <th><span>ID</span></th>
                        <th><span>姓名</span></th>
                        <th><span>电话</span></th>
                        <th><span>类型</span></th>
                        <th><span>级别</span></th>
                        <th><span>服务中心</span></th>
                        <th><span style="border-right: 0">操作</span></th>
                    </tr>
                    </thead>
                    <?php if(is_array($info)): foreach($info as $key=>$v): ?><tbody>
                            <tr>
                                <td><?php echo ($v["userid"]); ?><span class="btn" nid="<?php echo ($v["id"]); ?>" st="<?php echo ($v["status"]); ?>"><?php if(($v['status'] == 1)): ?>（已启用）<?php else: ?>（未启用）<?php endif; ?></span></td>
                                <td><?php echo ($v["name"]); ?></td>
                                <td><?php echo ($v["phone"]); ?></td>
                                <td><?php echo ($v["lv"]); ?></td>
                                <td><?php echo ($v["level_name"]); ?></td>
                                <td><?php echo ($v["area"]); ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#seeModal<?php echo ($v["id"]); ?>">查看</a>
                                    <i> | </i>
                                    <a data-toggle="modal" data-target="#modifyModal" nid="<?php echo ($v["id"]); ?>">修改</a><br>
                                     <a  class="czmm" mid="<?php echo ($v["id"]); ?>" >重置密码</a>
                                    <button class="btn hidden btn-success"></button>
                                </td>
                            </tr>
                        </tbody>

                        <div class="modal fade" tabindex="-1" role="dialog" id="seeModal<?php echo ($v["id"]); ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">基本信息</h4>
                                        </div>
                                        <div class="modal-body">
                                            <ul>
                                                <li class="col-xs-4 col-lg-4">用户姓名：<?php echo ($v["name"]); ?></li>
                                                <li class="col-xs-4 col-lg-4">用户ID：<?php echo ($v["userid"]); ?></li>
                                                <li class="col-xs-4 col-lg-4 border_fr">推荐人ID：CXH2017<?php echo ($v["pid"]); ?></li>
                                                
                                                <li class="col-xs-6 col-lg-6">身份证号码：<?php echo ($v["card"]); ?></li>
                                                <li class="col-xs-6 col-lg-6 border_fr">手机号码：<?php echo ($v["phone"]); ?></li>
                                                
                                                <li class="col-xs-3 col-lg-3">类型：VIP经销商</li>
                                                <li class="col-xs-4 col-lg-4">用户级别：<?php echo ($v["level_name"]); ?></li>
                                                <li class="col-xs-5 col-lg-5 border_fr">地址：<?php echo ($v["province"]); echo ($v["city"]); echo ($v["county"]); ?></li>
                                                
                                                <li class="col-xs-6 col-lg-6">提现银行：<?php echo ($v["bank"]); ?></li>
                                                <li class="col-xs-6 col-lg-6 border_fr">提现银行卡号：<?php echo ($v["bankcard"]); ?></li>

                                       
                                                <li class="col-xs-12 col-lg-12 border_fr">创建时间：<?php echo ($v["reg_time"]); ?></li>
                                                
                                                <li class="col-xs-4 col-lg-4">累计销售：<?php echo ($v["perf"]); ?></li>
                                                <li class="col-xs-4 col-lg-4">现金积分：<?php echo ($v["cash_points"]); ?></li>
                                                <li class="col-xs-4 col-lg-4 border_fr">购物劵：<?php echo ($v["shoping_points"]); ?></li>
                                                
                                                <li class="col-xs-6 col-lg-6">收益积分：<?php echo ($v["pay_points"]); ?></li>
                                                <li class="col-xs-6 col-lg-6 border_fr">冻结的收益积分：<?php echo ($v["dj_points"]); ?></li>
                                                <!-- 
                                                <li class="col-xs-6 col-lg-6">
                                                    <select name="" class=" col-xs-7 col-lg-7" style="padding:3px 0">
                                                        <option value="一星经销商">一星经销商</option>
                                                        <option value="">二星经销商</option>
                                                        <option value="">三星经销商</option>
                                                        <option value="">四星经销商</option>
                                                        <option value="">五星经销商</option>
                                                        <option value="">六星经销商</option>
                                                        <option value="">七星经销商</option>
                                                    </select>
                                                    <button class=" col-xs-3 col-lg-3">更改</button>
                                                </li>
                                                <li class="col-xs-6 col-lg-6 border_fr">
                                                    <input type="text" placeholder="请输入推荐人ID" class=" col-xs-7 col-lg-7"/>
                                                    <button class="col-xs-3 col-lg-3">更改</button>
                                                </li>
                                                
                                                
                                                
                                                <li class="col-xs-12 col-lg-12">
                                                    <a href="xj_mx.html" target="_blank"><button>现金明细</button></a>
                                                    <a href="sy_mx.html" target="_blank"><button>收益明细</button></a>
                                                    <button>重置密码</button>
                                                    <button>重置二级密码</button>
                                                    
                                                </li> -->
                                               <!--  <li>登录密码：<?php echo ($v["password"]); ?></li>
                                               <li>二级密码：<?php echo ($v["ejmm"]); ?></li> -->
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- /.modal --><?php endforeach; endif; ?>

                </table>
                <div class="modal fade" tabindex="-1" role="dialog" id="modifyModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">修改信息</h4>
                            </div>
                            <div class="modal-body">
                                <form name="form" method="post" action="__APP__/Core/save" class="join_form">
                                    <!--<div class="form-group">
                                        <label for="tjr_name">推荐人姓名：</label>
                                        <input type="text" class="form-control" disabled name="tjr_name"  placeholder="" value="">
                                    </div>
                                    <input type="text" hidden name="id" value="<?php echo ($v["id"]); ?>">
                                    <div class="form-group">
                                        <label for="tjr_ID">推荐人ID：</label>
                                        <input type="text" class="form-control" disabled name="tjr_ID" placeholder="" value="">
                                    </div>-->
                                     <input type="hidden"  name="id" value="">
                                    <div class="form-group">
                                        <label for="yjr_name">用户姓名：</label>
                                        <input type="text" class="form-control" name="name" placeholder="请与身份证上姓名相同" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="yjr_ID">用户ID：</label>
                                        <input type="text" class="form-control" name="userid" disabled placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="yjr_tell">手机号码：</label>
                                        <span class="hidden" style="color: red; float: right;">请输入正确的手机号码！</span>
                                        <input type="number" class="form-control" name="phone" placeholder="请输入手机号码" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="yjr_card">身份证号码：</label>
                                        <input type="number" class="form-control" name="card" placeholder="请输入身份证号码" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="yjr_fwzx">服务中心：</label>
                                        <select class="form-control" name="fwzx" data-bv-notempty data-bv-notempty-message="请选择所属服务中心!">
                                            <?php if(is_array($service)): foreach($service as $key=>$v): ?><option value="<?php echo ($v["service_id"]); ?>"><?php echo ($v["area"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="yjr_ssqy" style="display: block">所属区域：</label>
                                        <div class="col-lg-4" style="padding-right: 10px; padding-left: 0;" >
                                            <select class="form-control" name="province" id="province" data-bv-notempty data-bv-notempty-message="请选择所属区域!">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4" style="padding-right: 10px;padding-left: 0;">
                                            <select class="form-control" name="city" id="city">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4" style="padding-right: 10px;padding-left: 0;">
                                            <select class="form-control" name="county" id="county">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="yjr_zcdj">充值等级：</label>
                                        <select class="form-control" name="lv" data-bv-notempty data-bv-notempty-message="请选择充值等级！">
                                            <option value="3000">VIP经销商</option>
                                            <option value="20000">会员</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn center-block btn-success" id="join_submit" value="提交修改" style=" clear: both;">
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                    <script>
                        +function () {
                            var cityAll=city.citylist;
                            $.each(cityAll,function(i,n){
                                $("#province").append('<option value="'+ n.p + '">' + n.p + '</option>');
                            });
                            $("#province,#city").click(function(){
                                if($(this).attr("id") == "province"){
                                    $("#city").html("").append('<option value="市（区）">市（区）</option>').next().html("").append('<option value="县、镇">县、镇</option>');
                                }else{
                                    $("#county").html("").append('<option value="县、镇">县、镇</option>');
                                }
                                $.each(cityAll,function(j,k){
                                    if($("#province").val() == k.p){
                                        $.each(k.c,function(l,m){
                                            $("#city").append('<option value="'+ m.n + '">' + m.n + '</option>');
                                            if(m.a){
                                                $("#county").show();
                                                if($("#city").val() == m.n){
                                                    $.each(m.a,function(e,f){
                                                        $("#county").append('<option value="'+ f.s + '">' + f.s + '</option>');
                                                    });
                                                }
                                            }else{
                                                $("#county").hide();

                                            }
                                        });
                                    }
                                });
                            });
                        }();
                    </script>
                </div>
            </div>

        </div>
          <div class="grxg_form_ym"><?php echo ($page); ?></div> 
<script>
 $("#use_zh tbody tr td:first-child span").click(function (){
                    var a =$(this);
                if(a.attr('st')==0){
                    if(confirm("确认要启用吗？")){
                         $.post("<?php echo U('Core/res');?>",{'value':'1',nid:a.attr('nid')}),
                                             $(this).html("（已启用）").removeClass("spanColor");
                                                      
                    }
                }else{
                    if(confirm("确认禁用吗？")){

                        $(this).html("（未启用）").addClass("spanColor");
                         $.post("<?php echo U('Core/res');?>",{'value':'0',nid:a.attr('nid')});
                        return;
                    }
                }
            });
 $(".czmm").click(function(){
    var m =$(this);
    if (confirm("确定重置吗？")) {
        $.post("<?php echo U('Core/change');?>",{'v':m.attr('mid')},function(e){
            if (e) {
                alert('重置成功');
            }else{
                alert('重置失败或已重置！');
            }
        });

    }
 });
    $(function(){
        $("a[data-target='#modifyModal']").click(function(){
            var id=$(this).attr('nid');
            $.ajax({
                url:"<?php echo U('Core/search');?>",
                type:'post',
                data:{id:id},
                success:function(e){
                    if(e){
                    $("input[name='id']").val(e.id);
                      $("input[name='name']").val(e.name);
                      $("input[name='userid']").val(e.userid);
                      $("input[name='phone']").val(e.phone);
                      $("input[name='card']").val(e.card);
                       $("#province option[value='"+ e.province+"']").attr("selected",true);
                       $("#city option:first-child").text(e.city);
                       $("#county option:first-child").text(e.county);
                        $("select[name='lv'] option[value='e.lv']").attr("selected",true);
                        $("select[name='fwzx'] option[value='"+e.fwzx+"']").attr("selected",true);
                    }
                    $("#modifyModal .close").click(function(){
                        window.location.reload();
                    })
                }
            })
        })
    })
</script>

</body>
</html>