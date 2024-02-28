<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nexus";
$conn = new mysqli($servername, $username, $password, $dbname);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search result</title>
    <style>
        body {
            background-image: url(image-4.jpg);
            color: #f2e4d7;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }

        h1 {
            font-size: 100px;
            
            /* text-shadow: 5px 5px 10px gold; */
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

        results {
            display: flex;
            position: relative;
            top: 200px;
            left: 60px;
            font-size: x-large;
            background-color: #f2e4d7;
            width: fit-content;
            height: fit-content;
            padding: 20px;
            border: #174d5a;
            border-width: 10px;
            border-style:solid;
            border-radius: 10px;
            color: black;
            box-shadow: 5px 5px 10px yellow;
        }

        results #s {
            position: relative;
            width: fit-content;
            height: fit-content;
            top: 90px;
            left: -285px;
            
        }
    </style>
</head>

<body>
    <h1>Search Results</h1><br>
    <div class="buttons">
        <button id="index" onclick="window.location.href = 'index.php';" class="button">Home</button>
        <button id="lo" onclick="window.location.href = 'logout.php';" class="button">Log out</button>
    </div>
    <results>
        <?php
        $search_text = $_GET['search'];
        $search_term = $conn->real_escape_string($search_text); // Escape the search term

        $sql = "SELECT * FROM `artisan_profile` WHERE `service_offered` LIKE '%$search_term%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Service Offered: " . $row["service_offered"] . "<br>";
                echo "Service Offered By: " . $row["username"] . "<br>";
                echo "Service Offered: " . $row["phone_no"] . "<br>";
                echo "";
            }
        } else {
            echo "0 results";
        }

        ?>
        <button id="s">SELECT</button>
        <br>
        <br>
        <br>
        <br>
    </results>
</body>

</html>