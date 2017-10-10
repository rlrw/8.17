<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/17
 * Time: 14:15
 */
header("Content-type:text/html;charset=utf-8");
class RemitAction extends WebAction{
    public function _initialize(){
        parent::_initialize();
    }
    //汇款审核页
    public function show_remit(){
        $id=$_SESSION['role_id'];
        $menu_id=1;
        $number=I('get.userid');
        $name=I('get.n');
        $order=I('get.order');
        $st=strtotime(I('get.st'));
        $lt=strtotime(I('get.lt'));
        $where=array();
        $where['remit_state']=['NEQ',2];
        if($number){
            $where['userid']=['like','%'.$number.'%'];
        }
        if($name){
            $where['remitter']=['like','%'.$name.'%'];
        }
        if($order){
            $where['remit_order']=['like','%'.$order.'%'];
        }
        if($st!=""&&$lt!=""){
            if($st<$lt){
                $where['time']=['between',"$st,$lt"];
            }else{
                echo "<script>alert('搜索时间有误！');history.go(-1)</script>";
                die();
            }
        }elseif($st!=""&&$lt==""){
            $where['time']=["EGT",$st];
        }elseif($st==""&&$lt!=""){
            $where['time']=["ELT",$lt];
        }
        $level=$this->get_sort($id,$menu_id);
        $p=I('get.p')?I('get.p'):1;
        $num=5;
        $start=($p-1)*$num;
        import("ORG.Util.Page");
        $count=D("Remit")->get_remit_count($level,$where);
        $data=D("Remit")->get_remit_list($level,$where,$start,$num);
        $page=new Page($count,$num);
        $show=$page->show();
        foreach($where as $key=>$val){
            $page->parameter.="$key=".urlencode($val)."&";
        }
        $this->assign('page',$show);
        $this->assign('level',$level);
        $this->assign("remit_list",$data);
        $this->display("examine/hk_list");
    }
    //汇款审核通过
    public function r_adopt(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>1,
            'audit_time'=>time(),
            'audit_state'=>1
        );
        M("audit")->add($arr);
        $data=$this->adopt("remittance",1,I('post.nid'),I('post.state'),"remit");
        $result="";
        if($this->get_count(1)==I('post.state')){
            $list=D("Remit")->get_total(I('post.nid'));
            $id=$list['user_id'];
            $total=$list['remit_total'];
            $cash_points=M("cxh_users")->where("id=$id")->field("cash_points")->select();
            $new_total=$total+$cash_points[0]['cash_points'];
            $result=M("cxh_users")->where("id=$id")->save(array('cash_points'=>$new_total));
        };
        $this->ajaxReturn($data);
    }

    //汇款审核不通过
    public function r_not_pass(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>1,
            'audit_time'=>time(),
            'audit_state'=>0,
            'audit_remarks'=>I('post.remarks'),
        );
        M("audit")->add($arr);
        $data=$this->not_pass("remittance",I('post.nid'),"remit");
        $this->ajaxReturn($data);
    }
    //提现审核页
    public function show_tx(){
        $id=$_SESSION['role_id'];
        $menu_id=2;

        $number=I('get.userid');
        $name=I('get.n');
        $st=strtotime(I('get.st'));
        $lt=strtotime(I('get.lt'));

        $where=array();
        if($number){
            $where['user_number']=['like','%'.$number.'%'];
        }
        if($name){
            $where['user_name']=['like','%'.$name.'%'];
        }

        if($st!=""&&$lt!=""){
            if($st<$lt){
                $where['time']=['between',"$st,$lt"];
            }else{
                echo "<script>alert('搜索时间有误！');history.go(-1)</script>";
                die();
            }
        }elseif($st!=""&&$lt==""){
            $where['time']=["EGT",$st];
        }elseif($st==""&&$lt!=""){
            $where['time']=["ELT",$lt];
        }
        $where['withdraw_state']=["NEQ",2];
        $level=$this->get_sort($id,$menu_id);
        $p=I('get.p')?I('get.p'):1;
        $num=5;
        $start=($p-1)*$num;
        import("ORG.Util.Page");
        $count=D("Remit")->get_withdraw_count($level,$where);
        $data=D("Remit")->get_withdraw_list($level,$where,$start,$num);
        $page=new Page($count,$num);
        $show=$page->show();
        foreach($where as $key=>$val){
            $page->parameter.="$key=".urlencode($val)."&";
        }
        $this->assign('page',$show);
        $this->assign('level',$level);
        $this->assign("withdraw_list",$data);
        $this->display("examine/tx_list");
    }
    //提现审核通过
    public function w_adopt(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>2,
            'audit_time'=>time(),
            'audit_state'=>1
        );
        M("audit")->add($arr);
        $data=$this->adopt("withdraw",2,I('post.nid'),I('post.state'),"withdraw");
        $this->ajaxReturn($data);
    }
    //提现审核不通过
    public function w_not_pass(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>2,
            'audit_time'=>time(),
            'audit_state'=>0,
            'audit_remarks'=>I('post.remarks'),
        );
        M("audit")->add($arr);
        $data=$this->not_pass("withdraw",I('post.nid'),"withdraw");
        //查询提现的总金额 和用户id
        $user=M("withdraw")->where("withdraw_id='".I("post.nid")."'")->field("total,user_id")->select();
        $u_total=M("cxh_users")->where("id='".$user[0]['user_id']."'")->field("pay_points")->select();
        $new_total=intval($u_total[0]['pay_points'])+intval($user[0]['total']);
        $result=M("cxh_users")->where("id='".$user[0]['user_id']."'")->save(array('pay_points'=>$new_total));
        if($result){
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(0);
        }

    }
    //代理商审核页
    public function show_agent(){
        $id=$_SESSION['role_id'];
        $menu_id=3;

        $number=I('get.num');
        $name=I('get.n');
        $agent=I('get.agent');
        $st=strtotime(I('get.st'));
        $lt=strtotime(I('get.lt'));

        $where=array();
        if($number){
            $where['user_number']=['like','%'.$number.'%'];
        }
        if($name){
            $where['corporate_name']=['like','%'.$name.'%'];
        }
        if($agent){
            $where['agent_level']=['EQ',$agent];
        }
        if($st!=""&&$lt!=""){
            if($st<$lt){
                $where['time']=['between',"$st,$lt"];
            }else{
                echo "<script>alert('搜索时间有误！');history.go(-1);</script>";
                die();
            }
        }elseif($st!=""&&$lt==""){
            $where['time']=["EGT",$st];
        }elseif($st==""&&$lt!=""){
            $where['time']=["ELT",$lt];
        }
        $where['agent_state']=["NEQ",2];
        $level=$this->get_sort($id,$menu_id);
        $p=I('get.p')?I('get.p'):1;
        $num=5;
        $start=($p-1)*$num;
        import("ORG.Util.Page");
        $count=D("Remit")->get_agent_count($level,$where);
        $data=D("Remit")->get_agent_list($level,$where,$start,$num);
        $page=new Page($count,$num);
        $show=$page->show();
        foreach($where as $key=>$val){
            $page->parameter.="$key=".urlencode($val)."&";
        }
        $this->assign('page',$show);
        $this->assign('level',$level);
        $this->assign("agent_list",$data);
        $this->display("examine/Agent_list");
    }
    //代理商审核通过
    public function a_adopt(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>3,
            'audit_time'=>time(),
            'audit_state'=>1
        );
        $model=M();
        $model->startTrans();
        $record=M("audit")->add($arr);
        $data=$this->adopt("agent",3,I('post.nid'),I('post.state'),"agent");
        $result=$this->create_name(I('post.nid'));
        $save=M("agent")->where("agent_id=".I('post.nid'))->save(array('new_id'=>$result));
        if($record && $data && $result && $save){
            $model->commit();
            $this->ajaxReturn(1);
        }else{
            $model->rollback();
            $this->ajaxReturn(0);
        }

    }
    //代理审核通过 修改记录信息
    public function update_agent($table,$num,$nid,$state,$total,$ratio){
        $level=$this->get_sort($_SESSION['role_id'],3);
        if($this->get_count($num)==$state){
            $data['agent_state']=1;
        }
        //如果是第一个人审核 可以修改金额和比例  否则保持原样
        if($level==1){
            $data['total']=$total;
            $data['no_total']=$total;
            $data['ratio']=$ratio;
        }
            $data['state_level']=$state;

        $arr=M($table)->where($table."_id=".$nid)->save($data);
        return $arr;
    }

    //生成一个代理商新账号
    public function create_name($id){
        //查询通过后的记录信息
        $user=D("Remit")->get_user($id);
        //生成一个代理商新账号
        $lv=0;
        if($user['agent_level']==="省级代理"){
            $lv=6;
        }elseif($user['agent_level']==="市级代理"){
            $lv=5;
        }elseif($user['agent_level']==="县级代理"){
            $lv=4;
        }

        $new_arr=array(
            'name'=>$user['name'],
            'password'=>$user['password'],
            'phone'=>$user['phone'],
            'card'=>$user['card'],
            'paypwd'=>$user['paypwd'],
            'bank'=>$user['bank'],
            'bankcard'=>$user['bankcard'],
            'user_type'=>1,
            'dls_lv'=>$lv
        );
        //开启事务
        $model=M();
        $model->startTrans();
        //添加代理商账号到用户表
        $new_id=M("cxh_users")->add($new_arr);
        //查询代理商账号参数表 获取默认账号
        $userid=M("agent_info")->where("agent_area= '".$user['area']."'")->field("agent_account")->find();
        $result="";
        $result1="";
        //如果找到有省 市的账号  将账号赋给添加的记录的userid
        if($userid) {
            $result= M("cxh_users")->where("id=".$new_id)->save(array('userid'=>$userid['agent_account'],'user_id'=>$new_id));
            //将账号分配后 参数表修改状态
            $result1=M("agent_info")->where("agent_area='".$user['area']."'")->save(array('account_state'=>1));
             $new_arr['userid']="CXH".substr($userid['agent_account'],3);
        }else{
            //否则如果是县代  随机产生新账号
            $new_userid="DLS".mt_rand(1000,9999).$new_id;
            $result=M("cxh_users")->where("id=".$new_id)->save(array('userid'=>$new_userid,'user_id'=>$new_id));
            $result1=M("agent_info")->add(array('agent_area'=>$user['area'],'agent_level'=>0,'account_state'=>1,'agent_account'=>$new_userid));
            $new_arr['userid']="CXH".substr($new_userid,3);
        }
        //生成小号 推荐人是自己的代理商账号
        $new_arr['user_type']=0;
        $new_arr['dls_lv']=0;
        $child_id=M("cxh_users")->add($new_arr);
        $result4=M("relevance")->add(array('uid'=>$user['id'],'bid'=>$child_id));
        $result3=M("cxh_users")->where("id=".$child_id)->save(array('user_id'=>$child_id));
        $fx_user=array(
            'uid'=>$child_id,
            'pid'=>$new_id,
            'lv'=>0,
            'name'=>$user['name'],
            'pname'=>$user['name'],
            'reg_time'=>date("Y-m-d H:i:s"),
            'userid'=> $new_arr['userid']
        );
        $result2=M("fx_user")->add($fx_user);
        if($new_id && $result && $result1 &&$result2 && $child_id && $result3 &&$result4){
            $model->commit();
            return $new_id;
        }else{
            $model->rollback();
            return false;
        }
    }
    //代理商审核不通过
    public function a_not_pass(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>3,
            'audit_time'=>time(),
            'audit_state'=>0,
            'audit_remarks'=>I('post.remarks'),
        );
        M("audit")->add($arr);
        $data=$this->not_pass("agent",I('post.nid'),"agent");
        $this->ajaxReturn($data);
    }
    //服务中心审核页
    public function show_service(){
        $id=$_SESSION['role_id'];
        $menu_id=4;

        $number=I('get.num');
        $name=I('get.n');
        $st=strtotime(I('get.st'));
        $lt=strtotime(I('get.lt'));

        $where=array();
        if($number){
            $where['userid']=['like','%'.$number.'%'];
        }
        if($name){
            $where['corporate_phone']=['like','%'.$name.'%'];
        }
        if($st!=""&&$lt!=""){
            if($st<$lt){
                $where['service_time']=['between',"$st,$lt"];
            }else{
                echo "<script>alert('搜索时间有误！');history.go(-1)</script>";
                die();
            }
        }elseif($st!=""&&$lt==""){
            $where['service_time']=["EGT",$st];
        }elseif($st==""&&$lt!=""){
            $where['service_time']=["ELT",$lt];
        }
        $where['service_state']=["NEQ",2];
        $level=$this->get_sort($id,$menu_id);
        $p=I('get.p')?I('get.p'):1;
        $num=5;
        $start=($p-1)*$num;
        import("ORG.Util.Page");
        $count=D("Remit")->get_service_count($level,$where);
        $data=D("Remit")->get_service_list($level,$where,$start,$num);
        $page=new Page($count,$num);
        $show=$page->show();
        foreach($where as $key=>$val){
            $page->parameter.="$key=".urlencode($val)."&";
        }
        /*echo "<pre>";
        print_r($data);
        die();*/
        $this->assign('page',$show);
        $this->assign('level',$level);
        $this->assign("service_list",$data);
        $this->display("examine/fw_list");
    }
    //服务中心审核通过
    public function s_adopt(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>4,
            'audit_time'=>time(),
            'audit_state'=>1
        );
        $model=M();
        $model->startTrans();
        $result=M("audit")->add($arr);
        $data=$this->adopt("service",4,I('post.nid'),I('post.state'),"service");
        $id=M("service")->where("service_id=".I("post.nid"))->find();
        $type=M("cxh_users")->where("id=".$id['new_id'])->save(array('user_type'=>2));
        if($data && $result && $type){
            $model->commit();
            $this->ajaxReturn(1);
        }else{
            $model->rollback();
            $this->ajaxReturn(0);
        }
    }

    //服务中心审核不通过
    public function s_not_pass(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>4,
            'audit_time'=>time(),
            'audit_state'=>0,
            'audit_remarks'=>I('post.remarks'),
        );
        M("audit")->add($arr);
        $data=$this->not_pass("service",I('post.nid'),"service");
        $this->ajaxReturn($data);
    }
    //购车信息审核页
    public function show_buy(){
        $id=$_SESSION['role_id'];
        $menu_id=5;

        $number=I('get.num');
        $car_num=I('get.car_n');
        $car_model=I('get.car_m');
        $st=strtotime(I('get.st'));
        $lt=strtotime(I('get.lt'));

        $where=array();
        if($number){
            $where['userid']=['like','%'.$number.'%'];
        }
        if($car_num){
            $where['plate_number']=['like','%'.$car_num.'%'];
        }
        if($car_model){
            $where['car_model']=['like','%'.$car_model.'%'];
        }
        if($st!=""&&$lt!=""){
            if($st<$lt){
                $where['buy_time']=['between',"$st,$lt"];
            }else{
                echo "<script>alert('搜索时间有误！');history.go(-1)</script>";
                die();
            }
        }elseif($st!=""&&$lt==""){
            $where['buy_time']=["EGT",$st];
        }elseif($st==""&&$lt!=""){
            $where['buy_time']=["ELT",$lt];
        }
        $where['buy_state']=["NEQ",2];
        $level=$this->get_sort($id,$menu_id);
        $p=I('get.p')?I('get.p'):1;
        $num=5;
        $start=($p-1)*$num;
        import("ORG.Util.Page");
        $count=D("Remit")->get_buy_count($level,$where);
        $data=D("Remit")->get_buy_list($level,$where,$start,$num);
        $page=new Page($count,$num);
        $show=$page->show();
        foreach($where as $key=>$val){
            $page->parameter.="$key=".urlencode($val)."&";
        }
        $this->assign('page',$show);
        $this->assign('level',$level);
        $this->assign("buy_list",$data);
        $this->display("examine/car_Buying_list");
    }
    //购车审核通过
    public function b_adopt(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>5,
            'audit_time'=>time(),
            'audit_state'=>1
        );
        $model=M();
        $model->startTrans();
        $result=M("audit")->add($arr);
        $data=$this->adopt("buying",5,I('post.nid'),I('post.state'),"buy");
        $points=M("buying")->where("buying_id=".I('post.nid'))->field("buy_total,total_points,user_id")->find();
        $suc=M("buying")->where("buying_id=".I('post.nid'))->save(array('no_points'=>$points['total_points']));
        $commission=$this->share(intval($points['user_id']),intval($points['buy_total']));
        if($result && $data && $suc && $commission){
            $model->commit();
            $this->ajaxReturn(1);
        }else{
            $model->rollback();
            $this->ajaxReturn(0);
        }
    }
    //购车通过以后 为他的直推和间推分佣金
    public function share($id,$total){
        //查询直推id
        $pid=M("fx_user")->where("uid=$id")->field("pid")->find();
        //如果直推id为0 则都没有人分佣金 否则直推分5%佣金
        $result="";
        $result1="";
        if($pid['pid']!=0){
            $sql="update cxh_users set pay_points=pay_points+".$total*0.05." where id=".$pid['pid'];
            $result=mysql_query($sql);
            //查询间推id
            $grand_pid=M("fx_user")->where("uid=".$pid['pid'])->field("pid")->find();
            //如果间推id为0 则无间推分佣金 否则间推分2%佣金
            if($grand_pid['pid']!=0){
                $sql="update cxh_users set pay_points=pay_points+".$total*0.02." where id=".$grand_pid['pid'];
                $result1=mysql_query($sql);
                M("commission")->add(array('uid'=>$id,'pid'=>$pid['pid'],'gid'=>$grand_pid['pid'],'p_commission'=>$total*0.05,'g_commission'=>$total*0.02,'time'=>time()));
            }else{
                M("commission")->add(array('uid'=>$id,'pid'=>$pid['pid'],'p_commission'=>$total*0.05,'time'=>time()));
                return true;
            }
        }else{
            return true;
        }
        if($result || $result1){
            return true;
        }else{
            return false;
        }
    }
    //修改返款金额和比例
    public function update_points(){
        $id=I('post.nid');
        $arr=array(
            'total_points'=>I('post.total_points'),
            'ratio'=>I('post.ratio')
        );
        $data=M("buying")->where("buying_id=$id")->field("total_points,ratio")->find();
        if($data['total_points']==I("post.total_points") && $data['ratio']==I("post.ratio")){
            $this->ajaxReturn("相同的金额和比例，修改失败！");
        }else{
            $result=M("buying")->where("buying_id=$id")->save($arr);
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
    }
    //购车审核不通过
    public function b_not_pass(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>5,
            'audit_time'=>time(),
            'audit_state'=>0,
            'audit_remarks'=>I('post.remarks'),
        );
        M("audit")->add($arr);
        $data=$this->not_pass("buying",I('post.nid'),"buy");
        $this->ajaxReturn($data);
    }
    //代理商返款申请页
    public function show_agent_back(){
        $id=$_SESSION['role_id'];
        $menu_id=6;

        $number=I('get.number');
        $name=I('get.name');
        $st=strtotime(I('get.st'));
        $lt=strtotime(I('get.lt'));

        $where=array();
        if($name){
            $where['user_name']=['like','%'.$name.'%'];
        }
        if($number){
            $where['userid']=['like','%'.$number.'%'];
        }
        if($st!=""&&$lt!=""){
            if($st<$lt){
                $where['time']=['between',"$st,$lt"];
            }else{
                echo "<script>alert('搜索时间有误！');history.go(-1)</script>";
                die();
            }
        }elseif($st!=""&&$lt==""){
            $where['time']=["EGT",$st];
        }elseif($st==""&&$lt!=""){
            $where['time']=["ELT",$lt];
        }
        $where['back_state']=["NEQ",2];
        $level=$this->get_sort($id,$menu_id);
        $p=I('get.p')?I('get.p'):1;
        $num=5;
        $start=($p-1)*$num;
        import("ORG.Util.Page");
        $count=D("Remit")->get_back_count($level,$where);
        $data=D("Remit")->get_back_list($level,$where,$start,$num);
        $page=new Page($count,$num);
        $show=$page->show();
        foreach($where as $key=>$val){
            $page->parameter.="$key=".urlencode($val)."&";
        }

        $this->assign('page',$show);
        $this->assign('level',$level);
        $this->assign("back_list",$data);
        $this->display("examine/dls_fk");
    }

    //代理商返款申请通过
    public function ab_adopt(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>6,
            'audit_time'=>time(),
            'audit_state'=>1
        );
        $model=M();
        $model->startTrans();
        $a=M("audit")->add($arr);
        $data=$this->adopt("back",6,I('post.nid'),I('post.state'),"back");
        $total=M("back")->field("total_points")->where("back_id=".I('post.nid'))->find();
        $result=M("back")->where("back_id=".I("post.nid"))->save(array('no_points'=>$total['total_points']));
        if($a && $data && $total && $result){
            $model->commit();
            $this->ajaxReturn(1);
        }else{
            $model->rollback();
            $this->ajaxReturn(0);
        }

    }
    //代理商返款申请不通过
    public function ab_not_pass(){
        $arr=array(
            'staff_id'=>$_SESSION['staff_id'],
            'menu_id'=>6,
            'audit_time'=>time(),
            'audit_state'=>0,
            'audit_remarks'=>I('post.remarks'),
        );
        M("audit")->add($arr);
        $data=$this->not_pass("back",I('post.nid'),"back");
        $this->ajaxReturn($data);
    }
    //修改金额和比例
    public function update_back_ratio(){
        $id=I('post.nid');
        $arr=array(
            'total_points'=>I('post.total_points'),
            'ratio'=>I('post.ratio')
        );
        $data=M("back")->where("back_id=$id")->field("total_points,ratio")->find();
        if($data['total_points']==I("post.total_points") && $data['ratio']==I("post.ratio")){
            $this->ajaxReturn("相同的金额和比例，修改失败！");
        }else{
            $result=M("back")->where("back_id=$id")->save($arr);
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
    }
}