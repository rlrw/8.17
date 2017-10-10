<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/12
 * Time: 16:51
 */
header("Content-type:text/html;charset=utf-8");
class AgentAction extends Action{
    public function index(){
        $id=$_SESSION['id']=1;
        $user=D("Withdraw")->get_user($id);
        $this->assign("user",$user);
        $this->display("agent/User_dlssq");
    }
    //查询历史
    public function record(){
        $id=$_SESSION['id'];
        $p=I('get.p')?I('get.p'):1;
        $num=10;
        $start=($p-1)*$num;
        $data=D("Withdraw")->get_withdraw('agent',$id,$start,$num);
        $count=D("Withdraw")->get_count('agent',$id);
        import("ORG.Util.Page");
        $page=new Page($count,$num);
        $show=$page->show();
        $this->assign('page',$show);
        $this->assign('agent',$data);
        $this->assign('user_id',$id);
        $this->display('agent/DL_record');
    }
    //查询通过了审核后分配的新账号
    public function get_new_id(){
        $data=M("cxh_users")->where("id=".I("post.nid"))->field("userid")->find();
        $this->ajaxReturn($data);
    }
    //查询该地区是否已经有人申请过代理商
    public function check_agent(){
        $area=trim(I("post.area"));
        $level=I("post.level");
        $data=M("agent_info")->where("agent_area='".$area."' and agent_level=".$level." and account_state=1")->select();
        if($data){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }

    //保存代理商申请信息
    public function get_agent(){
        $arr=array(
            'user_name'=>trim(I('post.grxg_name')),
            'user_number'=>trim(I('post.grxg_ID')),
            'province'=>trim(I('post.province')),
            'city'=>trim(I('post.city')),
            'county'=>trim(I('post.area')),
            'agent_level'=>trim(I('post.yjr_fwzx')),
            'corporate_name'=>trim(I('post.company_name')),
            'corporate_address'=>trim(I('post.company_add')),
            'corporate_phone'=>trim(I('post.company_tell')),
            'license_number'=>trim(I('post.yy_zz_bh')),
            'user_id'=>$id=$_SESSION['id'],
            'area'=>trim(I('post.province')).trim(I('post.city')).trim(I('post.area')),
            'time'=>time()
        );
        $info=array();
        if($_FILES){
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 2097152 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath =  './Uploads/agent_images/'.date('Y').date('m').'/';// 设置附件上传目录
            $upload->autoSub =  true;
            $upload->subType =  'custom';
            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
            }else{// 上传成功 获取上传文件信息
                $info =  $upload->getUploadFileInfo();
            }
        }
        $a="";
        $result=M("agent")->add($arr);
        foreach($info as $val){
            $a=M("agent_images")->add(array('url'=>date('Y').date('m').'/'.$val['savename'],'user_id'=>$_SESSION['id'],'agent_id'=>$result));
        }
        if($result && $a){
            $url=U('Agent/record');
            echo "<script>alert('申请成功!');</script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }else{
            echo "<script>alert('申请失败');history.go(-1)</script>";
        }
    }
    //查询用户是否已经申请过
    public function check_record(){
        $id=I('post.nid');
        $data=M("agent")->where("user_id=$id and agent_state<>2")->select();
        if($data){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }

    //代理商返款申请
    public function show_agent_back(){
        $id=$_SESSION['id'];
        $data=M("cxh_users")->where("id=$id")->field("name,userid,id")->find();
        $this->assign("user",$data);
        $this->display("agent/dls_fksq");
    }
    public function get_agent_back(){
        $arr=array(
            'user_name'=>I('post.grxg_name'),
            'userid'=>I('post.grxg_ID'),
            'user_id'=>I('post.id'),
            'time'=>time()
        );
        $info=array();
        if($_FILES){
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 2097152 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath =  './Uploads/agent_back_images/'.date('Y').date('m').'/';// 设置附件上传目录
            $upload->autoSub =  true;
            $upload->subType =  'custom';
            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
            }else{// 上传成功 获取上传文件信息
                $info =  $upload->getUploadFileInfo();
            }
        }

        $model=M();
        //启用事务
        $model->startTrans();
        //添加申请记录
        $result=M("back")->add($arr);
        $a="";
        //保存图片
        foreach($info as $val){
            $a=M("agent_back_images")->add(array('image_url'=>date('Y').date('m').'/'.$val['savename'],'back_id'=>$result));
        }
        if($result && $a){
            $model->commit();
            $url=U('Agent/show_back');
            echo "<script>alert('申请成功!');</script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }else{
            $model->rollback();
            echo "<script>alert('申请失败');history.go(-1)</script>";
        }

    }
    //检查是否申请过返款
    public function check(){
        $data=M("back")->where("user_id=".I("post.nid")." and back_state <> 2")->find();
        if($data){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }
    //渲染返款申请记录页
    public function show_back(){
        $id=$_SESSION['id'];
        $data=M("back_buy")->where("user_id=$id")->select();
        $arr=M("back")->where("user_id=$id")->find();
        $this->assign("data",$data);
        $this->assign("arr",$arr);
        $this->display("agent/dlsfk");
    }
    //检查用户申请是否通过
    public function check_back(){
        $result=M("back")->where("user_id=".I("post.nid")." and back_state=1")->find();
        if($result){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }
}