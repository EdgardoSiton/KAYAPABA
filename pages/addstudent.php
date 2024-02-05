<?php
 include 'conixion.php';
if (isset($_POST['submit'])) {
    $Grave = $_POST['GRAVE_ID'];

    // Check if a file has been uploaded
    if (!empty($_FILES['img']['name'])) {
        $image = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];  
        $folder = "../assets/img/".$image;
        $uploadError = $_FILES['img']['error'];

        if ($uploadError !== UPLOAD_ERR_OK) {
            // Handle file upload error
            $response = array("success" => false, "message" => "File upload failed. Error code: $uploadError");
        } else if (move_uploaded_file($tempname, $folder)) {
            // Image uploaded successfully
            $Name = $_POST['NAME'];
            $Email = $_POST['LASTNAME'];
            $Phone = $_POST['BORN_DATE'];
            $DateOfAdmission = $_POST['DEATH_DATE'];

            try {
                // Check if there is available space
                $checkSpaceQuery = "SELECT SPACE FROM grave WHERE GRAVE_ID = ?";
                $stmtCheckSpace = $con->prepare($checkSpaceQuery);
                $stmtCheckSpace->bindParam(1, $Grave, PDO::PARAM_INT);
                $stmtCheckSpace->execute();
                $space = $stmtCheckSpace->fetchColumn();

                if ($space > 0) {
                    // Continue with the insertion
                    $insertQuery = "INSERT INTO registered_deceased (GRAVE_ID, img, NAME, LASTNAME, BORN_DATE, DEATH_DATE) 
                                    VALUES (?, ?, ?, ?, ?, ?)";
                    $stmtInsert = $con->prepare($insertQuery);
                    $stmtInsert->bindParam(1, $Grave, PDO::PARAM_INT);
                    $stmtInsert->bindParam(2, $image, PDO::PARAM_STR);
                    $stmtInsert->bindParam(3, $Name, PDO::PARAM_STR);
                    $stmtInsert->bindParam(4, $Email, PDO::PARAM_STR);
                    $stmtInsert->bindParam(5, $Phone, PDO::PARAM_STR);
                    $stmtInsert->bindParam(6, $DateOfAdmission, PDO::PARAM_STR);

                    if ($stmtInsert->execute()) {
                        // Update SPACE in the grave table
                        $updateQuery = "UPDATE grave SET SPACE = SPACE - 1 WHERE GRAVE_ID = ?";
                        $stmtUpdate = $con->prepare($updateQuery);
                        $stmtUpdate->bindParam(1, $Grave, PDO::PARAM_INT);
                        $stmtUpdate->execute();

                        // Send a success response
                        $response = array("success" => true, "message" => "Deceased person added successfully");
                    } else {
                        // Send an error response
                        $response = array("success" => false, "message" => "Failed to add deceased person");
                    }
                } else {
                    // Send an error response
                    $response = array("success" => false, "message" => "The grave area is full. Please choose another grave.");
                }

            } catch (Exception $e) {
                // Log the error for debugging
                error_log("Error: " . $e->getMessage(), 0);
                $response = array("success" => false, "message" => "Error: " . $e->getMessage());
            }
        } else {
            // Send an error response
            $response = array("success" => false, "message" => "Error moving the uploaded file.");
        }
    } else {
        // Send an error response for no file uploaded
        $response = array("success" => false, "message" => "No file uploaded.");
    }

    // Send the JSON-encoded response
 
    
    // Prevent further execution (to avoid unintended redirects)
    header("Location: students_list.php");
    exit;
}
?>
