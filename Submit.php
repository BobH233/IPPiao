<?php
    require_once "database.php";
    require_once "Module_Msg.php";
    $genid = $_POST['genid'];
    $pwd = $_POST['viewPwd'];
    $jmpurl = $_POST['jmpURL'];
    if(IsGenidExist($genid)){
        die(make_msg(-1,"后缀重复,请换一个后缀")->toJson());
    }
    if($genid == null || $genid == "" || $pwd == null || $pwd == ""){
        die(make_msg(-1,"参数不齐全,检查参数!")->toJson());
    }
    if($jmpurl == null || $jmpurl == "") {
        $jmpurl = "https://space.bilibili.com/87649893";
    }
    AddRequest($genid,$pwd,$jmpurl);
    echo make_msg(1,"添加成功!")->toJson();
?>