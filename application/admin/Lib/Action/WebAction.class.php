<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/15
 * Time: 22:41
 */
class WebAction extends Action{
    //验证登录
    public function _initialize(){
        $service=M('service')->select();
      $this->assign("service",$service);
        if(empty($_SESSION['role_id'])){
            $url=U('Admin/login');
            echo "<script>alert('你还没登录，请先登录！');</script>";
            echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        }
    }
    //查询员工审核的顺序
    public function get_sort($id,$menu_id){
        //$id是员工登录用查询出所对应的角色ID
        //$menu_id 需要查询的审核菜单ID
        $arr=M('examine')->where("menu_id=$menu_id")->select();
        $data=$this->sigcol_arrsort($arr,'sort',SORT_ASC);
       // array_multisort(array_column($data,'sort'),SORT_ASC,$data);
        $arr=array();
        foreach($data as $val){
            $arr[]=$val['role_id'];
        }
        $a="";
        if(in_array($id,$arr)){
            for($i=0;$i<count($arr);$i++){
                if($arr[$i]==$id){
                    $a=$i+1;
                }
            }
        }
        return $a;
    }
    //获取该审核有几个人审核
    public function get_count($menu_id){
        return M('examine')->where("menu_id=$menu_id")->count();
    }
    public function sigcol_arrsort($data,$col){
        if(is_array($data)){
            $i=0;
            foreach($data as $k=>$v){
                if(key_exists($col,$v)){
                    $arr[$i] = $v[$col];
                    $i++;
                }else{
                    continue;
                }
            }
        }else{
            return false;
        }
        array_multisort($arr,SORT_ASC,$data);
        return $data;
    }
    //

    //审核通过处理
    /*
     * $table 表名     $nid 审核的记录id    $state 通过以后要设置的状态（和审核人的排序一致） $head  状态字段的头部
     * */
    public function adopt($table,$num,$nid,$state,$head){
        if($this->get_count($num)==$state){
            $data=array('state_level'=>$state,$head.'_state'=>1);
        }else{
            $data=array('state_level'=>$state);
        }
        $arr=M($table)->where($table."_id=".$nid)->save($data);
        if($arr){
            return 1;
        }else{
            return 0;
        }

    }

    //审核不通过处理
    public function not_pass($table,$nid,$head){
        $result=M($table)->where($table."_id=".$nid)->save(array($head.'_state'=>2));
        if($result){
            return 1;
        }else{
            return 0;
        }
    }

}