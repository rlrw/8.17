<?php
class UploadImage{
    //上传的路劲
    public $path="./Uploads/images";
    //上传的图片名称
    public $self_name='';
    public $small_name='';
    //上传的图片允许最大大小
    public $size=2097152;
    //允许文件上传的类型
    public $array=array('jpeg','png','gif','jpg');
    //新路径
    public $va;
    public $val;
    //检测并创建目录
    public function __construct(){
        $this->take('self');
    }
    public function take($num){
        $path = $this->path . "/" . $num . "/" . date('Y') . "/" . date('m') . "/" . date('d');
        $arr = explode('/', $path);
        $this->va = ".";
        for ($i = 1; $i < count($arr); $i++) {
            $this->va .= "/" . $arr[$i];
            if (!is_dir($this->va)) {
                mkdir($this->va);
            }
        }
    }
    public function tak($num){
        $path = $this->path . "/" . $num . "/" . date('Y') . "/" . date('m') . "/" . date('d');
        $arr = explode('/', $path);
        $this->val = ".";
        for ($i = 1; $i < count($arr); $i++) {
            $this->val .= "/" . $arr[$i];
            if (!is_dir($this->val)) {
                mkdir($this->val);
            }
        }
    }
    //
    public function check($pic){
        //检测文件大小
        if($pic['size']>$this->size){
            die('文件大小不能超过2M');
        }
        //检测文件类型
        $type=@array_pop(explode('/',$pic['type']));
        if(!in_array($type,$this->array)){
            var_dump($pic['type']);
            die('不支持该文件类型');

        }
        //获取原文件名的后缀
        $last=@array_pop(explode('.',$pic['name']));
        //生成随机文件名
        $this->self_name=time().substr(str_shuffle('123456789'),0,4).'.'.$last;
        $this->small_name=time().mt_rand(1000,9999).'.'.$last;
        move_uploaded_file($pic['tmp_name'],$this->va."/".$this->self_name);
        return substr($this->va."/".$this->self_name,17);
    }
    public function takeSmall(){
        $x=getimagesize($this->va."/".$this->self_name);
        //获得图片宽
        $width=$x[0];
        //获得图片高
        $height=$x[1];
        //定义缩略图的宽，高
        $nWidth=$width/4;
        $nHeight=$height/4;
        //创建画布
        $im=imagecreatetruecolor($nWidth,$nHeight);
        if ( $x[2] == 1 ) {
            $i = imagecreatefromgif($this->va."/".$this->self_name);
        }
        elseif ( $x[2] == 2 ) {
            $i = imagecreatefromjpeg($this->va."/".$this->self_name);
        }
        else{
            $i = imagecreatefrompng($this->va."/".$this->self_name);
        }
        imagecopyresampled($im,$i,0,0,0,0,$nWidth,$nHeight,$width,$height);
        imagegif($im,$this->val."/".$this->small_name);
        return substr($this->val."/".$this->small_name,17);
    }
    public  function shuiYin(){
        $x=getimagesize($this->va."/".$this->self_name);
        if ( $x[2] == 1 ) {
            $i = imagecreatefromgif($this->va."/".$this->self_name);
        }
        elseif ( $x[2] == 2 ) {
            $i = imagecreatefromjpeg($this->va."/".$this->self_name);
        }
        else{
            $i = imagecreatefrompng($this->va."/".$this->self_name);
        }
        $y=imagecreatefromgif('./style.gif');
        $m=getimagesize('./style.gif');
        //获得图片宽
        $width=$x[0];
        //获得图片高
        $height=$x[1];
        //定义缩略图的宽，高
        $nWidth=$m[0]/4;
        $nHeight=$m[1]/4;
        //获取原文件名的后缀
        $last=@array_pop(explode('/',$x['mime']));
        //生成随机文件名
        $nName=time().mt_rand(1000,9999).'.'.$last;
        imagecopyresampled($i,$y,0,$height-$nHeight+30,0,0,$nWidth,$nHeight,$width,$height);
        imagegif($i,$this->val."/".$nName);
    }
}


