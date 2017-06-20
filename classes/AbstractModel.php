<?php

abstract class AbstractModel{

	static protected $table;
	protected $data =[];




	public function __set($k, $v){

		$this->data[$k] = $v;
	}



	public function __get($k){

		return $this->data[$k];
	}



	public function __isset($k){

		return isset($data[$k]);
	}



	public static function findAll(){
		
		$class = get_called_class();
		$sql = 'SELECT * FROM ' . static::$table;
		$db = new DB();
		$db->setClassName($class);
		return $db->query($sql);
	}



	public static function findOneByPk($id){
		
		$class = get_called_class();
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
		$db = new DB();
		$db->setClassName($class);
		return $db->query($sql, [':id'=>$id])[0];
	}



	public static function findOneByColumn($column, $value){

		$db = new DB();
		$db->setClassName( get_called_class());
			$sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value' ;
		$res = $db->query($sql, [':value'=>$value]);
		//var_dump($res);
		if(!empty($res)){
			return $res[0];
		}

		return false;
	}



	protected function insert(){

		$cols = array_keys($this->data);

		$data = [];
		
		foreach ($cols as $col) {
			$data[':' . $col] = $this->data[$col];	
		}

		$sql = 'INSERT INTO ' . static::$table . ' ('. implode(', ', $cols) .') VALUES (' . implode(', ', array_keys($data)) . ')';

		$db = new DB();
		$db->execute($sql, $data);
		$this->id = $db->lastInsertId();
	}


	protected function update(){

		$cols = [];
		$data = [];

		foreach ($this->data as $k => $v){
			if('pub_date' == $k){
				continue;
			};

			$data[':'.$k] = $v;

			if('id' == $k){
				continue;
			};

			$cols[] = $k . '=:' . $k;
		}

		/*var_dump($cols);
		var_dump($data);*/
		$sql = '
		UPDATE post 
		SET ' . implode(', ', $cols) . '
		WHERE id=:id
		';

		$db = new DB();
		$db->execute($sql, $data);
		$this->id = $db->lastInsertId();
	}



	public function save(){

		if(!isset($this->id)){
			$this->insert();
		}else{
			$this->update();
		}
	}
}