<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\PointsModel;
use \Admin\Model\UserModel;

final class PointsController extends BaseController{

    public function index(){
        //check if the user exists
        $this->denyAccess();
        $this->smarty->display("Points/points.html");

    }

    public function shipping(){
        //check if the user exists
        $this->denyAccess();
        $this->smarty->display("Points/shipping.html");
    }

    public function redeemPen(){
        //check if the user exists
        $this->denyAccess();
        $id = $_SESSION['uid'];
        $points = UserModel::getInstance()->fetchOne("id=$id");
        if($points['points'] - 200 < 0){
            $this->jump('You do not have enough points, go daily check to get more points!', '?c=Points&a=index');
        }
        $data['points'] = $points['points'] - 200;
        if(UserModel::getInstance()->update($data,$id)){
            $this->jump('Successfully redeem a Pen, fill the shipping information please!', '?c=Points&a=shipping');
            
        }else{
            $this->jump('Failed to redeem, try again!', '?c=Points&a=index');
        }
    }

    public function redeemTshirt(){
        //check if the user exists
        $this->denyAccess();
        $id = $_SESSION['uid'];
        $points = UserModel::getInstance()->fetchOne("id=$id");
        if($points['points'] - 600 < 0){
            $this->jump('You do not have enough points, go daily check to get more points!', '?c=Points&a=index');
        }
        $data['points'] = $points['points'] - 600;
        if(UserModel::getInstance()->update($data,$id)){
            $this->jump('Successfully redeem a T-shirt, fill the shipping information please!', '?c=Points&a=shipping');
        }else{
            $this->jump('Failed to redeem, try again!', '?c=Points&a=index');
        }
    }

    public function redeemBandaid(){
        //check if the user exists
        $this->denyAccess();
        $id = $_SESSION['uid'];
        $points = UserModel::getInstance()->fetchOne("id=$id");
        if($points['points'] - 400 < 0){
            $this->jump('You do not have enough points, go daily check to get more points!', '?c=Points&a=index');
        }
        $data['points'] = $points['points'] - 400;
        if(UserModel::getInstance()->update($data,$id)){
            $this->jump('Successfully redeem a Band-aid, fill the shipping information please!', '?c=Points&a=shipping');
        }else{
            $this->jump('Failed to redeem, try again!', '?c=Points&a=index');
        }
    }

    public function redeemKit(){
        //check if the user exists
        $this->denyAccess();
        $id = $_SESSION['uid'];
        $points = UserModel::getInstance()->fetchOne("id=$id");
        if($points['points'] - 800 < 0){
            $this->jump('You do not have enough points, go daily check to get more points!', '?c=Points&a=index');
        }
        $data['points'] = $points['points'] - 800;
        if(UserModel::getInstance()->update($data,$id)){
            $this->jump('Successfully redeem a Medical Kit, fill the shipping information please!', '?c=Points&a=shipping');
        }else{
            $this->jump('Failed to redeem, try again!', '?c=Points&a=index');
        }
    }

    public function redeemMASK(){
        //check if the user exists
        $this->denyAccess();
        $id = $_SESSION['uid'];
        $points = UserModel::getInstance()->fetchOne("id=$id");
        if($points['points'] - 300 < 0){
            $this->jump('You do not have enough points, go daily check to get more points!', '?c=Points&a=index');
        }
        $data['points'] = $points['points'] - 300;
        if(UserModel::getInstance()->update($data,$id)){
            $this->jump('Successfully redeem a MASK, fill the shipping information please!', '?c=Points&a=shipping');
        }else{
            $this->jump('Failed to redeem, try again!', '?c=Points&a=index');
        }
    }

    public function redeemAlert(){
        //check if the user exists
        $this->denyAccess();
        $id = $_SESSION['uid'];
        $points = UserModel::getInstance()->fetchOne("id=$id");
        if($points['points'] - 1200 < 0){
            $this->jump('You do not have enough points, go daily check to get more points!', '?c=Points&a=index');
        }
        $data['points'] = $points['points'] - 1200;
        if(UserModel::getInstance()->update($data,$id)){
            $this->jump('Successfully redeem a Emergency Alert, fill the shipping information please!', '?c=Points&a=shipping');
        }else{
            $this->jump('Failed to redeem, try again!', '?c=Points&a=index');
        }
    }

    public function redeemNotebook(){
        //check if the user exists
        $this->denyAccess();
        $id = $_SESSION['uid'];
        $points = UserModel::getInstance()->fetchOne("id=$id");
        if($points['points'] - 600 < 0){
            $this->jump('You do not have enough points, go daily check to get more points!', '?c=Points&a=index');
        }
        $data['points'] = $points['points'] - 600;
        if(UserModel::getInstance()->update($data,$id)){
            $this->jump('Successfully redeem a Notebook, fill the shipping information please!', '?c=Points&a=shipping');
        }else{
            $this->jump('Failed to redeem, try again!', '?c=Points&a=index');
        }
    }

    public function redeemThermometer(){
        //check if the user exists
        $this->denyAccess();
        $id = $_SESSION['uid'];
        $points = UserModel::getInstance()->fetchOne("id=$id");
        if($points['points'] - 600 < 0){
            $this->jump('You do not have enough points, go daily check to get more points!', '?c=Points&a=index');
        }
        $data['points'] = $points['points'] - 600;
        if(UserModel::getInstance()->update($data,$id)){
            $this->jump('Successfully redeem a Thermometer, fill the shipping information please!', '?c=Points&a=shipping');
        }else{
            $this->jump('Failed to redeem, try again!', '?c=Points&a=index');
        }
    }
}