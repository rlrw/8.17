<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2017/8/9
 * Time: 18:36
 */
header("Content-type:text/html;charset=utf-8");
class WithdrawAction extends Action{
    //提现申请页
    public function index(){
        $id=$_SESSION['id'];
        $user=D("Withdraw")->get_user($id);
        $this->assign('user',$user);
        $this->display('withdraw/User_txsq');
    }
    //提现历史页

    public function record(){
        $id=$_SESSION['id'];
        $p=I('get.p')?I('get.p'):1;
        $num=10;
        $start=($p-1)*$num;
        $data=D("Withdraw")->get_withdraw('withdraw',$id,$start,$num);
        $count=D("Withdraw")->get_count('withdraw',$id);
        import("ORG.Util.Page");
        $page=new Page($count,$num);
        $show=$page->show();
        $this->assign('page',$show);
        $this->assign('withdraw',$data);
        $this->assign('user_id',$id);
        $this->display('withdraw/TX_record');
    }
    //接收提现申请信息
    public function get_withdraw(){
        $id=$_SESSION['id'];
        $pwd=I('post.rj_Password');
        if(D("Withdraw")->check_pwd($pwd,$id)){
            $arr=array(
                'user_name'=>trim(I('post.user_name')),
                'user_number'=>trim(I('post.user_number')),
                'user_id'=>$id,
                'profit_integral'=>trim(I('post.profit_integral')),
                'freeze_integral'=>trim(I('post.freeze_integral')),
                'bank'=>trim(I('post.bank')),
                'bank_number'=>trim(I('post.bank_number')),
                'total'=>trim(I('post.Transfer_amount')),
                'time'=>time(),
                'remarks'=>trim(I('post.Remarks'))
            );
            if(D("Withdraw")->add_withdraw($arr)){
                $point=M("user")->field("pay_points")->where("id=$id")->select();
                $new_point=intval($point[0]['pay_points'])-intval(trim(I('post.Transfer_amount')));
                $result=M("user")->where("id=$id")->save(array('pay_points'=>$new_point));
                if($result){
                    $url=U('Withdraw/record');
                    echo "<script>alert('申请成功!');</script>";
                    echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
                }else{
                    echo "<script>alert('申请失败!');history.go(-1)</script>";
                }

            }else{
                echo "<script>alert('申请失败!');history.go(-1)</script>";
            }
        }else{
            echo "<script>alert('你输入的二级密码有误,请重新输入!');history.go(-1)</script>";
        }
    }
}