<?php
foreach (/*$this->data['items'] */$items as $key => $value) {
	echo '<h1>' . $value['title'] . '</h1>';
	echo '<p>' . $value['content'] . '</p>';
}
?>