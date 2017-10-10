<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/12
 * Time: 17:01
 */
class BuyModel extends Model{
    //添加服务中心申请记录
    public function add_buy($arr){
        return M("buying")->add($arr);
    }
}