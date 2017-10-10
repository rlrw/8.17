<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/12
 * Time: 17:01
 */
class AgentModel extends Model{
    //添加服务中心申请记录
    public function add_agent($arr,$arr1){
        $this->startTrans();
        $result1=M("agent")->add($arr);
        $result2=M("agent_images")->add($arr1);
        if($result1&&$result2){
            $this->commit();
            return 1;
        }else{
            $this->rollback();
            return 0;
        }
    }
}