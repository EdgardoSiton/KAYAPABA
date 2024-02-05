<?php
session_start();
include 'conixion.php';

if (isset($_POST['submit'])) {
    $id = $_POST['RECORD_ID'];
    $GRAVE = $_POST['GRAVE_ID'];
    $Name = $_POST['NAME'];
    $Email = $_POST['LASTNAME'];
    $Phone = $_POST['BORN_DATE'];
    $DateOfAdmission = $_POST['DEATH_DATE'];

    // Check if a new image file is provided
    if ($_FILES['img']['name'] !== "") {
        // Handle image upload
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($_FILES['img']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allow certain file formats
        $allowedFormats = array("jpg", "jpeg", "png");
        if (in_array($imageFileType, $allowedFormats)) {
            if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                // Update the database with the new image file
                $img = $_FILES['img']['name'];
                $updateQuery = $con->prepare("UPDATE registered_deceased
                    SET GRAVE_ID = :GRAVE, NAME = :Name, LASTNAME = :Email, BORN_DATE = :Phone, DEATH_DATE = :DateOfAdmission, img = :img
                    WHERE RECORD_ID = :id");

                $updateQuery->bindParam(':GRAVE', $GRAVE);
                $updateQuery->bindParam(':Name', $Name);
                $updateQuery->bindParam(':Email', $Email);
                $updateQuery->bindParam(':Phone', $Phone);
                $updateQuery->bindParam(':DateOfAdmission', $DateOfAdmission);
                $updateQuery->bindParam(':img', $img);
                $updateQuery->bindParam(':id', $id);

                $res = $updateQuery->execute();
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file format. Allowed formats: jpg, jpeg, png.";
        }
    } else {
        // No new image file provided, update other fields only
        $updateQuery = $con->prepare("UPDATE registered_deceased
            SET GRAVE_ID = :GRAVE, NAME = :Name, LASTNAME = :Email, BORN_DATE = :Phone, DEATH_DATE = :DateOfAdmission
            WHERE RECORD_ID = :id");

        $updateQuery->bindParam(':GRAVE', $GRAVE);
        $updateQuery->bindParam(':Name', $Name);
        $updateQuery->bindParam(':Email', $Email);
        $updateQuery->bindParam(':Phone', $Phone);
        $updateQuery->bindParam(':DateOfAdmission', $DateOfAdmission);
        $updateQuery->bindParam(':id', $id);

        $res = $updateQuery->execute();
    }
}

header('location: students_list.php');
?>
