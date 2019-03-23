<?php
namespace Frame\Vendor;
//include smarty class
require_once(FRAME_PATH."Vendor".DS."Smarty-3.1.16".DS."libs".DS."Smarty.class.php");

//define smarty class and extends original smarty class 
final class Smarty extends \Smarty{
}


// reference from 
//1. https://github.com/smarty-php/smarty/releases/tag/v3.1.16    download the smarty template
//2. https://www.smarty.net/docs/en/        smarty document