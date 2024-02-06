<?php
include 'conixion.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST["searchQuery"];

    // Modify your SQL query based on the search criteria
    $result = $con->query("SELECT rd.*, g.SECTION_NO 
        FROM registered_deceased rd
        INNER JOIN grave g ON rd.GRAVE_ID = g.GRAVE_ID
        WHERE 
            rd.NAME LIKE '%$searchQuery%' OR 
            rd.LASTNAME LIKE '%$searchQuery%' OR
            CONCAT(rd.NAME, ' ', rd.LASTNAME) LIKE '%$searchQuery%'
    ");
} else {
    // Default query without filtering
    $result = $con->query("SELECT rd.*, g.SECTION_NO 
        FROM registered_deceased rd
        INNER JOIN grave g ON rd.GRAVE_ID = g.GRAVE_ID
    ");
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
        
        <script>
    document.getElementById('searchQuery').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            submitForm();
        }
    });

    function submitForm() {
        // Your form submission logic goes here
        // For example, you can use document.forms[0].submit();
        console.log('Form submitted');
    }
</script>
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->
        <?php 
            include "component/sidebar.php";
        ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px-4">
            <?php 
            
                include "component/header.php";
            ?>
          
            <!-- start student list table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Deceased List</div>
                <div class="container">
   

</div>
<form action="" method="post" class="form-inline search-bar" id="searchForm">
    <div class="form-group mb-2">
        <label for="searchQuery" class="sr-only">Search</label>
        <input type="text" class="form-control" id="searchQuery" name="searchQuery" placeholder="Search" style="width: 150px;">
    </div>
    <!-- No need for the button -->
</form>


                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        
                    
                    </div>
                    <!-- PARA SA ADD MODAL  --> 
                    <div class="button-add-deceased">
                         
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeceasedModal">Add Deceased Person</button>
    <div class="modal fade" id="addDeceasedModal" tabindex="-1" aria-labelledby="addDeceasedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Deceased Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="addDeceasedForm" method="POST" action="addstudent.php" enctype="multipart/form-data">
                    <form method="POST" action="addstudent.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="img" class="col-form-label">Image:</label>
                            <input type="file" class="form-control" id="img" accept=".jpg,.png,.jpeg" name="img">
                        </div>
                        <div class="mb-3">
                            <label for="graveId" class="col-form-label">Grave ID:</label>
                            <input type="text" class="form-control" id="graveId" name="GRAVE_ID">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="NAME">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="col-form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" name="LASTNAME">
                        </div>
                        <div class="mb-3">
                            <label for="bornDate" class="col-form-label">Born Date:</label>
                            <input type="date" class="form-control" id="bornDate" name="BORN_DATE">
                        </div>
                        <div class="mb-3">
                            <label for="deathDate" class="col-form-label">Death Date:</label>
                            <input type="date" class="form-control" id="deathDate" name="DEATH_DATE">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Add Deceased Name</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
   
</div>

                    </div>
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
                        <?php
                          foreach ($result as $value) :
                        ?>
                        
                      <tr class="bg-white align-middle">
                        <td><img src="../assets/img/<?php echo $value['img'] ?>" alt="img" height="50" with="50"></td>
                        <td><?php echo $value['SECTION_NO'] ?></td>
                        <td><?php echo $value['NAME'] ?></td>
                        <td><?php echo $value['LASTNAME'] ?></td>
                        <td><?php echo $value['BORN_DATE'] ?></td>
                        <td><?php echo $value['DEATH_DATE'] ?></td>
                        <td class="d-md-flex gap-3 mt-3">


<!-- MODAL PARA SA UPDATE -->
<div class="button-update-deceased">
<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['RECORD_ID']; ?>" data-bs-whatever="@mdo">
    <i class="far fa-pen"></i>
    </button>
    <div class="modal fade" id="exampleModal<?php echo $value['RECORD_ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Deceased Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="update.php" enctype="multipart/form-data">
                        <!-- Add an input field for RECORD_ID -->
                        <input type="hidden" name="RECORD_ID" value="<?php echo $value['RECORD_ID']; ?>">
                        <!-- Add enctype attribute to support file uploads -->
                        <div class="mb-3">
                       <label for="img" class="form-label">Image:</label>
                         <input type="file" class="form-control" id="img" accept=".jpg,.png,.jpeg" name="img">
                        <img src="../assets/img/<?php echo $value['img']; ?>" alt="Current Image" height="50" width="50">
                         </div>
                        <!-- Use unique IDs for each input field -->
                        <div class="mb-3">
                            <label for="GRAVE_ID" class="form-label">GRAVE ID:</label>
                            <input type="number" class="form-control" id="GRAVE_ID" name="GRAVE_ID" value="<?php echo $value['GRAVE_ID']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="NAME" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="NAME" name="NAME" value="<?php echo $value['NAME']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="LASTNAME" class="form-label">LastName:</label>
                            <input type="text" class="form-control" id="LASTNAME" name="LASTNAME" value="<?php echo $value['LASTNAME']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="BORN_DATE" class="form-label">BornDate:</label>
                            <input type="date" class="form-control" id="BORN_DATE" name="BORN_DATE" value="<?php echo $value['BORN_DATE']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="DEATH_DATE" class="form-label">DeathDate:</label>
                            <input type="date" class="form-control" id="DEATH_DATE" name="DEATH_DATE" value="<?php echo $value['DEATH_DATE']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Update Deceased Person</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
                         
<button class="delete-btn" data-record-id="<?php echo $value['RECORD_ID']; ?>"><i class="far fa-trash"></i></button>
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
    

    </main>
    
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
   


<script>
    $(document).ready(function () {
    $('#addDeceasedForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission
        start_load(); // Assume you have a start_load() function for showing a loading indicator

        $.ajax({
            type: 'POST',
            url: 'ajax.php?action=save_deceased', // Update the URL to your desired endpoint
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    alert("Deceased person added successfully");
                    $('#addDeceasedModal').modal('hide');
                    location.reload(); // Reload the current page to reflect the changes
                } else if (response.error_code == 2) {
                    // Handle the case where the ID No already exists
                    $('#msg').html('<div class="alert alert-danger">ID No already exists.</div>');
                } else {
                    alert("Failed to add deceased person: " + response.message);
                }

                end_load(); // Assume you have an end_load() function for hiding the loading indicator
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
                end_load();
            }
        });
    });
});
</script>
<script>
    $(document).ready(function () {
        // Attach a submit event to the form in the update modal
        $('#exampleModal form').on('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Perform your custom validation here if needed

            // Submit the form if validation passes
            this.submit();
        });
    });
    </script>
    <script>
    $(document).ready(function () {
        // Attach a click event to the delete button with class 'delete-btn'
        $('.delete-btn').click(function () {
            var recordId = $(this).data('record-id');

            // Show a confirmation dialog before proceeding with the deletion
            if (confirm("Are you sure you want to delete this record?")) {
                // Make an AJAX request to remove.php for deletion
                $.ajax({
                    type: 'POST',
                    url: 'remove.php',
                    data: { id: recordId },
                    success: function (response) {
                        alert(response); // Show the server response in an alert or handle it as needed
                        location.reload(); // Reload the page after successful deletion
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }
        });
    });
</script>
</body>

</html>