<?php
include '../../Config/conect.php';
session_start();
if (isset($_POST['btnsave'])) {
    $Wkday = $_POST['workday'];
    $WkHour = $_POST['workHour'];
    $Month = $_POST['month'];
    $year = $_POST['Year'];
    $exchrate = $_POST['exchrate'];
    $status = $_POST['status'];
    if ($Wkday== "" && $WkHour == "") {
        $_SESSION['msg'] = " Working day   and working hour  can not be empty!";
        $_SESSION['color'] = "alert-warning";
        header("location:../../view/PayrollSetting/index.php");
    } else {
        $sql = "INSERT INTO `s_payroll` (`id`, `workday`, `workhour`, `status`, `Month`, `Year`, `ExchangeRate`) 
        VALUES (NULL, '$Wkday', '$WkHour', '$status', '$Month', '$year', '$exchrate');";
        $res = $con->query($sql);
        if ($res == true) {
            $_SESSION['msg'] = "Data have been saved.";
            $_SESSION['color'] = "alert-success";
            header("location:../../view/PayrollSetting/index.php");
        }
    }
}



if(isset($_POST['btnupdate'])){
    $ID = $_POST['ID'];
    $Wkday = $_POST['workday'];
    $WkHour = $_POST['workHour'];
    $Month = $_POST['month'];
    $year = $_POST['Year'];
    $exchrate = $_POST['exchrate'];
    $status = $_POST['status'];
    $UPDATE="UPDATE `s_payroll` SET 
    `workday` = '$Wkday', 
    `workhour` = '$WkHour', 
    `status` = '$status', 
    `Month` = '$Month', 
    `Year` = '$year', 
    `ExchangeRate` = '$exchrate'
     WHERE `s_payroll`.`id` = '$ID';";
    $res = $con->query($UPDATE);
    if ($res == true) {
        $_SESSION['msg'] = "Data have been updated.";
        $_SESSION['color'] = "alert-success";
        header("location:../../view/PayrollSetting/index.php");
    }
}
