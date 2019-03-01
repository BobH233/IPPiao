<?php
    require_once "database.php";
    require_once "Module_Msg.php";
    if(!isset($_POST['genid']) || !isset($_POST['pwd']))
        die(make_msg(-1,"参数不全")->toJson());
    $genid = $_POST['genid'];
    $pwd = $_POST['pwd'];
    if(!VerifyPassword($genid,$pwd))
        die(make_msg(-1,"密码或后缀ID错误")->toJson());
    $res = GetRecord($genid);
    die(make_msg(1,json_encode($res))->toJson());
?>