<?php
require_once 'DBConfig.php';
require_once 'Module_Record.php';
const ACTION_OK = 0x22;
const ERROR_GENIDEXIST = 0x23; //error_genid_exist
const ERROR_GENIDNOTFOUND = 0x24; //error_genid_not_found
$mysqli = null;
function Connect(){
    global $mysqli;
    $mysqli = new mysqli(DB_server_ip,DB_username,DB_password,DB_name);
    if(!$mysqli){
        throw new exception("数据库连接失败",8888);
    }
}
function Close(){
    global $mysqli;
    $mysqli -> Close();
}
function AddRequest($genID,$viewPassword,$jmpURL){
    global $mysqli;
    //INSERT INTO `request` (`ID`, `genID`, `viewPassword`, `jmpURL`, `registerTime`) VALUES (NULL, 'genID', 'password', 'jmpURL', '2019-02-03 00:00:00')
    $viewPassword = md5($viewPassword);
    $sql = "INSERT INTO `". DB_request ."` (`ID`, `genID`, `viewPassword`, `jmpURL`, `registerTime`) VALUES (NULL, '{$genID}', '{$viewPassword}', '{$jmpURL}', CURRENT_TIMESTAMP)";
    $sql1 = "SELECT * FROM `". DB_request ."` WHERE `genID` = '{$genID}'";
    Connect();
    $res1 = $mysqli->query($sql1);
    $row = $res1->fetch_row();
    if($row != null && count($row) > 0){
        Close();
        return ERROR_GENIDEXIST;
    }
    $mysqli->query($sql);
    Close();
    return ACTION_OK;
}
function VerifyPassword($genID,$curPassword){
    global $mysqli;
    $curPassword = md5($curPassword);
    $sql = "SELECT viewPassword FROM `". DB_request ."` WHERE `genID` = '{$genID}'";
    Connect();
    $res1 = $mysqli -> query($sql);
    $row  = $res1->fetch_row();
    //var_dump($res1);
    //echo "<br/>" . $res1->fetch_row()[0];
    if(!is_array($row)){
        Close();
        return false;
    }
    if(count($row) == 0){
        Close();
        return false;
    }
    Close();
    return $row[0] == $curPassword;
}
function admin_GetPassword($genID){
    global $mysqli;
    $sql = "SELECT viewPassword FROM `". DB_request ."` WHERE `genID` = '{$genID}'";
    Connect();
    $res1 = $mysqli -> query($sql);
    $row  = $res1->fetch_row();
    if(!is_array($row)){
        Close();
        return ERROR_GENIDNOTFOUND;
    }
    if(count($row) == 0){
        Close();
        return ERROR_GENIDNOTFOUND;
    }
    Close();
    return $row[0];
}
function GetJmpURL($genID){
    global $mysqli;
    $sql = "SELECT jmpURL FROM `". DB_request ."` WHERE `genID` = '{$genID}'";
    Connect();
    $res1 = $mysqli -> query($sql);
    $row  = $res1->fetch_row();
    if(!is_array($row)){
        Close();
        return ERROR_GENIDNOTFOUND;
    }
    if(count($row) == 0){
        Close();
        return ERROR_GENIDNOTFOUND;
    }
    Close();
    return $row[0];
}
function IsGenidExist($genID){
    global $mysqli;
    $sql = "SELECT * FROM `". DB_request ."` WHERE `genID` = '{$genID}'";
    Connect();
    $res1 = $mysqli -> query($sql);
    $row  = $res1->fetch_row();
    if(!is_array($row)){
        Close();
        return false;
    }
    if(count($row) == 0){
        Close();
        return false;
    }
    Close();
    return true;
}
function AddRecord($source,$IP,$QQ,$viewFlag){
    global $mysqli;
    $sql = "INSERT INTO `". DB_record ."` (`ID`, `source`, `IP`, `QQ`, `actTime`, `viewFlag`) VALUES (NULL, '{$source}', '{$IP}', '{$QQ}', CURRENT_TIMESTAMP, '{$viewFlag}')";
    if(!IsGenidExist($source)){
        return ERROR_GENIDNOTFOUND;
    }
    Connect();
    $mysqli->query($sql);
    Close();
}
function GetRecord($genID){
    global $mysqli;
    $sql = "SELECT * FROM `". DB_record ."` WHERE `source` = '{$genID}'";
    Connect();
    $res1 = $mysqli -> query($sql);
    Close();
    $ret = array();
    while($row=$res1->fetch_row()){
        $tmp = new Module_Record();
        $tmp->id = $row[0];
        $tmp->IP = $row[2];
        $tmp->QQ = $row[3];
        $tmp->viewFlag = $row[5];
        $tmp->time = $row[4];
        array_push($ret,$tmp);
    }
    return $ret;
}
?>