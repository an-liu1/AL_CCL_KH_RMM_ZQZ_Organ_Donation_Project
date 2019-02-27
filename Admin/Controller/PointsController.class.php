<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\PointsModel;

final class PointsController extends BaseController{

    public function index(){
        //check if the user exists
        $this->denyAccess();
        $this->smarty->display("Points/points.html");

    }
}