<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/16
 * Time: 14:52
 */
header("Content-type:text/html;charset=utf-8");
class ExamineAction extends WebAction{
    //流程管理页
    public function show_examine(){
        $role_list=D("Examine")->get_role_list();
        $menu_list=D("Examine")->get_menu_list();

        $examine1=$this->sigcol_arrsort(D("Examine")->get_examine(1),'sort');
        $examine2=$this->sigcol_arrsort(D("Examine")->get_examine(2),'sort');
        $examine3=$this->sigcol_arrsort(D("Examine")->get_examine(3),'sort');
        $examine4=$this->sigcol_arrsort(D("Examine")->get_examine(4),'sort');
        $examine5=$this->sigcol_arrsort(D("Examine")->get_examine(5),'sort');
        $examine6=$this->sigcol_arrsort(D("Examine")->get_examine(6),'sort');


        $this->assign("examine_remit",$examine1);
        $this->assign("examine_cash",$examine2);
        $this->assign("examine_agent",$examine3);
        $this->assign("examine_service",$examine4);
        $this->assign("examine_buy",$examine5);
        $this->assign("examine_back",$examine6);
        $this->assign("role_list",$role_list);
        $this->assign("menu_list",$menu_list);
        /*echo "<pre>";
        print_r($examine1);
        die();*/
        $this->display("examine/examine");
    }

    //添加流程
    public function add_examine(){
        $arr=array(
            'menu_id'=>I('post.m'),
            'role_id'=>I('post.r'),
            'sort'=>I('post.l'),
        );
        if(M("examine")->add($arr)){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }
    public function del_examine(){
        $menu_id=I('post.m');
        $sort=I('post.sort');

        $data=M("examine")->where("menu_id=$menu_id and sort=$sort")->delete();
        $arr=mysql_query("update examine set sort=sort-1 where menu_id=".$menu_id." and sort>".$sort);
        if($data&&$arr){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }

    }

}