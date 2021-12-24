<?php

    require_once '../include/connect.php';
    session_start();

    if(!isset($_SESSION['superuser'])){
        header('Location: ./index.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <script src="./css/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="./css/jquery-3.6.0.min.js"></script>
</head>

<body>
    
    <div class="container-fluid">
        <?php
        require './sidebar.php';
        ?>
        <!-- <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon"><i class="bi bi-app-indicator"></i></span>
                        <span class="title">United Motives</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="bi bi-house-door"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="bi bi-exclamation-diamond"></i></span>
                        <span class="title">Insert Alerts</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="bi bi-file-easel"></i></span>
                        <span class="title">Slides</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"></span>
                        <span class="title">Brand Name</span>
                    </a>
                </li>
            </ul>
        </div> -->

        <!-- Main bar -->
        <!-- <div class="main">
            <div class="top-bar">
                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>
                <div class="search">
                    <label for="">
                        <input type="text" name="" id="" placeholder="Search here">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
]                    <img src="./css/icon/person-workspace.svg" alt="">
                </div>
            </div> --> 

            <!-- Main Cards -->

            <div class="cardBox">
                <div class="cards">
                    <div>
                        <div class="numbers">1,222</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        <i class="bi bi-eye"></i>
                    </div>
                </div>

                <div class="cards">
                    <div>
                        <div class="numbers">1,222</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        <i class="bi bi-eye"></i>
                    </div>
                </div>

                <div class="cards">
                    <div>
                        <div class="numbers">1,222</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        <i class="bi bi-eye"></i>
                    </div>
                </div>

                <div class="cards">
                    <div>
                        <div class="numbers">1,222</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        <i class="bi bi-eye"></i>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>
