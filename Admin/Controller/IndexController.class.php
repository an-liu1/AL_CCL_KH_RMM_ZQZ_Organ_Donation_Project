<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\IndexModel;
use \Admin\Model\UserModel;

final class IndexController extends BaseController{
    public function index(){
        //check if the user login
        $this->denyAccess();
        //get donators info
        $donators = IndexModel::getInstance()->fetchALL();
        //get points
        $id = $_SESSION['uid'];
        $points = UserModel::getInstance()->fetchOne("id = $id");
        // //show page
        $this->smarty->assign("points",$points);
        $this->smarty->assign("donators",$donators);
        $this->smarty->display("index/index.html");
        // include VIEW_PATH."index".DS."index.html";
    }

    public function checkIn(){
        //check if the user login
        $this->denyAccess();
        //get user info 
        $id = $_SESSION['uid'];
        $getPoints = UserModel::getInstance()->fetchOne("id = $id");
        $last_login_time = $_SESSION['last_login_time'];
        $today = strtotime(date('Y-m-d')) - 14400;
        if($last_login_time < $today){
            $data['points'] = $getPoints['points'] + 20;
            $data['last_login_time'] = time() - 14400;
            $updatPoints = UserModel::getInstance()->update($data,$id);
            header('refresh:0;url=?c=Index&a=index');   
        }else{
            $this->jump("You already check in today!!","?c=index&a=index");
        }
    }
}