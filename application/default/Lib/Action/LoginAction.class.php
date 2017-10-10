<?php

class LoginAction extends BaseAction {
    public function index(){

		$this->display();
    	}
	
    
    public function login(){
    		if ($_POST) {
    		 	/*var_dump($_POST);exit;*/
    		$name=$_POST['userName'];
    		$password=I('password','','md5');
    		$date['userid']=$name;
    		$date['password']=$password;
    		$user=M('cxh_users')->where($date)->find();
    	/*	var_dump($date);echo "<hr/>";echo "<pre>";
    		var_dump($user);exit;*/

    		if (!$user||$user['password']!=$password) {
    			$url1=U("Login/index");
    			echo "<script> alert('账号密码错误！'); </script>"; 
    			echo "<meta http-equiv='Refresh' content='0;URL=$url1'>"; 
    		}elseif($user['status']==0){
                $url11=U("Login/index");
                echo "<script> alert('账号未启用！'); </script>"; 
                echo "<meta http-equiv='Refresh' content='0;URL=$url11'>"; 
            }else{
    			session('[start]');
    			$_SESSION['name']=$user['name'];
    			$_SESSION['id']=$user['id'];
                $_SESSION['userid']=$user['userid'];
    			$nowtime=date('Y-m-d H:i:s',time());
    		 M('cxh_users')->where("id = ".$user['id'])->save(array('last_login'=> $nowtime,'last_ip'=> $_SERVER["REMOTE_ADDR"]
));	
    			 $url=U("Index/index");    			 
				echo "<script> alert('登录成功'); </script>"; 
				echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
    		}
    }

}
	public function loginout(){
		session_unset();
						session_destroy();						
						 $url=U("Index/index");    			 
				echo "<script> alert('退出成功'); </script>"; 
				echo "<meta http-equiv='Refresh' content='0;URL=$url'>"; 
	}
}