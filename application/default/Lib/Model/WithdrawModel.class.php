  <?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2017/8/9
 * Time: 18:20
 */
class WithdrawModel extends Model{
    //验证二级密码
        public function check_pwd($pwd,$id){
            return M("cxh_users")->where("ejmm=$pwd and id=$id")->field('id')->select();
        }
    //添加提现申请记录
    public function add_withdraw($arr){
        return M("withdraw")->add($arr);
    }
    //查询申请记录
    public function get_withdraw($table,$id,$start,$num){
        return M($table)->where("user_id=$id")->limit($start,$num)->order('time desc')->select();
    }
    //查询申请记录数量
    public function get_count($table,$id){
        return M($table)->where("user_id=$id")->field("withdraw_id")->count();
    }
    //查询用户信息
    public function get_user($id){
        $data=M("cxh_users")
            ->field('name,userid,bank,bankcard,pay_points,dj_points,id')
            ->where("id=$id")
            ->select();
        return $data[0];
    }
}