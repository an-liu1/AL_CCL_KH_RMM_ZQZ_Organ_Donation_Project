<?php
namespace Frame\Vendor;

final class Captcha{
    
    private $code; //verify code string
    private $codelen; //code length
    private $width; //captcha image width
    private $height; //captcha image height
    private $img; //background
    private $fontsize;
    private $fontfile; //font

    public function __construct($codelen=4,$width=185,$height=140,$fontsize=20){
        
        $this->codelen = $codelen;
        $this->width = $width;
        $this->height = $height;
        $this->fontsize = $fontsize;
        $this->fontfile = "./Public/Admin/Images/msyh.ttf";
        $this->code = $this->createCode();// create random code 
        $this->img = $this->createImg();//create empty img
        $this->createBg(); // background color
        $this->createText(); // input code
        $this->outPut(); //output img
    }

    private function createCode(){
        //create captcha string and disorganize it
        $arr_str = array_merge(range('a','z'),range('A','Z'),range(0,9));
        shuffle($arr_str);
        $arr_index = array_rand($arr_str,$this->codelen);
        $str = "";
        foreach ($arr_index as $i) {
            $str .= $arr_str[$i];
        }
        $_SESSION['captcha'] = $str;
        return $str;
    }

    private function createImg(){
        //create empty img
        return imagecreatetruecolor($this->width,$this->height);
    }

    private function createBg(){
        //add backgorund color to img
        //get color
        $color = imagecolorallocate($this->img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        // color rectangle
        imagefilledrectangle($this->img,0,0,$this->width,$this->height,$color);
    }

    private function createText(){
        //add color to text
        $color = imagecolorallocate($this->img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        //put code on the img
        imagettftext($this->img,$this->fontsize,0,5,30,$color,$this->fontfile,$this->code);
    }

    private function outPut(){
        //mime style
        header("content-type:image/png");
        //output img
        imagepng($this->img);
        //destroy img
        imagedestroy($this->img);
    }


}