<?php
    require_once "database.php";
    require_once "Module_Msg.php";
    if(!isset($_SERVER['HTTP_X_FORWARDED_FOR']) || $_SERVER['HTTP_X_FORWARDED_FOR'] == ""){
        $clientIP = $_SERVER['REMOTE_ADDR'];
    }else{
        $clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    if(!isset($_GET['genid'])){
        die(make_msg(-1,"UnknowError")->toJson());
    }
    $genid = $_GET['genid'];
    if(!IsGenidExist($genid)){
        die(make_msg(-1,"UnknowError")->toJson());
    }
    AddRecord($genid,$clientIP,"未开发",$_SERVER['HTTP_USER_AGENT']);
    header("Location: " . GetJmpURL($genid));
?>