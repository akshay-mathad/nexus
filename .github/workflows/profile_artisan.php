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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_offered = $_POST['service_offered'];
    $city_id = $_POST['city_id'];
    $description = $_POST['description'];

    // $client_id = $_POST['client_id'];


    $query = "SELECT user_id FROM `user` WHERE name = '$username'";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"] + 1;
    }
    // if ($result->num_rows > 0) {
    //     $phone = $row['phone'];
    // } else {
    //     echo "No results found for the given username";
    // }

    // $check_query = "SELECT * FROM artisan_profile WHERE user_id = '$client_id'";
    // $check_result = $conn->query($check_query);
    // if ($check_result->num_rows > 0) {
    //     $update_query = "UPDATE artisan_profile SET service_offered = '$service_offered', city_id = '$city_id', description = '$description' WHERE client_id = '$client_id'";
    //     if ($conn->query($update_query) === TRUE) {
    //         echo "Record updated successfully";
    //         header("Location: client_booking.php");
    //     } else {
    //         echo "Error updating record: " . $conn->error;
    //     }
    // } else {
    $insert_query = "INSERT INTO artisan_profile (user_id, service_offered, city_id, description) VALUES ('$user_id', '$service_offered', '$city_id', '$description')";
    if ($conn->query($insert_query) === TRUE) {
        echo "New record created successfully";
        header("Location: client_booking.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
// }
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
            flex-direction: column;
            flex-wrap: wrap;
            font-size: xx-large;
        }

        header {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
        }

        h1 {
            font-size: 100px;

            /* text-shadow: 5px 5px 10px gold; */
            position: absolute;
            text-decoration: underline 2px;
            left: 50px;
            top: 30px;
        }

        .button {

            flex-direction: row;
            font-size: 30px;
            background-color: #f2e4d7;
            padding: 10px;
            border-radius: 10px;
        }

        input {
            font-size: 30px;
            border-radius: 10px;
        }

        form {
            padding: 20px;
        }

        #lo {
            position: absolute;
            right: 30px;
            top: 90px;
        }

        #form1 {
            position: relative;
            top: 200px;
            left: 30px;
        }
        
    </style>
</head>

<body>
    <header>
        <h1>Artisan Profile</h1>
        <div class="buttons">
            <button id="lo" onclick="window.location.href = 'logout.php';" class="button">Log out</button>
        </div>
    </header>

    <form action="" method="post" class="form" id="form1">
        <table>
            <tr>
                <td><label for="service_offered">Service Offered:</label></td>
                <td><input type="text" id="service_offered" name="service_offered"><br></td>
            </tr>
            <tr>
                <td><label for="city_id">City ID:</label></td>
                <td><input type="text" id="city_id" name="city_id"><br></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><input type="text" id="description" name="description"><br></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" id="submit" class="button"></td>
                <td></td>
            </tr>
        </table>
    </form>

</body>

</html>