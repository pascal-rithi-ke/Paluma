<?php

define ("ROOT", __DIR__);

require "vendor/autoload.php";
use include\PDOPaluma;

$pdopaluma = new PDOPaluma();
$pdopaluma->getListe();
?>