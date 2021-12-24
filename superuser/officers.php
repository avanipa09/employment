<?php

    require_once '../include/connect.php';
    require './encdec.php';

    session_start();

    if(!isset($_SESSION['superuser'])){
        header('Location: ./index.php');
        exit();
    }

    if(isset($_POST['submit_staff'])){
        // Password
        $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $shfl = str_shuffle($comb);
        $password = substr($shfl,0,10);

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $adhaar = mysqli_real_escape_string($conn, $_POST['adhaar']);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $district = 'NULL';
        $place = 'NULL';
        $company_name = 'NULL';
        $description = 'NULL';
        $company_registration = 0;
        $ward = 0;
        $localbody = 'NULL';
        $userType = 2;

        $sql = "INSERT INTO tbl_registration(uname, uaddress, uphone, emailid, aadharno, company_registration, gender, dob, place, district, localbody, ward, companyname, description, password, status) values
        ('$name','$address', '$number', '$email', '$adhaar', '$company_registration', '$gender', '$date', '$place', '$district', '$localbody', '$ward', '$company_name', '$description', '$hash', '$userType')";
        if(mysqli_query($conn, $sql)){
            $encpass = encrypt($password);
            $passSQL = "INSERT INTO manager(eid, epasswd) values((SELECT max(regid) from tbl_registration), '$password')";
            mysqli_query($conn, $passSQL);
            echo "<script>";
                // echo "alert('Inserted Staff')";
                echo "alert('Please save the password : $password')";
            echo "</script>";
        }

    }

    if(isset($_POST['submit_officer'])){
        // Password
        $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
        $shfl = str_shuffle($comb);
        $password = substr($shfl,0,10);

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $adhaar = mysqli_real_escape_string($conn, $_POST['adhaar']);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $district = 'NULL';
        $place = 'NULL';
        $company_name = 'NULL';
        $description = 'NULL';
        $company_registration = 0;
        $ward = 0;
        $localbody = 'NULL';
        $userType = 3;

        $sql = "INSERT INTO tbl_registration(uname, uaddress, uphone, emailid, aadharno, company_registration, gender, dob, place, district, localbody, ward, companyname, description, password, status) values
        ('$name','$address', '$number', '$email', '$adhaar', '$company_registration', '$gender', '$date', '$place', '$district', '$localbody', '$ward', '$company_name', '$description', '$hash', '$userType')";
        if(mysqli_query($conn, $sql)){
        echo "<script>";
            // echo "alert('Inserted Officer')";
            echo "alert('Please save the password : $password')";
        echo "</script>";
        }

    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from category where id='$id'";
        if(mysqli_query($conn, $sql)){
            echo "<script>";
                echo "alert('Sub Category deleted Successfully')";
            echo "</script>";
        }
        header('Location: ./category.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staff / Offcers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <script src="./css/js/bootstrap.min.js"></script>
    <!-- Online scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="./css/jquery-3.6.0.min.js"></script>
    <script src="./css/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

<div class="container-fluid">
        <?php
        require './sidebar.php';
        ?>
            <!-- Inser update delete slides -->

            <div class="details">

                <!-- Update button and choose file -->

                <div class="update-top-bar">
                    <div class="cardHeader">
                        <h2>Insert Categories</h2>
                    </div>

<!-- Alerts -->
                <?php
                    if(isset($_GET['success'])){
                        $message = "Category inserted successfully"
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong id="alert-status"> <?php echo $message ?> </strong>
                        <button type="button" style="float:right; background:transparent; border:none" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="bi bi-x-octagon"></i></span>
                        </button>
                    </div>
                <?php
                    }
                ?>
<!-- Alerts End -->
                    <div class="inputstyles">
                    <center><div id="alert" class="alert-danger">ahi</div></center>
                        <form id="form" action="" method="POST">
                            <input type="text" name="name" class="inp px-3" placeholder="Name">
                            <input type="email" name="email" class="inp px-3" placeholder="Email id">
                            <input type="number" id="phone" name="number" class="inp px-3" placeholder="Phone">
                            <input type="text" name="address" class="inp px-3" placeholder="Address">
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
                            <input type="number" id="adhaar" name="adhaar" class="inp px-3" placeholder="Adhaar number"><br>

                            <input class="btn btn-outline-info" type="submit" name="submit_staff" id="" value="Insert Staff">
                            <input class="btn btn-outline-info" type="submit" name="submit_officer" id="" value="Insert Officer"> 
                        </form>
                    </div>
                </div>

                <!-- <div class="top-alert">
                    <div class="cardHeader">
                        <h2>Slides</h2>
                    </div>
                    <table>
                        <thead>
                            <td>Category</td>
                            <td>Sub-Caegory</td>
                            <td>Status</td>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "select * from category";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" .$row['category']. "</td>";
                                        echo "<td>" .$row['subcategory']. "</td>";
                                ?>
                                        <td>
                                            <button type='submit' name='delete' class='btn btn-outline-info'>
                                                <a style="text-decoration: none" href="./category.php?id=<?php echo $row['id'] ?>">Delete</a>
                                        </button>
                                    </td>
                                <?php
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div> -->
                
            </div>
        </div>
    </div>

</body>

<!-- <script>
  alert("Hai");
  $(document).ready(function () {
    $("#form").submit(function (e) {
        alert("hai");
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
      }else if(adhaar.length != 12){
        display_error('Please enter a valid adhaar number');
        interrupt();
      }

      function interrupt() {
        e.preventDefault(e);;
      }
    });

    function display_error(error){
      $("#alert").css("display", "block");
      $("#alert").text(error);
    }

  });
</script> -->

</html>