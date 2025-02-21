<?php
    include("connectionDb.php");
    session_start();  
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

<div class="content">
    <div class="container">
        <h2>My Profile</h2>
        <div class="profile-container">
            <div class="profile-image">
                <!-- Profile Picture -->
                <img id="profilePic" src="profile-picture.jpg" alt="Profile Picture" />
                
                <!-- Hidden File Input for Profile Picture Change -->
                <input type="file" id="fileInput" accept="image/*" style="display: none;" onchange="previewImage(event)" />
                
                <!-- Change Picture Button -->
                <button class="upload-btn" onclick="document.getElementById('fileInput').click();">Change Picture</button>
            </div>
            
            <!-- Profile Details Form -->
            <div class="profile-details">
                <form id="profileForm">
                    <p><strong>Name:</strong> <input type="text" id="name" name="name" value="John Doe" readonly /></p>
                    <p><strong>Email:</strong> <input type="email" id="email" name="email" value="johndoe@example.com" readonly /></p>
                    <p><strong>Course:</strong> <input type="text" id="course" name="course" value="Computer Science" readonly /></p>
                    <p><strong>Year Level:</strong> <input type="text" id="yearLevel" name="yearLevel" value="3rd Year" readonly /></p>
                </form>
            </div>
            
            <!-- Edit Profile Button -->
            <button class="edit-btn" onclick="toggleEdit()">Edit Profile</button>
        </div>
    </div>
</div>

<script>
    // Function to preview the profile image
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePic').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Toggle between editable and read-only for profile fields
    function toggleEdit() {
        const formElements = document.getElementById('profileForm').elements;
        
        // Loop through all form elements and toggle read-only
        for (let i = 0; i < formElements.length; i++) {
            const element = formElements[i];
            if (element.readOnly) {
                element.readOnly = false; // Enable editing
            } else {
                element.readOnly = true; // Disable editing
            }
        }

        // Change the button text based on the state
        const editButton = document.querySelector('.edit-btn');
        if (editButton.textContent === "Edit Profile") {
            editButton.textContent = "Save Changes"; // Change button text to "Save Changes"
        } else {
            editButton.textContent = "Edit Profile"; // Revert button text to "Edit Profile"
            // Optionally, submit the form here (you can uncomment the next line if needed)
            // document.getElementById('profileForm').submit(); 
        }
    }
</script>
