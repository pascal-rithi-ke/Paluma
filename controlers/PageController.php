<?php
switch($_REQUEST['action']) {
case 'pageInfo' :
$obj->getPageInfo();
break;
}
Class PageController Extends BaseController {

public function getPageInfo()
{
$this->render('page/index');
}
}