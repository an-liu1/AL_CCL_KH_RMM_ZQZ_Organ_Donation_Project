<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\UserModel;

final class UserController extends BaseController{
    public function index(){
        //check if the user exists
        $this->denyAccess();
        //if esists, get user info
        $users = UserModel::getInstance()->fetchAll();
        $this->smarty->assign("users",$users);
        $this->smarty->display("User/index.html");
    }

    public function add(){
        //get data from user
        $data['user_name'] = $_POST['username'];
        $data['user_pass'] = md5($_POST['password']);
        $data['name'] = $_POST['name'];
        $data['tel'] = $_POST['tel'];
        $data['email'] = $_POST['email'];
        $data['points'] = '300';
        $data['register_date'] = time();
        $check = isset($_POST['check'])?1:0;
        //check if the user view the policy 
        if($check == 0){
            $this->jump("Please view the policy first, thank you!!","?c=User&a=signup");
        }elseif($check == 1){
            
            //check if the username exists
            if(UserModel::getInstance()->rowCount("user_name='{$data['user_name']}'")){
                $this->jump("Username already exists, try other Please!","?c=User&a=signup");
            }
            
            if(UserModel::getInstance()->insert($data)){
                $this->jump("Congratulation!!Successfully registered and you get 300 ponits!!!","?c=User&a=login");
            }else{
                $this->jump("Hummmm, something worng! Try again please!","?c=User&a=signup");
            }
        }
    }

    public function showUser(){
        //check if the user exists
        $this->denyAccess();
        //get login id 
        $id = $_SESSION['uid'];
        //get user info
        $userInfo = UserModel::getInstance()->fetchOne("id = $id");
        $this->smarty->assign("userInfo",$userInfo);
        $this->smarty->display("User/edit.html");
    }

    public function edit(){
        //check if the user exists
        $this->denyAccess();
        //geu login id
        $id = $_SESSION['uid'];
        //get edited user info
        $data['user_name'] = $_POST['user_name'];
        $data['tel'] = $_POST['tel'];
        $data['email'] = $_POST['email'];
        $data['name'] = $_POST['name'];

        //check if the two passwords match
        if($_POST['new_pass'] != $_POST['confirm_pass']){
            $this->jump("Those passwords did not match. Try again!","?c=User&a=showUser");
        }else{
            $data['user_pass'] = md5($_POST['new_pass']);
        }
        //edit user info
        if(UserModel::getInstance()->update($data,$id)){
            $this->jump("Successfully change your information!!","?c=User&a=showUser");
        }else{
            $this->jump("Failed to change your information. Try again!","?c=User&a=showUser");
        }
        
    }
    public function delete(){
        //check if the user exists
        $this->denyAccess();
        //get user id
        $id = $_GET['id']; 
        //if successfully delete, back to admin page
        if(UserModel::getInstance()->delete($id)){
            $this->jump("Successfully delete!! ","?c=User&a=index");
        }else{
            $this->jump("Failed delete!! ","?c=User&a=index");
        }
    }

    public function login(){
        //show login page
        $this->smarty->display("User/login.html");
    }

    public function loginCheck(){
        //get form data
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //check database
        $user = UserModel::getInstance()->fetchOne("user_name='$username' AND user_pass='$password'");

        if(empty($user)){
            $this->jump("Please check your username and password!","?c=User&a=login");
        }
        //update user info
        $data['last_login_ip'] = $_SERVER['REMOTE_ADDR'];
        $data['last_login_time'] = time();
        $data['login_times'] = $user['login_times']+1; 
        if(!UserModel::getInstance()->update($data,$user['id'])){
            $this->jump("Failed to update user's info!","?c=User&a=login");
        }
        //input username and is into session
        $_SESSION['username'] = $user['user_name'];
        $_SESSION['uid'] = $user['id'];

        header("refresh:0;url=?c=Index&a=index");
    }

    public function signup(){
        $this->smarty->display("User/signup.html");
    }

    public function logout(){
        //delete session info
        unset($_SESSION['username']);
        unset($_SESSION['uid']);
        //delete session file
        session_destroy();
        //delete cookie data
        setcookie(session_name(),false);

        $this->jump("Successfully Log Out!!","?c=User&a=login");
    }
}