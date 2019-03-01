<?php

class Module_Record
{
    public $id = "";
    public $IP = "";
    public $QQ = "";
    public $time = "";
    public $viewFlag = "";
    function toJson(){
        return json_encode($this);
    }
}
?>