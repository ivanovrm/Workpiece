<?php

//старое подключение
//require_once __DIR__ . '/controller/newsController.php';
/*$controller = new NewsController();
$controller->actionAll();*/

//через адресную строку можем обрашаться к разным классам
//по умолчанию вызывает класс news, все новости
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] :'News';
$act = isset($_GET['act']) ? $_GET['act'] :'All';


$controllerClassName= $ctrl . 'Controller';
require_once __DIR__ . '/controller/' . $controllerClassName . '.php';

$controller = new $controllerClassName;
$method = 'action' . $act;
//это имя переменной
$controller->$method();