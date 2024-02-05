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
            width: 55%;
            max-height: 80vh; /* Set max height to 80% of the viewport height */
            border-radius: 16px;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .rounded-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
        }

        .animation-circle {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-color: #ff9900;
            border-radius: 50%;
            animation: bounce 2s infinite alternate;
        }

        @keyframes bounce {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-20px);
            }
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .rounded-box {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <main class="bg-sign-in d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="header-content">
                    <div class="rounded-box">
                        <img src="../assets/img/map.jpg" alt="Ming Image">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/js/bootstrap.bundle.js"></script>
    <script src="./js/validation.js"></script>
</body>
</html>
