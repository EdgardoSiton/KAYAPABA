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
    <title>SIGN-IN</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('/cemeterysystemtothemoon/assets/pisbg.jpg');
        background-position: center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
        }

        .bg-sign-in {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        thead {
            background-color: #343a40;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <main class="bg-sign-in">
        <div class="container">
            <div class="row">
                <div class="col-md-12 header-content">
                    <!-- Search Form -->
                    <form action="" method="post" class="form-inline search-bar">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="searchQuery" class="sr-only">Search</label>
                            <input type="text" class="form-control" id="searchQuery" name="searchQuery" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>

                    <!-- Display Results -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">GRAVE</th>
                                    <th scope="col">FIRST NAME</th>
                                    <th scope="col">LAST NAME</th>
                                    <th scope="col">BORN DATE</th>
                                    <th scope="col">DEATH DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result as $value) :
                                ?>
                                    <tr>
                                        <td><img src="/cemeterysystemtothemoon/assets/img/<?php echo $value['img'] ?>" alt="img" height="50" width="50"></td>
                                        <td><?php echo $value['SECTION_NO'] ?></td>
                                        <td><?php echo $value['NAME'] ?></td>
                                        <td><?php echo $value['LASTNAME'] ?></td>
                                        <td><?php echo $value['BORN_DATE'] ?></td>
                                        <td><?php echo $value['DEATH_DATE'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Include Bootstrap JS and jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
