<?php
include '../../root/Header.php';
include '../../Config/conect.php';

$ID = '';
$workday = '';
$Workhour = '';
$Month = '';
$year = '';
$ExchRate = '';
$status = '';
$btnsave="block";
$btnupdate="none";
if (isset($_SESSION['ID']) != null) {
    $ID = $_SESSION['ID'];
    $workday = $_SESSION['workday'];
    $Workhour = $_SESSION['workhour'];
    $Month = $_SESSION['Month'];
    $year = $_SESSION['Year'];
    $ExchRate = $_SESSION['ExchangeRate'];
    $status = $_SESSION['status'];
    $btnsave="none";
    $btnupdate="block";

    session_destroy();
}
?>
</head>

<body>
    <div class="container mt-5">
        <form action="../../model/PayrollSetting/actionCreate.php" method="post">
            <div class="row">
                <div class="col-xl-12 mb-3">
                <input type="submit" name="btnsave" class="btn btn-secondary" value="Save" style="display: <?php echo $btnsave?>;">
                <input type="submit" name="btnupdate" class="btn btn-secondary" value="Update" style="display:<?php echo $btnupdate?>;">
                </div>   
                <div class="col-xl-4" style="display: none;">
                    <label for="">ID</label>
                    <input type="number" name="ID" class="form-control" value="<?php echo $ID?>">
                </div>             
                <div class="col-xl-4">
                    <label for="">Working Day</label>
                    <input type="number" name="workday" class="form-control" value="<?php echo $workday?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Working Hour</label>
                    <input type="number" name="workHour" class="form-control" value="<?php echo $Workhour?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Month</label>
                    <input type="number" name="month" class="form-control" value="<?php echo $Month?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Year</label>
                    <input type="number" name="Year" class="form-control" value="<?php echo $year?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Exchange Rate</label>
                    <input type="number" name="exchrate" class="form-control" value="<?php echo $ExchRate?>">
                </div>
                <div class="col-xl-4">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="InActive">InActive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>


    <!-- Display Data  -->
    <div class="container mt-4">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="width:50px;">ID</th>
                    <th>Working Day</th>
                    <th>Working Hour</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Exchange Rate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Select = "SELECT * FROM `s_payroll`";
                $res = $con->query($Select);
                $i = 1;
                while ($Data = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $Data['workday'] ?></td>
                        <td><?php echo $Data['workhour'] ?></td>
                        <td><?php echo $Data['Month'] ?></td>
                        <td><?php echo $Data['Year'] ?></td>
                        <td><?php echo $Data['ExchangeRate'] ?></td>
                        <td><?php echo $Data['status'] ?></td>
                        <td>
                            <a href="../../model/PayrollSetting/actionDelete.php?id=<?php echo $Data['id'] ?>&&action=DELETE"
                                class="btn btn-success">Delete</a>
                            <a href="../../model/PayrollSetting/actionDelete.php?id=<?php echo $Data['id'] ?>&&action=EDIT"
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