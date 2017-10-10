<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/12
 * Time: 17:01
 */
class ServiceModel extends Model{
    //添加服务中心申请记录
    public function add_service($arr,$arr1){
        $this->startTrans();
        $result1=M("service")->add($arr);
        $result2=M("service_images")->add($arr1);
        if($result1&&$result2){
            $this->commit();
            return 1;
        }else{
            $this->rollback();
            return 0;
        }
    }
    //查询所有的下级信息
    public function children($where,$start,$last){
            $data=M("cxh_users a")
                ->where($where)
                ->field("name,userid,phone,id,status,fwzx,dls_lv,reg_time")
                ->limit("$start,$last")
                ->select();
        return $data;
    }
    public function count($where){
        $num=M("cxh_users")
            ->where($where)
            ->field("id")
            ->count();
        return $num;
    }
    public function get_count($where,$id){
        return M("cxh_users")->where($where)->where("fwzx=$id")->count();
    }
    public function get_children($where,$start,$last,$id){
        return M("cxh_users")
            ->where($where)
            ->where("fwzx=$id")
            ->field("name,userid,phone,id,status,fwzx,dls_lv,reg_time")
            ->limit("$start,$last")
            ->select();
    }
}