<?php
include_once("./Db_pdo.class.php");
$DB=new Db_pdo("newcxh","root","root");
$list=$DB->table("buying")->where("buy_total<>0 and buy_state=1 and buy_type=1 and total_points>back_points")->field("total_points,back_points,no_points,buying_id,user_id,ratio")->select();
$arr="";
foreach($list as $key=>$val){
    //每天需要返的积分
    $need_back =sprintf("%.2f",$val['total_points']*$val['ratio']);
    //每天返积分以后剩下的未返积分
    $no_back =$val['no_points']-$need_back;
    //对应的记录id
    $arr[$key]['buying_id']=$val['buying_id'];
    $arr[$key]['user_id']=$val['user_id'];
    $arr[$key]['need_back']=$need_back;
    /*
     * 如果剩下的未返积分比需要返的积分少  直接返完 否则正常返还
     * 或者修改以后的返款金额 小于已返积分
     **/
    if($val['no_points']<$need_back){
        $arr[$key]['no_points']=0;
        $arr[$key]['back_points']=$val['total_points'];
    }else{
        $arr[$key]['no_points']=$no_back;
        $arr[$key]['back_points']=$val['back_points']+$need_back;
    }
}

$result="";
$result1="";
$DB->Begin();
//给每条记录重新保存积分
$no_list=array();
$a="";
foreach($arr as $k=>$v){
    $a= $DB->table('buying')->where("buying_id=".$v['buying_id']." and buy_state=1 and buy_type=1")->field("no_points")->select();
    $no_list[$k]=$a[0]['no_points'];
    if($no_list[$k]!=0){
        $sql="update buying set no_points=".$v['no_points'].",back_points=".$v['back_points']." where buying_id=".$v['buying_id'];
        //$result=$DB->table('buying')->where("buying_id=".$v['buying_id'])->update(array('no_points'=>$v['no_points'],'back_points'=>$v['back_points']));
        $result=$DB->new_query($sql);
        $result1=$DB->table("back_buy")->insert(array('need_back'=>$v['need_back'],'back_time'=>time(),'user_id'=>$v['user_id'],'status'=>0));
        $sql="update cxh_users set pay_points=pay_points+".$v['need_back']." where id=".$v['user_id'];
        $DB->new_query($sql);
    }
}
//查询同一个用户的总积分情况，保存到用户表（user）
$suc="";

if($result){
    $data=$DB->table("buying")->field("sum(total_points) as car_points,sum(back_points) as pocess_points,sum(no_points) as wf_points,user_id")
        ->where("buy_state=1")
        ->group("user_id")->select();
    foreach($data as $val){
        $suc=$DB->table("cxh_users")->where("id=".$val['user_id'])
            ->update(array('car_points'=>$val['car_points'],'pocess_points'=>$val['pocess_points'],'wf_points'=>$val['wf_points']));
    }
}

if($result && $suc && $result1){
    $DB->commit();
}else{
    $DB->rollback();
}


