<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link rel="stylesheet" href="./assets/css/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/css/login.css">
</head>

<body>

  <div class="container">
    <div class="row justify-content-md-center" style="margin-top: 10%;">
      <div class="col-2"></div>
      <div class="col-8 col-md-4 login-main-div"><br><br>
        <center><b class="login-head">Login</b></center><br>
        <form style="width: 100%;">
          <div class="container">
            <input type="email" name="email" class="inp px-3" placeholder="Email id" required><br>
            <input type="password" name="password" class="inp px-3" placeholder="Password" required>
          </div>
          <div class="form-row py-4">
            <div class="offset-1 col-lg-10">
              <center><button class="btn btn-success">Login</button></center><br>
              <p  style="color: white;">Dont't have account? &nbsp; <a href="./register.php" style="color: lightblue;">Sign up</a><br><br></p>
            </div>
          </div>
        </form>
      </div>
      <div class="col-2"></div>
    </div>
  </div>

  <!-- <section class="login py-5 bg-light">
      <div class="container">
          <div class="row g-0">
            <div class="col-lg-5">
              <img src="./assests/images/b.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 text-center py-5">
              <h1>LOGIN</h1>

              <form>
                <div class="form-row py-2 pt-5">
                  <div class="offset-1 col-lg-10">
                    <input type="text"  name="email" class="inp px-3" placeholder="Emailid" required>
                  </div>
                </div>
                <div class="form-row py-2 ">
                  <div class="offset-1 col-lg-10">
                    <input type="password" name="password" class="inp px-3" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-row py-4">
                  <div class="offset-1 col-lg-10">
                  <button class="btn1">Login</button><br><br>
                  <h4>Dont't have account?</h4><br>
                  <a href="./register.php" style="color: red;">Sign up</a><br><br>
                </div>
                </div>

              </form>

            </div>
         </div>
      </div>
    </section> -->
</body>

</html>