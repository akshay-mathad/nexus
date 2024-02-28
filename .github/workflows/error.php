<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nexus";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

    $search_text = $_POST['search'];
    $sql = "SELECT service_offered FROM artisan";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Service Offered: " . $row["service_offered"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>