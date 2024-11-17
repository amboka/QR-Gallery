<?php
require_once '../dbh.inc.php';

if (isset($_GET['id'])){
    $person_id = $_GET['id'];

    $query = "SELECT * 
              FROM people  
              WHERE people.person_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$person_id]);


    $info = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="spec_employee_info.css"> <!-- Link to your CSS file -->
</head>
<body>

    <div class="upperContainer">

        <header class="sign-in-header">

            <a href="../index.html">
                <img src="../images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
            </a>
        </header>
        <div class="form-container">
            <ul>
                <li>NAME:  <?php echo htmlspecialchars($info['name']); ?> </li>
                <li>USERNAME:  <?php echo htmlspecialchars($info['username']); ?> </li>
                <li>E-MAIL: <?php echo htmlspecialchars($info['email']); ?></li>
                <li>PHONE:  <?php echo htmlspecialchars($info['phone']); ?></li>     
                
            </ul>
        </div>
        <footer class="myFooter">
            <p>travel with QR gallery</p>
            <p><a href="mailto:QRgallery@gmail.com">QRgallery@gmail.com</a></p>
            <p><a href="https://QRgallery.com">something.com</a></p>
        </footer>
    </div>

</body>
</html>

