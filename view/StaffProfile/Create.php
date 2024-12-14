<?php
include '../../root/Header.php';
include '../../Config/conect.php';
?>
</head>

<body>
    <div class="container mt-5">
        <form action="../../model/StaffProfile/actionCreate.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 mb-3 bg-secondary p-2 " style="position: sticky;top:0;z-index: 1;">
                    <a href="index.php" class="btn btn-success">Back</a>
                    <input type="submit" name="btnsave" class="btn btn-success" value="Save">
                    
                </div>
                <div class="col-xl-4">
                    <label for="">EmpCode</label>
                    <input type="text" name="empcode" class="form-control" value="">
                </div>
                <div class="col-xl-4">
                    <label for="">EmpName</label>
                    <input type="text" name="empname" class="form-control" value="">
                </div>
                <div class="col-xl-4">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <option value="Male">Male</option>
                        <option value="FeMale">Female</option>
                    </select>
                </div>
                <div class="col-xl-4">
                    <label for="">Date of birth</label>
                    <input type="date" name="dob" class="form-control" value="">
                </div>
                
                <div class="col-xl-4">
                    <label for="">Salary</label>
                    <input type="number" name="salary" class="form-control" value="">
                </div>
                <div class="col-xl-4">
                    <label for="">Position</label>
                    <select name="Position" id="" class="form-control">
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
                        <option value="FULL">Full time</option>
                        <option value="INTERN">Intership</option>
                        <option value="HAFT">Part time</option>
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
                    <input type="text" name="Phone" class="form-control" value="">
                </div>
                <div class="col-xl-12">
                    <label for="">Place of birth</label>
                    <textarea name="pob" id="" class="form-control"></textarea>
                </div>
                <div class="col-xl-12">
                    <label for="">Current Address</label>
                    <textarea name="Address" id="" class="form-control"></textarea>
                </div>
                <div class="col-xl-4">
                    <label for="">Pleae upload Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>
                <div class="col-xl-8">

                </div>
                <div class="col-xl-4 mt-2">
                    <img id="previewIMG" src="https://t4.ftcdn.net/jpg/04/96/47/13/360_F_496471319_DbtjoUvKqyy2e9OfgBnK5mm2AXhKpa9m.jpg" alt="" width="300px">
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