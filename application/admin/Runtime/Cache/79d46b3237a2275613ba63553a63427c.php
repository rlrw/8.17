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
            <h1  class="text-center">添加用户</h1>
            <section class="section">
                <form name="form" method="post" action="<?php echo U('Index/add');?>" class="join_form">
                    <!-- <div class="form-group">
                                            <label for="tjr_name">推荐人姓名：</label>
                                            <input type="text" class="form-control"  name="tjr_name"  placeholder="可以不填" value="">
                                        </div>
                                         -->                    <div class="form-group">
                        <label for="tjr_ID">推荐人ID：</label>
                        <input type="text" class="form-control" name="pid" placeholder="可以不填" value="">
                    </div>
                    <div class="form-group">
                        <label for="yjr_name">用户姓名：</label>
                        <input type="text" class="form-control" name="name" placeholder="请与身份证上姓名相同" value="">
                    </div>
                  <!--   <div class="form-group">
                      <label for="yjr_ID">用户ID：</label>
                      <input type="text" class="form-control" name="yjr_ID" disabled placeholder="" value="CXH123456">
                  </div> -->
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
                            <option  value="">—请选择—</option>
                            <?php if(is_array($service)): foreach($service as $key=>$v): ?><option value="<?php echo ($v["new_id"]); ?>"><?php echo ($v["area"]); ?></option><?php endforeach; endif; ?>
                     
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="yjr_ssqy" style="display: block">所属区域：</label>
                        <div class="col-lg-3 col-sm-3" style="padding-right: 10px; padding-left: 0;" >
                            <select class="form-control" name="province" id="province" data-bv-notempty data-bv-notempty-message="请选择所属区域!">
                                <option value="">省份（市）</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-sm-3" style="padding-right: 10px;padding-left: 0;">
                            <select class="form-control" name="city" id="city">
                                <option value="市（区）">市（区）</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-sm-3" style="padding-right: 10px;padding-left: 0;">
                            <select class="form-control" name="county" id="county">
                                <option value="县、镇">县、镇</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <script>
                        var cityAll=city.citylist;
                        $.each(cityAll,function(i,n){
                            $("#province").append('<option value="'+ n.p + '">' + n.p + '</option>');
                        });
                        $("#province,#city").change(function(){
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
                    </script>
                    <div class="form-group">
                        <label for="yjr_zcdj">充值等级：</label>
                        <select class="form-control" name="lv" data-bv-notempty data-bv-notempty-message="请选择充值等级！">
                            <option value="">—请选择—</option>
                            <option value="20000">VIP经销商</option>
                            <option value="3000">会员</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">充值金额：</label>
                        <input type="text" class="form-control" name="shoping_points" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label for="yjr_dlmm">登录密码：</label>
                        <input type="password" class="form-control" name="password1" placeholder="请输入3-9位登录密码" value="">
                    </div>
                    <div class="form-group">
                        <label for="yjr_ejmm">二级密码：</label>
                        <input type="password" class="form-control" name="paypwd" placeholder="请输入6位二级密码" value="">

                    </div>
                  <!--   <div class="form-group" >
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" name="checkbox">我已阅读并同意弹窗的《经销商经营守则》
                          </label>
                      </div>
                  </div> -->
                    <input type="submit" class="btn center-block btn-success" id="join_submit" value="添加用户">
                </form>
            </section>
 </div>
</body>
</html>