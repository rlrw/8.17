<?php 
 function get_pids($id){
                $str='';
                $r=M('fx_user')->where('uid='.$id)->field('uid,pid')->find();
                if ($r['pid']!='') {             
                  $str.=$r['pid'];
                  $npid=get_pids($r['pid']);
                  if (isset($npid)) {
                      $str.=','.$npid;
                  }
                  return $str;
                }else{
                  return $id;
                } 

            }
    function get_lvss(){
                $ttda['id']=$_SESSION['id'];

            $aa=M('cxh_users')->join("level on cxh_users.dls_lv=level.level_id")
                    ->where($ttda)
                    ->find();
            $perf=$aa['perf'];
            $ttaa['pid']=$_SESSION['id'];
            //查询用户的下级用户和自己的销售总额
            $number=M('fx_user')->where($ttaa)->count();
            $uids=M('fx_user')->where($ttaa)->field('uid')->select();
            $uid=''; 
               foreach ($uids as $key => $v) {        
                       foreach ($v as $key => $value) {
                           $uid[]=$value;
                       }
                   }
            $ssa['id']=array('in',$uid);
            //kaishi
            $level=M('level')->select();         
            foreach ($level as $k => $v) {        
                if ($perf>=$v['demand']&&$number>=$v['lower_number']) {
                     $wher['id']=array('in',$uid);
                        $condition['_logic'] = "AND";
                        $asa['_complex']=$wher;
                        $asa['perf'] = array("egt",$v['lower_achievement']);                
                   $achii= M('cxh_users')->where($asa)->count();                 
                  if ($achii>=$v['lower_group']) {
                 $lvs=$v['level_id'];
                  }                   
                }
            }    
            return $lvs;
    }
     function get_plv($id){
                $str='';
                $r=M('fx_user')
                ->where('uid='.$id)
                ->field('uid,pid')
                ->find();
                if ($r['pid']!='') {             
                  $str.=$r['pid'];
                  $npid=get_pids($r['pid']);
                  if (isset($npid)) {
                      $str.=','.$npid;
                  }
            
                }
                $lvinfo['id']=array('in',$str);

                $lvinfos=M('cxh_users')->where($lvinfo)->join('level on cxh_users.dls_lv=level.level_id')->field('cxh_users.id,cxh_users.no_points,cxh_users.pay_points,cxh_users.dls_lv,level.commission')->order('cxh_users.dls_lv ')->select();
             /*   echo M()->getlastsql();*/
               return $lvinfos;         
            }
              function getArrayUniqueByKeyss($arr)  
               {  
                   $arr_out =array();  
                   foreach($arr as $k => $v)  
                   {  
                        $key_out = $v['dls_lv']."-".$v['commission']; //提取内部一维数组的key(name age)作为外部数组的键  
  
                        if(array_key_exists($key_out,$arr_out)){  
                            continue;  
                        }  
                        else{  
                             $arr_out[$key_out] = $arr[$k]; //以key_out作为外部数组的键  
                             $arr_wish[$k] = $arr[$k];  //实现二维数组唯一性  
                        }  
                   }  
                   return $arr_wish;  
               }
               function pay_infos($lv,$arr){
           
                  foreach ($arr as $key => $value) {
                   $usid['id']= $value['id'];
                   $pay = $value['pay_points'];
                   $jc  = $value['jc'];
                   $uarr=array(
                    'pay_points'=>$pay+$jc*$lv*0.85,
                    'no_points'=>$lv*$jc*0.1+$value['no_points']
                    );

                   $parr=array(
                    'uid'=>$value['id'],
                      'money'=>$lv*$jc,
                      'tax'=>$lv*$jc*0.05,
                      'no_points'=>$lv*$jc*0.1,
                      'status'=>3,
                      'pay_points'=>$lv*$jc*0.85,
                      'sum_pay'=>$value['pay_points']+$lv*$jc*0.85
                    );
                  $act8= M('cxh_users')->where($usid)->save($uarr);
                 /* echo M()->getlastsql();echo "$act8.<hr/>";*/
                   $act9=M('pay_info')->add($parr);
                    /* echo M()->getlastsql();echo "<hr/>";*/
                  }
                 

               }  

              function get_pays($sta,$pay){
                $where['uid']=$_SESSION['id'];
                $nowtime=date("Y-m-d ");
                $where['datetime']=["EGT",$nowtime];
                $where['status']=$sta;
                $pay=M('pay_info')->where($where)->sum("$pay");
                return $pay;
              }
     

 ?>