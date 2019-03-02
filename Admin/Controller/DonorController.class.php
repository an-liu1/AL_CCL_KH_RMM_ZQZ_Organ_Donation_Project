<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;

final class DonorController extends BaseController{
    public function index(){
        //check if the user login
        $this->denyAccess();
        //show page
        $this->smarty->display("Donor/index.html");
    }
}