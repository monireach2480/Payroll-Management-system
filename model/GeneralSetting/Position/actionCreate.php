<?php
include '../../../Config/conect.php';
session_start();
if (isset($_POST['btnsave'])) {
    $code = $_POST['Poscode'];
    $PosName = $_POST['PosName'];
    $PosNameKH = $_POST['PosNameKH'];
    $status = $_POST['status'];
    if ($code == "" && $PosName == "") {
        $_SESSION['msg'] = " Position Code and Position Name can not be empty!";
        $_SESSION['color'] = "alert-warning";
        header("location:../../../view/GeneralSetting/index_position.php");
    } else {
        $sql = "INSERT INTO `tbl_position` (`code`, `PositonName`, `PositionKH`, `status`) 
        VALUES ('$code', '$PosName', '$PosNameKH', '$status')";
        $res = $con->query($sql);
        if ($res == true) {
            $_SESSION['msg'] = "Data have been saved.";
            $_SESSION['color'] = "alert-success";
            header("location:../../../view/GeneralSetting/index_position.php");
        }
    }
}



if(isset($_POST['btnupdate'])){
    $code = $_POST['Poscode'];
    $PosName = $_POST['PosName'];
    $PosNameKH = $_POST['PosNameKH'];
    $status = $_POST['status'];
    $UPDATE="UPDATE `tbl_position` 
    SET `PositonName` = '$PosName', 
    `PositionKH` = '$PosNameKH', 
    `status` = '$status' 
    WHERE `tbl_position`.`code` = '$code';";
    $res = $con->query($UPDATE);
    if ($res == true) {
        $_SESSION['msg'] = "Data have been updated.";
        $_SESSION['color'] = "alert-success";
        header("location:../../../view/GeneralSetting/index_position.php");
    }
}
