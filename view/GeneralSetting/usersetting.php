<?php
include '../../root/Header.php';
include '../../Config/conect.php';


$code = '';
$Username = '';
$Password = '';
$status = '';
$btnsave="block";
$btnupdate="none";
if (isset($_SESSION['Username']) != null) {
    $code = $_SESSION['UserID'];
    $Username = $_SESSION['Username'];
    $Password = $_SESSION['Password'];
    $status = $_SESSION['status'];
    $btnsave="none";
    $btnupdate="block";

    session_destroy();
}
?>
</head>

<body>
    <div class="container mt-5">
        <form action="../../model\GeneralSetting\Usersetting\actionCreate.php" method="post">
            <div class="row">
                <div class="col-xl-12 mb-3">
                    <input type="submit" name="btnsave" class="btn btn-secondary" value="Save" style="display: <?php echo $btnsave?>;">
                    <input type="submit" name="btnupdate" class="btn btn-secondary" value="Update" style="display:<?php echo $btnupdate?>;">
                </div>
                <div class="col-xl-4" style="display: none;">
                    <label for="">UserID</label>
                    <input type="text" name="UserID" class="form-control" value="<?php echo $code?>">
                </div>
                <div class="col-xl-4">
                    <label for="">UserName</label>
                    <input type="text" name="UserName" class="form-control" value="<?php echo $Username?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Password</label>
                    <input type="text" name="Password" class="form-control" value="<?php echo $Password?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <?php
                            if($status!=""){
                                ?>
                                    <option value="<?php echo $status?>" selected><?php echo $status?></option>
                                <?php
                            }
                        ?>
                        <option value="Active">Active</option>
                        <option value="InActive">InActive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>


    <!-- table -->
    <div class="container mt-4">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 100px;">ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Select = "SELECT * FROM `tbl_user`";
                $res = $con->query($Select);
                $i = 1;
                while ($Data = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $Data['Username'] ?></td>
                        <td><?php echo $Data['Password'] ?></td>
                        <td><?php echo $Data['Status'] ?></td>
                        <td>
                            <a href="../../model/GeneralSetting/Usersetting/actionDelete.php?id=<?php echo $Data['UserID'] ?>&&action=DELETE"
                                class="btn btn-success">Delete</a>
                            <a href="../../model/GeneralSetting/Usersetting/actionDelete.php?id=<?php echo $Data['UserID'] ?>&&action=EDIT"
                                class="btn btn-success">EDIT</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>
</body>
<?php
include '../../root/DataTable.php';
?>

</html>