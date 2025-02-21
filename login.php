<?php
session_start();  

include("connectionDb.php");

$status = '';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $query = "SELECT * FROM account WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    
    if($result) {
        $user = mysqli_fetch_assoc($result);

        if($user && $password === $user['password']) {
            $status="success";
            $_SESSION['id'] = $user['userId'];
        } else {
            $status = "failed";
        }
    } else {
        $status = 'failed';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login Form</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="w3.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="w3-sand">
        <div class="w3-container w3-card-4 w3-light-grey w3-round w3-center w3-padding-32 w3-max-width-400 w3-margin-top">
            <h2 class="w3-text-green">CCS Sitin Monitoring System</h2>

            <!-- Login Form -->
            <form action="login.php" method="POST" id="loginForm">
            <div class="w3-margin-bottom">
                <label for="username" class="w3-left w3-text-grey">Username:</label>
                <input type="text" id="username" name="username" required class="w3-input w3-border w3-round">
            </div>
            <div class="w3-margin-bottom">
                <label for="password" class="w3-left w3-text-grey">Password:</label>
                <input type="password" id="password" name="password" required class="w3-input w3-border w3-round">
            </div>
            <div class="w3-margin-top">
                <button type="submit" class="w3-btn w3-green w3-round w3-large w3-full">Login</button>
            </div>
            
            <!-- Register Button -->
            <div class="w3-margin-top">
                <button type="button" onclick="window.location.href='register.php'" class="w3-btn  w3-round w3-large w3-full">Register</button>
            </div>
            </form>

            <!-- Show the alert for login status -->
            <script>
                if('<?php echo $status; ?>' === 'success') {
                    Swal.fire({
                        title: 'Logged In',
                        text: 'You have successfully logged in.',
                        icon: 'success',
                        focusConfirm: false,
                        confirmButtonText: 'OK',

                        timerProgressBar: true,
                        didOpen: () => {
                            document.activeElement.blur();
                            const confirmButton = Swal.getConfirmButton();

                            confirmButton.style.border = '2px solid #d3d3d3';
                            confirmButton.style.borderRadius = '10px';
                            confirmButton.style.backgroundColor = '#d3d3d3';
                            confirmButton.style.color = '#ffffff';
                        },
                        willClose: () => {
                            window.location.href = "homepage.php";
                        }
                    });
                } else if('<?php echo $status; ?>' === 'failed') {
                    Swal.fire({
                        title: 'Oops...',
                        text: 'Please check your credentials.',
                        icon: 'error',
                        confirmBtnText: 'Try Again'
                    });
                }
            </script>
        </div>
    </body>
</html>
