<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
	<script type="text/javascript" src="__PUBLIC__/js/highcharts.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/exporting.js"></script>
    <style>
        .row .panel .panel-body{ padding-top: 25px;}
        .corporate_income_day tbody tr td{ line-height: 25px;}
    </style>

<div class="content_menu_fr" style="width: 100%">
    <h1  class="text-center">会员升级报表</h1>
    <div class="content_menu_search form-inline">
        <div class="form-group">
            <label>账号：</label>
            <input type="text" class="form-control"  name=""  placeholder="" value="">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-success chart-search"> 查询 </button>
        </div>
    </div>
    <div class="hk_list">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding: 15px 15px">
                            <span>等级提升列表：</span>
                            <!-- <button class="fr" style="">导出</button>-->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive corporate_income_day">
                                <table class="table table-striped table-bordered table-hover text-center">
                                    <thead>
                                    <tr>

                                        <th class="text-center">用户ID</th>
                                        <th class="text-center">用户姓名</th>
                                        <th class="text-center">基础等级</th>
                                        <th class="text-center">升级等级</th>
                                        <th class="text-center">升级金额</th>
                                        <th class="text-center">升级时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
                                        <td>CXH2017<?php echo ($v["id"]); ?></td>
                                        <td><?php echo ($v["name"]); ?></td>
                                        <td>会员</td>
                                        <td>VIP经销商</td>
                                        <td>17000.00</td>
                                        <td><?php echo ($v["datetime"]); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                                <ul class="grxg_form_ym" style="width: 30%">
                                   <?php echo ($page); ?>
                                </ul>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>