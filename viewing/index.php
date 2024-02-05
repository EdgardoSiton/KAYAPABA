<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN-IN</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <?php 
    include 'navbar.php';
    ?>
     <style>
        .rounded-box {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: #3498db; /* Set your desired background color */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff; /* Set your desired text color */
            position: relative;
            overflow: hidden;
            margin-top: -50px; /* Adjust the margin-top value as needed */
        }

        .rounded-box .card {
            background-color: transparent;
            border: none;
        }

        .card-title {
            font-size: 24px; /* Set your desired font size */
            margin-bottom: 0; /* Remove default bottom margin */
        }

        .animation-circle {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-color: #ff9900; /* Set your desired circle color */
            border-radius: 50%;
            animation: bounce 2s infinite alternate; /* Set your desired animation properties */
        }

        @keyframes bounce {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-20px);
            }
        }
    </style>
</head>
<body>
   <main class="bg-sign-in d-flex justify-content-center align-items-center">
   <div class="container">
                <div class="row">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <div class="col-md-12 text-center mb-5">
                                <h1 style="font-size: 85px;">Cemetery Mapping System</h1>
                                <p>A cutting-edge technological solution designed to streamline and modernize the management of burial grounds, providing a comprehensive and efficient platform for accurate location tracking, record-keeping.</p>

    </div>
    </div>
    </div>
    </div>
    </div>

   </main>



   <script src="/js/bootstrap.bundle.js"></script>
   <script src="./js/validation.js"></script>
</body>
</html>