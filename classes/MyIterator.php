<?php

//реализация итератора 

class MyIterator implements Iterator{

	 private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );  

    public function __construct() {
        $this->position = 0;
    }
    //переводит указатель текущего элемента на первый
    public function rewind() {
        var_dump(__METHOD__);
        $this->position = 0;
    }
    //возвращает текущий элемент
    public function current() {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }
    //возвращает индекс текущего элемента
    public function key() {
        var_dump(__METHOD__);
        return $this->position;
    }
    //возвращает указатель на следующий элемент
    public function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }
    //проверяет существует ли текущий элемент или нет
    public function valid() {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
}

$it = new MyIterator;

foreach($it as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}

/*class MyArrayIterator implements Iterator
{
    protected $array = array();
    public function __construct(array $array)
    {
        $this->array = $array;
    }
    public function current()
    {
        return current($this->array);
    }
    public function next()
    {
        next($this->array);
    }
    public function key()
    {
        return key($this->array);
    }
    public function valid()
    {
        return isset($this->array[$this->key()]);
    }
    public function rewind()
    {
        reset($this->array);
    }
}*/