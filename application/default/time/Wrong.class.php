<?php
class Wrong{
    public $new='./log/id_log.txt';
    public $result;
    public function __construct(){
        //判断上一级是否有这个目录 没有则创建
        if(!is_dir(dirname($this->new))){
            mkdir(dirname($this->new));
        }
    }
    public function log_into($str){
        date_default_timezone_set('PRC');
        //打开报错日志，没有则创建
        $this->result=fopen($this->new,'a+');
        //获取报错信息
        $str="[".date('Y-m-d H:i:s')."]"."错误信息:".$str."\r\n";
        //将信息写入文件
        fwrite($this->result,$str);
    }
}
$a=new Wrong();