<!--http://todo.my/index.php?r=add/
http://todo.my/index.php?r=list/
http://todo.my/index.php?r=delete&id=1
http://todo.my/index.php?r=show&id=1
http://todo.my/index.php?r=resolve&id=1
-->
<?php
class Request{
	public $defaultRoute="";

	public function _construct(){
		if(!isset($_GET["r"])){
			$this->defaultRoute="list";
		}
	}
	public function getRoute(){
		if(!isset ($_GET["r"])){
			return $this->defaultRoute;
		}
		return $_GET["r"];
	}
	public function getParam($name,$default=""){
		if(isset($_GET[$name])){
			return $_GET["name"];
		}
		return "";
		
	}

}
