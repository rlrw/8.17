<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2017/8/10
 * Time: 9:32
 */
header("Content-type:text/html;charset=utf-8");
class StaffAction extends WebAction{
    //员工列表页
    public function show(){
        $p=I('get.p')?I('get.p'):1;
        $num=5;
        $start=($p-1)*$num;
        import("ORG.Util.Page");
        $count=D("Staff")->get_count('staff');
        $data=D("Staff")->get_list('staff',$start,$num);
        $page=new Page($count,$num);
        $show=$page->show();
        $this->assign('page',$show);
        $role_list=D("Staff")->get_role_list();
        $this->assign("role_list",$role_list);
        $this->assign("staff_list",$data);
        $this->display("staff/index");
    }
    //条件搜索
    public function search_staff(){
        if(IS_GET){
            $number=I('get.num');
            $name=I('get.n');
            $state=I('get.state');
            $st=strtotime(I('get.st'));
            $lt=strtotime(I('get.lt'));

            $where=array();
            if($number){
                $where['staff_number']=['like','%'.$number.'%'];
            }
            if($name){
                $where['staff_name']=['like','%'.$name.'%'];
            }
            if($state){
                $where['staff_state']=$state;
            }
            if($st!=""&&$lt!=""){
                if($st<$lt){
                    $where['time']=['between',"$st,$lt"];
                }else{
                    echo "<script>alert('搜索时间有误！');</script>";
                    die();
                }
            }elseif($st!="" && $lt==""){
                $where['time']=["EGT",$st];
            }elseif($st=="" && $lt!=""){
                $where['time']=["ELT",$lt];
            }

            $p=I('get.p')?I('get.p'):1;
            $num=5;
            $start=($p-1)*$num;
            import("ORG.Util.Page");
            $count=D("Staff")->getCount('staff',$where);
            $data=D("Staff")->getList('staff',$where,$start,$num);
            $page=new Page($count,$num);
            $show=$page->show();
            foreach($where as $key=>$val){
                $page->parameter.="$key=".urlencode($val)."&";
            }
            $this->assign('page',$show);
            $role_list=D("Staff")->get_role_list();
            $this->assign("role_list",$role_list);
            $this->assign("staff_list",$data);
            $this->display("staff/index");

        }

    }

    public function check(){
        $staff_id=$_SESSION['id'];
        $menu_id=I('post.menu_id');
        $menu=D('Withdraw')->get_menu($staff_id);
        $arr=array();
        foreach($menu as $val) {
            foreach ($val as $vo) {
                $arr[] = $vo;
            }
        }
        if(in_array($menu_id,array_unique($arr))){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }
    //查询staff表最后一个ID 用于拼接编号
    public function get_last_id(){
        $id=M("staff")->field('staff_id')->order("staff_id desc")->select();
        $this->ajaxReturn($id[0]['staff_id']);
    }
    //查询是否有相同的账号
    public function check_account(){
        $account=trim(I('post.account'));
        $result=M("staff")->field("staff_id")->where("staff_account='".$account."'")->select();
        if($result){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }

    }
    //查询员工信息
    public function show_update_staff(){
        $this->ajaxReturn(D("Staff")->get_update_staff(trim(I('post.nid'))));
    }
    //保存修改
    public function save_staff(){
        if(IS_POST){
            $id=I('post.id');
            $save=array(
                'staff_number'=>trim(I('post.number')),
                'staff_account'=>trim(I('post.account')),
                'staff_name'=>trim(I('post.name')),
                'staff_sex'=>trim(I('post.sex')),
                'staff_address'=>trim(I('post.address')),
                'staff_phone'=>trim(I('post.phone')),
                'staff_role'=>trim(I('post.role')),
            );
        }
        $result=D("Staff")->saveStaff($save,$id);
        if($result){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }

    }

    //重置密码  66666
    public function reset_pwd(){
       $id=I("post.nid");
        $result=M("staff")->where("staff_id=$id")->save(array('staff_password'=>MD5('666666')));
        if($result){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn($result);
        }
    }
    //修改账号状态
    public function update_state(){
        if(IS_POST){
            $id=I('post.nid');
            $state=(I('post.state')==1)?1:2;
            $save=array( 'staff_state'=>$state);
        }
        $result=D("Staff")->saveStaff($save,$id);
        if($result){
            $this->ajaxReturn (1);
        }else{
            $this->ajaxReturn (0) ;
        }
    }
    //新增员工
    public function add_staff(){
        $arr=array(
            'staff_number'=>I('post.number'),
            'staff_account'=>I('post.account'),
            'staff_password'=>MD5(I('post.pwd')),
            'staff_name'=>I('post.name'),
            'staff_phone'=>I('post.phone'),
            'staff_address'=>I('post.address'),
            'staff_role'=>I('post.role'),
            'staff_sex'=>I('post.sex'),
            'staff_state'=>1,
        );
        $result=D("Staff")->addStaff($arr);
        $url=U('Staff/show');
        if($result){
            echo "<script>alert('新增成功!');</script>";
        }else{
            echo "<script>alert('新增失败!');</script>";
        }
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
    }
    //自定义修改密码
    public function update_pwd(){
        $id=$_SESSION['staff_id'];
        $pwd=MD5(I("post.pwd"));
        $pwd1=MD5(I("post.pwd1"));
        $pwd2=MD5(I("post.pwd2"));
        $data=M("staff")->where("staff_id='".$id."' and staff_password='".$pwd."'")->select();
        if(!$data){
            echo "<script>alert('原密码有误！请重新输入');history.go(-1)</script>";
        }elseif($pwd1!=$pwd2){
            echo "<script>alert('两次新密码不相同！请重新输入');history.go(-1)</script>";
        }else{
            $result=M("staff")->where("staff_id='".$id."'")->save(array('staff_password'=>$npwd));
            if($result){
                $url=U('Index/index');
                echo "<script>alert('修改成功');</script>";
                echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
            }else{
                echo "<script>alert('操作失败');history.go(-1)</script>";
            }
        }

    }

}