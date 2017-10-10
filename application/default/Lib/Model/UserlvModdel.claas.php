<?php

class UserlvModel extends Model{
    //等级查询
     public function get_lv($where){
        return M("user")
            ->join("level on user.dls_lv=level.level_id")
            ->where($where)
            ->find();
    }
}