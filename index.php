<?php
require_once('controllers/Router.php');
include('views/viewHeader.html');
$router = new Router();
$router-> routeReq();
/*
define ("ROOT", __DIR__);

require ROOT . "/vendor/autoload.php";
require ROOT . "/Config/router/router.php";

use App\Manager\ArticleManager;
$manager = new ArticleManager();
$manager->index();
*/