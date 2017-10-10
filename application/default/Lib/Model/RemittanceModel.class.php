<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2017/8/9
 * Time: 15:25
 */
class RemittanceModel extends Model{
    public function getBank(){
        return M("bank")->select();
    }
    //添加汇款记录
    public function add_remittance($arr){
        return  M("remittance")->add($arr);
    }
    //查询用户的汇款申请记录
    public function get_recode($id){
        return M("remittance")->where("user_id=$id")->select();
    }
}