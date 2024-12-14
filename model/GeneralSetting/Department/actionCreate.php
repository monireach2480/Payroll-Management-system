<?php
include '../../../Config/conect.php';
session_start();
if (isset($_POST['btnsave'])) {
    $code = $_POST['deptcode'];
    $deptName = $_POST['deptName'];
    $deptNameKH = $_POST['deptNameKH'];
    $status = $_POST['status'];
    if ($code == "" && $deptName == "") {
        $_SESSION['msg'] = " Department Code and Department Name can not be empty!";
        $_SESSION['color'] = "alert-warning";
        header("location:../../../view/GeneralSetting/index.php");
    } else {
        $sql = "INSERT INTO `tbl_deparment` (`Code`, `DeptName`, `DeptKH`, `status`) 
        VALUES ('$code', '$deptName', '$deptNameKH', '$status')";
        $res = $con->query($sql);
        if ($res == true) {
            $_SESSION['msg'] = "Data have been saved.";
            $_SESSION['color'] = "alert-success";
            header("location:../../../view/GeneralSetting/index_department.php");
        }
    }
}



if(isset($_POST['btnupdate'])){
    $code = $_POST['deptcode'];
    $deptName = $_POST['deptName'];
    $deptNameKH = $_POST['deptNameKH'];
    $status = $_POST['status'];
    $UPDATE="UPDATE `tbl_deparment` 
    SET `DeptName` = '$deptName', 
    `DeptKH` = '$deptNameKH', 
    `status` = '$status' 
    WHERE `tbl_deparment`.`Code` = '$code';";
    $res = $con->query($UPDATE);
    if ($res == true) {
        $_SESSION['msg'] = "Data have been updated.";
        $_SESSION['color'] = "alert-success";
        header("location:../../../view/GeneralSetting/index_department.php");
    }
}
