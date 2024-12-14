<?php
include '../../Config/conect.php';
session_start();

if ($_GET['action'] == "DELETE") {
    $Code = $_GET['id'];
    if ($Code != "") {
        $delete = "DELETE FROM emp_staffprofile Where empcode='$Code'";
        $res = $con->query($delete);
        if ($res == true) {
            $_SESSION['msg'] = "Data have been Deleted.";
            $_SESSION['color'] = "alert-success";
            header("location:../../view/StaffProfile/index.php");
        }
    }
}



if($_GET['action']=="EDIT"){
    $Code = $_GET['id'];
    $SELECT="SELECT * FROM s_payroll Where id='$Code'";
    $res=$con->query($SELECT);
    $data=$res->fetch_assoc();
    if($res){
        $_SESSION['ID'] = $data['id'];
        $_SESSION['workday'] = $data['workday'];
        $_SESSION['workhour'] = $data['workhour'];
        $_SESSION['Month'] = $data['Month'];
        $_SESSION['Year'] = $data['Year'];
        $_SESSION['ExchangeRate'] = $data['ExchangeRate'];
        $_SESSION['status'] = $data['status'];
        header("location:../../view/PayrollSetting/index.php");
    }

}

?>


