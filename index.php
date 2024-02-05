<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN-IN</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
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

    <header>             
        <main class="bg-sign-in d-flex justify-content-center align-items-center vh-100">
            <div class="container">
                <div class="row">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <div class="col-md-12 text-center mb-5">
                                <h1 style="font-size: 85px;">Cemetery Mapping System</h1>
                                <p>A cutting-edge technological solution designed to streamline and modernize the management of burial grounds, providing a comprehensive and efficient platform for accurate location tracking, record-keeping.</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <a href="viewing/index.php" class="rounded-box">
                                        <div class="animation-circle"></div>
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">VISITOR</h5>
                                                <!-- Add user-specific content or form here -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <a href="AdminLogin.php" class="rounded-box">
                                        <div class="animation-circle"></div>
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Admin</h5>
                                                <!-- Add admin-specific content or form here -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </header>

    <script src="/js/bootstrap.bundle.js"></script>
    <script src="./js/validation.js"></script>
</body>
</html>
