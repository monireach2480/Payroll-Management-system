<?php
include '../../root/Header.php';
include '../../Config/conect.php';

$code = '';
$Posname = '';
$PosKH = '';
$status = '';
$btnsave="block";
$btnupdate="none";
if (isset($_SESSION['Poscode']) != null) {
    $code = $_SESSION['Poscode'];
    $Posname = $_SESSION['PosName'];
    $PosKH = $_SESSION['PosKH'];
    $status = $_SESSION['status'];
    $btnsave="none";
    $btnupdate="block";

    session_destroy();
}
?>
</head>

<body>
    <div class="container mt-5">
        <form action="../../model/GeneralSetting/Position/actionCreate.php" method="post">
            <div class="row">
                <div class="col-xl-12 mb-3">
                    <input type="submit" name="btnsave" class="btn btn-secondary" value="Save" style="display: <?php echo $btnsave?>;">
                    <input type="submit" name="btnupdate" class="btn btn-secondary" value="Update" style="display:<?php echo $btnupdate?>;">
                </div>
                <div class="col-xl-4">
                    <label for="">Position Code</label>
                    <input type="text" name="Poscode" class="form-control" value="<?php echo $code?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Position Name</label>
                    <input type="text" name="PosName" class="form-control" value="<?php echo $Posname?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Position NameKH</label>
                    <input type="text" name="PosNameKH" class="form-control" value="<?php echo $PosKH?>">
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
                    <th>Position Code</th>
                    <th>Position Name</th>
                    <th>Position Name KH</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Select = "SELECT * FROM `tbl_position`";
                $res = $con->query($Select);
                $i = 1;
                while ($Data = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $Data['code'] ?></td>
                        <td><?php echo $Data['PositonName'] ?></td>
                        <td><?php echo $Data['PositionKH'] ?></td>
                        <td><?php echo $Data['status'] ?></td>
                        <td>
                            <a href="../../model/GeneralSetting/Position/actionDelete.php?id=<?php echo $Data['code'] ?>&&action=DELETE"
                                class="btn btn-success">Delete</a>
                            <a href="../../model/GeneralSetting/Position/actionDelete.php?id=<?php echo $Data['code'] ?>&&action=EDIT"
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