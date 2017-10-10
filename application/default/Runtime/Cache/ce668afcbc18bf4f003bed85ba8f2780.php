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
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
    <script src="__PUBLIC__/js/index.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/city.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js" ></script>
</head>
<body id="body">
	<header class="header">
	    <a href="__APP__/Login/loginout" class="header_fl fl"><span class="glyphicon glyphicon-off" style="color: #fff"></span></a>
	       服务中心管理
	    <a href="__APP__/Core/index"  class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
	</header>
	<div class="service_gl">
        <form action="<?php echo U('Service/show_service');?>" method="get">
            <div class="service_gl_setting">
                <div class="form-group">
                    <label>用户ID：</label>
                    <input type="text" class="form-control" name="userid" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>用户姓名：</label>
                    <input type="text" class="form-control" name="user_name" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>用户类型：</label>
                    <select id="city" class="form-control" name="state">
                        <option value="">——不限——</option>
                        <option value="3000">会员</option>
                        <option value="20000">VIP经销商</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>用户级别：</label>
                    <select id="city" class="form-control" name="level">
                        <option value="">——不限——</option>
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
                    <input type="date" class="form-control" name="st" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label style="color: #666"> ——— </label>
                    <input type="date" class="form-control" name="lt" placeholder="" value="">
                </div>
                <button class="btn btn-success center-block">查询</button>
            </div>
        </form>
            <div class="user_service" id="use_zh">
                <div>
                    <div class="modal fade" tabindex="-1" role="dialog" id="seeModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title user"></h4>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
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
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr>
                            <td><?php echo ($val["userid"]); ?><span class="btn" style="display: block;">（未启用）</span></td>
                            <td><?php echo ($val["name"]); ?></td>
                            <td><?php echo ($val["phone"]); ?></td>
                            <td><?php if($val["lv"] == 3000): ?>会员
                                <?php else: ?>VIP经销商<?php endif; ?>
                            </td>
                            <td>
                                <?php switch($val["dls_lv"]): case "1": ?>零星经销商<?php break;?>
                                    <?php case "2": ?>一星经销商<?php break;?>
                                    <?php case "3": ?>二星经销商<?php break;?>
                                    <?php case "4": ?>三星经销商<?php break;?>
                                    <?php case "5": ?>四星经销商<?php break;?>
                                    <?php case "6": ?>五星经销商<?php break;?>
                                    <?php case "7": ?>六星经销商<?php break;?>
                                    <?php case "8": ?>七星经销商<?php break;?>
                                    <?php default: ?>零星经销商<?php endswitch;?>
                            </td>
                            <td><?php echo ($val["fwzx"]); ?></td>
                            <td>
                                <a data-toggle="modal" data-target="#seeModal" nid="<?php echo ($val["id"]); ?>" class="get_detail">查看</a>
                                <button class="btn hidden btn-success"></button>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
				<ul class="grxg_form_ym">
                 <?php echo ($page); ?>
				</ul>
            </div>

        </div>


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

    <script type="text/javascript">
    	$("#use_zh tbody tr td:first-child span").click(function (){
    			var i=0;
                if($(this).is(".spanColor")){
                    if(confirm("确认要禁止吗？")){
                        $(this).html("（禁用中）").removeClass("spanColor");
                        return;
                    }
                }else{
                    if(confirm("确认启用吗？")){
                        $(this).html("（启用中）").addClass("spanColor");
                        return;
                    }
                }
            });
        (function () {
            var max_height = document.documentElement.clientHeight;
            var primary = document.getElementById("body");
            primary.style.minHeight = max_height+"px";
            primary.style.maxHeight = max_height+"px";
        })();
        $(function(){
            $(".get_detail").click(function(){
                var id=$(this).attr("nid");
                $.ajax({
                    url:"<?php echo U('Service/get_parent');?>",
                    type:"post",
                    data:{id:id},
                    success:function(e){
                        $(".user").text(e.name+"("+ e.userid+")");
                        var li=$(".modal-body ul>li");
                        li.eq(0).text("推荐人姓名："+ e[0].pname);
                        li.eq(1).text("推荐人ID："+ e[0].puserid);
                        li.eq(2).text("用户姓名："+ e.name);
                        li.eq(3).text("用户ID："+ e.userid);
                        if(e.lv==3000){
                            li.eq(4).text("用户类型：会员");
                        }else{
                            li.eq(4).text("用户类型：VIP经销商");
                        }

                        var str="";
                        switch (e.dls_lv){
                            case "1":str="零星经销商";break;
                            case "2":str="一星经销商";break;
                            case "3":str="二星经销商";break;
                            case "4":str="三星经销商";break;
                            case "5":str="四星经销商";break;
                            case "6":str="五星经销商";break;
                            case "7":str="六星经销商";break;
                            case "8":str="七星经销商";break;
                            default :str="零星经销商";
                        }
                            li.eq(5).text("用户级别："+str);
                        li.eq(6).text("手机号码："+ e.phone);
                        li.eq(7).text("身份证号码："+ e.card);
                        li.eq(8).text("服务中心："+ e.fwzx);
                        li.eq(8).text("所属区域："+ e.province+ e.city+ e.county);
                    }
                })
            })
        })
    </script>
</body>
</html>