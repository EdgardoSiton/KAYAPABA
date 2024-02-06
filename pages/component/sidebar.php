<?php  session_start(); ?>
<style>
    .bg-sidebar {
        background: linear-gradient(110.42deg, #00C1FE 18.27%, #FAFFC1 91.84%); /* Replace these color codes with your desired gradient colors */
        /* You can customize the gradient direction and colors according to your preference */
    }

    /* Add any additional styling for your sidebar here */
</style>
<div class="bg-sidebar vh-100 w-50 position-fixed">
            <div class="log d-flex justify-content-between">
                <h1 class="E-classe text-start ms-3 ps-1 mt-3 h6 fw-bold">Cemeter Mapping System</h1>
                <i class="far fa-times h4 me-3 close align-self-end d-md-none"></i>
            </div>
            <div class="img-admin d-flex flex-column align-items-center text-center gap-2">
                <img class="rounded-circle" src="../assets/img/Admin.webp" alt="img-admin" height="120" width="120">
                <h2 class="h6 fw-bold"><?php echo $_SESSION['name']; ?></h2>
                <span class="h7 admin-color">Admin</span>
            </div>
            <div class=" bg-list d-flex flex-column align-items-center fw-bold gap-2 mt-4 ">
                <ul class="d-flex flex-column list-unstyled">
                        <li class="h7"><a class="nav-link text-dark" href="dashboard.php"><i
                            class="fal fa-home-lg-alt me-2"></i> <span>Home</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="course.php"><i
                                class=""></i> <span>Graveyard Information</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="students_list.php"><i
                                class=""></i> <span>Deceased Information</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="modifier.php"><i
                                class="fal fa-file-chart-line me-2"></i> <span>Report</span></a></li>
                <ul class="logout d-flex justify-content-start list-unstyled">
                    <li class=" h7"><a class="nav-link text-dark" href="../index.php"><span>Logout</span><i
                                class="fal fa-sign-out-alt ms-2"></i></a></li>
                </ul>
            </div>

        </div>