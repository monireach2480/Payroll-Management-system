<?php
include '../../../Config/conect.php';
session_start();

if ($_GET['action'] == "DELETE") {
    $Code = $_GET['id'];
    if ($Code != "") {
        $delete = "DELETE FROM tbl_branch Where BrachCode='$Code'";
        $res = $con->query($delete);
        if ($res == true) {
            $_SESSION['msg'] = "Data have been Deleted.";
            $_SESSION['color'] = "alert-success";
            header("location:../../../view/GeneralSetting/index.php");
        }
    }
}



if($_GET['action']=="EDIT"){
    $Code = $_GET['id'];
    $SELECT="SELECT * FROM tbl_branch Where BrachCode='$Code'";
    $res=$con->query($SELECT);
    $data=$res->fetch_assoc();
    if($res){
        $_SESSION['code'] = $data['BrachCode'];
        $_SESSION['BranchName'] = $data['BranchName'];
        $_SESSION['BranchKH'] = $data['BranchKH'];
        $_SESSION['status'] = $data['status'];
        header("location:../../../view/GeneralSetting/index.php");
    }

}

?>


