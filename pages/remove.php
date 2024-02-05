<?php
include 'conixion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you're sending the record ID using the 'id' parameter
    $recordId = $_POST['id'];

    // Perform the deletion
    $deleteQuery = "DELETE FROM registered_deceased WHERE RECORD_ID = :recordId";
    $stmt = $con->prepare($deleteQuery);
    $stmt->bindParam(':recordId', $recordId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Failed to delete record";
    }
} else {
    echo "Invalid request method";
}
?>
