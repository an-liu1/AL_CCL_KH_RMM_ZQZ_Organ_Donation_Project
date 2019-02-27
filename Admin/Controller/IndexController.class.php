<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\IndexModel;

final class IndexController extends BaseController{
    public function index(){
        //check if the user login
        $this->denyAccess();
        //get donators info
        $donators = IndexModel::getInstance()->fetchALL();
        //show page
        $this->smarty->assign("donators",$donators);
        $this->smarty->display("index/index.html");
        // include VIEW_PATH."index".DS."index.html";
        
    }


    // public function top(){
    //     //check if the user login
    //     $this->denyAccess();
    //     //show page
    //     $this->smarty->display("index/top.html");
    //     // include VIEW_PATH."index".DS."top.php";
    // }

    // public function left(){
    //     //check if the user login
    //     $this->denyAccess();
    //     //show page
    //     $this->smarty->display("index/left.html");
    //     // include VIEW_PATH."index".DS."left.html";
    // }

    // public function center(){
    //     //check if the user login
    //     $this->denyAccess();
    //     //show page
    //     $this->smarty->display("index/center.html");
    //     // include VIEW_PATH."index".DS."center.html";
    // }

    // public function main(){
    //     //check if the user login
    //     $this->denyAccess();
    //     //show page
    //     $this->smarty->display("index/main.html");
    //     // include VIEW_PATH."index".DS."main.html";
    // }

}