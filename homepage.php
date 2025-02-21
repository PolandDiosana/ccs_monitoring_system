<?php
    include("connectionDb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="homepage.css"> <!-- Correct path -->

    <title>Dashboard</title>
</head>
<body>

    <!-- Sidebar -->

    <div class="sidenav">
        <!-- Logo Section -->
        <a href="homepage.php" class="logo" >
            <img src="logo.png" alt="Logo" class="logo-img"> <!-- Replace with your logo image -->
        </a>

        <!-- Sidebar Links -->
    <div class="sidenav-bar">
        <a href="#"><i class="fa fa-user"></i> Profile</a>
        <a href="#"><i class="fa fa-edit"></i> Edit Profile</a>
        <a href="#"><i class="fa fa-bullhorn"></i> Announcement</a>
        <a href="#"><i class="fa fa-gavel"></i> Sit In Rules</a>
        <a href="#"><i class="fa fa-file-text"></i> Lab Rules & Regulations</a>
        <a href="#"><i class="fa fa-history"></i> Sit In History</a>
        <a href="#"><i class="fa fa-calendar"></i> Reservation</a>
        <a href="#"><i class="fa fa-clock"></i> View Remaining Session</a>
        <a href="#"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <h2>Welcome to Your Dashboard</h2>
            <p>This is where you can manage your profile, view rules, make reservations, and more!</p>
            <div class="dashboard-cards">
                <div class="card">
                    <h3>Profile Info</h3>
                    <p>Manage your profile information</p>
                    <a href="profile.php">Edit</a>
                </div>
                <div class="card">
                    <h3>Announcements</h3>
                    <p>Check important announcements</p>
                    <a href="#">View</a>
                </div>
                <div class="card">
                    <h3>Sit-In Rules</h3>
                    <p>View sit-in event rules</p>
                    <a href="#">Read</a>
                </div>
                <div class="card">
                    <h3>Reservations</h3>
                    <p>View and make reservations</p>
                    <a href="#">Book Now</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
