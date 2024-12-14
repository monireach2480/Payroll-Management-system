<?php
include '../../../Config/conect.php';
session_start();

if ($_GET['action'] == "DELETE") {
    $Code = $_GET['id'];
    if ($Code != "") {
        $delete = "DELETE FROM tbl_user Where UserID='$Code'";
        $res = $con->query($delete);
        if ($res == true) {
            $_SESSION['msg'] = "Data have been Deleted.";
            $_SESSION['color'] = "alert-success";
            header("location:../../../view/GeneralSetting/index_usersetting.php");
        }
    }
}



if($_GET['action']=="EDIT"){
    $Code = $_GET['id'];
    $SELECT="SELECT * FROM tbl_user Where UserID='$Code'";
    $res=$con->query($SELECT);
    $data=$res->fetch_assoc();
    if($res){
        $_SESSION['UserID'] = $data['UserID'];
        $_SESSION['Username'] = $data['Username'];
        $_SESSION['Password'] = $data['Password'];
        $_SESSION['status'] = $data['status'];
        header("location:../../../view/GeneralSetting/index_usersetting.php");
    }

}

?>


