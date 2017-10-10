<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/12
 * Time: 16:51
 */
header("Content-type:text/html;charset=utf-8");
class BuyAction extends Action{
    //服务中心申请页
    public function index(){
        $id=$_SESSION['id'];
        $user=D("Withdraw")->get_user($id);
        $this->assign("user",$user);
        $this->display("buy/User_gcksq");
    }
    public function record(){
        $id=$_SESSION['id'];
        $p=I('get.p')?I('get.p'):1;
        $num=10;
        $start=($p-1)*$num;
        $data=D("Withdraw")->get_withdraw('buying',$id,$start,$num);
        $count=D("Withdraw")->get_count('buying',$id);
        import("ORG.Util.Page");
        $page=new Page($count,$num);
        $show=$page->show();
        $this->assign('page',$show);
        $this->assign('buying',$data);
        $this->assign('user_id',$id);
        $this->display('buy/GC_record');
    }
    public function get_buy(){
        $id=$_SESSION['id'];
        $arr=array(
            'plate_number'=>trim(I('post.car_ID')),
            'vin_number'=>trim(I('post.Vin_ID')),
            'car_model'=>trim(I('post.car_Models')),
            'buy_time'=>strtotime(trim(I("post.car_time"))),
            'buy_total'=>trim(I("post.buy_total")),
            'user_id'=>$id,
            'time'=>time()
        );
        $data=D('Buy')->add_buy($arr);
        if($data){
            $url=U('Buy/record');
            echo "<script>alert('申请成功!');</script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }else{
            echo "<script>alert('申请失败!');history.go(-1)</script>";
        }

    }


}