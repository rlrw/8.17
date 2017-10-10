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
        /*.highcharts-container svg text:last-child{ display: none;}*/
    </style>

<div class="content_menu_fr" style="width: 100%">
    <h1  class="text-center">收益报表</h1>
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
                    总收益：
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
                            总收益（扣税后）
                        </div>
                    </div>
                </div>
                <div style="width: 5%;float: left; text-align: center;"><span style="padding: 80px 0; display: block; font-weight: bold; font-size: 28px;">=</span></div>
                <div style="width: 40%;float: left;">
                    <div class="panel panel-default  no-boder bg-color-blue">
                        <div class="panel-body" style=" font-size: 18px">
                           <span class="col-sm-6" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">直接：</text>52160.00</span>
                            <span class="col-sm-6" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">间接：</text>52160.00</span>
                            <span class="col-sm-6" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">级差：</text>52160.00</span>
                            <span class="col-sm-6" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">分红：</text>52160.00</span>
                            <span class="col-md-12 col-sm-12"><text style="color: #4CB1CF;">服务中心：</text>52160.00</span>
                        </div>
                        <div class="panel-footer back-footer-blue text-center">
                            总收益（未扣税）= 合计：31646533.00
                        </div>
                    </div>
                </div>
                <div style="width: 5%;float: left;text-align: center;"><span style="padding: 80px 0; display: block; font-weight: bold; font-size: 28px;">-</span></div>
                <div style="width: 30%;float: left;">
                    <div class="panel panel-default no-boder bg-color-red">
                        <div class="panel-body" style="font-size: 20px; padding: 40px 15px 19px 15px;">
                            <span class="col-sm-12" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #F0433D;">扣税：</text>52160.00</span>
                            <span class="col-sm-12" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #F0433D;">扣重消：</text>52160.00</span>
                        </div>
                        <div class="panel-footer back-footer-red text-center">
                            扣税 / 重消 = 合计：31646533.00
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            收益积分统计图：
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
                            <span>收益明细（1月）：</span>
                           <!-- <button class="fr" style="">导出</button>-->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive corporate_income_day">
                                <table class="table table-striped table-bordered table-hover text-center">
                                    <thead>
                                    <tr class="info">
                                        <th class="text-center text-primary">时间</th>
                                        <th colspan="6" class="text-center text-primary">产生</th>
                                        <th colspan="2" class="text-center text-primary">扣除</th>
                                        <th class="text-center text-primary">应得</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">直接</th>
                                        <th class="text-center">间接</th>
                                        <th class="text-center">级差</th>
                                        <th class="text-center">每月分红</th>
                                        <th class="text-center">服务中心</th>
                                        <th class="text-center">产生金额</th>
                                        <th class="text-center">扣税</th>
                                        <th class="text-center">扣重消</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2017/8/30</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
                                    </tr>
                                    <tr>
                                        <td>2017/8/29</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
                                    </tr>
                                    <tr>
                                        <td>2017/8/28</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
                                    </tr>
                                    <tr>
                                        <td>2017/8/27</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
                                    </tr>
                                    <tr>
                                        <td>2017/8/26</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
                                    </tr>
                                    <tr>
                                        <td>2017/8/25</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
                                    </tr>
                                    <tr>
                                        <td>2017/8/24</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
                                    </tr>
                                    <tr>
                                        <td>2017/8/23</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
                                    </tr>
                                    <tr>
                                        <td>2017/8/22</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
                                    </tr>
                                    <tr>
                                        <td>2017/8/21</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>2000.00</td>
                                        <td>406.56</td>
                                        <td>8406.56</td>
                                        <td>420.33</td>
                                        <td>840.66</td>
                                        <td>7145.58</td>
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
                text: '收入统计图（'+show()+'）'
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
                name: '收益积分',
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