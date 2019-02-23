<?php
namespace Frame\Libs;

abstract class BaseController{


	protected function jump($message,$url='?',$time=3)
	{
		header("Location:".VIEW_PATH."Public\jump.php");
		die();
	}
}

