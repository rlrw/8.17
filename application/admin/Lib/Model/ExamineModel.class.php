<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/16
 * Time: 15:17
 */
class ExamineModel extends Model{
    //获取角色列表
    public function get_role_list(){
        return M('role')->select();
    }
    //获取审核列表
    public function get_menu_list(){
        return M('menu')->where("parent_id=1")->select();
    }
    //获取每个审核下面的审核人
    public function get_examine($id){
        return M("examine as a")
            ->join("role on a.role_id=role.role_id")
            ->where("menu_id=$id")
            ->select();


    }
}