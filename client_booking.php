<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nexus";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $dbname = "nexus";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");

        body {
            background-image: url(image-4.jpg);
            color: #f2e4d7;
            display: flex;
            flex-wrap: wrap;
        }


        h1 {
            font-size: 100px;
            position: absolute;
            text-decoration: underline 2px;
            left: 50px;
            top: 30px;

        }

        .buttons {
            justify-content: space-between;
            justify-content: start;
            flex-direction: column;
            position: absolute;
            right: 30px;
            top: 120px;

        }

        .buttons .button {

            flex-direction: row;
            font-size: 30px;
            background-color: #f2e4d7;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <h1 id="h1">Client Bookings</h1>

    <div class="buttons">
        <button id="index" onclick="window.location.href = 'index.php';" class="button">Home</button>
        <button id="ap" onclick="window.location.href = 'profile_artisan.php';" class="button">Profile</button>
        <button id="lo" onclick="window.location.href = 'logout.php';" class="button">Log out</button>
    </div>
</body>

</html>