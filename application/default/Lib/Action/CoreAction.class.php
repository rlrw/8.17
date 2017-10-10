<?php 

class CoreAction extends BaseAction{
	public function index(){
		$data['id']=$_SESSION['id'];
		$user=M('cxh_users')->where($data)->find();
		$this->assign("user",$user);
		$this->display();
	}
	public function add(){
		$info=$_POST;
		$dd['id']=$_SESSION['id'];
		$re=M('cxh_users')->where($dd)->find();
		if ($re['paypwd']!=$info['paypwd']) {
			$url=U("Core/index");
    			echo "<script> alert('二级密码错误！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
		}else{
		
		$data['phone']=$info['phone'];
		$data['bank']=$info['new_Bank'].$info['new_Bank_zh'];
		$data['bankcard']=$info['bankcard'];
		$res=M('cxh_users')->where($dd)->save($data);
		if (!$res) {
			$url=U("Core/index");
    			echo "<script> alert('修改失败！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
		}else{
			$url=U("Core/index");
    			echo "<script> alert('修改成功！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
		}

	
	}}
	public function update(){
		$data['id']=$_SESSION['id'];
		$user=M('cxh_users')->where($data)->find();
		$this->assign("user",$user);
		$this->display('update');
	}

	public function up(){
		$data['id']=$_SESSION['id'];
		$user=M('cxh_users')->where($data)->find();
		$paypwd=$user['paypwd'];
		$pwd=md5($_POST['mm']);
		
		if ($pwd==$user['password']) {
			$date['password']=md5($_POST['mmxg_new']);
			$rr=M('cxh_users')->where($data)->save($date);

			$url1=U("Core/update");
    			echo "<script> alert('修改成功！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url1'>"; 
		}elseif ($_POST['paypwd']==$paypwd) {
			$datt['paypwd']=$_POST['ejmm_new'];
			$rer=M('cxh_users')->where($data)->save($datt);
			$url1=U("Core/update");
    			echo "<script> alert('修改成功！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url1'>"; 
		}else{
			$url1=U("Core/update");
    			echo "<script> alert('密码错误，修改失败！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url1'>"; 
		}

	}
	//会员升级
	public function hysj(){
		$data['id']=$_SESSION['id'];
		$user=M('cxh_users')->where($data)->find();
		if ($user['lv']==3000) {
			$user['lv1']='会员';
		}else{
			$user['lv1']='VIP经销商';
		}
		$this->assign("user",$user);
		$this->display('hysj');
	}
	//会员升级流程
	public function upgrade(){
		$dataa['id']=$_SESSION['id'];
		$info=M('cxh_users')->where($dataa)->find();

		if ($_POST['hysj_paypwd']==$info['paypwd']) {
		
			$data['lv']=20000;
			$data['cash_points']=$_POST['hysj_dqxjjf']-17000;
			$data['user_money']=$info['user_money']+17000;
		/*	var_dump($_POST);exit;*/
			$re=M('cxh_users')->where($dataa)->save($data);
			$data1['lv']=20000;
			$dataa1['uid']=$_SESSION['id'];
			M('fx_user')->where($dataa1)->save($data1);

			if ($re) {
				$dadd=array(
					'money'=>17000,
					'act'=>"会员升级",
					'uid'=>$_SESSION['id'],
					'name'=>$_SESSION['name'],
					'balance'=>$info['cash_points']-17000,
				);
				M('ulist')->add($dadd);
				//上级的直推收益
				$pin['uid']=$_SESSION['id'];
				$pid=M('fx_user')->where($pin)->getField('pid');
				$pinfo=M('fx_user')->where($pin)->find();
				$pins['id']=$pid;
				$spinfo=M('cxh_users')->where($pins)->find();
				if ($pid) {
  //直推
				$a=3400;
				$arr=array(
                'uid'=>$pid,
                'money'=>$a,
                'tax'=>$a*0.05,
                'no_points'=>$a*0.1,
                'status'=>1,
                'pay_points'=>$a*0.85,
                'sum_pay'=>$spinfo['pay_points']+$a*0.85
                );
            $rrr=M('pay_info')->add($arr);
            $aarr=array(
                'pay_points'=>$spinfo['pay_points']+$a*0.85,
                'no_points'=>$a*0.1 +$spinfo['no_points']
                );
            //增加自身的收益积分
            $syda['id']=$pid;
            $sr=M('cxh_users')->where($syda)->save($aarr);
        /*    echo $spinfo['pay_points'];
            echo "<hr>";
            echo $a*0.85;

           echo  M()->getlastsql();exit;*/
     //间推
				$ppin['uid']=$pid;
				$ppid=M('fx_user')->where($ppin)->getField('pid');
				$ppins['uid']=$pid;
				$pplv=M('fx_user')->where($ppins)->getField('lv');
				$ppinfo=M('fx_user')->where($ppins)->find();
				$ppinss['id']=$ppid;
				$sppinfo=M('cxh_users')->where($ppinss)->find();

				/*print_r($pplv);echo"<hr>";
				echo M()->getlastsql();exit;*/

				if ($pplv==20000) {
                $j=1700;           
            $jarr=array(
                'uid'=>$ppid,
                'money'=>$j,
                'tax'=>$j*0.05,
                'no_points'=>$j*0.1,
                'pay_points'=>$j*0.85,
                'status'=>2,
                'sum_pay'=>$sppinfo['pay_points']+$j*0.85
                );
            $rrrr=M('pay_info')->add($jarr);
   
            $jaarr=array(
                'pay_points'=>$sppinfo['pay_points']+$j*0.85,
                'no_points'=>$j*0.1 +$sppinfo['no_points']
                );
       /* echo M()->getlastsql();exit;*/
            //增加自身的收益积分
            $sydaa['id']=$ppid;
            $srr=M('cxh_users')->where($sydaa)->save($jaarr);
            }}

   //增加父级的营业额         
          $pids=get_pids($_SESSION['id']);        
          //拼接自身的ID
          $pp=explode(',', $pids);
          $where['id']=array('in',$pp);
          $act5=M('cxh_users')->where($where)->setInc('perf',17000);
          //添加到fx_record
            foreach ($pp as $value) {
            $brr['uid']=$value;
            $brr['money']=17000;
            $act7= M('fx_record')->add($brr);
           
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
               $lv=17000;
              $aa=  pay_infos($lv,$arr_new);



				$url1=U("Index/index");
    			echo "<script> alert('升级成功！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url1'>"; 
			}else{
				$url1=U("Core/hysj");
    			echo "<script> alert('升级失败！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url1'>"; 
			}
			
		}else{
				$url1=U("Core/hysj");
    			echo "<script> alert('密码错误！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url1'>"; 
		}
	}
	//收益转现金
	public function syzxj(){
		$data['id']=$_SESSION['id'];
		$info=M('cxh_users')->where($data)->find();
	/*	var_dump($info);exit;*/
		$this->assign("info",$info);
		$this->display('syzxj');
	}
	public function syzxjup(){
			$url=U("Core/syzxj");
				$data['id']=$_SESSION['id'];
				$info=M('cxh_users')->where($data)->find();
				$paypwd=$info['paypwd'];
		/*		var_dump($_POST['pay_points'],$_POST['Transfer_amount']);exit;*/
				if($_POST['rj_Password']!=$paypwd){
			echo "<script> alert('密码错误！'); </script>"; 
			echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
		}
		elseif ($_POST['pay_points']<$_POST['Transfer_amount']) {
			echo "<script> alert('余额不足！'); </script>"; 
			echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
		}else{
			$daa['cash_points']=$_POST['cash_points']+$_POST['Transfer_amount'];			
			$daa['pay_points']=$_POST['pay_points']-$_POST['Transfer_amount'];
			$re=M('cxh_users')->where($data)->save($daa);
			//添加到ulist表中
				$taaa['money']=$_POST['Transfer_amount'];
				$taaa['act']='收益转现金';
				$taaa['uid']=$_SESSION['id'];
				$taaa['cid']=$_SESSION['id'];
				$taaa['balance']=$_POST['cash_points']+$_POST['Transfer_amount'];
				
			$reeaa=M('ulist')->add($taaa);
		
			if (!$re) {
				echo "<script> alert('提交失败！'); </script>"; 
				echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
			}else{
				echo "<script> alert('提交成功！'); </script>"; 
				echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
			}
		}

	}
	//我的订单
	public function mydd(){
		$this->display('mydd');
	}

	//收益明细
		public function symx(){
			$dat1['uid']=$_SESSION['id'];
			/*$inf=M('pay_info')->where($dat1)->select();*/
		
			import('ORG.Util.Page');

		$count=M('pay_info')->where($dat1)->count();
		$Page = new Page($count,5);// 实例化分页类 传入总记录数
   	    $show = $Page->show();

		$inf = M('pay_info')->where($dat1)->order('datetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();


		$this->assign("page",$show);
		$this->assign("inf",$inf);
		$this->display('symx');
	}
	//返款明细
	public function fkmx(){
			$dat1['user_id']=$_SESSION['id'];
			/*$inf=M('pay_info')->where($dat1)->select();*/
		
			import('ORG.Util.Page');

		$count=M('back_buy')->where($dat1)->count();
		$Page = new Page($count,5);// 实例化分页类 传入总记录数
   	    $show = $Page->show();

		$inf = M('back_buy')->where($dat1)->order('back_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();


		$this->assign("page",$show);
		$this->assign("inf",$inf);
		$this->display('fkmx');
	}
	//现金充值
	public function xjcz(){
		$this->display('xjcz');
	}
	//我的推广
		public function mytg(){
			//头部
			$data['id']=$_SESSION['id'];
			$ttaa['pid']=$_SESSION['id'];
			$aa['pid']=$_SESSION['id'];


			$user=M('cxh_users')->where($data)->find();
			$count=M('fx_user')->where($ttaa)->count();

			$uus=M('fx_user')->where($aa)->field('uid')->select();
			foreach ($uus as $key => $value) {
				$aaa[]=$value['uid'];
			}
			$bb=join(',',$aaa);
		/*	var_dump($bb);exit;*/
			$co['pid']=array('in',$bb);
	/*		$co['status']=1;*/
			$uuss=M('fx_user')->where($co)->count();
		



			if ($user['lv']==3000) {
			$user['lv1']='会员';
		}else{
			$user['lv1']='VIP经销商';
		}
			//循环1
			$dad['pid']=$_SESSION['id'];
			$daa=M('fx_user')->select();

			if ($daa) {
			$ta['id']=$daa['uid'];
			
		
			//递归
			  $dataa=$daa;
					function getTree($dataa, $pId){
						$tree = '';
						foreach($dataa as $k => $v)
						{
						  if($v['pid'] == $pId)
						  {         
						   $v['ppid'] = getTree($dataa, $v['uid']);
						   $tree[] = $v;				
						  }
						}
						return $tree;
					}
				$tree = getTree($daa, $_SESSION['id']);
				}

		$this->assign("tree",$tree);
		$this->assign("count",$count);
		$this->assign("user",$user);
		$this->assign("uuss",$uuss);
		$this->display('mytg');
	}

}














