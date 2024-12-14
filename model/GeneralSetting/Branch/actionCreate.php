<?php
include '../../../Config/conect.php';
session_start();
if ($_POST['btnsave']) {
    $code = $_POST['branchcode'];
    $branchName = $_POST['branchName'];
    $branchNameKH = $_POST['branchNameKH'];
    $status = $_POST['status'];
    if ($code == "" && $branchName == "") {
        $_SESSION['msg'] = " Branch Code and Branch Name can not be empty!";
        $_SESSION['color'] = "alert-warning";
        header("location:../../../view/GeneralSetting/index.php");
    } else {
        $sql = "INSERT INTO `tbl_branch` (`BrachCode`, `BranchName`, `BranchKH`, `status`) 
    VALUES ('$code', '$branchName', '$branchNameKH', '$status')";
        $res = $con->query($sql);
        if ($res == true) {
            $_SESSION['msg'] = "Data have been saved.";
            $_SESSION['color'] = "alert-success";
            header("location:../../../view/GeneralSetting/index.php");
        }
    }
}



if($_POST['btnupdate']){
    $code = $_POST['branchcode'];
    $branchName = $_POST['branchName'];
    $branchNameKH = $_POST['branchNameKH'];
    $status = $_POST['status'];
    $UPDATE="UPDATE `tbl_branch` 
    SET `BranchName` = '$branchName', 
    `BranchKH` = '$branchNameKH', 
    `status` = '$status' 
    WHERE `tbl_branch`.`BrachCode` = '$code';";
    $res = $con->query($UPDATE);
    if ($res == true) {
        $_SESSION['msg'] = "Data have been updated.";
        $_SESSION['color'] = "alert-success";
        header("location:../../../view/GeneralSetting/index.php");
    }
}
