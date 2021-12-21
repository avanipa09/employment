<?php

require './navbar.php';

//echo $userType;

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employment Exchange</title>
  <link rel="stylesheet" href="./assets/css/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/jpg" href="./assets/images/logo.png"/>
  <link rel="stylesheet" href="./assets/css/css/index.css">
  <script src="./assets/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>

<body>


    <!-- <div class="main-nav">
        <label id="menubar"><i id="menubarI" style="float: left; font-size: 22px;" class="bi bi-list menubar"></i></label>
        <div class="row lap_nav">
            <div class="col-1">
                <a href="./index"><img class="logo" src="./assets/images/logo.png" alt=""></a>
            </div>
            <div class="col-11">
                <ul class="nav-list">
                    <?php
                        if($userType!=null){
                    ?>
                        <a href="./logout"><li>Logout</li></a>
                    <?php
                        }
                    ?>
                    <?php
                        if($userType==null){
                    ?>
                        <a href="./login"><li>Sign In</li></a>
                    <?php
                        }
                    ?>
                    <li class="nav-item " id="schemes">
                        <a class="text_black" href="#" id="navbarDropdown" aria-expanded="false">Schemes</a>
                        <ul class="dropdown-menu nav-dropdown" id="schemes_dropdown" aria-labelledby="navbarDropdown">
                            <a href=""><li>haaas</li></a>
                            <a href=""><li>haaas</li></a>
                            <a href=""><li>haaas</li></a>
                        </ul>
                    </li>
                    <li class="nav-item " id="services">
                        <a class="text_black" href="#" id="navbarDropdown" aria-expanded="false">Services</a>
                        <ul class="dropdown-menu nav-dropdown" id="services_dropdown" aria-labelledby="navbarDropdown">
                            <a href=""><li>haaas</li></a>
                            <a href=""><li>haaas</li></a>
                            <a href=""><li>haaas</li></a>
                        </ul>
                    </li>
                    <a href="./contact"><li>Contact Us</li></a>
                    <a href="./about"><li>About</li></a>
                    <a href="./index"><li>Home</li></a>
                    <?php
                        if($userType!=null){
                    ?>
                        <a href="./account"><li style="color: green">Welcome <?php echo $username ?></li></a>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="mobile_nav">
        <ul>
            <a href="./index"><li>Home</li></a>
            <a href="./about"><li>About</li></a>
            <a href="./contact"><li>Contact Us</li></a>
            <a href="#" id="mobile_services"><li>Services<i id="mobile-nav-sub1" style="float: right;" class="bi bi-plus-lg"></i></li></a>
            <ul class="mobile-nav-sub1">
                <a href="#"><li>aaa</li></a>
                <a href="#"><li>aaa</li></a>
                <a href="#"><li>aaaa</li></a>
                <a href="#"><li>aaa</li></a>
            </ul>
            <a id="mobile_schemes" href="#"><li>Schemes<i id="mobile-nav-sub2" style="float: right;" class="bi bi-plus-lg"></i></li></a>
            <ul class="mobile-nav-sub2">
                <a href="#"><li>aaa</li></a>
                <a href="#"><li>aaa</li></a>
                <a href="#"><li>aaaa</li></a>
            </ul>
            <a href="./login"><li>Sign In</li></a>
            <a href="./logout"><li>Logout</li></a>
        </ul>
    </div> -->

</body>
<script>
    $(document).ready(function () {
        $("#services").hover(function () {
            // $('#services_dropdown').toggle();
            $("#services_dropdown").toggleClass("nav-dropdown-active");
        });

        $("#schemes").hover(function () {
            // $('#services_dropdown').toggle();
            $("#schemes_dropdown").toggleClass("nav-dropdown-active");
        });

        $("#mobile_services").click(function(){
            $("#mobile_services").next().toggle(400);
            $("#mobile-nav-sub1").toggleClass("bi bi-x-lg");
        });

        $("#mobile_schemes").click(function(){
            $("#mobile_schemes").next().toggle(400);
            $("#mobile-nav-sub2").toggleClass("bi bi-x-lg");
        });

        $("#menubar").click(function(){
            $(".mobile_nav").toggle(500);
            $("#menubarI").toggleClass("bi bi-x-lg");            

        });
    });

</script>
</html>