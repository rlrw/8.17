<?php

class IndexAction extends BaseAction {
    public function index(){
    	if (!$_SESSION['id']) {
    		$url=U("Login/index");
    	
			echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
    	}else{
    	$date['id']=$_SESSION['id'];
    	$data=M('cxh_users')->where($date)->join("level on cxh_users.dls_lv=level.level_id")->find();
    
        //如果已经申请并通过了代理商 查询子账号
         $sid=$_SESSION['id'];
         $cid=M("relevance")->where("uid=$sid")->select();
            $child_list=array();
            foreach($cid as $v){
                $child_list[]=M("cxh_users")->where("id=".$v['bid'])->field("id,userid")->find();
            }
         $fid=M("relevance a")->join("cxh_users b on a.uid=b.id")->where("bid=$sid")->field("id,userid")->find();

    	if ($data['lv']==3000) {
			$data['lv1']='会员';
		}else{
			$data['lv1']='VIP经销商';
		}
  /*  	echo M()->getlastsql();
    	var_dump($data);exit;*/
            $dad['pid']=$_SESSION['id'];
            $daa=M('fx_user')->field('uid,pid')->select();


	
			$where['uid']=$_SESSION['id'];
      $nowtime=date("Y-m-d ");
      $where['datetime']=["EGT",$nowtime];

      $where1['user_id']=$_SESSION['id'];
      $nowtime=strtotime(date("Y-m-d"));
      $where1['time']=["EGT",$nowtime];
      $where1['withdraw_state']=1;

        //今日销售总额
             $perf=M('fx_record')->where($where)->sum("money");
        //昨日销售总额
            $tperf=$data['perf']-$perf;

  //收益积分
          //间推直推
          $pay= get_pays('1','pay_points')+get_pays('2','pay_points');
          //每月分红
           $fpay= get_pays('0','pay_points');
          //返点
          $fdpay=get_pays('3','pay_points');
          //代理商返款
          $where6['user_id']=$_SESSION['id'];
          $nowtime=strtotime(date("Y-m-d"));
          $where6['back_time']=["EGT",$nowtime];
          $where6['status']=1;
          $dlspay=M('back_buy')->where($where6)->sum("need_back");
          //购车返款
          $where2['user_id']=$_SESSION['id'];
          $nowtime=strtotime(date("Y-m-d"));
          $where2['back_time']=["EGT",$nowtime];
          $where2['status']=0;
          $gpay=M('back_buy')->where($where2)->sum("need_back");
          //提现支出
          $total=M('withdraw')->where($where1)->sum("total");
  //现金积分
          //收益转现金
         $where3['uid']=$_SESSION['id'];
         $nowtime=date("Y-m-d ");
         $where3['datetime']=["EGT",$nowtime];
         $where3['act']='收益转现金';
         $money=M('ulist')->where($where3)->sum("money");
         //互转收入
         $wheresr['uid']=$_SESSION['id'];
         $nowtime=date("Y-m-d ");
         $wheresr['datetime']=["EGT",$nowtime];
         $wheresr['act']= ['like','%'.'来自%'.'%'];
          //汇款收入
           $whereh['user_id']=$_SESSION['id'];
        $nowtime=strtotime(date("Y-m-d"));
         $whereh['time']=["EGT",$nowtime];
         $whereh['remit_state']=1;
        $hksr=M('remittance')->where($whereh)->sum("remit_total");
          
      
         $hzsr=M('ulist')->where($wheresr)->sum("money");
         //互转支出
         $whereh['uid']=$_SESSION['id'];
         $nowtime=date("Y-m-d ");
         $whereh['datetime']=["EGT",$nowtime];
         $whereh['act']='现金互转';
         $hzzc=M('ulist')->where($whereh)->sum("money");

        //会员升级
         $wheresj['uid']=$_SESSION['id'];
         $nowtime=date("Y-m-d ");
         $wheresj['datetime']=["EGT",$nowtime];
         $wheresj['act']='会员升级';
         $sjmoney=M('ulist')->where($wheresj)->sum("money");

         //服务中心返款
          $fwzxpay= get_pays('4','pay_points');
 //昨日收益
         $tpay=$data['pay_points']-($pay+$fwzxpay+$dlspay+$fpay+$fdpay+$gpay-$total-$money);
         //定金加盟
         $where4['uid']=$_SESSION['id'];
         $nowtime=date("Y-m-d ");
         $where4['datetime']=["EGT",$nowtime];
         $where4['act']='定金加盟';
         $djpay=M('ulist')->where($where4)->sum("money");
         //昨日现金
         $tcash=$data['cash_points']-($money+$hzsr+$hksr-$djpay-$hzzc-$sjmoney);
//重消
         //间推直推
          $nopay= get_pays('1','no_points')+get_pays('2','no_points');
          //每月分红
           $nofpay= get_pays('0','no_points');
          //返点
          $nofdpay=get_pays('3','no_points');
          //服务中心
          $nofwzxpay=get_pays('4','no_points');
          $tnopay=$data['no_points']-($nopay+$nofpay+$nofdpay+$nofwzxpay);

          //购物券
          $where5['user_id']=$_SESSION['id'];
          $nowtime=strtotime(date("Y-m-d"));
          $where5['change_time']=["EGT",$nowtime];
         $user_money1= M('cxh_account_log')->where($where5)->sum("user_money");
         $user_money=abs($user_money1);
         $wheres['uid']=$_SESSION['id'];
         $wheres['act']='会员升级';
         $sjshop=M('ulist')->where($wheres)->sum("money");
         $tuser_money=$data['user_money']+$user_money-$sjshop;

         

//统计每个月用户的销售总额
  /*$month=M('fx_record')->query("select sum(money),time from (select uid,money,DATE_FORMAT(datetime,'%y-%c')time from fx_record) as a group by time");*/
   /*          echo M()->getlastsql();
			var_dump($perr,$perr2);exit;*/
      $this->assign("hksr",$hksr);
      $this->assign("sjmoney",$sjmoney);
      $this->assign("hzzc",$hzzc);
      $this->assign("hzsr",$hzsr);
      $this->assign("sjshop",$sjshop);
      $this->assign("nofwzxpay",$nofwzxpay);
      $this->assign("fwzxpay",$fwzxpay);
      $this->assign("dlspay",$dlspay);
      $this->assign("tuser_money",$tuser_money);
      $this->assign("user_money",$user_money);
      $this->assign("tnopay",$tnopay);
      $this->assign("nofdpay",$nofdpay);
      $this->assign("nopay",$nopay);
      $this->assign("nofpay",$nofpay);
      $this->assign("tcash",$tcash);
      $this->assign("djpay",$djpay);
      $this->assign("money",$money);
      $this->assign("total",$total);
      $this->assign("pay",$pay);
      $this->assign("fpay",$fpay);
      $this->assign("gpay",$gpay);
      $this->assign("tpay",$tpay);
      $this->assign("fdpay",$fdpay);
      $this->assign("perf",$perf);
      $this->assign("tperf",$tperf);
    	$this->assign("data",$data);

if ($data['user_type']!=0) {
       $this->display('dls');
     }else{
    $this->assign("child_list",$child_list);
    $this->assign("fid",$fid);
	$this->display();
}
    }

}







    public function changeId(){
        session_unset();
        $_SESSION['id']=I("post.new_id");
        $this->redirect("Index/index");
    }


}