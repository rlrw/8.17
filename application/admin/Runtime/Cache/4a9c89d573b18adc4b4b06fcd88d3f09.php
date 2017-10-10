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
    <h1  class="text-center">公司总报表</h1>
    <div class="content_menu_search form-inline">
        <div class="form-group">
            <label>时间：</label>
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
                <div class="col-md-12" style="border-bottom: 6px solid #ddd; margin-bottom: 25px;" ></div>
                <h1 class="page-header">
                    时间段数据：
                </h1>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered table-hover text-center">
                    <thead>
                    <tr>
                        <th class="text-center">汇入总计</th>
                        <th class="text-center">提现总计</th>
                        <th class="text-center">转化总计</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2161651.00</td>
                        <td>2.3654万</td>
                        <td>0.3304万</td>
                    </tr>
                    <tr>
                        <td colspan="3">真实会员人数（激活，未激活）：会员（0,0）VIP经销商（0,0）代理商（0）</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12" style="border-bottom: 6px solid #ddd; margin-bottom: 25px;" ></div>
                <h1 class="page-header">
                    公司总数据：
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default  no-boder bg-color-blue">
                       <!-- <div class="panel-footer back-footer-brown text-center">
                            可用积分
                        </div>-->
                        <div class="panel-body" style=" font-size: 18px">
                            <span class="col-sm-4" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">现金积分：</text>52160.00</span>
                            <span class="col-sm-4" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">收益积分：</text>52160.00</span>
                            <span class="col-sm-4" style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee"><text style="color: #4CB1CF;">重消积分：</text>52160.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default text-center bg-color-green">
                        <div class="panel-body">
                            <i class="glyphicon glyphicon-bell" style="font-size: 25px;"></i>
                            <h3 style="font-size: 18px;color: #5cb85c"><span>汇入总计：</span>1050.84万</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default text-center no-boder bg-color-blue">
                        <div class="panel-body">
                            <i class="glyphicon glyphicon-hand-up" style="font-size: 25px;"></i>
                            <h3 style="font-size: 18px; color: #4CB1CF;"><span>提现总计：</span>52160.00</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="glyphicon glyphicon-link" style="font-size: 25px; "></i>
                            <h3 style="font-size: 18px;color: #F0433D;"><span>转化总计：</span>15823.00</h3>
                        </div>
                    </div>
                </div>
            <div class="row" style="margin: 20px 0 20px 0">
                <table class="table table-striped table-bordered table-hover text-center">
                    <tbody>
                        <tr class="info">
                            <td colspan="3">真实会员人数（激活，未激活）：会员（0,0）VIP经销商（0,0）代理商（0）</td>
                        </tr>
                    </tbody>
                </table>
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
            console.log(date);
       });*/
        function show(){
            var mydate = new Date();
            var str = "" + mydate.getFullYear()+"年";
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
                name: '汇入总计',
                data: [50,80,50,30,80,30,120,30,50,40,70,30]
            }, {
                type: 'column',
                name: '提现总计',
                data: [50,80,60,30,50,30,110,30,20,50,80,30]
            },{
                type: 'column',
                name: '转化总计',
                data: [50,80,70,30,60,30,100,30,80,60,90,30]
            }/*, {
                type: 'column',
                name: '按揭收入',
                data: [20,15,80,30,60]
            }*/]
        });
    });
</script>
</body>
</html>