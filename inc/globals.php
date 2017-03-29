<?php
@ini_set('display_errors', '1');
//error_reporting(E_ALL);
error_reporting(E_ALL ^ E_WARNING);  

date_default_timezone_set("America/Sao_Paulo");

$hoje = date('Y-m-d'); //global data
//$hoje = "2017-03-27"; //data para testar