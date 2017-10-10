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
	
    <style>
        .back-footer-green {  background-color: #5cb85c;  color: #fff;  border-top: 0px solid #fff;}
        .back-footer-blue {  background-color: #4CB1CF;  color: #fff;  border-top: 0px solid #fff;  }
        .back-footer-red {  background-color: #F0433D;  color: #fff;  border-top: 0px solid #fff;  }
        .back-footer-brown {  background-color: #f0ad4e;  color: #fff;  border-top: 0px solid #fff;  }
        .row .panel .panel-body{ padding-top: 25px;}
        .corporate_income_day tbody tr td{ line-height: 25px;}
        /*.highcharts-container svg text:last-child{ display: none;}*/
    </style>

<div class="content_menu_fr" style="width: 100%">
    <h1  class="text-center">会员注册报表</h1>
    <div class="content_menu_search form-inline">
        <div class="form-group">
            <label>会员ID：</label>
            <input type="text" class="form-control"  name=""  placeholder="" value="">
        </div>
        <div class="form-group">
            <label>会员等级：</label>
            <select class="form-control" name="">
                <option  value="">—不限—</option>
                <option value="cd">会员</option>
                <option value="my">VIP经销商</option>
            </select>
        </div>
        <div class="form-group">
            <label>服务中心：</label>
            <select class="form-control" name="">
                <option  value="">—不限—</option>
                <option value="cd">总服务中心</option>
                <option value="my">成都服务中心</option>
            </select>
        </div>
        <div class="form-group">
            <label>推荐人ID：</label>
            <input type="text" class="form-control"  name=""  placeholder="" value="">
        </div>
        <div class="form-group">
            <label>注册时间：</label>
            <input type="date" class="form-control date1"  name=""  placeholder="" value="">
            <label style="color: #666"> — </label>
            <input type="date" class="form-control date2"  name=""  placeholder="" value="">
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
                            <span>注册明细：</span>
                            <!-- <button class="fr" style="">导出</button>-->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive corporate_income_day">
                                <table class="table table-striped table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">会员姓名</th>
                                        <th class="text-center">会员ID</th>
                                        <th class="text-center">等级</th>
                                        <th class="text-center">电话</th>
                                        <th class="text-center">服务中心</th>
                                        <th class="text-center">注册日期</th>
                                        <th class="text-center">推荐人姓名</th>
                                        <th class="text-center">推荐人ID</th>
                                        <th class="text-center">直推业绩</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>张三</td>
                                            <td>CXH20171</td>
                                            <td>VIP经销商</td>
                                            <td>17723311224</td>
                                            <td>总服务中心</td>
                                            <td>2017/08/20</td>
                                            <td>李四</td>
                                            <td>CXH201711</td>
                                            <td>20000.00</td>
                                        </tr>
                                        <tr>
                                            <td>张三</td>
                                            <td>CXH20171</td>
                                            <td>VIP经销商</td>
                                            <td>17723311224</td>
                                            <td>总服务中心</td>
                                            <td>2017/08/20</td>
                                            <td>李四</td>
                                            <td>CXH201711</td>
                                            <td>20000.00</td>
                                        </tr>
                                        <tr>
                                            <td>张三</td>
                                            <td>CXH20171</td>
                                            <td>VIP经销商</td>
                                            <td>17723311224</td>
                                            <td>总服务中心</td>
                                            <td>2017/08/20</td>
                                            <td>李四</td>
                                            <td>CXH201711</td>
                                            <td>20000.00</td>
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