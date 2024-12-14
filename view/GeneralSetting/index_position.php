<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-xl-12">
                <h3>General Setting </h3>
            </div>
            <div class="col-xl-12">
                <?php
                if (isset($_SESSION['msg']) != null) {
                ?>
                    <div  id="msg" class="alert <?php echo $_SESSION['color']?>" role="alert">
                        <?php echo $_SESSION['msg']?>
                    </div>
                <?php
                    session_destroy();
                }

                ?>
            </div>
        </div>
    </div>

    <div class="container mt-5">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Branch</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Department</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Position</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#usersetting" type="button" role="tab" aria-controls="contact" aria-selected="false">User Setting</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php include 'branch.php' ?>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php include 'department.php'?>
            </div>
            <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <?php include 'position.php'?>
            </div>
            <div class="tab-pane fade" id="usersetting" role="tabpanel" aria-labelledby="contact-tab">User page</div>
        </div>
    </div>
</body>
<?php
include '../../root/Taplink.php';
?>

</html>
<script>
    document.getElementById('msg').addEventListener("click",function(){
        document.getElementById('msg').style.display='none';
    })
</script>