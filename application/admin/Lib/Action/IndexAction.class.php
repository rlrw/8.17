<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/24
 * Time: 9:26
 */
class IndexAction extends WebAction{
    public function index(){
        $this->display();
    }

    public function add_client(){
            $service=M('service')->select();
            $this->assign("service",$service);
    	$this->display('Add_client');
    }

    public function add(){
    if ($_POST) {
    $info=$_POST;
  /*  print_r($info);exit;*/
    $info['password']=I('password1','','md5');
    $_SESSION['pwd'] =$_POST['password1'];
    if (!$info['pid']) {
    	$info['pid']=CXH20171;
    }
    $raa=M('cxh_users')->add($info);
        $_SESSION['raaaid']=$raa;
    $ss['userid']='CXH2017'.$raa;
    $ss['user_id']=$raa;
    $ss1['id']=$raa;
    M('cxh_users')->where($ss1)->save($ss);
    }
    		if ($info['pid']) {
    			
    		//添加到LIST表中
    		$tta['uid']=substr($info['pid'],7);
    		$tta['cid']='CXH2017'.$raa;
    		$tta['money']=$_POST['lv'];
            $tta['name']=$_POST['name'];
    		
    		$tta['act']=后台添加;
    		M('ulist')->add($tta);
    	
    		//添加到分销表
    	
    		$taa['uid']=$raa;
    		$te['id']=substr($info['pid'],7);
    		$taa['pid']=substr($info['pid'],7);
    		$taa['name']=$info['name'];
    	
    		if ($info['lv']==3000) {
    			$taa['lv']=会员;
    		}else{
    			$taa['lv']=VIP经销商;
    		}
    		$bb['id']=$raa;
    		//新用户信息
    		$tt=M('cxh_users')->where($bb)->find();
    		$taa['reg_time']=$tt['reg_time'];
    		$taa['userid']=$tt['userid'];
    		$raa=M('fx_user')->add($taa);
            //收益积分表 直推收益
            if ($taa['pid']) {
             
            $aa['userid']=$info['pid'];
            $points=M('cxh_users')->where($aa)->find();
            if ($points['lv']==20000) {
                $a=$tt['lv']*0.2;
            }else{
                $a=$tt['lv']*0.1;  
            }
            $arr=array(
                'uid'=>substr($info['pid'],6),
                'status'=>1,
                'money'=>$a,
                'tax'=>$a*0.05,
                'no_points'=>$a*0.1,
                'pay_points'=>$a*0.85,
                'sum_pay'=>$points['pay_points']+$a*0.85
                );
            $rrr=M('pay_info')->add($arr);}else{
                $rrr=1;
            }

            $aarr=array(
                'pay_points'=>$points['pay_points']+$a*0.85,
                'no_points'=>$a*0.1 +$points['no_points']
                );
            //增加自身的收益积分
            $sr=M('cxh_users')->where($te)->save($aarr);
     
            //间推收益
            $aab['uid']=substr($info['pid'],7);
            $jinfo=M('fx_user')->where($aab)->find();
            $jid['id']=$jinfo['pid'];

            if ($jid['id']!=0) {    
            $jjinfo=M('cxh_users')->where($jid)->find();
            //开始
            if ($jjinfo['lv']==20000) {
                $j=$tt['lv']*0.1;           
            $jarr=array(
                'uid'=>$jinfo['pid'],
                'money'=>$j,
                'tax'=>$j*0.05,
                'status'=>2,
                'no_points'=>$j*0.1,
                'pay_points'=>$j*0.85,
                'sum_pay'=>$jjinfo['pay_points']+$j*0.85
                );
            $rrr=M('pay_info')->add($jarr);
            $jaarr=array(
                'pay_points'=>$jjinfo['pay_points']+$j*0.85,
                'no_points'=>$j*0.1 +$jjinfo['no_points']
                );
            //增加自身的收益积分
            $sr=M('cxh_users')->where($jid)->save($jaarr);
            }  }

            //处理
    		if (!$sr) {
    			$url4=U("Index/index");
    			echo "<script> alert('注册失败！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url4'>"; 
    		}else{
    		
    		//注册成功
    		$url3=U("Index/child");
    			echo "<script> alert('注册成功！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url3'>"; 

    	}}
    }
      public function child(){
    	if ($_GET) {
    		$dataa['id']=$_SESSION['raaaid'];
    		$info=M('cxh_users')->where($dataa)->find();
    		$info['password2']=$_SESSION['pwd'];
    	/*	echo M()->getlastsql();
    		var_dump($info);*/
    		$this->assign("info",$info);
    	$this->display('child');
    }}


    //参数设置页面
    public function show_basics(){
        $bank_list=M("bank")->select();
        $user=M("param")->select();
        $this->assign("bank_list",$bank_list);
        $this->assign("user",$user);
        $this->display("index/Basics_setting");
    }
    //添加银行
    public function add_basics(){
        $data=I("post.");
        $result=M("param")->add($data);
        if($result){
             $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }

    }
    //删除银行
    public function del_basics(){
        $id=I("post.nid");
        $result=M("param")->where("b_id=$id")->delete();
        if($result){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }

    }
    //用户等级设置页
    public function show_level_setting(){
        $level_list=M("level")->select();
        $this->assign("level_list",$level_list);
        $this->display("index/User_level_settings");
    }
    //添加等级
    public function add_level(){
        $data=I('post.');
        $result=M("level")->add($data);
        if($result){
            $url=U("Index/show_level_setting");
            echo "<script> alert('添加成功！'); </script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }else{
            $url=U("Index/show_level_setting");
            echo "<script> alert('添加失败！'); </script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }
    }

    //查询一条用户等级信息
    public function get_level(){
        $id=I("post.id");
        $data=M("level")->where("level_id=$id")->select();
        $this->ajaxReturn($data[0]);
    }

    //修改等级信息
    public function update_level(){
        $arr=array();
        if($_POST){
            $id=I("post.id");
            $arr=array(
                'level_name'=>trim(I('post.name')),
                'demand'=>trim(I('post.ask')),
                'commission'=>trim(I('post.scale')),
                'lower_number'=>trim(I('post.number')),
                'lower_achievement'=>trim(I('post.achievement'))
            );
        }
        $result=M("level")->where("level_id=$id")->save($arr);
        if($result){
            $url=U("Index/show_level_setting");
            echo "<script> alert('修改成功！'); </script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }else{
            $url=U("Index/show_level_setting");
            echo "<script> alert('修改失败！'); </script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }
    }
}