<?php
session_start();
if(empty($_SESSION['itemId'])) {
   $_SESSION['itemId'] = array();
}
if(empty($_SESSION['itemName'])) {
   $_SESSION['itemName'] = array();
}
if(empty($_SESSION['itemPrice'])) {
   $_SESSION['itemPrice'] = array();
}
if(empty($_SESSION['itemImgUrl'])) {
   $_SESSION['itemImgUrl'] = array();
}

if (isset($_POST["itemId"]) && !empty($_POST["itemId"])) {
    $cartAddId = $_POST["itemId"];
	array_push($_SESSION['itemId'], $cartAddId); 	
}
if (isset($_POST["itemName"]) && !empty($_POST["itemName"])) {
    $cartAddId = $_POST["itemName"];
	array_push($_SESSION['itemName'], $cartAddId); 	
}
if (isset($_POST["itemPrice"]) && !empty($_POST["itemPrice"])) {
    $cartAddId = $_POST["itemPrice"];
	array_push($_SESSION['itemPrice'], $cartAddId); 	
}
if (isset($_POST["itemImgUrl"]) && !empty($_POST["itemImgUrl"])) {
    $cartAddId = $_POST["itemImgUrl"];
	array_push($_SESSION['itemImgUrl'], $cartAddId); 	
}
?>