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
    <link rel="stylesheet" href="send_email.css"> 
</head>
<body>

    <div class="upperContainer">

        <header class="sign-in-header">

            <a href="../index.html">
                <img src="../images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
            </a>
        </header>

        <div class="form-container">
            <h1>You are going to be supported by</h1>
            <p><?php echo htmlspecialchars($info['name']); ?> </p>

            <form action="#" method="post">
                <div class="input-group">
                    <textarea name="message" placeholder="Feel free to reach out"></textarea>
              </div>
                <button type="submit" class="signinBttn">Send</button>
            </form>
        </div>

        <footer class="myFooter">
            <p>travel with QR gallery</p>
            <p><a href="mailto:QRgallery@gmail.com">QRgallery@gmail.com</a></p>
            <p><a href="https://QRgallery.com">something.com</a></p>
        </footer>
    </div>

</body>
</html>

