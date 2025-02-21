<?php
    include("connectionDb.php");

    $status = '';  // Variable to hold the status of the operation

    // Check if form is submitted via POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form values
        $userId = $_POST['IDNO'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['last'];
        $middleName = $_POST['midname'];
        $course = $_POST['course'];
        $yearLevel = $_POST['yearlvl'];
        $email = $_POST['email'];
        $username = $_POST['username']; 
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        // Check if passwords match
        if ($password !== $repassword) {
            $status = 'passwordNotMatch';
        } else {
            // Prepare the SQL query to insert data into the account table
            $query = "INSERT INTO account (firstName, lastName, middleName, course, yearLvl, email, username, password) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            // Prepare statement and bind parameters
            if ($stmt = $conn->prepare($query)) {
                // Insert the password as it is without any modification (plain text)
                $stmt->bind_param("ssssssss", $firstName, $lastName, $middleName, $course, $yearLevel, $email, $username, $password);

                // Execute query and check for errors
                 if ($stmt->execute()) {
                    $status = 'success';  // Set success status
                } else {
                    $status = 'error';  // Set error status if query fails
                }
                $stmt->close();  // Close statement
            } else {
                $status = 'error';  // Set error status if statement preparation fails
            }
        }
        $conn->close();  // Close database connection
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registration Form</title>
    <style>
        /* Your styles go here */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #e3e8f1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 850px;
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-row .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            transition: border 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #4caf50;
            outline: none;
        }

        .form-group select {
            background-color: #fff;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 15px;
            width: 100%;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-container .terms {
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }

        .terms a {
            text-decoration: none;
            color: #4caf50;
        }
    </style>
</head>
<body class="w3-sand">
    <div class="form-container">
        <h2>Register for an Account</h2>
        <form action="register.php" method="POST">
            <!-- First Row (ID, Last Name) -->
            <div class="form-row">
                <div class="form-group">
                    <label for="IDNO">ID Number</label>
                    <input type="text" id="IDNO" name="IDNO" required />
                </div>
                <div class="form-group">
                    <label for="last">Last Name</label>
                    <input type="text" id="last" name="last" required />
                </div>
            </div>

            <!-- Second Row (First Name, Middle Name) -->
            <div class="form-row">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required />
                </div>
                <div class="form-group">
                    <label for="midname">Middle Name</label>
                    <input type="text" id="midname" name="midname" required />
                </div>
            </div>

            <!-- Third Row (Course, Year Level) -->
            <div class="form-row">
                <div class="form-group">
                    <label for="course">Course</label>
                    <select name="course" id="course" required>
                        <option value="" disabled selected>Select Course</option>
                        <option value="BSIT">BS in Information Technology</option>
                        <option value="BSCS">BS in Computer Science</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="yearlvl">Year Level</label>
                    <select name="yearlvl" id="yearlvl" required>
                        <option value="" disabled selected>Select Year Level</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                </div>
            </div>

            <!-- Email and Password Row -->
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required />
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required />
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                    <label for="repassword">Re-type Password</label>
                    <input type="password" id="repassword" name="repassword" required />
                </div>
            </div>
            <!-- Submit Button -->
            <button type="submit">Create Account</button>

            <div class="terms">
                <p>Login here <a href="login.php">Login Here</a></p>
            </div>
        </form>
    </div>

    <script>
        // Display success or error message based on PHP status
        <?php if ($status == 'success'): ?>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Registration Successful!",
                showConfirmButton: false,
                timer: 1500
            });
        <?php elseif ($status == 'passwordNotMatch'): ?>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Passwords do not match!",
                showConfirmButton: false,
                timer: 1500
            });
        <?php elseif ($status == 'error'): ?>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "An error occurred. Please try again!",
                showConfirmButton: false,
                timer: 1500
            });
        <?php endif; ?>
    </script>
</body>
</html>
