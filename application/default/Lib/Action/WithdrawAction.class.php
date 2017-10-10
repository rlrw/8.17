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
        $total=trim(I('post.Transfer_amount'));
        if(D("Withdraw")->check_pwd($pwd,$id)){
            $arr=array(
                'user_name'=>trim(I('post.user_name')),
                'user_number'=>trim(I('post.user_number')),
                'user_id'=>$id,
                'profit_integral'=>trim(I('post.profit_integral')),
                'freeze_integral'=>trim(I('post.freeze_integral')),
                'bank'=>trim(I('post.bank')),
                'bank_number'=>trim(I('post.bank_number')),
                'total'=>$total,
                'taxation'=>$total*0.05,
                'actual_total'=>$total*0.95,
                'time'=>time(),
                'remarks'=>trim(I('post.Remarks'))
            );
            if(D("Withdraw")->add_withdraw($arr)){
                $url=U('Withdraw/record');
                echo "<script>alert('申请成功!');</script>";
                echo "<meta http-equiv='Refresh' content='0;URL=$url'>";

            }else{
                echo "<script>alert('申请失败!');history.go(-1)</script>";
            }
        }else{
            echo "<script>alert('你输入的二级密码有误,请重新输入!');history.go(-1)</script>";
        }
    }
}