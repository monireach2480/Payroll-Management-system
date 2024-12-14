<?php
include '../../root/Header.php';
include '../../Config/conect.php';
?>
</head>

<body>
    <div class="container mt-5">
        <form action="../../model/StaffFamily/actionCreate.php" method="post">
            <div class="row">
                <div class="col-xl-12 mb-3 bg-secondary p-2 " style="position: sticky;top:0;z-index: 1;">
                    <a href="index.php" class="btn btn-success">Back</a>
                    <input type="submit" name="btnsave" class="btn btn-success" value="Save">
                    
                </div>
                <div class="col-xl-4">
                    <label for="">Employee</label>
                    <select name="empcode" id="" class="form-control">
                        <?php
                            $Select="SELECT * FROM emp_staffprofile WHERE Status='Active'";
                            $res=$con->query($Select);
                            while($row=$res->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['empcode']?>"><?php echo $row['empname']?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xl-4">
                    <label for="">Family Name</label>
                    <input type="text" name="familyname" class="form-control" value="">
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
                    <label for="">Occupation</label>
                    <input type="text" name="Occupation" class="form-control" value="">
                </div>
                <div class="col-xl-4">

                </div>
                <div class="col-xl-4 mt-3">
                  <h5 style="margin-right: 10px;"> Is Tax </h5><input type="checkbox" name="Istax" style="width: 20px;height: 20px;">
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