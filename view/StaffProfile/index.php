<?php
include '../../root/Header.php';
include '../../Config/conect.php';
include '../../root/DataTable.php';
session_start();
?>
</head>

<body>
    <div class="conatainer-fluid" style="overflow-x:scroll ; overflow-y: hidden;">
        <h3 class="mt-3 mx-2"> Staff Profile</h3>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-xl-12">
                    <?php
                    if (isset($_SESSION['msg']) != null) {
                    ?>
                        <script>
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: '<?php echo $_SESSION['msg'] ?>'
                            });
                        </script>
                    <?php
                        session_destroy();
                    }

                    ?>
                </div>
            </div>
            <div class="row bg-secondary p-2">
                <a href="Create.php" class="btn btn-success" style="margin-left: 20px;">Add</a>
            </div>
        </div>



        <br><br>
        <!-- Display Data  -->
        <div class="container-fluid mt-4">
            <table id="example" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:200px">Action</th>
                        <th style="width:50px;">ID</th>
                        <th style="width:50px;">EmpCode</th>
                        <th style="width:150px;">EmpName</th>
                        <th style="width:50px;">Gender</th>
                        <th style="width:50px;">BirthDay</th>
                        <th style="width:200px">POB</th>
                        <th style="width:50px;">phone</th>
                        <th style="width:150px;">Address</th>
                        <th style="width:50px;">Salary</th>
                        <th style="width:100px;">Position</th>
                        <th style="width:100px;">Department</th>
                        <th style="width:100px;">Branch</th>
                        <th style="width:50px;">StaffType</th>
                        <th style="width:50px;">Status</th>
                        <th style="width:100px;">Photo</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $Select = "SELECT * FROM `emp_staffprofile`";
                    $res = $con->query($Select);
                    $i = 1;
                    while ($Data = $res->fetch_assoc()) {
                    ?>
                        <tr>
                            <td>
                                <a id="myLink" href="" data-id="<?php echo $Data['empcode'] ?>" class="btn btn-success mb-1"><i class="fa-solid fa-trash-can"></i></a>
                                <a href="Edit.php?id=<?php echo $Data['empcode'] ?>"
                                    class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $Data['empcode'] ?></td>
                            <td><?php echo $Data['empname'] ?></td>
                            <td><?php echo $Data['gender'] ?></td>
                            <td><?php echo $Data['dob'] ?></td>
                            <td><?php echo $Data['pob'] ?></td>
                            <td><?php echo $Data['phone'] ?></td>
                            <td><?php echo $Data['address'] ?></td>
                            <td><?php echo $Data['basic_salary'] ?></td>
                            <td><?php echo $Data['position'] ?></td>
                            <td><?php echo $Data['department'] ?></td>
                            <td><?php echo $Data['branch'] ?></td>
                            <td><?php echo $Data['stafftype'] ?></td>
                            <td><?php echo $Data['Status'] ?></td>
                            <td>Photo</td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>

</body>
<?php

?>
<script>
    function AlertMSG(text) {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: text
        });
    }
    document.getElementById('myLink').addEventListener('click', function(event) {
        // Prevent the default action of the link
        event.preventDefault();

        var id = event.currentTarget.getAttribute('data-id');
        // Call SweetAlert
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to delete this row?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../../model/StaffProfile/actionDelete.php?id=' + id + '&&action=DELETE';
            }
        });
    });
</script>

</html>