<?php
include '../../root/Header.php';
include '../../Config/conect.php';

if (isset($_GET['id']) != null) {
    $ID= $_GET['id'];
    $SQL="Select * from emp_staffprofile Where empcode='$ID'";
    $res=$con->query($SQL);
    $Data=$res->fetch_assoc();
    $empcode = $Data['empcode'];
    $empname = $Data['empname'];
    $gender = $Data['gender'];
    $dob = $Data['dob'];
    $salary = $Data['basic_salary'];
    $pos = $Data['position'];
    $branch = $Data['branch'];
    $Dept = $Data['department'];
    $stafftype = $Data['stafftype'];
    $status = $Data['Status'];
    $pob = $Data['pob'];
    $add = $Data['address'];
    $phone = $Data['phone'];
    $img=$Data['photo'];
    if($img==""){
        $img='https://t4.ftcdn.net/jpg/04/96/47/13/360_F_496471319_DbtjoUvKqyy2e9OfgBnK5mm2AXhKpa9m.jpg';
    }
    else{
        $img='../../Upload/StaffPic/'.$img;
    }
    
}
?>
</head>

<body>
    <div class="container mt-5">
        <form action="../../model/StaffProfile/actionCreate.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 mb-3 bg-secondary p-2 ">
                    <a href="index.php" class="btn btn-success">Back</a>
                    <input type="submit" name="btnUpdate" class="btn btn-success" value="Update">
                    
                </div>
                <div class="col-xl-4">
                    <label for="">EmpCode</label>
                    <input type="text" name="empcode" class="form-control" value="<?php echo $empcode?>">
                </div>
                <div class="col-xl-4">
                    <label for="">EmpName</label>
                    <input type="text" name="empname" class="form-control" value="<?php echo $empname?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <?php 
                            if($gender=="Male"){
                                ?>
                                    <option value="Male" selected>Male</option>
                                    <option value="FeMale">Female</option>
                                <?php
                            }
                            else{
                                ?>
                                    <option value="FeMale" selected>Female</option>
                                    <option value="Male" selected>Male</option>
                                <?php
                            }
                        ?>
                        
                    </select>
                </div>
                <div class="col-xl-4">
                    <label for="">Date of birth</label>
                    <input type="date" name="dob" class="form-control" value="<?php echo $dob?>">
                </div>
                
                <div class="col-xl-4">
                    <label for="">Salary</label>
                    <input type="number" name="salary" class="form-control" value="<?php echo $salary?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Position</label>
                    <select name="Position" id="" class="form-control">
                        <option selected value="<?php echo $pos ?>"><?php echo $pos?></option>
                        <?php
                        $SelectDept = "Select  * from tbl_position Where status ='Active'" ;
                        $res = $con->query($SelectDept);
                        while ($Row = $res->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $Row['code'] ?>"><?php echo $Row['PositonName'] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="col-xl-4">
                    <label for="">Department</label>
                    <select name="Department" id="" class="form-control">
                        <option selected value="<?php echo $Dept?>"><?php echo $Dept ?></option>
                        <?php
                        $SelectDept = "Select  * from tbl_deparment Where status ='Active'" ;
                        $res = $con->query($SelectDept);
                        while ($Row = $res->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $Row['Code'] ?>"><?php echo $Row['DeptName'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xl-4">
                    <label for="">Branch</label>
                    <select name="Branch" id="" class="form-control">
                        <option selected value="<?php echo $branch ?>"><?php echo $branch ?></option>
                        <?php
                        $SelectDept = "Select  * from tbl_branch Where status ='Active'" ;
                        $res = $con->query($SelectDept);
                        while ($Row = $res->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $Row['BrachCode'] ?>"><?php echo $Row['BranchName'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xl-4">
                    <label for="">Staff Type</label>
                    <select name="stafftype" id="" class="form-control">
                        <?php
                            if($stafftype=="FULL"){
                                ?>
                                    <option value="FULL" selected>Full time</option>
                                    <option value="INTERN">Intership</option>
                                    <option value="HAFT">Part time</option>
                                <?php
                            }
                            else if($stafftype=="INTERN"){
                                ?>
                                    <option selected value="INTERN">Intership</option>
                                    <option value="FULL">Full time</option>
                                    <option value="HAFT">Part time</option>
                                <?php
                            }
                            else{
                                ?>
                                    <option selected value="HAFT">Part time</option>
                                    <option value="INTERN">Intership</option>
                                    <option value="FULL" >Full time</option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xl-4">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <?php
                        if ($status != "") {
                        ?>
                            <option value="<?php echo $status ?>" selected><?php echo $status ?></option>
                        <?php
                        }
                        ?>
                        <option value="Active">Active</option>
                        <option value="InActive">InActive</option>
                    </select>
                </div>
                <div class="col-xl-4">
                    <label for="">Phone number</label>
                    <input type="text" name="Phone" class="form-control" value="<?php echo $phone?>">
                </div>
                <div class="col-xl-12">
                    <label for="">Place of birth</label>
                    <textarea name="pob" id="" class="form-control"><?php echo $pob?></textarea>
                </div>
                <div class="col-xl-12">
                    <label for="">Current Address</label>
                    <textarea name="Address" id="" class="form-control"><?php echo $add?></textarea>
                </div>
                <div class="col-xl-4">
                    <label for="">Pleae upload Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>
                <div class="col-xl-8">

                </div>
                <div class="col-xl-4 mt-2">
                    <img id="previewIMG" src="<?php echo $img?>" alt="" width="300px">
                </div>
            </div>
        </form>
    </div>



</body>
<?php
include '../../root/DataTable.php';
?>
<script>
    var file = document.getElementById('photo');
    var previewIMG = document.getElementById('previewIMG');

    file.addEventListener('change', function() {
        // catch srcfile from input 
        var srcfile = this.files[0];
        var reader = new FileReader();
        reader.addEventListener('load', function() {
            //link srcfile to img 
            previewIMG.src = reader.result;
        })
        //return src to dispay
        reader.readAsDataURL(srcfile);
    })

    
</script>

</html>