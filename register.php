<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" href="./assets/css/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/css/login.css">
  <script src="./assets/jquery-3.6.0.js"></script>
</head>

<body>

  <div class="container">
    <div class="row justify-content-md-center" style="margin-top: 5%;">
      <div id="col1" class="col-3"></div>
      <div id="col2" class="col-6 login-main-div"><br>
        <center><b class="login-head">Register</b></center><br>
        <div id="alert" class="alert-danger">ahi</div>
        <form id="form" style="width: 100%;">
          <div class="container">
            <input type="text" name="name" class="inp px-3" placeholder="Name">
            <input type="email" name="email" class="inp px-3" placeholder="Email id">
            <input type="number" id="phone" name="number" class="inp px-3" placeholder="Phone">
            <input type="text" name="address" class="inp px-3" placeholder="Address">
              <div class="gender_style">
                <h6>Gender&nbsp;&nbsp;</h6>
                <input type="radio" name="flexRadioDefault" id="male">
                <label for="inlineRadio2">Male</label>
                <input type="radio" name="flexRadioDefault" id="female">
                <label for="inlineRadio2">Female</label>
              </div>
            <div class="dob_style">
              <h6 style="display: inline;">DOB</h6>
              <input style="display: inline;" type="date" name="date" class="inp px-3" value="Date" placeholder="Date">
            </div>
            <input type="number" id="adhaar" name="number" class="inp px-3" placeholder="Adhaar number">
            <input type="password" id="passwd" name="password" class="inp px-3" placeholder="Password">
            <input type="password" id="confirm_passwd" name="confirm_password" class="inp px-3"
              placeholder="Confirm Password">
          </div>
          <div class="form-row py-4">
            <div class="offset-1 col-lg-10">
              <center><button id="register" class="btn btn-success">Register</button></center><br>
              <p style="color: white; margin: 0;">Already have an account? &nbsp; <a href="./login.php"
                  style="color: lightblue;">Sign in</a><br><br></p>
            </div>
          </div>
        </form>
      </div>
      <div id="col3" class="col-3"></div>
    </div>
  </div>
</body>

<script>
  $(document).ready(function () {
    $("#form").submit(function (e) {
      var passwd = $("#passwd").val();
      var confirm_passwd = $("#confirm_passwd").val();
      var phone = $("#phone").val();
      var adhaar = $("#adhaar").val();
      var isMale = $('#male').is(':checked');
      var isfemale = $('#female').is(':checked');

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

</html>