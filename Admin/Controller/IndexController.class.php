<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;

final class IndexController extends BaseController{
    public function index(){
        include VIEW_PATH."index".DS."index.html";
    }

    public function top(){
        include VIEW_PATH."index".DS."top.html";
    }

    public function left(){
        include VIEW_PATH."index".DS."left.html";
    }

    public function center(){
        include VIEW_PATH."index".DS."center.html";
    }

    public function main(){
        include VIEW_PATH."index".DS."main.php";
    }

}