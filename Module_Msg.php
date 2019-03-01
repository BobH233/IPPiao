<?php
class Module_Msg
{
    public $msgCode;
    public $msgStr;
    function toJson(){
        return json_encode($this);
    }
}
function make_msg($code,$msg){
    $tmp = new Module_Msg();
    $tmp->msgCode = $code;
    $tmp->msgStr = $msg;
    return $tmp;
}
?>