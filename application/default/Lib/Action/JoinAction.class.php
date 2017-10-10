<?php

class JoinAction extends BaseAction {
    public function index(){

   	$date['id']=$_SESSION['id'];
   	$user=M('cxh_users')->where($date)->find();
    $service=M('service')->where('service_state=1')->select();
/*    print_r($service);exit;*/
   	$user['userid']=$user['userid'];
 /*  	echo $_SESSION['id'];
   	echo M()->getlastsql();
   	var_dump($user);exit;*/
   	$this->assign("user",$user);
    $this->assign("service",$service);
	$this->display();
    }
    public function join(){
          //开启事务
    $model = M();  
    $model->startTrans();  
    $flag=false; 

    	 $points=$_POST['yjr_dqxjjf'];
    	 $lv=$_POST['lv'];    

    	if ($points<$lv) {
    		$url1=U("Join/index");
    			echo "<script> alert('现金积分余额不足！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url1'>"; 
    	}else{
    		$info=$_POST;
    		$_SESSION['pwd'] =$_POST['password1'];
    		$info['password']=I('password1','','md5');
    		$re=M('cxh_users')->add($info);

    		$aa['id']=$re;
    		$tt=M('cxh_users')->where($aa)->find();

    	
    			//注册成功，插入userID
    		$datee['userid']='CXH2017'.$re;
    		$dateee['id']=$re;
            $datee['user_id']=$re;
    		$datee['user_money']=$_POST['lv'];
    		$act1=M('cxh_users')->where($dateee)->save($datee);
    		//减去自身的现金积分
    		$te['id']=$_SESSION['id'];
    		$points=M('cxh_users')->where($te)->find();
    		$poin=$points['cash_points'];
    		$tea['cash_points']= $poin-$_POST['lv'];

    		$rer=M('cxh_users')->where($te)->save($tea);
    		//添加到LIST表中
    		$tta['uid']=$_SESSION['id'];
    		$tta['cid']='CXH2017'.$re;
    		$tta['money']=$_POST['lv'];
            $tta['name']=$_POST['name'];
    		$tta['balance']=$poin-$_POST['lv'];
    		$tta['act']=定金加盟;
    		$act2=M('ulist')->add($tta);
           
    	
    		//添加到分销表
    		$taaaa=M('cxh_users')->where($datee)->find();
    		$taa['uid']=$re;
    		$taa['pid']=$_SESSION['id'];
    		$taa['name']=$tt['name'];
    	    $taa['lv']=$tt['lv'];
    		$taa['reg_time']=$tt['reg_time'];
    		$taa['userid']=$taaaa['userid'];
            $taa['pname']=$_SESSION['name'];
            $taa['puserid']=$_SESSION['userid'];
    		$raa=M('fx_user')->add($taa);
           /*  echo M()->getlastsql();*/
            //收益积分表 直推收益
            
            //直推收益
                $a=$_POST['lv']*0.2;
            $arr=array(
                'uid'=>$_SESSION['id'],
                'money'=>$a,
                'tax'=>$a*0.05,
                'no_points'=>$a*0.1,
                'status'=>1,
                'pay_points'=>$a*0.85,
                'sum_pay'=>$points['pay_points']+$a*0.85
                );
            $rrr=M('pay_info')->add($arr);
            $aarr=array(
                'pay_points'=>$points['pay_points']+$a*0.85,
                'no_points'=>$a*0.1 +$points['no_points']
                );
            //增加自身的收益积分
            $sr=M('cxh_users')->where($te)->save($aarr);
            
            //增加父级的营业额
               
          $pids=get_pids($_SESSION['id']);
         
          //拼接自身的ID
            $pids.=','.$_SESSION['id'];
          $pp=explode(',', $pids);
          $where['id']=array('in',$pp);

          $act5=M('cxh_users')->where($where)->setInc('perf',$_POST['lv']);
              //查看用户是几级经销商
             $infoo['dls_lv']=get_lvss();

             if ($points['user_type']==0) {
              $act6= M('cxh_users')->where($te)->save($infoo);

             }else{
                $act6=2;
             }
            
      
     /*     echo M()->getlastsql();*/
          //添加到fx_record
            foreach ($pp as $value) {
            $brr['uid']=$value;
            $brr['money']=$_POST['lv'];
            $act7= M('fx_record')->add($brr);
           
         }
            
            $aab['uid']=$_SESSION['id'];
            $jinfo=M('fx_user')->where($aab)->find();
            $jid['id']=$jinfo['pid'];
            //增加服务中心的收益积分
            $serv['id']=$_POST['fwzx'];
            $pay=$_POST['lv']*0.03*0.85;
            $nopay=$_POST['lv']*0.03*0.1;
            $ser=M("cxh_users")->where($serv)->setInc('pay_points',$pay);
            M("cxh_users")->where($serv)->setInc('no_points',$nopay);
            $fwinfo=array(
                'uid'=>$_POST['fwzx'],
                'money'=>$_POST['lv']*0.03,
                'tax'=>$_POST['lv']*0.03*0.05,
                'no_points'=>$_POST['lv']*0.03*0.1,
                'pay_points'=>$_POST['lv']*0.03*0.85,
                'status'=>4,
                );
            $act10=M('pay_info')->add($fwinfo);
            //间推收益
            if ($jid['id']!=0) {    
            $jjinfo=M('cxh_users')->where($jid)->find();
            //开始
            if ($jjinfo['lv']==20000) {
                $j=$_POST['lv']*0.1;           
            $jarr=array(
                'uid'=>$jinfo['pid'],
                'money'=>$j,
                'tax'=>$j*0.05,
                'no_points'=>$j*0.1,
                'pay_points'=>$j*0.85,
                'status'=>2,
                'sum_pay'=>$jjinfo['pay_points']+$j*0.85
                );
            $rrrr=M('pay_info')->add($jarr);
    
            $jaarr=array(
                'pay_points'=>$jjinfo['pay_points']+$j*0.85,
                'no_points'=>$j*0.1 +$jjinfo['no_points']
                );
            //增加自身的收益积分
            $srr=M('cxh_users')->where($jid)->save($jaarr);
     
           
            
            }else{
                $srr=1;
                $rrrr=2;
            }  }else{
                 $rrrr=1;
                 $srr=1;
            }

  
    }
    //经销商销售返点
    $iss=get_plv($_SESSION['id']);
            //查询父级星级用户ID
               $arr_wish = getArrayUniqueByKeyss($iss);  
               $arr_new=array_values($arr_wish);
              
               foreach ($arr_new as $key => &$value) {
               $value['jc']=$value['commission']-$arr_new[$key-1]['commission'];              
               }
               //给父级星级经销商返点
               $lv=$_POST['lv'];
              $aa=  pay_infos($lv,$arr_new);
   /*           var_dump($aa,$lv,$arr_new,$iss);exit;*/

   /* var_dump($act1,$rer,$act2,$raa,$sr,$act5,$act7,$ser,$rrr,$srr,$rrrr,$act8,$act9);exit;*/
        if ($act1&&$rer&&$act2&&$raa&&$sr&&$act5&&$act7&&$rrr&&$srr&&$rrrr&&$act10) {
            $flag=true;
        }
    	if ($flag) {
            $model->commit();
            $url3=U("Join/child?id=$re");
                echo "<script> alert('注册成功！'); </script>"; 
                echo "<meta http-equiv='Refresh' content='0;URL=$url3'>"; 
        }else{
            $model->rollback();
            $url4=U("Join/index");
                echo "<script> alert('注册失败！'); </script>"; 
                echo "<meta http-equiv='Refresh' content='0;URL=$url4'>"; 
        }
    }
    public function child(){
    	if ($_GET) {
    		$dataa['id']=$_GET['id'];
    		$info=M('cxh_users')->where($dataa)->join("service on cxh_users.fwzx=service.new_id")->field('cxh_users.*,service.area')->find();
    		$info['password2']=$_SESSION['pwd'];
    	
    		$this->assign("info",$info);
    		$this->display('child');
    	}
    	

    }

}