<?php
include 'conixion.php';

// Check if the filter form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['startDate']) && isset($_POST['endDate'])) {
    // Get the selected start and end dates from the form
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Query to filter deceased persons based on the selected date range
    $result = $con->query("SELECT * FROM registered_deceased WHERE DEATH_DATE BETWEEN '$startDate' AND '$endDate'");
} else {
    // Default query to show all deceased persons
    $result = $con->query("SELECT * FROM registered_deceased");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CemeteryMapping System</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/print.css" media="print">
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->
        <?php include "component/sidebar.php"; ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px-4">
            <?php include "component/header.php"; ?>

            <!-- Add this form at the top of your HTML body to include date pickers -->
            <form method="post" action="">
                <label for="startDate">Select Start Date:</label>
                <input type="date" id="startDate" name="startDate">

                <label for="endDate">Select End Date:</label>
                <input type="date" id="endDate" name="endDate">

                <button type="submit">Filter</button>
            </form>

            <!-- Add a "Print" button -->
            <button onclick="printReport()">Print</button>

            <!-- start student list table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">REPORTS</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                    <!-- PARA SA ADD MODAL  -->
                    <!-- ADD FOR DECEASED PERSON -->
                </div>
            </div>
            <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <tr class="align-middle">
                            <th class="opacity-0">vide</th>
                            <th>GRAVE ID</th>
                            <th>FIRST NAME</th>
                            <th>FAMILY NAME</th>
                            <th>BORN DATE</th>
                            <th>DEATHDATE</th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $value): ?>
                            <tr class="bg-white align-middle">
                                <td><img src="../assets/img/<?php echo $value['img'] ?>" alt="img" height="50" width="50"></td>
                                <td><?php echo $value['GRAVE_ID'] ?></td>
                                <td><?php echo $value['NAME'] ?></td>
                                <td><?php echo $value['LASTNAME'] ?></td>
                                <td><?php echo $value['BORN_DATE'] ?></td>
                                <td><?php echo $value['DEATH_DATE'] ?></td>
                                <td class="d-md-flex gap-3 mt-3">
                                    <!-- MODAL PARA SA UPDATE -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- end student list table -->
        </div>
        <!-- end content page -->

        <!-- Modal -->

        <script>
            // JavaScript function to trigger the print dialog
            function printReport() {
                window.print();
            }
        </script>
    </main>

    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- ... your other scripts ... -->

</body>

</html>
