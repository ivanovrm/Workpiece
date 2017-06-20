<?php

function __autoload($className){
	if(file_exists(__DIR__ . '/controller/' . $className . '.php' )){
		require_once __DIR__ . '/controller/' . $className . '.php' ;
	}else if(file_exists(__DIR__ . '/classes/' . $className . '.php' )){
		require_once __DIR__ . '/classes/' . $className . '.php' ;
	}else if(file_exists(__DIR__ . '/model/' . $className . '.php' )){
		require_once __DIR__ . '/model/' . $className . '.php' ;
	}
}