<?php

class View{

	protected $data = [];

	public function assign($name, $value){
		$this->data[$name] = $value;
		
	}

	public function __set($k, $v){
		$this->data[$k] = $v;
	}

	public function render($template){
		foreach ($this->data as $key => $val) {
			$$key = $val;// получаем - записываем значение  $items = $val(массив с данными). В цикле $key присваивается значение items.
			
		}
		ob_start();
		include __DIR__ . '/../view/news/' . $template;
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}

	public function display($template){
		echo $this->render($template);
	}
}