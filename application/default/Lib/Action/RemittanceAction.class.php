<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2017/8/9
 * Time: 14:48
 */
header("Content-type:text/html;charset=utf-8");
class RemittanceAction extends Action{
    //汇款申请页
    public function index(){
        $id=$_SESSION['id'];
        $model=D('Remittance');
        $bankList=$model->getBank();
        $this->assign('user_id',$id);
        $this->assign("bankList",$bankList);
        $this->display('remittance/User_hksq');
    }
    //汇款申请记录页
    public function record(){
        $id=$_SESSION['id'];
        $p=I('get.p')?I('get.p'):1;
        $num=10;
        $start=($p-1)*$num;
        $data=D("Withdraw")->get_withdraw('remittance',$id,$start,$num);
        $count=D("Withdraw")->get_count('remittance',$id);
        import("ORG.Util.Page");
        $page=new Page($count,$num);
        $show=$page->show();
        $this->assign('page',$show);
        $this->assign('remittance',$data);
        $this->assign('user_id',$id);
        $this->display('remittance/HK_record');
    }
    //生成一条汇款申请记录
    public function insert_remittance(){
        if(IS_POST){
            $remittance=array(
                'user_id'=>$_SESSION['id'],
                'payee_number'=>trim(I("post.payee")),
                'bank_id'=>trim(I("post.yjr_fwzx")),
                'subBranch'=>trim(I("post.sub_address")),
                'remit_number'=>trim(I("post.remit")),
                'remitter'=>trim(I("post.remit_name")),
                'remit_total'=>trim(I("post.remit_money")),
                'remit_time'=>strtotime(trim(I("post.remit_time"))),
                'remit_order'=>trim(I("post.order")),
                'remitter_phone'=>trim(I("post.phone")),
                'remit_remarks'=>I("post.remarks"),
                'time'=>time()
            );
            $data=D('Remittance')->add_remittance($remittance);
            if($data){
                $url=U('Remittance/record');
                echo "<script>alert('申请成功!');</script>";
                echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
            }else{
                echo "<script>alert('申请失败!');history.go(-1)</script>";
            }
        }

    }


}