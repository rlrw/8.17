<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/22
 * Time: 9:32
 */
header("Content-type:text/html;charset=utf-8");
class AdminAction extends Action{
    //导入验证码
    public function yzm(){
        import("ORG.Util.Image");
        Image::buildImageVerify(4,5,"png");
    }
    //登录页
    public function login(){
        $_SESSION['token']=time().rand(1000,9999);
        $this->display("staff/login_pc");
        exit;
    }
    //验证登录
    public function check_staff(){
        $token=I("post.token");
        $account=I('post.account');
        $pwd=MD5(I('post.pwd'));
        $yzm=MD5(trim(I("post.yzm")));
        if($token==$_SESSION['token']){
            if($_SESSION['verify']==$yzm){
                echo "<script>alert('".$_SESSION['verify']."and".$yzm."')</script>";
                //echo "<script>alert('验证码不正确！');history.go(-1)</script>";
            }else{
                $data=D("Staff")->check($account,$pwd);
                if($data==2){
                    $url=U('Admin/login');
                    echo "<script>alert('账号被禁用');</script>";
                    echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
                }elseif($data){
                    $_SESSION['staff_id']=$data['staff_id'];
                    $_SESSION['staff_account']=$data['staff_account'];
                    $_SESSION['role_name']=$data['role_name'];
                    $_SESSION['role_id']=$data['staff_role'];
                    $_SESSION['status']=$data['status'];
                    $url=U('Index/index');
                    echo "<script>alert('登录成功');</script>";
                    echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
                }else{
                    echo "<script>alert('账号或密码有误！');history.go(-1)</script>";
                }
            }
        }else{
            $url=U('Admin/login');
            echo "<script>alert('非法登录');</script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }
    }
    //退出登录
    public function take_out(){
        session_unset();
        session_destroy();
        setcookie($_SESSION['role_id'],"",time()-100);
        setcookie($_SESSION['staff_id'],"",time()-100);
        setcookie($_SESSION['staff_account'],"",time()-100);
        setcookie($_SESSION['role_name'],"",time()-100);
        setcookie($_SESSION['status'],"",time()-100);
        $url=U('Admin/login');
        echo "<script>alert('退出成功');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
    }
}