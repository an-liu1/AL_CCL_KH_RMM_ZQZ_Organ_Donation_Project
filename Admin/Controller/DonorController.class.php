<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\UserModel;

final class DonorController extends BaseController{
    public function index(){
        //check if the user login
        $this->denyAccess();
        //show page
        $this->smarty->display("Donor/index.html");
    }

    public function submitForm(){
        //check if the user login
        $this->denyAccess();
        //validate file
        $donor_form = $_FILES['donor_form'];
        $file_type = pathinfo($donor_form['name'], PATHINFO_EXTENSION);
        $accepted_types = array('pdf', 'doc', 'docx');
        if (!in_array($file_type, $accepted_types)) {
            $this->jump('Wrong file type!', '?c=Donor&a=index');
        }

        //check the form name
        $donor_name = pathinfo($donor_form['name'], PATHINFO_FILENAME);
        if($donor_name != $_SESSION['username'].'_donor_form'){
            $this->jump('Your should follow the naming convention：username_donor_form, like admin_donor_form！', '?c=Donor&a=index');
        }

        //move file to the destination 
        $file_name = pathinfo($donor_form['name'], PATHINFO_BASENAME);
        $target_path = ".\Public\Admin\upload_donorform/".$file_name;
        if (!move_uploaded_file($donor_form['tmp_name'], $target_path)) {
           $this->jump('Failed to move uploaded file, check permission!', '?c=Donor&a=index');
        }else{
            $id = $_SESSION['uid'];
            $ponits = UserModel::getInstance()->fetchOne("id = $id");
            $data['points'] = $ponits['points'] + 2000;
            $data['donor_form'] = $file_name;
            if(UserModel::getInstance()->update($data,$id)){
                $this->jump('Successfullu submit your donor form! Thank You!! You will get 2000 points!', '?c=Donor&a=index');
            }else{
                $this->jump('Failed to submit your donor form! Try again please!!', '?c=Donor&a=index');
            }
        }

    }
}