<?php
class ListAction extends BaseAction{
	//提现明细
	public function txmx(){
		import('ORG.Util.Page');
		$data['user_id']=$_SESSION['id'];
		$count=M('withdraw')->where($data)->count();
		$Page = new Page($count,8);// 实例化分页类 传入总记录数
   	    $show = $Page->show();

		$info = M('withdraw')->where($data)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		$this->assign("page",$show);
		$this->assign("info",$info);
		$this->display('txmx');
	}
	//现金明细
	public function xjmx(){
		import('ORG.Util.Page');
		$data['uid']=$_SESSION['id'];
		$count=M('ulist')->where($data)->count();
		$Page = new Page($count,8);// 实例化分页类 传入总记录数
   	    $show = $Page->show();

		$info = M('ulist')->where($data)->order('datetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		$this->assign("page",$show);
		$this->assign("info",$info);
		$this->display('xjmx');
	}
/*	public function ajaxr(){
		if ($_POST) {
			$wid=$_POST['wid'];
			echo $wid;
		}
	}*/
	//现金互转
	public function xjhz(){
		//互转记录
		import('ORG.Util.Page');
		$data['uid']=$_SESSION['id'];
		$data['act']=现金互转;
		$count=M('ulist')->where($data)->count();
		$Page = new Page($count,8);// 实例化分页类 传入总记录数
   	    $show = $Page->show();
		$info=M('ulist')->where($data)->order('datetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$paypwd=$info['0']['paypwd'];
		$datt['userid']=$_POST['Receive_ID'];
		$datt['name']=$_POST['Receive_name'];
		$rea=M('cxh_users')->where($datt)->select();
		$atta['id']=$_SESSION['id'];
		$infoo=M('cxh_users')->where($atta)->find();
	/*	var_dump($infoo);exit;*/
		//现金互转
		if ($_POST) {

			$datt['userid']=$_POST['Receive_ID'];
			$datt['name']=$_POST['Receive_name'];
			//接收人信息查询
			
			$rea=M('cxh_users')->where($datt)->find();

			if ($_POST['paypwd']!=$infoo['paypwd']) {
    			echo "<script> alert('支付密码错误！'); </script>"; 
			}elseif(!$rea){
				echo "<script> alert('接收人账号信息有误，请更正！'); </script>"; 
			}else{
				$daaa['cash_points']=$infoo['cash_points']-$_POST['Transfer_amount'];
				//扣除本身的现金积分
				$dataa['id']=$_SESSION['id'];
				$ree=M('cxh_users')->where($dataa)->save($daaa);
			/*	var_dump($dataa);
				echo M()->getlastsql();*/
				//添加到接收人账户
				$ddd['userid']=$_POST['Receive_ID'];
				$dddd['cash_points']=$rea['cash_points']+$_POST['Transfer_amount'];
			
				$reaa=M('cxh_users')->where($ddd)->save($dddd);
		/*		echo M()->getlastsql();exit;*/
				//添加到ulist表
				$taaa['money']=$_POST['Transfer_amount'];
				$taaa['name']=$_POST['Receive_name'];
				$taaa['balance']=$infoo



				['cash_points']-$_POST['Transfer_amount'];
				$taaa['act']='现金互转';
				$taaa['uid']=$_SESSION['id'];
				$taaa['cid']=$_POST['Receive_ID'];
				$taaa['remark']=$_POST['Remarks'];
				$raaa=M('ulist')->add($taaa);
				//接收人记录表
				$jinfo['id']=substr($_POST['Receive_ID'],7);
				$jinfoo=M('cxh_users')->where($jinfo)->find();
				$jpay=$jinfoo['pay_points'];
				$jinff['id']=$_SESSION['id'];

				$idd=M('cxh_users')->where($jinff)->getField('name');

				$tas['balance']=$japy+$_POST['Transfer_amount'];
				$tas['money']=$_POST['Transfer_amount'];			
				$tas['act']="来自{$idd}的现金互转";
				$tas['cid']='CXH2017'.$_SESSION['id'];
				$tas['uid']=substr($_POST['Receive_ID'],7);
				$tas['remark']=$_POST['Remarks'];
				$raaaa=M('ulist')->add($tas);
			$url4=U("List/xjhz");
    			echo "<script> alert('转账成功！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url4'>"; 
				
			}
			
		}





		$this->assign("page",$show);
		$this->assign("info",$info);
		$this->assign("infoo",$infoo);
		$this->display('xjhz');
	}
	public function get_aname(){
		if ($_POST) {
			$id['userid']=$_POST['v'];		
			$names=M('cxh_users')->where($id)->find();
	
			$name=$names['name'];
			$this->ajaxReturn($name);
		}
	}
	
}