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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    @import url("https://fonts.googleapis.com/css?family=Cardo:400i|Rubik:400,700&display=swap");

    :root {
      --d: 700ms;
      --e: cubic-bezier(0.19, 1, 0.22, 1);
      --font-sans: "Rubik", sans-serif;
      --font-serif: "Cardo", serif;
    }

    * {
      box-sizing: border-box;
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

    body {
      background-image: url(image-4.jpg);
      font-size: xx-large;
      color: antiquewhite;
      display: flex;
      flex-wrap: wrap;
      place-items: center;
      align-items: center;
      align-content: center;
    }

    /* .page-content {
      display: grid;
      grid-gap: 1rem;
      padding: 10px;
      max-width: 1024px;
      margin: 0 auto;
      font-family: var(--font-sans);
    } */

    @media (min-width: 600px) {
      .page-content {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (min-width: 800px) {
      .page-content {
        grid-template-columns: repeat(4, 1fr);
      }
    }

    main {
      width: 800px;
      height: 600px;
      display: flex;
      flex-direction: row;
      flex-wrap: nowrap;
      position: relative;
      top: 100px;
      left: 300px;

      align-items: center;
      justify-content: center;
    }

    

    .card {
      position: relative;
      display: flex;
      align-items: flex-end;
      overflow: hidden;
      padding: 10px;
      border-radius: 10px;
      margin: 20px;
      width: 100%;
      text-align: center;
      color: whitesmoke;
      background-color: whitesmoke;
      box-shadow: 8px 5px 10px 0.6px rgba(255, 215, 0, 0.7);

      /* box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 2px 2px rgba(0, 0, 0, 0.1), 0 4px 4px rgba(0, 0, 0, 0.1), 0 8px 8px rgba(0, 0, 0, 0.1), 0 16px 16px rgba(0, 0, 0, 0.1); */
    }

    @media (min-width: 600px) {
      .card {
        height: 350px;
      }
    }

    .card:before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 110%;

      background-size: cover;
      background-position: 0 0;
      transition: transform calc(var(--d) * 1.5) var(--e);
      pointer-events: none;
    }

    .card:after {
      content: "";
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 200%;
      pointer-events: none;
      background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.009) 11.7%, rgba(0, 0, 0, 0.034) 22.1%, rgba(0, 0, 0, 0.072) 31.2%, rgba(0, 0, 0, 0.123) 39.4%, rgba(0, 0, 0, 0.182) 46.6%, rgba(0, 0, 0, 0.249) 53.1%, rgba(0, 0, 0, 0.32) 58.9%, rgba(0, 0, 0, 0.394) 64.3%, rgba(0, 0, 0, 0.468) 69.3%, rgba(0, 0, 0, 0.54) 74.1%, rgba(0, 0, 0, 0.607) 78.8%, rgba(0, 0, 0, 0.668) 83.6%, rgba(0, 0, 0, 0.721) 88.7%, rgba(0, 0, 0, 0.762) 94.1%, rgba(0, 0, 0, 0.79) 100%);
      transform: translateY(-50%);
      transition: transform calc(var(--d) * 2) var(--e);
    }

    .card:nth-child(1):before {
      background-image: url(https://images.unsplash.com/photo-1511376979163-f804dff7ad7b?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
    }

    .card:nth-child(2):before {
      background-image: url(https://imgs.search.brave.com/TTjeRNElZIiYLYNhvx_sA8EiAPaeJZVq_g0vG_9bN0M/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9wbHVz/LnVuc3BsYXNoLmNv/bS9wcmVtaXVtX3Bo/b3RvLTE2NzIyODc1/Nzg2OTktNjE4ZWE2/ZGJjYzllP2l4bGli/PXJiLTQuMC4zJml4/aWQ9TW53eE1qQTNm/REI4TUh4elpXRnlZ/Mmg4TVRsOGZHRnlk/R2x6WVc1OFpXNThN/SHg4TUh4OCZ3PTEw/MDAmcT04MA);
    }


    .content {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      padding: 1rem;
      transition: transform var(--d) var(--e);
      z-index: 1;
    }

    .content>*+* {
      margin-top: 1rem;
    }

    .title {
      font-size: 1.3rem;
      font-weight: bold;
      line-height: 1.2;
    }

    .copy {
      font-family: var(--font-serif);
      font-size: 1.125rem;
      font-style: italic;
      line-height: 1.35;
    }

    .btn {
      cursor: pointer;
      margin-top: 1.5rem;
      padding: 0.75rem 1.5rem;
      font-size: 0.65rem;
      font-weight: bold;
      letter-spacing: 0.025rem;
      text-transform: uppercase;
      color: white;
      background-color: black;
      border: none;
    }

    .btn:hover {
      background-color: #0d0d0d;
    }

    .btn:focus {
      outline: 1px dashed yellow;
      outline-offset: 3px;
    }

    @media (hover: hover) and (min-width: 600px) {
      .card:after {
        transform: translateY(0);
      }

      .content {
        transform: translateY(calc(100% - 4.5rem));
      }

      .content>*:not(.title) {
        opacity: 0;
        transform: translateY(1rem);
        transition: transform var(--d) var(--e), opacity var(--d) var(--e);
      }



      .card:hover,
      .card:focus-within {
        align-items: center;
      }

      .card:hover:before,
      .card:focus-within:before {
        transform: translateY(-4%);
      }

      .card:hover:after,
      .card:focus-within:after {
        transform: translateY(-50%);
      }

      .card:hover .content,
      .card:focus-within .content {
        transform: translateY(0);
      }

      .card:hover .content>*:not(.title),
      .card:focus-within .content>*:not(.title) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: calc(var(--d) / 8);
      }

      .card:focus-within:before,
      .card:focus-within:after,
      .card:focus-within .content,
      .card:focus-within .content>*:not(.title) {
        transition-duration: 0s;
      }
    }
  </style>
</head>

<body>

  <header>
    <h1>Select your role:</h1>
  </header>
  <div class="buttons">
    <button id="lo" onclick="window.location.href = 'logout.php';" class="button">Log out</button>
  </div>

  <main class="page-content">

    <div class="card">
      <div class="content">
        <h2 class="title">CLIENT</h2>
        <p class="copy">Service Reciever<br>Customer/User</p>
        <a href="search.html" class="btn" name="Client">SELECT</a>
      </div>
    </div>
    <div class="card">
      <div class="content">
        <h2 class="title">ARTISAN</h2>
        <p class="copy">Service provider<br>Eg:-Electrition,Plumber,etc</p>
        <a href="client_booking.php" class="btn" name="Artisan">SELECT</a>
      </div>
    </div>
  </main>
</body>

</html>