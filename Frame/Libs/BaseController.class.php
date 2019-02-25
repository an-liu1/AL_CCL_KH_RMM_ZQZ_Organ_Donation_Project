<?php
namespace Frame\Libs;

abstract class BaseController{
	//protected smarty object
	protected $smarty = NULL;

	public function __construct()
	{
		//initial smarty
		$this->initSmarty();
	}

	private function initSmarty()
	{
		$smarty = new \Frame\Vendor\Smarty();
		//smarty config
		$smarty->left_delimiter = "<{";  
		$smarty->right_delimiter = "}>";
		$smarty->setTemplateDir(VIEW_PATH);
		$smarty->setCompileDir(sys_get_temp_dir().DS."view"); 
		$this->smarty = $smarty;
	}

	protected function denyAccess(){
		//check if the user exists
		if(!isset($_SESSION['username'])){
			$this->jump("Please Login First!!","?c=User&a=login");
		}
	}

	protected function jump($message,$url='?',$time=0.5)
	{
		//jump to new page function
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("refresh:{$time};url={$url}");
		die();
	}
}

