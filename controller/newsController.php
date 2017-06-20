<?php

/*function __autoload($className){
	if(file_exists(__DIR__ . '/controller/' . $className . '.php' )){
		require_once __DIR__ . '/controller/' . $className . '.php' ;
	}else if(file_exists(__DIR__ . '/classes/' . $className . '.php' )){
		require_once __DIR__ . '/classes/' . $className . '.php' ;
	}else if(file_exists(__DIR__ . '/model/' . $className . '.php' )){
		require_once __DIR__ . '/model/' . $className . '.php' ;
	}
}*/



require_once __DIR__ . '/../model/NewsModel.php';
require_once __DIR__ . '/../classes/view.php';



class NewsController {

	

	public function actionAll(){

		$art = NewsModel::findOneByColumn('title', 'Новый заголовок');
		$art->title = 'Новый заголовок 222';
		$art->save();

		var_dump($art->id);






	/*	$art = new NewsModel();
		$art->title = 'последний';
		$art->content = 'use id';
		$art->insert();

		var_dump($art->id);*/


		die;
	}

	
}

