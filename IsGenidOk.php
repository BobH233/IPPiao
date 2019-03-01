<?php
    require_once "database.php";
    require_once "Module_Msg.php";
    if(!isset($_GET['genid'])){
        die(make_msg(-1,"非法请求")->toJson());
    }
    $genid = $_GET['genid'];
    if(IsGenidExist($genid)){
        die(make_msg(1,"yes")->toJson());
    }else{
        die(make_msg(1,"no")->toJson());
    }
?>