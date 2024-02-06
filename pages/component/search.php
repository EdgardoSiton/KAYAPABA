<?php
// Include database connection
include 'conixion.php';

// Check if the form has been submitted
if(isset($_POST['search'])) {
    // Get the search query from the form
    $search_query = $_POST['search'];

    // Perform a query to join 'grave' and 'registered_deceased' tables
    $sql = "SELECT g.*, rd.SECTION_NO 
            FROM grave g 
            LEFT JOIN registered_deceased rd ON g.GRAVE_ID = rd.GRAVE_ID 
            WHERE CONCAT(g.NAME, ' ', g.LASTNAME) LIKE '%$search_query%'";

    // Check if the query was successful
    $result = $conn->query($sql);
    if($result) {
        ?>
        <?php if ($result->num_rows > 0): ?>
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Section</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['NAME']; ?></td>
                        <td><?php echo $row['LASTNAME']; ?></td>
                        <td><?php echo $row['SECTION_NO']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No results found</p>
        <?php endif; ?>
        <?php
    } else {
        echo "Error executing query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Search query not provided.";
}
?>
