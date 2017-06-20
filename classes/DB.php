<?php 

// подключение к базе данных старое

/*class DB{
	 private $db = null;

	 function __construct(){
	 	$this->db = new mysqli('localhost', 'root', '', 'doctype');
	 }

	 public function getAll($sql){

	 	if($this->db->connect_error){
	 		return false;
	 		echo $this->db->connect_error;
	 	} else {
	 		$res = $this->db->query($sql);
	 		while($row = $res->fetch_array()){
				$rows[] = $row;
			}
	 	}
	 	return $rows;
	 }

	 public function getOne($sql){
	 	return $this->getAll($sql);
	 }

	 function __destruct(){
	 	$this->db->close();
	 }
}*/

/*$test = new DB();
$sql = 'SELECT * FROM post WHERE id=' . 2;
$exemp = $test->getOne($sql);
var_dump($exemp);*/


class DB{
	private $dbh;
	private $className = 'stdClass';

	public function __construct(){
	 	$this->dbh = new PDO('mysql:dbname=doctype; host=localhost', 'root', '');
	 }

	 public function setClassName($className){

	 	$this->className = $className;
	 }

	 public function query($sql, $params=[]){
	 	$sth = $this->dbh->prepare($sql);
	 	$sth->execute($params);
	 	return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
	 }

	 public function execute($sql, $params=[]){
	 	$sth = $this->dbh->prepare($sql);
	 	return $sth->execute($params);
	 }

	 public function lastInsertId(){

	 	return $this->dbh->lastInsertId();
	 }

}
