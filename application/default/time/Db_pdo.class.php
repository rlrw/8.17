<?php

class Db_pdo{
    public $db;
    public $table;//操作的表
    public $where;//条件
    public $group;//分组
    public $order;//排序
    public $field='*';//字段
    public $limit;//分页
    public $log;
    public $sql;
    public function __construct($dbname,$user,$password){
        header("Content-type:text/html;'charset=utf8'");
        $dsn="mysql:host=192.168.1.254;dbname=$dbname;charset=utf8";
        $this->db=new PDO($dsn,$user,$password);
        require_once("./Wrong.class.php");
        $this->log=new Wrong();
    }
    //传入表
    public function table($table){
        $this->table=$table;
        return $this;
    }
    //传入条件
    public function where($str){
        if($str!=""){
            $this->where=" WHERE ".$str;
        }else{
            $this->where='';
        }
        return $this;
    }
    //传入分组
    public function group($str){
        if($str!=""){
            $this->group=" GROUP BY ".$str;
        }else{
            $this->group='';
        }
        return $this;
    }
    //传入排序
    public function order($str){
        if($str!=""){
            $this->order=" ORDER BY ".$str;
        }else{
            $this->order='';
        }
        return $this;
    }
    //传入分页
    public function limit($i,$length){
        if($i!="" && $length!=""){
            $this->limit=" LIMIT ".$i.",".$length;
        }else{
            $this->limit='';
        }
        return $this;
    }
    //传入查询字段
    public function field($str){
        if($str!=''){
            $this->field=$str;

        }else{
            $this->field="*";
        }
        return $this;
    }
    //添加记录  返回添加的id
    public function insert($arr){
        $k="`".implode("`,`",array_keys($arr))."`";
        $v="'".implode("','",array_values($arr))."'";
        $sql="INSERT INTO $this->table ($k) VALUE ($v)";
        if($this->db->query($sql)){
            return $this->db->lastInsertId();
        }else{
            $this->log->log_into(implode('--',$this->db->errorInfo()));
            die(0);
        }
    }
    public function new_query($sql){
        return $this->db->query($sql);
    }
    //修改记录
    public function update($arr){
        $sql="UPDATE $this->table SET ";
        foreach($arr as $k=>$v){
            $sql.= $k."='".$v."',";
        }
        $sql=substr($sql,0,-1).$this->where;
        if($this->db->query($sql)){
            return true;
        }else{
            $this->log->log_into(implode('--',$this->db->errorInfo()));
            die(0);
        }
    }
    //删除记录
    public function delete(){
        $sql="DELETE FROM $this->table $this->where";
        if($this->db->query($sql)){
            return true;
        }else{
            $this->log->log_into(implode('--',$this->db->errorInfo()));
            die(0);
        }
    }
    //查询记录 返回数组集合
    public function select(){
        $sql="SELECT $this->field FROM $this->table $this->where $this->group $this->order $this->limit";
        $result=$this->db->query($sql);
        if($result){
            $arr=array();
            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                $arr[]=$row;
            }
            return $arr;
        }else{
            $this->log->log_into(implode('--',$this->db->errorInfo()));
            die(0);
        }

    }
    //查询条数
    public function selectRows(){
        $sql="SELECT $this->field FROM $this->table $this->where $this->group $this->order $this->limit";
        $result=$this->db->query($sql);
        if($result){
            return $result->rowCount();
        }else{
            $this->log->log_into(implode('--',$this->db->errorInfo()));
            die(0);
        }

    }
    //开启事务
    public function begin(){
        $this->db->beginTransaction();
    }
    //提交事务
    public function commit(){
        $this->db->commit();
    }
    //事务回滚
    public function rollBack(){
        $this->db->rollBack();
    }
}
