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