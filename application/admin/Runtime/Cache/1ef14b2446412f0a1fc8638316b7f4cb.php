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
	<script type="text/javascript" src="__PUBLIC__/js/highcharts.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/exporting.js"></script>
    <style>
        .row .panel .panel-body{ padding-top: 25px;}
        .corporate_income_day tbody tr td{ line-height: 25px;}
    </style>

<div class="content_menu_fr" style="width: 100%">
    <h1  class="text-center">代理商返款报表</h1>
    <div class="content_menu_search form-inline">
        <div class="form-group">
            <label>用户ID：</label>
            <input type="text" class="form-control"  name=""  placeholder="" value="">
        </div>
        <div class="form-group">
            <label>用户姓名：</label>
            <input type="text" class="form-control"  name=""  placeholder="" value="">
        </div>
        <div class="form-group">
            <label>当前状态：</label>
            <select class="form-control" name="">
                <option>— 不限制 —</option>
                <option>返款中</option>
                <option>已返款</option>
            </select>
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
                            <span>代理商返款列表：</span>
                            <!-- <button class="fr" style="">导出</button>-->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive corporate_income_day">
                                <table class="table table-striped table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">用户ID</th>
                                        <th class="text-center">用户姓名</th>
                                        <th class="text-center">返款金额</th>
                                        <th class="text-center">返款日期</th>
                                        <th class="text-center">当前状态</th>
                                        <th class="text-center">返款比例</th>
                                        <th class="text-center">每日金额</th>
                                        <th class="text-center">查询日期</th>
                                        <th class="text-center">已返天数</th>
                                        <th class="text-center">已返金额</th>
                                        <th class="text-center">未返金额</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CXH7479417</td>
                                            <td>林代奎</td>
                                            <td>159800.00</td>
                                            <td>2017/1/12</td>
                                            <td>返款中</td>
                                            <td>0.0005</td>
                                            <td>78.26</td>
                                            <td>本地时间</td>
                                            <td>244</td>
                                            <td>19095.44</td>
                                            <td>140704.56</td>
                                        </tr>
                                        <tr>
                                            <td>CXH7479417</td>
                                            <td>林代奎</td>
                                            <td>159800.00</td>
                                            <td>2017/1/12</td>
                                            <td>返款中</td>
                                            <td>0.0005</td>
                                            <td>78.26</td>
                                            <td>本地时间</td>
                                            <td>244</td>
                                            <td>19095.44</td>
                                            <td>140704.56</td>
                                        </tr>
                                        <tr>
                                            <td>CXH7479417</td>
                                            <td>林代奎</td>
                                            <td>159800.00</td>
                                            <td>2017/1/12</td>
                                            <td>返款中</td>
                                            <td>0.0005</td>
                                            <td>78.26</td>
                                            <td>本地时间</td>
                                            <td>244</td>
                                            <td>19095.44</td>
                                            <td>140704.56</td>
                                        </tr>
                                        <tr>
                                            <td>CXH7479417</td>
                                            <td>林代奎</td>
                                            <td>159800.00</td>
                                            <td>2017/1/12</td>
                                            <td>返款中</td>
                                            <td>0.0005</td>
                                            <td>78.26</td>
                                            <td>本地时间</td>
                                            <td>244</td>
                                            <td>19095.44</td>
                                            <td>140704.56</td>
                                        </tr>
                                        <tr>
                                            <td>CXH7479417</td>
                                            <td>林代奎</td>
                                            <td>159800.00</td>
                                            <td>2017/1/12</td>
                                            <td>返款中</td>
                                            <td>0.0005</td>
                                            <td>78.26</td>
                                            <td>本地时间</td>
                                            <td>244</td>
                                            <td>19095.44</td>
                                            <td>140704.56</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="grxg_form_ym" style="width: 30%">
                                    <li>首页</li>
                                    <li>上一页</li>
                                    <li>
                                        <span>1</span>/
                                        <span>5</span>
                                    </li>
                                    <li>下一页</li>
                                    <li>末页</li>
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