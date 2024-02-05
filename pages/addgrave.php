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

    // Insert data into the 'grave' table
    try {
        $insertQuery = "INSERT INTO grave (SECTION_NO, SPACE) VALUES (?, ?)";
        $stmtInsert = $con->prepare($insertQuery);
        $stmtInsert->bindParam(1, $sectionNo, PDO::PARAM_STR);
        $stmtInsert->bindParam(2, $space, PDO::PARAM_INT);

        if ($stmtInsert->execute()) {
            // Redirect to the students_list.php after successful insertion
            header('location: course.php');
            exit();
        } else {
            // Handle the case where the insertion fails
            echo "Failed to add grave section.";
        }
    } catch (Exception $e) {
        // Log the error for debugging
        error_log("Error in addgrave.php: " . $e->getMessage());
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to the main page if the form is not submitted
    header('location: course.php');
    exit();
}
?>
