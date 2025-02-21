<?php
session_start();  // Start the session
include("connectionDb.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="w3-sand">
        <div class="w3-container w3-card-4 w3-light-grey w3-round w3-center w3-padding-32 w3-margin-top">
            <h2 class="w3-text-green">Welcome</h2>

            <p>This is your dashboard.</p>

            <!-- Logout Button -->
            <button onclick="window.location.href='logout.php'" class="w3-btn w3-red w3-round w3-large w3-full">Logout</button>
        </div>
    </body>
</html>
