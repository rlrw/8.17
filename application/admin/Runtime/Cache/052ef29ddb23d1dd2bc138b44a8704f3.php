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

<div class="content_menu_fr" style="width: 80%; margin: 0 auto;">
    <h1  class="text-center">张三（CXH201701）现金明细</h1>
    <div class="user_setting" id="use_zh">
        <table>
            <thead>
	            <tr>
	                <th><span>产生时间</span></th>
	                <th><span>产生金额</span></th>
	                <th><span style="border-right: 0">摘要</span></th>
	            </tr>
	            
            </thead>
            <foreach name="info" item="v"> 
            <tbody>
                <tr>
                    <td>2017/02/15 09:47:20</td>
                    <td>1000.00</td>
                    <td>来自[CXH201712]的互转现金积分</td>
                </tr>
                <tr>
                    <td>2017/02/15 09:47:20</td>
                    <td>-20000.00</td>
                    <td>来自[CXH201712]添加会员</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</body>
</html>