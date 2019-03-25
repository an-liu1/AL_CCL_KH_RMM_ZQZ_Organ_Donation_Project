<?php
namespace Home\Controller;
use  \Frame\Libs\BaseController;
use Home\Model\indexModel;

final class IndexController extends BaseController{
    public function index(){
        @$id = $_SESSION['uid'];
        if($id == NULL){
            $this->smarty->display("Index/index.html");
        }else{
            $user = IndexModel::getinstance()->fetchOne("id = $id");
            $username = $user['user_name'];
            $this->smarty->assign("username",$username);
            $this->smarty->display("Index/index.html");
        }
        
    }
}