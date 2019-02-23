<?php
namespace Home\Controller;
use  \Frame\Libs\BaseController;
use Home\Model\indexModel;

final class IndexController extends BaseController{
    public function index(){
        $modelObj = IndexModel::getInstance();
        $arrs = $modelObj->fetchAll();
        include VIEW_PATH."index".DS."index.html";
    }

    public function delete(){
        $id = $_GET['id'];
        $modelObj = IndexModel::getInstance();

        if($modelObj->delete($id)){
            echo "successful delete!!";
            header("refresh:3;url=?");
        }else{
            echo "failed delete!!";
            header("refresh:3;url=?");
        }
    }
}