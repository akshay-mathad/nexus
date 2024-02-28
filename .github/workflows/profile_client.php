<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nexus";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="process_artisan_details.php" method="post">
        <label for="service_offered">Service Offered:</label>
        <input type="text" id="service_offered" name="service_offered"><br>
        <label for="city_id">City ID:</label>
        <input type="text" id="city_id" name="city_id"><br>
        
        <label for="description">Description:</label>
        <input type="text" id="description" name="description"><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>