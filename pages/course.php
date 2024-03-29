<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRAVE</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->
        <?php include "component/sidebar.php"; ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px-4">
            <?php include "component/header.php"; ?>

            <!-- start student list table -->
            <div class="button-add-student">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@mdo">ADD GRAVE</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD GRAVE LOCATION</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="addgrave.php" enctype="multipart/form-data">

                                    <div class="">
                                        <label for="recipient-name" class="col-form-label">SECTION_NO</label>
                                        <input type="text" class="form-control" id="recipient-name" name="SECTION_NO">
                                    </div>
                                    <div class="">
                                        <label for="recipient-name" class="col-form-label">SPACE</label>
                                        <input type="text" class="form-control" id="recipient-name" name="SPACE">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Add Grave
                                            Section</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="courses">
                <table class="table table-responsive">
                    <thead>
                        <th>GRAVE ID</th>
                        <th>SECTION NO</th>
                        <th>SPACE</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php include 'conixion.php';
                        $requete = "SELECT * FROM grave";
                        $result = $con->query($requete);

                        foreach ($result as $value): ?>
                            <tr>
                                <td><?php echo $value['GRAVE_ID'] ?></td>
                                <td><?php echo $value['SECTION_NO'] ?></td>
                                <td><?php echo $value['SPACE'] ?></td>
                                <td class="d-md-flex gap-3 mt-3">
                                    <div class="button-update-deceased">
                                        <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#updateModal<?php echo $value['GRAVE_ID']; ?>"
                                                data-bs-whatever="@mdo">
                                            <i class="far fa-pen"></i>
                                        </button>
                                        <div class="modal fade" id="updateModal<?php echo $value['GRAVE_ID']; ?>"
                                             tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">UPDATE GRAVE</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="updategrave.php">
                                                            <input type="hidden" name="grave_id"
                                                                   value="<?php echo $value['GRAVE_ID']; ?>">
                                                            <div class="mb-3">
                                                                <label for="update-section-no" class="form-label">SECTION
                                                                    NO:</label>
                                                                <input type="text" class="form-control"
                                                                       id="update-section-no" name="SECTION_NO"
                                                                       value="<?php echo $value['SECTION_NO']; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="update-space" class="form-label">SPACE:</label>
                                                                <input type="text" class="form-control" id="update-space"
                                                                       name="SPACE" value="<?php echo $value['SPACE']; ?>"
                                                                       required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary" name="submit">Update
                                                                Grave</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                         
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end content page -->
    </main>

    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // JavaScript function for deletion
        document.addEventListener("DOMContentLoaded", function () {
            // Add an event listener to handle record deletion
            document.querySelectorAll(".delete-btn").forEach(function (button) {
                button.addEventListener("click", function () {
                    var recordId = this.getAttribute("data-record-id");

                    // Perform the deletion using AJAX or form submission
                    // You need to implement the actual deletion logic

                    // Example using AJAX:
                    // fetch('delete.php', {
                    //     method: 'POST',
                    //     body: JSON.stringify({ recordId: recordId }),
                    //     headers: {
                    //         'Content-Type': 'application/json'
                    //     }
                    // })
                    // .then(response => response.json())
                    // .then(data => {
                    //     // Handle the response from the server
                    //     console.log(data);
                    // })
                    // .catch(error => console.error('Error:', error));

                    // For now, let's just log the record ID
                    console.log("Delete record with ID:", recordId);
                });
            });
        });
    </script>
</body>

</html>
