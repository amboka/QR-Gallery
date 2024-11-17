<?php
require_once '../dbh.inc.php';

if (isset($_GET['id'])){
    $photo_id = $_GET['id'];

    $query = "SELECT * 
              FROM photos 
              JOIN people ON photos.user_id = people.person_id 
              WHERE photos.idPhotos = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$photo_id]);


    $photo = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="photos_info.css">
</head>
<body>
    <div class="content-wrapper">
        <?php if ($photo) { ?>
        <img src="<?php echo $photo['dir']; ?>" alt="Photo">
        <div class="container">
           <ul class="center-list">
            <li>UPLOAD DATE: <?php echo htmlspecialchars($photo['upload_date']); ?></li>
            <li>LOCATION ID: <?php echo htmlspecialchars($photo['location_id']); ?></li>
            <li>USERNAME: <?php echo htmlspecialchars($photo['username']); ?></li>
        </div>
        <?php } else { ?>
            <p>No details found for this photo.</p>
        <?php } ?>

        <div class="myFooter">
            <p>&copy; QR Gallery. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a></p>
        </div>
    </div>
</body>
</html>
