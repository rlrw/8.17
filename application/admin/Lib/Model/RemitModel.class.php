<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/17
 * Time: 15:06
 */
class RemitModel extends Model{

    //汇款
    public function get_remit_count($id,$where){
        return M("remittance a")
            ->where("state_level=($id-1)")
            ->where($where)
            ->join("bank on a.bank_id=bank.bank_id")
            ->count();
    }
    public function get_remit_list($id,$where,$start,$last){
      return  M("remittance a")
            ->where("state_level=($id-1)")
            ->where($where)
            ->join("bank on a.bank_id=bank.bank_id")
            ->join("cxh_users on a.user_id=cxh_users.id")
            ->limit($start,$last)
            ->field("a.*,bank.*,cxh_users.userid")
            ->select();
    }

    //查询汇款审核通过以后的汇款金额
        public function get_total($id){
          $data= M("remittance")->field("remit_total,user_id")->where("remittance_id=$id")->select();
            return $data[0];
        }

    /*public function gets($nid){
        return mysql_query("update remittance set state_level=state_level+1 where remittance_id=".$nid);
    }*/


    //提现
    public function get_withdraw_count($id,$where){
        return M("withdraw as a")
            ->where("state_level=($id-1)")
            ->where($where)
            ->count();
    }
    public function get_withdraw_list($id,$where,$start,$last){
        return  M("withdraw as a")
            ->where("state_level=($id-1)")
            ->where($where)
            ->limit($start,$last)
            ->select();
    }
    //代理商
    public function get_agent_count($id,$where){
        return M("agent a")
            ->where("state_level=($id-1)")
            ->where($where)
            ->count();
    }
    public function get_agent_list($id,$where,$start,$last){
        $data =  M("agent a")->where("state_level=($id-1)")->where($where)->limit($start,$last)->select();
        $arr=array();
        foreach($data as $key=>$val){
            $temp= M("agent_images")->where("agent_id='".$val['agent_id']."'")->select();
            foreach($temp as $k=>$v){
                $data[$key]['url'][]['name']=$v['url'];
            }
        }
        return $data;
    }
    //代理商通过以后查询申请人的所有信息
    public function get_user($id){
        $data=M("agent a")
            ->join("cxh_users b on a.user_id=b.id")
            ->where("a.agent_id=$id")
            ->select();
        return $data[0];
    }
    //服务中心
    public function get_service_count($id,$where){
        return M("service")
            ->where("state_level=($id-1)")
            ->where($where)
            ->count();
    }
    public function get_service_list($id,$where,$start,$last){
        $data=  M("service a")
            ->join("cxh_users b on a.new_id=b.id")
            ->join("agent c on a.new_id=c.new_id")
            ->where("a.state_level=($id-1)")->where($where)
            ->field("a.*,b.perf,c.corporate_phone,b.userid")
            ->limit($start,$last)->select();
        foreach($data as $key=>$val){
            $temp= M("service_images")->where("service_id='".$val['service_id']."'")->select();
            foreach($temp as $k=>$v){
                $data[$key]['url'][]['name']=$v['url'];
            }
        }
        return $data;
    }
    //通过服务中心记录的user_id查询他的代理商账号id
    public function get_agent($id){
            $user=M("service a")->join("agent b on a.user_id=b.user_id")
                ->join("cxh_users c on b.new_id=c.id") ->where("service_id=$id and b.agent_state=1")
                ->find();
        return $user;
    }


    //购车
    public function get_buy_count($id,$where){
        return M("buying a")
            ->where("state_level=($id-1)")
            ->join("user b on a.user_id=b.id")
            ->where($where)
            ->count();
    }
    public function get_buy_list($id,$where,$start,$last){
        return  M("buying a")
            ->where("state_level=($id-1)")
            ->where($where)
            ->join("cxh_users b on a.user_id=b.id")
            ->field("a.*,b.userid")
            ->limit($start,$last)
            ->select();
    }

    //代理商返款
    public function get_back_count($id,$where){
        return M("back a")
            ->where("state_level=($id-1)")
            ->where($where)
            ->count();
    }
    public function get_back_list($id,$where,$start,$last){
        $data =  M("back a")->where("state_level=($id-1)")->where($where)->limit($start,$last)->select();
        $arr=array();
        foreach($data as $key=>$val){
            $temp= M("agent_back_images")->where("back_id='".$val['back_id']."'")->select();
            foreach($temp as $k=>$v){
                $data[$key]['url'][]['name']=$v['image_url'];
            }
        }
        return $data;
    }

}