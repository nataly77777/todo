<?php
// include __DIR__ . "/vendor/autoload.php";


include __DIR__ . "/src/Http/Request.php"; // подключаем код из файла Request.php
$db=include __DIR__ . "/app/db.php";
include __DIR__ . "/app/models/task.php";

use Phpcourses\Http\Request;

$request = new Request(); // создаем экземпляр класса Request - объект $request 

if ($request->getRoute() == "list") { // если функция getRoute() объекта $request возвращает значение list
    todoList($request,$db);              // выполняем функцию todoList
}

if ($request->getRoute() == "delete") { //  если функция getRoute() объекта $request возвращает значение delete
    todoDelete($request, $db);                      // выполняем функцию todoDelete()
}

if ($request->getRoute() == "add") { //  если функция getRoute() объекта $request возвращает значение add
    todoAdd($request, $db);                      //  // выполняем функцию  todoAdd()
}
if($request->getRoute()=="save"){
    todoSaveToDb($request, $db);
}
if($request->getRoute()=="show"){
    todoShow($request, $db);
}
if($request->getRoute()=="update"){
    todoUpdate($request, $db);
}

function todoList($request,$db){
    $pageTitle = "ToDo List"; 
    $query=$db->query('SELECT id, title, resolved, createdAt from tasks');
    $query->setFetchMode(PDO::FETCH_OBJ);

    include __DIR__."/app/views/list.php";// подключаем код из файла list.php
}

function todoDelete($request, $db){
    $id=$request->getParam("id");
    $query=$db->prepare("DELETE FROM tasks WHERE id=:id");
    $query->execute(array(
        "id"=>$id
    ));

   header("Location: /");
}

function todoAdd($request, $db){

    include __DIR__."/app/views/add.php";
}

function todoSaveToDb($request, $db){
    if( $_SERVER["REQUEST_METHOD"]=="POST"){
        $query=$db->prepare("INSERT INTO tasks (title, resolved, createdAt)
        values(:title, :resolved, :date)");
        $query->execute(array(
            "title"=>$request->getPost("title",""),
            "resolved"=>($request->getPost("resolved",false))?1:0,
            "date"=>date("Y-m-d H:i:s")
        ));
        header('Location:/?r=list');
    }
}

function todoShow($request, $db){
    $id=$request->getParam("id");   
    $query=$db->prepare('SELECT id,title, resolved, createdAt
    FROM tasks WHERE id=:id');
    $query->execute(array(
         "id"=>$id
    ));
    $query->setFetchMode(PDO::FETCH_CLASS, 'Task');
    $task=$query->fetch();

    include __DIR__."/app/views/show.php";
}


function todoUpdate($request, $db){
    $id = $request->getParam("id");
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $query = $db->prepare("UPDATE tasks 
            SET 
                title = :title, 
                resolved = :resolved, 
                createdAt = :createdAt
            WHERE id = :id");
 
        $query->execute(array(
            "title" => $request->getPost("title", ""),
            "resolved" => ($request->getPost("resolved", false)) ? 1: 0,
            "createdAt" => date("Y-m-d H:i:s"),
            "id" => $id
        ));
 
        header("Location: /?r=show&id=".$id);
    }
 
    $query = $db->prepare('SELECT id, title, resolved, createdAt
    FROM tasks WHERE id=:id');
 
    $query->execute(array(
        "id" => $id
    ));
 
    $query->setFetchMode(PDO::FETCH_OBJ);
 
    $task = $query->fetch();// $row
 
    include __DIR__."/app/views/update.php";
}

