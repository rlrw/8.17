<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/12
 * Time: 16:51
 */
header("Content-type:text/html;charset=utf-8");
class ServiceAction extends Action{
    //服务中心申请页
    public function index(){
        $id=$_SESSION['id'];
        $user=M("agent")->where("new_id=$id")->find();
        $this->assign("user",$user);
        $this->display("service/User_fwzxsq");
    }
    //查询申请历史
    public function record(){
        $id=$_SESSION['id'];
       /* $p=I('get.p')?I('get.p'):1;
        $num=10;
        $start=($p-1)*$num;
        $data=D("Withdraw")->get_withdraw('service',$id,$start,$num);
        $count=D("Withdraw")->get_count('service',$id);
        import("ORG.Util.Page");
        $page=new Page($count,$num);
        $show=$page->show();
        $this->assign('page',$show);*/
        $data=M("service")->where("new_id=$id")->find();
        $this->assign('service',$data);
        $this->assign('user_id',$id);
        $this->display('service/FW_record');
    }
    //获取申请
    public function get_service(){
        $arr=array(
            /*'user_name'=>trim(I('post.grxg_name')),
            'user_number'=>trim(I('post.grxg_ID')),
            'province'=>trim(I('post.province')),
            'city'=>trim(I('post.city')),
            'county'=>trim(I('post.area')),*/
            'service_level'=>trim(I('post.service_level')),
            'area'=>trim(I('post.area')),
            /*'corporate_name'=>trim(I('post.company_name')),
            'corporate_address'=>trim(I('post.company_add')),
            'corporate_phone'=>trim(I('post.company_tell')),
            'license_number'=>trim(I('post.yy_zz_bh')),*/
            'new_id'=>$_SESSION['id'],
            'service_time'=>time()
        );
        $info=array();
        if($_FILES){
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 2097152 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath =  './Uploads/service_images/'.date('Y').date('m').'/';// 设置附件上传目录
            $upload->autoSub =  true;
            $upload->subType =  'custom';
            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
            }else{// 上传成功 获取上传文件信息
                $info =  $upload->getUploadFileInfo();
            }
        }
        $a="";
        $result=M("service")->add($arr);
        foreach($info as $val){
            $a=M("service_images")->add(array('url'=>date('Y').date('m').'/'.$val['savename'],'user_id'=>$_SESSION['id'],'service_id'=>$result));
        }
        if($result && $a){
            $url=U('Service/record')."?id=".I('post.id');
            echo "<script>alert('申请成功!');</script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }else{
            echo "<script>alert('申请失败');history.go(-1)</script>";
        }
    }
    //查询用户是否已经是代理商，不是代理商不能申请服务中心
    public function check_info(){
        $id=I("post.nid");
        $result=M("service")->where("new_id=$id and service_state=1")->select();
        if($result){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }
    //查询用户是否已经申请
    public function check_record(){
        $id=I('post.nid');
        $data=M("service")->where("new_id=$id and service_state<>2")->field("service_state")->find();
        if(!empty($data) && $data['service_state']==0){
            $this->ajaxReturn(1);
        }elseif(!empty($data) && $data['service_state']==1){
            $this->ajaxReturn(2);
        }else{
            $this->ajaxReturn(0);
        }
    }
    public function check_service(){
        $area=trim(I("post.area"));
        $data=M("service")->where("area='".$area."'")->select();
        if($data){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }
    //服务中心管理页
    public function show_service(){
        $id=$_SESSION['id']=16;
        /*echo "<pre>";
        print_r($data);
        die();*/
        $userid=I('get.userid');
        $name=I('get.user_name');
        $state=I('get.state');
        $level=I('get.level');
        $st=strtotime(I('get.st'));
        $lt=strtotime(I('get.lt'));
        $where=array();
        if($userid){
            $where['userid']=['like','%'.$userid.'%'];
        }
        if($name){
            $where['name']=['like','%'.$name.'%'];
        }
        if($state){
            $where['lv']=['eq',$state];
        }
        if($level){
            $where['dls_lv']=['eq',$level];
        }
        if($st!=""&&$lt!=""){
            if($st<$lt){
                $where['reg_time']=['between',"$st,$lt"];
            }else{
                echo "<script>alert('搜索时间有误！');</script>";
                die();
            }
        }elseif($st!=""&&$lt==""){
            $where['reg_time']=["EGT",$st];
        }elseif($st==""&&$lt!=""){
            $where['reg_time']=["ELT",$lt];
        }
        $p=I('get.p')?I('get.p'):1;
        $num=5;
        $start=($p-1)*$num;
        import("ORG.Util.Page");

        //$arr=$this->get_pid($id);
        //$where['id']=["IN",$arr];
       $count=D("Service")->get_count($where,$id);
       $data=D("Service")->get_children($where,$start,$num,$id);

        $page=new Page($count,$num);
        $show=$page->show();
        foreach($where as $key=>$val){
            $page->parameter.="$key=".urlencode($val)."&";
        }
        /*echo "<pre>";
        print_r($data);
        die();*/
        $this->assign('page',$show);
        $this->assign("data",$data);
        $this->display("service/fwzx_gl");
    }
    //递归查询所有下级的id
    public function get_pid($id){
        $data=array();
        $r=M('fx_user')->where('pid='.$id)->field('uid,pid')->select();
        foreach($r as $k=>$v){
            $data[]=$v['uid'];
            $new=$this->get_pid($v['uid']);
            if(!empty($new)){
                foreach($new as $key=>$val){
                    $data[]=$val;
                }
            }
        }
        return $data;
    }
    //查询其中一个下级的上级信息
    public function get_parent(){
        $id=I("post.id");
        $user=M("cxh_users")->where("id=$id")->field("name,userid,phone,lv,dls_lv,card,fwzx,province,city,county")->find();
        $pid=M("fx_user")->where("uid=$id")->field("pid")->find();
        $puser=M("cxh_users")->where("id=".$pid['pid'])->field("userid as puserid,name as pname")->find();
        array_push($user,$puser);
        $this->ajaxReturn($user);
    }
}