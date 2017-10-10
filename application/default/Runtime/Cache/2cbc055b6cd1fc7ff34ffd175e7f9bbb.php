<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>车享惠-用户中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link href="__PUBLIC__/css/index.css" rel="stylesheet">
    <script src="__PUBLIC__/js/index.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" >
    <script src="__PUBLIC__/js/city.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"  type="text/javascript"></script>
    <link href="__PUBLIC__/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/fileinput.css" rel="stylesheet">
    <script src="__PUBLIC__/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/fileinput.min.js" type="text/javascript"></script>
</head>
<body>
<header class="header">
    <a href="__APP__/Login/loginout" class="header_fl fl"><span class="glyphicon glyphicon-off" style="color: #fff"></span></a>
    <!--<a href="" class="header_fl fl"><span class="glyphicon glyphicon-menu-left" style="color: #fff"></span></a>-->
    代理商申请
    <a href="__APP__/Core/index" target="_blank" class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
</header>


<section class="section grxg_form">
    <div class="mm_xg">
        <ul>
            <li class="mm_xg_hover"><a href="javascript:">代理商申请</a></li>
            <li><a href="<?php echo U('Agent/record');?>">申请记录</a></li>
        </ul>
    </div>
    <div>
        <form name="form" method="post" action="<?php echo U('Agent/get_agent');?>" style="display: block;" class="mm_xg_form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>">
            <div class="form-group">
                <label for="grxg_name">用户姓名：</label>
                <input type="text" class="form-control" readonly name="grxg_name"  placeholder="" value="<?php echo ($user["name"]); ?>">
            </div>
            <div class="form-group">
                <label for="grxg_ID">用户ID：</label>
                <input type="text" class="form-control" readonly name="grxg_ID" placeholder="" value="<?php echo ($user["userid"]); ?>">
            </div>
            <div class="form-group">
                <label for="yjr_fwzx">申请级别：</label>
                <select class="form-control" name="yjr_fwzx" data-bv-notempty data-bv-notempty-message="请选择申请级别!">
                    <option  value="">—请选择—</option>
                    <option value="省级代理">省级代理</option>
                    <option value="市级代理">市级代理</option>
                    <option value="县级代理">县级代理</option>
                </select>
            </div>
            <div class="form-group" >
                <label for="yjr_ssqy" style="display: block">所属区域：</label>
                <div class="col-sm-3 col-xs-4" style="padding-right: 10px; padding-left: 0;" >
                    <select id="province" class="form-control" name="province" data-bv-notempty data-bv-notempty-message="请选择所属区域!">
                        <option value="">省份（市）</option>
                    </select>
                </div>
                <div class="col-sm-3 col-xs-4" style="padding-right: 10px;padding-left: 0;">
                    <select id="city" class="form-control" name="city">
                        <option value="">市（区）</option>
                    </select>
                </div>
                <div class="col-sm-3 col-xs-4" style="padding-right: 10px;padding-left: 0;">
                    <select id="county" class="form-control" name="area">
                        <option value="">县、镇</option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label for="grxg_ID">公司名字：</label>
                <input type="text" class="form-control"  name="company_name" placeholder="请输入公司名字！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">公司地址：</label>
                <input type="text" class="form-control"  name="company_add" placeholder="请输入公司地址！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">公司电话：</label>
                <input type="tel" class="form-control"  name="company_tell" placeholder="请输入公司电话！" value="">
            </div>
            <div class="form-group">
                <label for="grxg_ID">营业执照编号：</label>
                <input type="text" class="form-control"  name="yy_zz_bh" placeholder="请输入营业执照编号！" value="">
            </div>
            <div class="form-group">
                <label>营业执照图片：</label>
                <input name="yy_zz_pic[]"  value=""  id="file-3" type="file" multiple>
            </div>
            <input type="submit" class="btn center-block" id="join_submit" value="提交申请">
        </form>
    </div>

</section>
   <footer class="footer">
        <ul>
            <li>
                <a href="__APP__/Index/index/act/首页" >
                    <i class="glyphicon glyphicon-home"></i>
                    <span>首页</span>
                </a>
            </li>
            <li>
                <a href="__APP__/Join/index/act/定金加盟" >
                    <i class="glyphicon glyphicon-usd"></i>
                    <span>定金加盟</span>
                </a>
            </li>
            <li>
                <a href="__APP__/List/xjhz/act/现金互转" >
                    <i class="glyphicon glyphicon-send"></i>
                    <span>现金互转</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Withdraw/index');?>" >
                    <i class="glyphicon glyphicon-tags"></i>
                    <span>提现申请</span>
                </a>
            </li>
            <li>
                <a href="__APP__/Core/syzxj/act/收益转现金" >
                    <i class="glyphicon glyphicon-paperclip"></i>
                    <span>收益转现金</span>
                </a>
            </li>
        </ul>
    </footer>

<script>
    $(function () {
        $("#file-3").fileinput({
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-default btn-xm",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
        });

        //input Verification
        $('form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                company_name: {
                    validators: {
                        notEmpty: { message: '请输入公司名字!'}
                    }
                },
                company_add: {
                    validators: {
                        notEmpty: { message: '请输入公司地址!'}
                    }
                },
                company_tell: {
                    validators: {
                        notEmpty: { message: '请输入公司电话!'}
                    }
                },
                grxg_checkbox: {
                    validators: {
                        notEmpty: { message: '请选择!'}
                    }
                },
                yy_zz_bh: {
                    validators: {
                        notEmpty: { message: '请输入公司营业执照编号!'}
                    }
                },
                yy_zz_pic: {
                    validators: {
                        notEmpty: { message: '请上传图片!'}
                    }
                }
            }
        });



    });
    $(function(){
        var cityAll=city.citylist;
        $.each(cityAll,function(i,n){
            $("#province").append('<option value="'+ n.p + '">' + n.p + '</option>');
        });
        $("#province,#city").change(function(){
            if($(this).attr("id") == "province"){
                $("#city").html("").append('<option value="">市（区）</option>').next().html("").append('<option value="">县、镇</option>');
            }else{
                $("#county").html("").append('<option value="">县、镇</option>');
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
    });
    $(function(){
        var level=$("select[name='yjr_fwzx']");
        function ajax(str,level,p){
            $.ajax({
                url:"<?php echo U('Agent/check_agent');?>",
                type:"post",
                data:{area:str,level:level},
                success:function(e){
                    if(e==1){
                        alert("对不起，该地区代理商已经被申请！");
                        p.find("option:first-child").attr("selected", true);
                    }
                }
            })
        }
            $("#province").on("change",function(){
                var p=$(this);
                if(level.val()==""){
                    alert("请先选择代理级别");
                    p.find("option:first-child").attr("selected", true);
                }else if(level.val()==="省级代理"){
                  var str=p.val();
                    ajax(str,2,p);
                }
            });
        $("#city").on("change",function(){
            var p=$(this);
            if(level.val()==""){
                alert("请先选择代理级别");
                p.find("option:first-child").attr("selected", true);
            }else if(level.val()==="市级代理"){
                var str=$("#province").val()+p.val();
                ajax(str,1,p);
            }
        });
        $("#county").on("change",function(){
            var p=$(this);
            if(level.val()==""){
                alert("请先选择代理级别");
                p.find("option:first-child").attr("selected", true);
            }else if(level.val()==="县级代理"){
                var str=$("#province").val()+$("#city").val()+p.val();
                ajax(str,0,p);
            }
        });
        level.change(function(){
            if(level.val()==="省级代理"){
                $("#province").addClass("show").removeClass("hidden");
                $("#city").addClass("hidden").removeClass("show");
                $("#county").addClass("hidden").removeClass("show");
            }else if(level.val()==="市级代理"){
                $("#province").addClass("show").removeClass("hidden");
                $("#city").addClass("show").removeClass("hidden");
                $("#county").addClass("hidden").removeClass("show");
            }else if(level.val()==="县级代理"){
                $("#province").addClass("show").removeClass("hidden");
                $("#city").addClass("show").removeClass("hidden");
                $("#county").addClass("show").removeClass("hidden");
            }else{
                $("#province").addClass("show").removeClass("hidden");
                $("#city").addClass("show").removeClass("hidden");
                $("#county").addClass("show").removeClass("hidden");
            }
        })
    });

</script>
</body>
</html>