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
        $data['points'] = '0';
        $data['register_date'] = time();
        
        //check if the username exists
        if(UserModel::getInstance()->rowCount("user_name='{$data['user_name']}'")){
            $this->jump("Username already exists, try other Please!","?c=User&a=signup");
        }
        
        if(UserModel::getInstance()->insert($data)){
            $this->jump("Congratulation!!Successfully registered!!","?c=User&a=login");
        }else{
            $this->jump("Hummmm, something worng! Try again please!","?c=User&a=signup");
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

        $this->jump("Successfully Login!!","?c=Index&a=index");
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