<?php
/**
* File Request.php
*
* @author Kovardin Artem <horechek@gmail.com>
* @link http://tvorzasp.com/
* @copyright tvorzasp
* @license wtfpl
*/
namespace Phpcourses\Http;
/**
* Class Request
*
* description
*
* @author Kovardin Artem <horechek@gmail.com>
* @version 1.0
* @package \Phpcourses\Http 
*/
class Request // объявляем класс Request 
{
    public $defaultRoute; // объявляем переменную $defaultRoute с общим доступом к ней

    public function __construct() // объявляем функцию-конструктор
    {
        if (!isset($_GET["r"])) { // если в массиве GET не существует элемента с ключем "r"
            $this->defaultRoute = "list"; // то свойство(переменная) $defaultRoute класса Request будет равна "list"
        }    
    }

    public function getRoute() // объявляем функцию getRoute
    {
        if (!isset($_GET["r"])) { // если в массиве GET не существует элемента с ключем "r", 
            return $this->defaultRoute; // то возвращаем значение свойства defaultRoute
        }
        return $_GET["r"]; // в противном случае возвращаем значение элемента r массива $_GET
    }

    public function getParam($name, $default="") // объявляем функцию getParam с параметрами $name и $default=""
    {
        if (isset($_GET[$name])) { // если в массиве $_GET существует элемент с ключем $name,
            return $_GET[$name];  // то возвращаем его значение
        }
        return $default;        // в противном случае возвращаем значение параметра $default, то есть пустую строку
    }

     public function getPost($name, $default="")
    {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }
        return $default;
    }
  
       
}