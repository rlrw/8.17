<?php 
class ListAction extends WebAction{
	public function get_month(){
		  $month=M('pay_info')->query("select sum(pay_points),time from (select uid,pay_points,DATE_FORMAT(datetime,'%c')time from pay_info) as a group by time");
 
 			$mm=array();
         for ($i=1; $i <13 ; $i++) { 
         	foreach ($month as $k => $v) {
         		$mm[$v['time']]=$v['sum(pay_points)'];
         			$mm[$i]=0;
         	}
         }
         ksort($mm);
         $this->ajaxReturn($mm);
	}
	public function get_day(){
		$month=$_POST['month'];
	
	/*	$info=M()->query("select sum(t.pay_points) as pay_points ,sum(t.tax) as tax ,sum(t.no_points) as no_points,t.new_time from( select DATE_FORMAT(datetime,'%c') as month,status, DATE_FORMAT(datetime,'%d') as day,DATE_FORMAT(datetime,'%Y') as myYear,pay_points, tax,money,no_points,DATE_FORMAT(pay_info.datetime,'%Y-%c-%d') as new_time from pay_info ) as t where t.myYear=YEAR(now()) and t.month=9 and status=1 group by t.day order by t.day desc");

		$info1=M()->query("select sum(t.money) as money1,t.new_time
 from( select DATE_FORMAT(datetime,'%c') as month,status, DATE_FORMAT(datetime,'%d') as day,DATE_FORMAT(datetime,'%Y') as myYear,pay_points, tax,money,no_points,DATE_FORMAT(pay_info.datetime,'%Y-%c-%d') as new_time from pay_info ) as t where t.myYear=YEAR(now()) and t.month=".$month." and status=1 group by t.day order by t.day desc");

		$info2=M()->query("select sum(t.money) as money2,t.new_time
 from( select DATE_FORMAT(datetime,'%c') as month,status, DATE_FORMAT(datetime,'%d') as day,DATE_FORMAT(datetime,'%Y') as myYear,pay_points, tax,money,no_points,DATE_FORMAT(pay_info.datetime,'%Y-%c-%d') as new_time from pay_info ) as t where t.myYear=YEAR(now()) and t.month=".$month." and status=2 group by t.day order by t.day desc");

		$info3=M()->query("select sum(t.money) as money3,t.new_time
 from( select DATE_FORMAT(datetime,'%c') as month,status, DATE_FORMAT(datetime,'%d') as day,DATE_FORMAT(datetime,'%Y') as myYear,pay_points, tax,money,no_points,DATE_FORMAT(pay_info.datetime,'%Y-%c-%d') as new_time from pay_info ) as t where t.myYear=YEAR(now()) and t.month=".$month." and status=3 group by t.day order by t.day desc");

		$info4=M()->query("select sum(t.money) as money4,t.new_time
 from( select DATE_FORMAT(datetime,'%c') as month,status, DATE_FORMAT(datetime,'%d') as day,DATE_FORMAT(datetime,'%Y') as myYear,pay_points, tax,money,no_points,DATE_FORMAT(pay_info.datetime,'%Y-%c-%d') as new_time from pay_info ) as t where t.myYear=YEAR(now()) and t.month=".$month." and status=4 group by t.day order by t.day desc");

		$infoo=M()->query("select sum(t.money) as money0,t.new_time
 from( select DATE_FORMAT(datetime,'%c') as month,status, DATE_FORMAT(datetime,'%d') as day,DATE_FORMAT(datetime,'%Y') as myYear,pay_points, tax,money,no_points,DATE_FORMAT(pay_info.datetime,'%Y-%c-%d') as new_time from pay_info ) as t where t.myYear=YEAR(now()) and t.month=".$month." and status=0 group by t.day order by t.day desc");
*/

		$inff=M()->query("select sum(t.pay_points) as pay_points ,sum(t.tax) as tax ,sum(money) as money,sum(t.no_points) as no_points,t.new_time from( select DATE_FORMAT(datetime,'%c') as month,status, DATE_FORMAT(datetime,'%d') as day,DATE_FORMAT(datetime,'%Y') as myYear,pay_points, tax,money,no_points,DATE_FORMAT(pay_info.datetime,'%Y-%c-%d') as new_time from pay_info ) as t where t.myYear=YEAR(now()) and t.month=".$month." and status=1 group by t.day order by t.day desc");

		

		$this->ajaxReturn($inff);
		
	}
	
    public function pay(){   

       $pay_points=M('pay_info')->sum("pay_points");
       $ztpay=M('pay_info')->where('status=1')->sum("money");
       $jtpay=M('pay_info')->where('status=2')->sum("money");
       $jcpay=M('pay_info')->where('status=3')->sum("money");
       $fhpay=M('pay_info')->where('status=0')->sum("money");
       $fwpay=M('pay_info')->where('status=4')->sum("money");
       $zpay=$ztpay+$jtpay+$jcpay+$fhpay+$fwpay;
       $tax=M('pay_info')->sum("tax");
       $nopay=M('pay_info')->sum("no_points");
       $kcpay=$tax+$nopay;

/*print_r($mm);
 print_r($month);exit;*/

       	 $this->assign("zpay",$zpay);
       	 $this->assign("kcpay",$kcpay);
       	 $this->assign("tax",$tax);
       	 $this->assign("nopay",$nopay);
       	 $this->assign("fwpay",$fwpay);
       	 $this->assign("fhpay",$fhpay);
       	 $this->assign("jcpay",$jcpay);
       	 $this->assign("jtpay",$jtpay);
       	 $this->assign("ztpay",$ztpay);
       	 $this->assign("jtpay",$jtpay);
         $this->assign("pay_points",$pay_points);

     $this->display('pay');
    }
    public function user(){ 
    	/*var_dump($_GET);exit;*/
    	$where=array();
      if ($_GET['userid']) {
      	$where['cxh_users.userid']=['like','%'.$_GET['userid'].'%'];
      }
 
      if ($_GET['lv']) {
      	$where['cxh_users.lv']=$_GET['lv'];
      }
      if ($_GET['fwzx']) {
      	$where['cxh_users.fwzx']=$_GET['fwzx'];
      }
      if ($_GET['pid']) {
      	$where['fx_user.pid']=$_GET['pid'];
      }
      $st=$_GET['time1'];
      $lt=$_GET['time2'];
       if($st!=""&&$lt!=""){
            if($st<$lt){
                $where['cxh_users.reg_time']=['between',"$st,$lt"];
            }else{
                echo "<script>alert('搜索时间有误！');history.go(-1)</script>";
                die();
            }
        }elseif($st!=""&&$lt==""){
            $where['cxh_users.reg_time']=["EGT",$st];
        }elseif($st==""&&$lt!=""){
            $where['cxh_users.reg_time']=["ELT",$lt];
        }

    	import('ORG.Util.Page');
    	$count=M('cxh_users')->join('fx_user on cxh_users.id=fx_user.uid')->field('fx_user.pname,fx_user.pid,cxh_users.*')->where($where)->count();
		    	$Page = new Page($count,8);// 实例化分页类 传入总记录数
		   	    $show = $Page->show();

    	$userinfo=M('cxh_users')->join('fx_user on cxh_users.id=fx_user.uid')->field('fx_user.pname,fx_user.puserid,fx_user.pid,cxh_users.*,service.area')->join('service ON cxh_users.fwzx=service.new_id')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('reg_time desc')->select();
    	/*echo M()->getlastsql();
    	var_dump($userinfo);exit;*/
    	$fwzx=M('service')->where('service_state=1')->select();
    	 foreach($where as $key=>$val){
            $page->parameter.="$key=".urlencode($val)."&";
        }
    	$this->assign("fwzx",$fwzx);
    	$this->assign("userinfo",$userinfo);
    	 $this->assign("page",$show);
    	$this->display("user");
    }

    public function djts(){
    	import('ORG.Util.Page');
 		$data['act']='会员升级';
 		$count=M('ulist')->where($data)->count();
 		$Page = new Page($count,8);// 实例化分页类 传入总记录数
		   	    $show = $Page->show();

    	$info=M('ulist')->where($data)->limit($Page->firstRow.','.$Page->listRows)->order('datetime desc')->select();
    	 $this->assign("page",$show);
    	$this->assign("info",$info);
    	$this->display("djts");
    }

}