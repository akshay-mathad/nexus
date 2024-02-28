<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nexus";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  // Further processing of input details
  // try {
  $check_query = "SELECT * FROM User WHERE email = '$email'";
  $check_result = $conn->query($check_query);

  if ($check_result->num_rows > 0) {
    echo "Email address already exists. Please use a different email.";
  } else {
    $query = "INSERT INTO User (name, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";
    // Execute the query
    if ($conn->query($query) === TRUE) {
      session_start();
      header('Location: index.php');
      exit;
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;
    }
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Design by foolishdeveloper.com -->
  <title>Glassmorphism login Form Tutorial in html css</title>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <!--Stylesheet-->
  <style media="screen">
    *,
    *:before,
    *:after {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      /* background-color: #080710; */
      background-image: url(image-4.jpg);
      color: #eaf0fb;
    }

    .background {
      width: 430px;
      height: 520px;
      position: absolute;
      transform: translate(-50%, -50%);
      left: 50%;
      top: 50%;
    }

    .background .shape {
      height: 200px;
      width: 200px;
      position: absolute;
      border-radius: 50%;
    }

    /* .shape:first-child {
      background: linear-gradient(#1845ad,
          #23a2f6);
      left: -80px;
      top: -80px;
    } */

    /* .shape:last-child {
      background: linear-gradient(to right,
          #ff512f,
          #f09819);
      right: -30px;
      bottom: -80px;
    } */

    form {
      height: 520px;
      width: 400px;
      background-color: rgba(255, 255, 255, 0.03);
      position: absolute;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      border-radius: 10px;
      backdrop-filter: blur(10px);
      border: 2px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0px 0px 10px #ffffff73;
      padding: 50px 35px;
    }

    form * {
      font-family: 'Poppins', sans-serif;
      color: #ffffff;
      letter-spacing: 0.5px;
      outline: none;
      border: none;
    }

    form h6 {
      font-size: 32px;
      font-weight: 500;
      line-height: 35px;
      text-align: center;
    }

    label {
      display: block;
      margin-top: 20px;
      font-size: 14px;
      font-weight: 500;
    }

    input {
      display: block;
      height: 40px;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.07);
      border-radius: 3px;
      padding: 0 20px;
      margin-top: 20px;
      font-size: 14px;
      font-weight: 300;
    }

    ::placeholder {
      color: #e5e5e5;
    }

    button {
      margin-top: 30px;
      width: 100%;
      background-color: rgb(20, 163, 75);
      color: #080710;
      font-size: 18px;
      font-weight: 600;
      border-radius: 5px;
      cursor: pointer;
    }

    .social {
      margin-top: 30px;
      display: flex;
    }

    .social div {
      background: red;
      width: 150px;
      border-radius: 3px;
      padding: 5px 10px 10px 5px;
      background-color: rgba(255, 255, 255, 0.27);
      color: #eaf0fb;
      text-align: center;
    }

    .social div:hover {
      background-color: rgba(255, 255, 255, 0.47);
    }

    .social .fb {
      margin-left: 25px;
    }

    .social i {
      margin-right: 4px;
    }

    .other {
      margin-top: 10px;
      display: flex;

    }

    #login {
      padding-right: 20px;
      margin-right: 0px;
    }
  </style>
</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form method="post" action="">
    <h6>NEXUS</h6>
    <h3>Sign In Here</h3>

    <!-- <label for="username">Username</label> -->
    <input type="text" placeholder="Username" id="username" name="username">

    <!-- <label for="email">Email:</label> -->
    <input type="email" placeholder="Email" id="email" name="email">
    <input type="tel" placeholder="Phone Number" id="phone" name="phone">

    <!-- <label for="password">Password</label> -->
    <input type="password" placeholder="Password" id="password" name="password">

    <!-- <button> -->
    <input type="submit" value="Sign In">
    <!-- </button> -->
    <div class="social">
      <div class="go"><i class="fab fa-google"></i> Google</div>
      <!-- <div class="fb"><i class="fab fa-facebook"></i> Facebook</div> -->

    </div>
    <div class="other">

      <div id="login">
        <a href="Login.php">Log In</a>
      </div>
      <!-- <div id="ForgotPass">
        <a href="ForgotPass.php">Forgot Password</a>
      </div> -->
    </div>


  </form>
</body>

</html>

<?php

?>
```