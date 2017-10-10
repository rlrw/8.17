<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/21
 * Time: 9:07
 */

class StatisticsAction extends WebAction{
    public function cash_statement(){
        $data=M("withdraw")->where("withdraw_state=1")->field("sum(total) as total,sum(taxation) as taxation,sum(actual_total) as actual_total")->find();

        /*echo "<pre>";
        print_r($month_total);
        die();*/

       // $this->assign('month_total',$month_total);
        $this->assign('data',$data);
        $this->display();
    }
    public function get_month_total(){
        M("withdraw");
        $sql="select t.month,sum(t.actual_total) as total
from(select FROM_UNIXTIME(withdraw.time,'%m') as month,FROM_UNIXTIME(withdraw.time,'%Y') as myYear,actual_total from withdraw) as t
where t.myYear=YEAR(now())
group by t.month;";
        $result=mysql_query($sql);
        $month_total=array();
        while($row=mysql_fetch_assoc($result)){
            $month_total[]=$row;
        }
        $arr=array();
        for($i=1;$i<=12;$i++){
            foreach($month_total as $v){
                $arr[abs($v['month'])]=$v['total'];
                $arr[$i]=0;
            }
        }
        ksort($arr);
        $this->ajaxReturn($arr);
    }

    public function get_month_list(){
        $month=I("post.month");
        M("withdraw");
        $sql="select sum(t.actual_total) as actual_total,sum(t.total) as total,sum(t.taxation) as taxation ,t.new_time
 from(select FROM_UNIXTIME(withdraw.time,'%m') as month, FROM_UNIXTIME(withdraw.time,'%d') as day,FROM_UNIXTIME(withdraw.time,'%Y') as myYear,actual_total,
total,taxation,time,FROM_UNIXTIME(withdraw.time,'%Y-%m-%d') as new_time
 from withdraw) as t
where t.myYear=YEAR(now()) and t.month=".$month."  group by t.day order by t.time desc";

        $result=mysql_query($sql);
        $month_list=array();
        while($row=mysql_fetch_assoc($result)){
            $month_list[]=$row;
        }
        /*echo "<pre>";
        print_r($month_list);*/
        $this->ajaxReturn($month_list);
    }
}