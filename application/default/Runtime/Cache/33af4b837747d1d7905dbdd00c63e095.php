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
    <script src="__PUBLIC__/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js" ></script>
</head>
<body id="body">
     <header class="header">
    <a href="__APP__/Login/loginout" class="header_fl fl"><span class="glyphicon glyphicon-off" style="color: #fff"></span></a>
        <!--<a href="" class="header_fl fl"><span class="glyphicon glyphicon-menu-left" style="color: #fff"></span></a>-->
       <?php if($act != null): echo ($act); else: ?>首页<?php endif; ?>
        <a href="__APP__/Core/index"  class="header_fr fr"><span class="glyphicon glyphicon-user" style="color: #fff"></span></a>
    </header>
    <div class="sct_menu">
        <section class="section">
            <div class="Settlement_top">
                <form action="<?php echo U('Index/changeId');?>" method="post" id="changeId">
                <i class="stm_head fl"><img src="" alt=""></i>
                <ul class="fl" style="width: 100%">
                    <li>
                        用户名：<span class="stm_UName"><?php echo ($data["name"]); ?></span>
                        (
                        <a href="" class="stm_UID"><?php echo ($data["userid"]); ?></a>
                        )
                        <!--账号切换-->
                        <?php if($child_list != null and $fid == null): ?><span class="dropdown" style=" margin-left: 10px;">
						      <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="border: 1px solid #ddd; border-radius: 5px; color: #666;">
						        	切换账号 <span class="caret"></span>
						      </a>

                                <input type="hidden" name="new_id">

						      <ul class="dropdown-menu">
                                  <?php if(is_array($child_list)): foreach($child_list as $key=>$val): ?><li><a href="javascript:" tid="<?php echo ($val["id"]); ?>"><?php echo ($val["userid"]); ?></a></li><?php endforeach; endif; ?>
						      </ul>
						</span>
                            <?php elseif($child_list == null and $fid != null): ?>
                                <span class="dropdown" style=" margin-left: 10px;">
						      <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="border: 1px solid #ddd; border-radius: 5px; color: #666;">
                                  切换账号 <span class="caret"></span>
                              </a>

                                <input type="hidden" name="new_id">

						      <ul class="dropdown-menu">
                                  <li><a href="javascript:" tid="<?php echo ($fid["id"]); ?>"><?php echo ($fid["userid"]); ?></a></li>
                              </ul>
						</span><?php endif; ?>
                    </li>
                    
                    <li>
                     业务级别：
                     <span class="stm_jb"><?php echo ($data["level_name"]); ?></span> 
                                         认证等级：
                        <span class="stm_rz"><?php echo ($data["lv1"]); ?></span>
                    </li>
                    <li>
                       	 注册于:
                        <span class="stm_zcy"><?php echo ($data["reg_time"]); ?></span>
                        上次登录:
                        <span class="stm_dl"><?php echo ($data["last_login"]); ?></span>
                    </li>
                    
                </ul>
                </form>
            </div>

            <script>
                $(function(){
                    $(".dropdown-menu li").click(function(){
                        $("input[name='new_id']").val($(this).find("a").attr("tid"));
                        $("#changeId").submit();
                    })
                })
            </script>
            <div class="Settlement_bottom">
            	<div class="panel-body" style="padding: 0;">
                    <div class="">
                        <table class=" table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">累计销售</th>
                                    <th class="text-center">收益积分</th>
                                    <th class="text-center">现金积分</th>
                                    <th class="text-center">重消积分</th>
                                    <th class="text-center">购物劵</th>
                                </tr>
                            </thead>
                            <tbody class="Settlement_tbody">
                                <tr class="Settlement_tbody_fr">
                                    <td>￥<span><?php echo ($data["perf"]); ?></span><a>查看明细<span class="caret"></span></a></td>
                                    <td>￥<?php echo ($data["pay_points"]); ?><a>查看明细<span class="caret"></span></a></td>
                                    <td>￥<?php echo ($data["cash_points"]); ?><a>查看明细<span class="caret"></span></a></td>
                                    <td>￥<?php echo ($data["no_points"]); ?><a>查看明细<span class="caret"></span></a></td>
                                    <td>￥<?php echo ($data["user_money"]); ?><a>查看明细<span class="caret"></span></a></td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                    	<ul>
                                    		<li>
                                    			<span>定金加盟：￥<?php echo ($perf?$perf:'0'); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>-</lable>
                                    		</li>
                                    		<li>
                                    			<span>支出：￥0.00</span>
                                    		</li>
                                    		<li>
                                    			<lable>+</lable>
                                    		</li>
                                    		<li>
                                    			<span>昨日累计销售：￥<?php echo ($tperf?$tperf:'0'); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>=</lable>
                                    		</li>
                                    		<li>
                                    			<span>今日累计销售：￥<?php echo ($data["perf"]); ?></span>
                                    		</li>
                                    	</ul>
                                    	
                                    	<ul>
                                    		<li>
                                    			<span>直推间推：￥<?php echo ($pay?$pay:'0'); ?></span>
                                    			<span>销售返点：￥<?php echo ($fdpay?$fdpay:'0'); ?></span>
                                    			<span>月底分红：￥<?php echo ($fpay?$fpay:'0'); ?></span>
                                    			<!--<span>服务中心：￥2000</span>-->
                                    			<span>购车返款：￥<?php echo ($gpay?$gpay:'0'); ?></span>
                                    			<!--<span>代理商返款：￥2000</span>-->
                                    			
                                    		</li>
                                    		<li>
                                    			<lable>-</lable>
                                    		</li>
                                    		<li>
                                    			<span>提现支出：￥<?php echo ($total?$total:'0'); ?></span>
                                    			<span>收益转现金：￥<?php echo ($money?$money:'0'); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>+</lable>
                                    		</li>
                                    		<li>
                                    			<span>昨日累计收益：<?php echo ($tpay?$tpay:'0'); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>=</lable>
                                    		</li>
                                    		<li>
                                    			<span>今日累计收益：<?php echo ($data["pay_points"]); ?></span>
                                    		</li>
                                    	</ul>
                                    	
                                    	<ul>
                                    		<li>
                                    			<span>收益转现金：￥<?php echo ($money?$money:'0'); ?></span>
                                    			<span>现金充值：￥0.00</span>
                                                <span>互转收入：￥<?php echo ($hzsr?$hzsr:'0'); ?></span>
                                                <span>汇款收入：￥<?php echo ($hksr?$hksr:'0'); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>-</lable>
                                    		</li>
                                    		<li>
                                    			<span>商城支出：￥0.00</span>
                                    			<span>定金加盟：￥<?php echo ($djpay?$djpay:'0'); ?></span>
                                                <span>互转支出：￥<?php echo ($hzzc?$hzzc:'0'); ?></span>
                                                <span>会员升级：￥<?php echo ($sjmoney?$sjmoney:'0'); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>+</lable>
                                    		</li>
                                    		<li>
                                    			<span>昨日累计现金：<?php echo ($tcash?$tcash:'0'); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>=</lable>
                                    		</li>
                                    		<li>
                                    			<span>今日累计现金：<?php echo ($data["cash_points"]); ?></span>
                                    		</li>
                                    	</ul>
                                    	
                                    	<ul>
                                    		<li>
                                    			<span>直推间推：￥<?php echo ($nopay?$nopay:'0'); ?></span>
                                                <span>销售返点：￥<?php echo ($nofdpay?$nofdpay:'0'); ?></span>
                                                <span>月底分红：￥<?php echo ($nofpay?$nofpay:'0'); ?></span>
                                    			
                                    			
                                    		</li>
                                    		<li>
                                    			<lable>-</lable>
                                    		</li>
                                    		<li>
                                    			<span>商城支出：￥0.00</span>
                                    		</li>
                                    		<li>
                                    			<lable>+</lable>
                                    		</li>
                                    		<li>
                                    			<span>昨日累计重消：<?php echo ($tnopay); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>=</lable>
                                    		</li>
                                    		<li>
                                    			<span>今日累计重消：<?php echo ($data["no_points"]); ?></span>
                                    		</li>
                                    	</ul>
                                    	
                                    	<ul>
                                    		<li>
                                    			<span>定金加盟：￥0.00</span>
                                                <span>会员升级：￥<?php echo ($sjshop?$sjshop:'0'); ?></span>
                                    			
                                    		</li>
                                    		<li>
                                    			<lable>-</lable>
                                    		</li>
                                    		<li>
                                    			<span>商城支出：￥<?php echo ($user_money); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>+</lable>
                                    		</li>
                                    		<li>
                                    			<span>昨日累计购物劵：￥<?php echo ($tuser_money); ?></span>
                                    		</li>
                                    		<li>
                                    			<lable>=</lable>
                                    		</li>
                                    		<li>
                                    			<span>今日累计购物劵：￥<?php echo ($data["user_money"]); ?></span>
                                    		</li>
                                    	</ul>
                                    </td>
                                </tr>
                                
                            </tbody>
                            <script type="text/javascript">
                            	+function(){
                            		$(".Settlement_tbody tr:first-child td:first-child").addClass("trhover");
                            		$(".Settlement_tbody_fr").next().find("ul:first-child").siblings("ul").addClass("hidden");
                            		$(".Settlement_tbody tr:first-child td").click(function(){
                            			
                            			var index=$(this).index();
                            			$(this).addClass("trhover").siblings().removeClass("trhover");
                            			$(this).parent().next().find("ul").each(function(i){
                            				if(index===i){
                            					$(this).removeClass("hidden").siblings().addClass("hidden");
                            				}else{
                            					return;
                            				}
                            			})
                            		});
                            		/*var height=$(".Settlement_tbody ul:first-child").css("height");
                            		console.log(height);
                            		$(".Settlement_tbody ul li:nth-of-type(even) lable").css("line-height",height);
                            		*/
                            	}();
                            </script>
                        </table>
                    </div>
                </div>
                <ul class='Settlement_car'>
                    <li>
                        车补总积分：<span class="stm_cbjf"><?php echo ($data["car_points"]); ?></span>
                    </li>
                    <li>
                        已返车补积分：<span class="stm_yf_cbjf"><?php echo ($data["pocess_points"]); ?></span>
                    </li>
                    <li>
                        未返车补积分：<span class="stm_wf_cdjf"><?php echo ($data["wf_points"]); ?></span>
                    </li>
                </ul>

            </div>
        </section>
        <section class="section">
        <ul class="section_content">
            <li>
                <a href="__APP__/Core/mydd/act/我的订单" >
                    <i class="glyphicon glyphicon-paperclip"></i>
                    <span>我的订单</span>
                </a>
            </li>
            <li>
                <a href="__APP__/Core/mytg/act/我的推广" >
                    <i class="glyphicon glyphicon-random"></i>
                    <span>我的推广</span>
                </a>
            </li>
            <li>
                <a href="__APP__/List/txmx/act/提现明细" >
                    <i class="glyphicon glyphicon-leaf"></i>
                    <span>提现明细</span>
                </a>
            </li>
            <li>
                <a href="__APP__/Core/update/act/密码修改" >
                    <i class="glyphicon glyphicon-indent-left"></i>
                    <span>密码修改</span>
                </a>
            </li>
        </ul>
        <ul class="section_content">
          <!--   <li>
              <a href="__APP__/Core/xjcz/act/现金充值" >
                  <i class="glyphicon glyphicon-level-up"></i>
                  <span>现金充值</span>
              </a>
          </li> -->
      <li>
          <a href="__APP__/Core/fkmx/act/返款明细" >
              <i class="glyphicon glyphicon-level-up"></i>
              <span>返款明细</span>
          </a>
      </li>
            <li>
                <a href="__APP__/Core/hysj/act/会员升级" >
                    <i class="glyphicon glyphicon-erase"></i>
                    <span>会员升级</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Agent/index');?>" >
                    <i class="glyphicon glyphicon-floppy-disk"></i>
                    <span>代理商申请</span>
                </a>
            </li>
            <li>
                <!--<a href="<?php echo U('Service/index');?>" >
                    <i class="glyphicon glyphicon-tasks"></i>
                    <span>服务中心申请</span>
                </a>-->
                <a href="<?php echo U('Remittance/index');?>" >
                    <i class="glyphicon glyphicon-hdd"></i>
                    <span>汇款申请</span>
                </a>
            </li>
        </ul>
        <ul class="section_content02">
            <li style="width: 100%;">
                <a href="<?php echo U('Buy/index');?>" >
                    <i class="glyphicon glyphicon-folder-open fl"></i>
                    <p class="fl">
                        <span>购车款申请</span>
                        <span>Cash transfer</span>
                    </p>
                </a>
            </li>
      <!--       <li>
          <a href="<?php echo U('Remittance/index');?>" >
              <i class="glyphicon glyphicon-hdd fl"></i>
              <p class="fl">
                  <span>汇款申请</span>
                  <span>Cash transfer</span>
              </p>
          </a>
      </li> -->
        </ul>
        <ul class="section_content02">
            <li>
                <a href="__APP__/List/xjmx/act/现金明细" >
                    <i class="glyphicon glyphicon-random fl"></i>
                    <p class="fl">
                        <span>现金明细</span>
                        <span>Cash transfer</span>
                    </p>
                </a>
            </li>
            <li>
                <a href="__APP__/Core/symx/act/收益明细" >
                    <i class="glyphicon glyphicon-compressed fl"></i>
                    <p class="fl">



                        <span>收益明细</span>
                        <span>Cash transfer</span>
                    </p>
                </a>
            </li>
        </ul>
    </section>
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
 
    <!--<script type="text/javascript">
        (function () {
            var max_height = document.documentElement.clientHeight;
            var primary = document.getElementById("body");
            primary.style.minHeight = max_height+"px";
            primary.style.maxHeight = max_height+"px";
        })();
    </script>-->
</body>
</html>