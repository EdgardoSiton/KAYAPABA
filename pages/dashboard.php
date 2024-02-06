<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->

        <?php 
        $iconDeceased = '../assets/img/coroner.png';  // Change this to the desired icon class for Deceased Information
        $iconGrave = '../assets/img/gravy.png'; // Change this to the desired icon class for Grave
        $iconAdmin = "fal fa-user";  
            include "component/sidebar.php";
            include 'conixion.php';
            $nbr_students = $con->query("SELECT * FROM registered_deceased");
            $nbr_students = $nbr_students->rowCount();

            $nbr_cours = $con->query("SELECT * FROM grave");
            $nbr_cours = $nbr_cours->rowCount();

            $nbr_admin = $con->query("SELECT * FROM users");
            $nbr_admin= $nbr_admin->rowCount();


        ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px">
    <?php include "component/header.php"; ?>
    
    <div class="cards row gap-3 justify-content-center mt-5">
        <div class="card__items card__items--blue col-md-3 position-relative">
            <div class="card__students d-flex flex-column gap-2 mt-3">
                <img src="<?php echo $iconDeceased; ?>" alt="Deceased Information" height="50" width="50">
                <span>Deceased Information</span>
            </div>
            <div class="card__nbr-students">
                <span class="h5 fw-bold nbr"><?php echo $nbr_students; ?></span>
            </div>
        </div>

        <div class="card__items card__items--rose col-md-3 position-relative">
            <div class="card__Course d-flex flex-column gap-2 mt-3">
                <img src="<?php echo $iconGrave; ?>" alt="Grave" height="50" width="50">
                <span>Grave</span>
            </div>
            <div class="card__nbr-course">
                <span class="h5 fw-bold nbr"><?php echo $nbr_cours; ?></span>
            </div>
        </div>

        <div class="card__items card__items--gradient col-md-3 position-relative">
            <div class="card__users d-flex flex-column gap-2 mt-3">
                <i class="<?php echo $iconAdmin; ?> h3"></i>
                <span>Admins</span>
            </div>
            <span class="h5 fw-bold nbr"><?php echo $nbr_admin; ?></span>
        </div>
    </div>
</div>
        <!-- end contentpage -->
    </main>
    <script src="../js/script.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
</body>

</html>