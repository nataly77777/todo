<?php
include_DIR_."/Request.php"

$route=$_GET['r'];


if($route=="list"){
	todoList();
}

if($route=="delete"){
	todoDelete();
}

if($route=="add"){
	todoAdd();
}

if($route=="show"){
	todoShow();
}

if($route=="resolve"){
	todoResolve();
}

$AllLists=array();

$nameOfList=$_GET["nameOfList"];
$whatToDo=$_GET["WhatToDo"];
$description=$_GET["description"];

function todoList(){
	
	$AllLists['$nameOfList']=array();
	echo "Список дел $nameOfList успешно создан";
	
}

function todoAdd(){
	
$AllLists['$nameOfList']=array(
	$whatToDo=>$description
	)
	echo "Новое дело $whatToDo успешно добавлено в список дел $nameOfList";

}

function todoDelete(){
	if(!isset($_GET['id'])){
		echo "Id not found";
		return;
	}
	echo $_GET['id'];
	echo "<br/>Delete page";
	
}

function todoShow(){
	echo "Show page";
}

function todoResolve(){
	echo "Resolve page";
}