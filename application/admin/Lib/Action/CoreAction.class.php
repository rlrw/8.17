<?php
class CoreAction extends WebAction{
    public function index(){
      $service=M('service')->where("service_state=1")->select();
      $this->assign("service",$service);
        $this->display();
    }
    	//条件查询
     public function sele(){
     	$where=array();
      if ($_GET['userid']) {
      	$where['cxh_users.userid']=['like','%'.$_GET['userid'].'%'];
      }
      if ($_GET['name']) {
      	$where['cxh_users.name']=['like','%'.$_GET['name'].'%'];
      }
      if ($_GET['fwzx']) {
        $where['cxh_users.fwzx']=$_GET['fwzx'];
      }
      if ($_GET['lv']) {
      	$where['cxh_users.lv']=$_GET['lv'];
      }
      if ($_GET['dls_lv']) {
      	$where['cxh_users.dls_lv']=$_GET['dls_lv'];
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
		$count=M('cxh_users')->where($where)->field('cxh_users.*,fx_user.pname,fx_user.lv,level.level_name')->join('fx_user ON cxh_users.id=fx_user.uid')->join('level ON cxh_users.dls_lv=level.level_id')->count();
		$Page = new Page($count,8);// 实例化分页类 传入总记录数
   	    $show = $Page->show();
        $info=M('cxh_users')->where($where)->field('cxh_users.*,fx_user.pname,fx_user.puserid,fx_user.lv,fx_user.pid,level.level_name,service.area')->join('fx_user ON cxh_users.id=fx_user.uid')->join('level ON cxh_users.dls_lv=level.level_id')->join('service ON cxh_users.fwzx=service.new_id')->limit($Page->firstRow.','.$Page->listRows)->order('cxh_users.reg_time desc')->select();
/*        echo "<pre>";
   		print_r($info);
        echo M()->getlastsql();exit;*/
         foreach($where as $key=>$val){
            $page->parameter.="$key=".urlencode($val)."&";
        }
		 $service=M('service')->where("service_state=1")->select();
		 $this->assign("service",$service);
        $this->assign("info",$info);
        $this->assign("page",$show);
       $this->display('index');

    }
    public function save(){
     
    	if ($_POST) {
    		$where=array();
    		if ($_POST['name']) {
    			$where['name']=$_POST['name'];
    		}
    		if ($_POST['phone']) {
    			$where['phone']=$_POST['phone'];
    		}
    		if ($_POST['card']) {
    			$where['card']=$_POST['card'];
    		}
    		if ($_POST['fwzx']) {
    			$where['fwzx']=$_POST['fwzx'];
    		}
    		if ($_POST['province']) {
    			$where['province']=$_POST['province'];
    		}
    		if ($_POST['city']) {
    			$where['city']=$_POST['city'];
    		}
    		if ($_POST['county']) {
    			$where['county']=$_POST['county'];
    		}
    		$data['id']=$_POST['id'];
    		$ra=M('cxh_users')->where($data)->save($where);

    		if ($ra) {
    			 $url=U('Core/index');
                echo "<script>alert('修改成功');</script>";
                echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
    		}else{
    			echo "<script> alert('修改失败！');history.go(-1) </script>"; 
    		}
    	}
    }
    public function res(){
    	if ($_POST) {
    		$data['id']=$_POST['nid'];
    		$date['status']=$_POST['value'];
    		M('cxh_users')->where($data)->save($date);
    		// echo M()->getlastsql();exit;
    	}
    
    	
    }
    public function change(){
    	if ($_POST) {
    		$dd['id']=$_POST['v'];
    		$tt['password']=md5('666666');
    		$tt['paypwd']=666666;
    		$s=M('cxh_users')->where($dd)->save($tt);
        $this->ajaxReturn($s);
    	
    	}
    }


	public function search(){
		$id=I("post.id");
		$data=M("cxh_users")->join('fx_user on cxh_users.id=fx_user.uid')->field("fx_user.pid,cxh_users.*")->where("cxh_users.id=$id")->find();
   
		$this->ajaxReturn($data);
	}

  
}