<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2017/8/10
 * Time: 9:47
 */
class StaffModel extends Model{
    public function check($account,$pwd){
        $string=" staff_account='".$account."' and "." staff_password= '".$pwd."'";
        $data= M('staff')->where($string)->join("role on staff.staff_role=role.role_id")->find();
        if($data['staff_state']==1){
            return $data;
        }elseif($data['staff_state']==2){
            return 2;
        }else{
            return false;
        }


    }

    public function checkStaff($id){
        return M('role_menu')->where("menu_id=$id")->select();
    }

    //获取员工列表
    public function get_staff_list(){
        return M("staff")
            ->join("role on staff.staff_role=role.role_id")
            ->select();
    }
    //获取数量
    public function get_count($table){
        return M($table)->count('staff_id');
    }
    public function getCount($table,$where){
        return M($table)->where($where)->count('staff_id');
    }
    public function getList($table,$where,$start,$last){
        return M($table)->join("role on staff.staff_role=role.role_id")->where($where)->limit($start,$last)->select();
    }
    //获取列表
    public function get_list($table,$start,$last){
        return M($table)->join("role on staff.staff_role=role.role_id")->limit($start,$last)->select();
    }
    //修改员工信息
    public function get_update_staff($id){
        $arr=M("staff")->where("staff_id=$id")->select();
        return $arr[0];
    }
    //保存修改信息
    public function saveStaff($arr,$id){
        return M("staff")->where("staff_id=$id")->save($arr);
    }
    //查询角色列表
    public function get_role_list(){
        return M("role")->select();
    }
    //添加新员工
    public function addStaff($arr){
        return M("staff")->add($arr);
    }


}