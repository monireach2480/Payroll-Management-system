<?php
    include '../../Config/conect.php';
    session_start();
    $Username=$_POST['username'];//data from text box 
    $pass=$_POST['password']; //data from text box

  
    //Select data from Table
    $select="SELECT * FROM tbl_user";
    $res=$con->query($select);
    $bool=false;
    while($row=$res->fetch_assoc()){
        if($Username == $row['Username'] && $pass == $row['Password']){
            $bool=true;
            header("location:../../index.php");
        }
    }
    if($bool==false){
        $_SESSION['msg']="Invalid username.";
        header("location:../../login.php");
    }
    
    
?>