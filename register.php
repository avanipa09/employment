<?php

require_once './include/connect.php';
require './encdec.php';

$userType = "";
$register = "";
$enable = "";

if(isset($_GET['tag'])){
  $data = $_GET['tag'];
  $userType = decrypt($data);
  $enable=1;
}

if($enable!=1){
  header('Location: login');
}

if(isset($_GET['error'])){
  $data = $_GET['error'];
  $error = decrypt($data);
}

if($userType==0){
  $register = "User Registration";
}else if($userType ==1){
  $register = "Company Registration";
}

if(isset($_POST['register'])){

  $flag = 1;
  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $number = mysqli_real_escape_string($conn, $_POST['number']);
  $district = mysqli_real_escape_string($conn, $_POST['district']);
  $place = mysqli_real_escape_string($conn, $_POST['place']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $hash = password_hash($password, PASSWORD_DEFAULT);

  if($userType==0){
    $company_name = 'NULL';
    $description = 'NULL';
    $company_registration = 0;
  }else if($userType==1){
    $company_name = mysqli_real_escape_string($conn, $_POST['company-name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $company_registration = mysqli_real_escape_string($conn, $_POST['registration']);
  }
  
  if($userType==1){
    $date = '0000-00-00';
    $gender = 'NULL';
    $adhaar = 0;
    $ward = 0;
    $localbody = 'NULL';
  }else if($userType==0){
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $adhaar = mysqli_real_escape_string($conn, $_POST['adhaar']);
    $ward = mysqli_real_escape_string($conn, $_POST['ward']);
    $localbody = mysqli_real_escape_string($conn, $_POST['localbody']);
  }

  if($userType==0){
    $test_sql = "SELECT aadharno FROM tbl_registration where aadharno='$adhaar'";
    $result = mysqli_query($conn, $test_sql);
    if(mysqli_fetch_assoc($result)){
      $flag = 0;
    }
  }else if($userType==1){
    $test_sql = "SELECT company_registration FROM tbl_registration where company_registration='$company_registration'";
    $result = mysqli_query($conn, $test_sql);
    if(mysqli_fetch_assoc($result)){
      $flag = 0;
    }
  }

  if($flag==1){
    $sql = "INSERT INTO tbl_registration(uname, uaddress, uphone, emailid, aadharno, company_registration, gender, dob, place, district, localbody, ward, companyname, description, password, status) values
    ('$name','$address', '$number', '$email', '$adhaar', '$company_registration', '$gender', '$date', '$place', '$district', '$localbody', '$ward', '$company_name', '$description', '$hash', $userType)";
    if(mysqli_query($conn, $sql)){
      header('Location: ./login');
    }else{
      echo mysqli_error($conn);
    }
  }else if($flag==0){
    $status = encrypt($userType);
    $error = encrypt("Error");
    header("Location: register?tag=$status&error=$error");
  }
  
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $register ?></title>
  <link rel="stylesheet" href="./assets/css/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/css/login.css">
  <link rel="shortcut icon" type="image/jpg" href="./assets/images/logo.png"/>
  <script src="./assets/jquery-3.6.0.js"></script>
</head>

<body>

  <div class="container">
    <div class="row justify-content-md-center" style="margin-top: 5%;">
      <div id="col1" class="col-3"></div>
      <div id="col2" class="col-6 login-main-div"><br>
        <center><b class="login-head"><?php echo $register ?></b></center><br>
        <div id="alert" class="alert-danger">ahi</div>

        <?php
          if(isset($_GET['error'])){
            if ($error=="Error"){
              $message = $_GET['error'];
              $message = "Account already exists, Please login";
        ?>
         <center><div id="alert" class="alert-warning"><?php echo $message ?></div></center><br>
        <?php
            }
          }
        ?>

        <form id="form" action="" method="POST" style="width: 100%;">
          <div class="container">
            <input type="text" name="name" class="inp px-3" placeholder="Name">
            <?php
            if($userType==0){
            ?>
              <input type="email" name="email" class="inp px-3" placeholder="Email id">
            <?php
            }else if($userType==1){
            ?>
              <input type="email" name="email" class="inp px-3" placeholder="Company Email id">
            <?php
            }
            ?>
            <input type="number" id="phone" name="number" class="inp px-3" placeholder="Phone">
            <input type="text" name="address" class="inp px-3" placeholder="Address">
            <?php
              if ($userType==0){
            ?>
              <div class="gender_style">
                <h6>Gender&nbsp;&nbsp;</h6>
                <input type="radio" name="gender" id="inlineRadio1" value="male">
                <!-- <input type="radio" name="male" id="inlineRadio1" value="male"> -->
                <label for="inlineRadio2">Male</label>
                <input type="radio" name="gender" id="inlineRadio2" value="female">
                <!-- <input type="radio" name="female" id="inlineRadio2" value="female"> -->
                <label for="inlineRadio2">Female</label>
              </div>
              <div class="dob_style">
                <h6 style="display: inline;">DOB</h6>
                <input style="display: inline;" type="date" name="date" class="inp px-3" value="Date" placeholder="Date">
              </div>
              <input type="number" id="adhaar" name="adhaar" class="inp px-3" placeholder="Adhaar number">
              <input type="text" name="ward" class="inp px-3" placeholder="Ward">
            <?php
              }
            ?>
            <input type="text" name="place" class="inp px-3" placeholder="Place">
            <div class="district_drop">
              <label for="district">District</label>
              <select name="district" id="district">
                <option value="Alappuzha">Alappuzha</option>
                <option value="Ernakulam">Ernakulam</option>
                <option value="Idukki">Idukki</option>
                <option value="Kannur">Kannur</option>
                <option value="Kasaragod">Kasaragod</option>
                <option value="Kollam">Kollam</option>
                <option value="Kottayam">Kottayam</option>
                <option value="Kozhikode">Kozhikode</option>
                <option value="Malappuram">Malappuram</option>
                <option value="Palakkad">Palakkad</option>
                <option value="Pathanamthitta">Pathanamthitta</option>
                <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                <option value="Thrissur">Thrissur</option>
                <option value="Wayanad">Wayanad</option>
                <option value="NULL" selected>Select District</option>
              </select>
            </div>
            <?php
              if ($userType==0){
            ?>
              <input type="text" name="localbody" class="inp px-3" placeholder="Localbody">
            <?php
              }
            ?>

            <?php
              if ($userType==1){
            ?>
                <input type="number" id="registration" name="registration" class="inp px-3" placeholder="Registration Number">
                <input type="text" name="company-name" class="inp px-3" placeholder="Company Name">
                <div class="district_drop">
                  <label for="description">Description</label>
                  <select name="description" id="description">
                    <option value="Public IT">Public IT</option>
                    <option value="Govt IT">Govt IT</option>
                    <option value="Private IT">Private IT</option>
                  </select>
                </div>
            <?php
              }
            ?>

            <input type="password" id="passwd" name="password" class="inp px-3" placeholder="Password">
            <input type="password" id="confirm_passwd" name="confirm_password" class="inp px-3"
              placeholder="Confirm Password">
          </div>
          <div class="form-row py-4">
            <div class="offset-1 col-lg-10">
              <center><input type="submit" name="register" value="Register" class="btn btn-success" id="register"></center><br>
              <p style="color: white; margin: 0;">Already have an account? &nbsp; <a href="./login" style="color: lightblue;">Sign in</a><br><br></p>
            </div>
          </div>
        </form>
      </div>
      <div id="col3" class="col-3"></div>
    </div>
  </div>
</body>
<!--
<script>
  $(document).ready(function () {
    $("#form").submit(function (e) {
      var passwd = $("#passwd").val();
      var confirm_passwd = $("#confirm_passwd").val();
      var phone = $("#phone").val();
      var adhaar = $("#adhaar").val();
      var isMale = $('#inlineRadio1').is(':checked');
      var isfemale = $('#inlineRadio2').is(':checked');

      if (String(phone).length != 10) {
        display_error("Please enter a valid phone number");
        interrupt();
      } else if(isMale!=true && isfemale!=true){
        display_error('Please select a gender');
        interrupt();
      } else if (passwd != confirm_passwd) {
        display_error('Please enter a valid password');
        interrupt();
      }else if(adhaar.length != 12){
        display_error('Please enter a valid adhaar number');
        interrupt();
      }

      function interrupt() {
        e.preventDefault(e);;
      }
    });

    if ($(window).width() < 991) {
      $("#col1").attr('class', 'col-1');
      $("#col2").attr('class', 'col-10');
      $("#col3").attr('class', 'col-1');
      $("#col2").addClass('login-main-div');
    }
    function display_error(error){
      $("#alert").css("display", "block");
      $("#alert").text(error);
    }

  });
</script>
-->
</html>