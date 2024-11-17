<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
</head>

<body>
<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') { ?>
    <div class="content-wrapper">
        <h1>Maintenance</h1>
        <div class="container">
            <ul class="center-list">
                <li><a href="./addLocation/addLocation.php">Add location</a></li>
                <li><a href="./addQR/addQR.php">Add QR link</a></li>
                <li><a href="./Upload/upload.php">Upload image</a></li>
                <li><a href="./SignUp/signup.php">Sign Up</a></li>
                <li><a href="./userAndSupportRelation/userAndSupportRelation.php">User and support relation</a></li>
                <li><a href="./QRAndLocationRelation/QRAndLocationRelation.php">QR and location relation</a></li>
                <li><a href="./SearchSupport/SupportInfo.php">Search Support</a></li>
                <li><a href="./SendMailToSupport/SupportInfoMail.php">Send Mail to Support</a></li>
                <li><a href="./SearchByUser/Usersphotos.php">Search Photos by User</a></li>
                <li><a href="./SearchByLocation/locationPhotos.php">Search Photos by Location</a></li>
            </ul>
        </div>

        <?php echo "<a href='logout.php'>Logout</a>"; // Link to logout ?>

        <div class="myFooter">
            <p>&copy; QR Gallery. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a></p>
        </div>
    </div>
<?php } else { 

    // Display the login form
    echo $_SESSION['username'];
    echo "<h2>Login</h2>";
    echo '<form action="meintenance.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="admin" required>
            <label for="password">Password:</label>
            <input type="text" name="password" placeholder="admin" required>
            <button class = "signup" type="submit">Login</button>
          </form>';
}
?>
</body>
</html>
