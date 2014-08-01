<?php
// include __DIR__ . "/vendor/autoload.php";


include __DIR__ . "/src/Http/Request.php"; // подключаем код из файла Request.php

use Phpcourses\Http\Request;
$request = new Request(); // создаем экземпляр класса Request - объект $request 

if ($request->getRoute() == "list") { // если функция getRoute() объекта $request возвращает значение list
    todoList($request);              // выполняем функцию todoList
}

if ($request->getRoute() == "delete") { //  если функция getRoute() объекта $request возвращает значение delete
    todoDelete();                      // выполняем функцию todoDelete()
}

if ($request->getRoute() == "add") { //  если функция getRoute() объекта $request возвращает значение add
    todoAdd();                      //  // выполняем функцию  todoAdd()
 }

function todoList($request) // оъбявляем функцию todoList
{
    $pageTitle = "ToDo List"; // 
    // echo $request->getParam("age");объявляем переменную $pageTitle, присваиваем ей значение - строку "ToDo List", мы будем ее использовать в коде list.php, чтобы слздать заголовок
    // echo "<br/>";
    // echo $request->getParam("name");
    // echo "<br/>";
    // echo $request->getParam("fname", "...");
    
    include __DIR__."/app/views/list.php";// подключаем код из файла list.php
}

function todoDelete() // оъбявляем функцию todoList, которая будет удалять список дел
{
    if ( !isset($_GET['id']) ) { // если в массиве $_GET не существует элемента с ключем id
        echo "Id not found"; // выводим строку Id not found и завершаем работу функции
        return;   
    }
    echo $_GET['id']; // выводим значение элемента с ключем id
    echo "<br />Delete page"; // выводим строку Delete page
}

// http://localhost:12345/?r=add
function todoAdd() // оъбявляем функцию todoList, которая будет добавлять новый список дел
{
    // get from $_POST
    $title; //объявляем две переменные
    $data;
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h1>Add</h1>
</body>
</html>

<?php
}

function todoShow() // оъбявляем функцию todoShow(), которая будет показывать весь список дел
{

}


function todoResolve() // оъбявляем функцию todoResolve(), которая будет показывать завершенные дела
{

}


// $filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
// if (php_sapi_name() === 'cli-server' && is_file($filename)) {
//     return false;
// }

// $app = require __DIR__.'/src/app.php';
// $app->run();
