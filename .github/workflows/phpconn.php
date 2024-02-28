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
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Input Form</title>
</head>
<body>
    <h2>Enter User Information</h2>
    <form action="phpconn.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      // Further processing of input details

      // Echo user input on submitting form
      echo $username;
      echo $email;
      echo $password;
      // Insert input data into users table
    //   try{
    //     $query = "INSERT INTO User (name, email, password) VALUES ('$username', '$email', '$password')";
    //   // Execute the query
    //   if ($conn->query($query) === TRUE) {
    //       header('Location: index.html');
    //       exit;
    //   } else {
    //       echo "Error: " . $query . "<br>" . $conn->error;
    //   }
    //   }
    //   catch(mysqli_sql_exception $e){
    //     echo "DUPLICATE EMAIL";
    //   }
   }
?>