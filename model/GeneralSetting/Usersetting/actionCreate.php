<?php
include '../../../Config/conect.php';
session_start();
if (isset($_POST['btnsave'])) {
    $username = $_POST['UserName'];
    $Password = $_POST['Password'];
    $status = $_POST['status'];
    if ($username== "" && $Password == "") {
        $_SESSION['msg'] = " Username  and Password  can not be empty!";
        $_SESSION['color'] = "alert-warning";
        header("location:../../../view/GeneralSetting/index_usersetting.php");
    } else {
        $sql = "INSERT INTO `tbl_user` (`UserID`, `Username`, `Password`, `Status`) 
        VALUES (NULL, '$username', '$Password', '$status');";
        $res = $con->query($sql);
        if ($res == true) {
            $_SESSION['msg'] = "Data have been saved.";
            $_SESSION['color'] = "alert-success";
            header("location:../../../view/GeneralSetting/index_usersetting.php");
        }
    }
}



if(isset($_POST['btnupdate'])){
    $code = $_POST['UserID'];
    $username = $_POST['UserName'];
    $Password = $_POST['Password'];
    $status = $_POST['status'];
    $UPDATE="UPDATE `tbl_user` 
    SET `Username` = '$username', 
    `Password` = '$Password', 
    `Status` = '$status'
     WHERE `tbl_user`.`UserID` = '$code';";
    $res = $con->query($UPDATE);
    if ($res == true) {
        $_SESSION['msg'] = "Data have been updated.";
        $_SESSION['color'] = "alert-success";
        header("location:../../../view/GeneralSetting/index_usersetting.php");
    }
}
