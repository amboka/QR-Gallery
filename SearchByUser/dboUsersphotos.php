<?php
require_once "../dbh.inc.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $query = "SELECT idPhotos, dir FROM photos
        JOIN people ON photos.user_id = people.person_id 
        WHERE people.username = ?;";
        
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);    

    $photos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Boxes with Logo</title>
    <link rel="stylesheet" href="result_photos.css">
</head>
<body>
    <div class="logo-container">
        <img src="../images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
    </div>
    <?php if (!empty($photos)) { ?>
    <?php $coun = 0; ?>                  
    <?php foreach ($photos as $photo) { 
        if ($coun % 2 == 0) { ?>
            <div class="box-container">
                <div class="box">
                    <!-- Correct the href to pass the photo id as a parameter to Photopage.php -->
                    <a href="Photopage.php?id=<?php echo htmlspecialchars($photo['idPhotos']); ?>">
                        <!-- Image tag showing the photo -->
                        <img src="<?php echo htmlspecialchars($photo['dir']); ?>" alt="Photo">
                    </a>
                </div>
        <?php } else { ?>
                <div class="box">
                    <a href="Photopage.php?id=<?php echo htmlspecialchars($photo['idPhotos']); ?>">
                        <img src="<?php echo htmlspecialchars($photo['dir']); ?>" alt="Photo">
                    </a>
                </div>
            </div> <!-- Close the box-container if $coun is odd -->
        <?php } ?>
        <?php $coun++; ?>
    <?php } ?>

    <!-- If the count of photos is odd, close the last container -->
    <?php if (count($photos) % 2 == 1) { ?>
        </div> <!-- Close the open box-container -->
    <?php } ?>
<?php } else { ?>
    <p>No photos found.</p>
<?php } ?>


    <footer class="myFooter">
        <p>Bla bla bla bla bla bla</p>
        <p><a href="mailto:QRgallery@gmail.com">QRgallery@gmail.com</a></p>
        <p><a href="https://something.com">something.com</a></p>
    </footer>


</body>
</html>
