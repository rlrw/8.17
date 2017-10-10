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
        .back-footer-green {  background-color: #5cb85c;  color: #fff;  border-top: 0px solid #fff;}
        .back-footer-blue {  background-color: #4CB1CF;  color: #fff;  border-top: 0px solid #fff;  }
        .back-footer-red {  background-color: #F0433D;  color: #fff;  border-top: 0px solid #fff;  }
        .back-footer-brown {  background-color: #f0ad4e;  color: #fff;  border-top: 0px solid #fff;  }
        .row .panel .panel-body{ padding-top: 25px;}
        .corporate_income_day tbody tr td{ line-height: 25px;}
    </style>


<div class="content_menu_fr" style="width: 100%">
    <h1  class="text-center">提现报表</h1>
    <div class="content_menu_search form-inline">
        <!--<div class="form-group">
            <label>用户ID：</label>
            <input type="text" class="form-control"  name=""  placeholder="" value="">
        </div>
        <div class="form-group">
            <label>报表时间：</label>
            <input type="date" class="form-control date1"  name=""  placeholder="" value="">
            <label style="color: #666"> — </label>
            <input type="date" class="form-control date2"  name=""  placeholder="" value="">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-success chart-search"> 查询 </button>
        </div>-->
    </div>
    <div class="hk_list">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12" style="border-bottom: 6px solid #ddd; margin-bottom: 25px;" ></div>
                <h1 class="page-header">
                    总提现金额：
                </h1>
            </div>
            <div class="row">
                <div style="width: 30%;float: left;">
                    <div class="panel panel-default text-center bg-color-green">
                        <div class="panel-body">
                            <i class="glyphicon glyphicon-bell" style="font-size: 25px; color: #5cb85c;"></i>
                            <h3>1050.84万</h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                            总提现金额（扣税后）
                        </div>
                    </div>
                </div>
                <div style="width: 5%;float: left; text-align: center;"><span style="padding: 70px 0; display: block; font-weight: bold; font-size: 28px;">=</span></div>
                <div style="width: 30%;float: left;">
                    <div class="panel panel-default text-center no-boder bg-color-blue">
                        <div class="panel-body">
                            <i class="glyphicon glyphicon-hand-up" style="font-size: 25px; color: #4CB1CF;"></i>
                            <h3>31646533.00</h3>
                        </div>
                        <div class="panel-footer back-footer-blue">
                            总提现金额（未扣税）
                        </div>
                    </div>
                </div>
                <div style="width: 5%;float: left; text-align: center;"><span style="padding: 70px 0; display: block; font-weight: bold; font-size: 28px;">-</span></div>
                <div style="width: 30%;float: left;">
                    <div class="panel panel-default text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="glyphicon glyphicon-link" style="font-size: 25px; color: #F0433D;"></i>
                            <h3>3116.00</h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            扣税
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            公司收入统计图：
                        </div>
                        <div class="panel-body">
                            <div id="container" style="width:auto;height:500px;margin:0 auto"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            提现明细（1月）：
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive corporate_income_day">
                                <table class="table table-striped table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">时间</th>
                                        <th class="text-center">用户ID</th>
                                        <th class="text-center">用户姓名</th>
                                        <th class="text-center">银行卡号</th>
                                        <th class="text-center">提现金额</th>
                                        <th class="text-center">扣税</th>
                                        <th class="text-center">应得金额</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2017/8/30</td>
                                            <td>CXH20171</td>
                                            <td>张三</td>
                                            <td>622712364958133</td>
                                            <td>2000.00</td>
                                            <td>100.00</td>
                                            <td>1900.00</td>
                                        </tr>
                                        <tr>
                                            <td>2017/8/30</td>
                                            <td>CXH20171</td>
                                            <td>张三</td>
                                            <td>622712364958133</td>
                                            <td>2000.00</td>
                                            <td>100.00</td>
                                            <td>1900.00</td>
                                        </tr>
                                        <tr>
                                            <td>2017/8/30</td>
                                            <td>CXH20171</td>
                                            <td>张三</td>
                                            <td>622712364958133</td>
                                            <td>2000.00</td>
                                            <td>100.00</td>
                                            <td>1900.00</td>
                                        </tr>
                                        <tr>
                                            <td>2017/8/30</td>
                                            <td>CXH20171</td>
                                            <td>张三</td>
                                            <td>622712364958133</td>
                                            <td>2000.00</td>
                                            <td>100.00</td>
                                            <td>1900.00</td>
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
                                <table class="table table-bordered">
                                    <tfoot>
                                    <tr class="danger">
                                        <th class="text-center">合计：</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <!-- <div class="hk_list">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12" style="border-bottom: 6px solid #ddd; margin-bottom: 25px;" ></div>
                <h1 class="page-header">
                    总提现金额：
                </h1>
            </div>
            <div class="row" style="padding: 15px 15px;">
                <div style="width: 20%;float: left;">
                    <div class="panel panel-default text-center bg-color-green">
                        <div class="panel-body" style="padding: 45px 15px 27px 15px;">
                            <i class="glyphicon glyphicon-usd" style="font-size: 25px; color: #5cb85c;"></i>
                            <h3>1050.84万</h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                            总提现金额（扣税后）
                        </div>
                    </div>
                </div>
                <div style="width: 5%;float: left; text-align: center;"><span style="padding: 80px 0; display: block; font-weight: bold; font-size: 28px;">=</span></div>
                <div style="width: 40%;float: left;">
                    <div class="panel panel-default  no-boder bg-color-blue">
                        <div class="panel-body" style=" font-size: 18px">
                            <span class="col-sm-6" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">代理返积分：</text>52160.00</span>
                            <span class="col-sm-6" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">vip分红：</text>52160.00</span>
                            <span class="col-sm-6" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">销售极差返点：</text>52160.00</span>
                            <span class="col-sm-6" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">购车分销：</text>52160.00</span>
                            <span class="col-sm-6"><text style="color: #4CB1CF;">购车返积分：</text>52160.00</span>
                            <span class="col-sm-6"><text style="color: #4CB1CF;">直接销售奖：</text>52160.00</span>
                        </div>
                        <div class="panel-footer back-footer-blue text-center">
                            总提现金额（未扣税）= 合计：31646533.00
                        </div>
                    </div>
                </div>
                <div style="width: 5%;float: left;text-align: center;"><span style="padding: 80px 0; display: block; font-weight: bold; font-size: 28px;">-</span></div>
                <div style="width: 30%;float: left;">
                    <div class="panel panel-default text-center bg-color-red">
                        <div class="panel-body" style="padding: 45px 15px 27px 15px;">
                            <i class="glyphicon glyphicon-log-out" style="font-size: 25px; color: #F0433D;"></i>
                            <h3>1050.84</h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            扣税：3116.00
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            提现统计图：
                        </div>
                        <div class="panel-body">
                            <div id="container" style="width:auto;height:500px;margin:0 auto"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding: 15px 15px">
                            <span>提现明细（1月）：</span>
                            &lt;!&ndash; <button class="fr" style="">导出</button>&ndash;&gt;
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive corporate_income_day">
                                <table class="table table-striped table-bordered table-hover text-center">
                                    <thead>

                                    <tr>
                                        <th class="text-center">时间</th>
                                        <th class="text-center">用户ID</th>
                                        <th class="text-center">用户姓名</th>
                                        <th class="text-center">银行卡号</th>
                                        <th class="text-center">提现金额</th>
                                        <th class="text-center">扣税</th>
                                        <th class="text-center">应得金额</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2017/8/30</td>
                                            <td>CXH20171</td>
                                            <td>张三</td>
                                            <td>622712364958133</td>
                                            <td>2000.00</td>
                                            <td>100.00</td>
                                            <td>1900.00</td>
                                        </tr>
                                        <tr>
                                            <td>2017/8/29</td>
                                            <td>CXH20171</td>
                                            <td>张三</td>
                                            <td>622712364958133</td>
                                            <td>2000.00</td>
                                            <td>100.00</td>
                                            <td>1900.00</td>
                                        </tr>
                                        <tr>
                                            <td>2017/8/28</td>
                                            <td>CXH20171</td>
                                            <td>张三</td>
                                            <td>622712364958133</td>
                                            <td>2000.00</td>
                                            <td>100.00</td>
                                            <td>1900.00</td>
                                        </tr>
                                        <tr>
                                            <td>2017/8/27</td>
                                            <td>CXH20171</td>
                                            <td>张三</td>
                                            <td>622712364958133</td>
                                            <td>2000.00</td>
                                            <td>100.00</td>
                                            <td>1900.00</td>
                                        </tr>
                                        <tr>
                                            <td>2017/8/26</td>
                                            <td>CXH20171</td>
                                            <td>张三</td>
                                            <td>622712364958133</td>
                                            <td>2000.00</td>
                                            <td>100.00</td>
                                            <td>1900.00</td>
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
                                <table class="table table-bordered">
                                    <tfoot>
                                    <tr class="danger">
                                        <th class="text-center">合计：</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                        <th class="text-center">315313.00</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>-->
</div>
<script type="text/javascript">

    $(function () {
        /*$(".chart-search").click(function () {
            var date="";
            if($(".date1").val()==""){
                alert("请选择查询开始时间！")
            }else {
                if($(".date2").val()==""){
                    date=$(".date1").val();
                }else {
                    date=$(".date1").val()+"-"+$(".date2").val();
                }
            }
        });*/
        function show(){
            var mydate = new Date();
            var str = "" + mydate.getFullYear() + "年";
            /*str += (mydate.getMonth()+1) + "/";
             str += mydate.getDate();*/
            return str;
        }
        $('#container').highcharts({
            chart: {
            },
            title: {
                text: '提现统计图（'+show()+'）'
            },
            //x轴
            xAxis: {
                categories: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
            },
            yAxis: {
                title:{
                    text:"单位（万）"
                }
            },
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = ''+
                            this.point.name +': '+ this.y +' 万';
                    } else {
                        s = ''+
                            this.x  +': '+ this.y+' 万';
                    }
                    return s;
                }
            },
            labels: {

            }, series: [{
                type: 'column',
                name: '提现积分',
                data: [50,80,120,30,120,30,120,30,120,30,120,30]
            }/*, {
             type: 'column',
             name: '等级提升',
             data: [20,15,80,30,60]
             },{
             type: 'column',
             name: '团购收入',
             data: [20,15,120,30,60]
             }, {
             type: 'column',
             name: '按揭收入',
             data: [20,15,80,30,60]
             }*/]
        });
    });
</script>
</body>
</html>