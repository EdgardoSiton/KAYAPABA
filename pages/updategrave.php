<?php
// Include database connection file
include 'conixion.php';

if (isset($_POST['submit'])) {
    // Retrieve form data
    $sectionNo = $_POST['SECTION_NO'];
    $space = $_POST['SPACE'];

    // Validate input data (you can add more validation if needed)
    if (empty($sectionNo) || empty($space)) {
        echo "Please fill in all the fields.";
        exit();
    }

    // Update data in the 'grave' table
    try {
        $updateQuery = "UPDATE grave SET SPACE = ? WHERE SECTION_NO = ?";
        $stmtUpdate = $con->prepare($updateQuery);
        $stmtUpdate->bindParam(1, $space, PDO::PARAM_INT);
        $stmtUpdate->bindParam(2, $sectionNo, PDO::PARAM_STR);

        if ($stmtUpdate->execute()) {
            // Redirect to the course.php after successful update
            header('location: course.php');
            exit();
        } else {
            // Handle the case where the update fails
            echo "Failed to update grave section.";
        }
    } catch (Exception $e) {
        // Log the error for debugging
        error_log("Error in updategrave.php: " . $e->getMessage());
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to the main page if the form is not submitted
    header('location: course.php');
    exit();
}
?>
