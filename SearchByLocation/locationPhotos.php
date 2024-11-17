
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="locations_photos_search.css"> 
</head>
<body>

    <div class="upperContainer">

        <header class="sign-in-header">

            <a href="../index.html">
                <img src="../images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
            </a>
        </header>

        <div class="form-container">
            <h1>Write location to see QR Galllery there</h1>
            <p>(For TA put 'Rustavi' as example username)</p>

            <div class="input-group">
                <form action = "dboLocationPhotos.php" method = "POST" enctype = "multipart/form-data">
                <input type = "text" name="locationName" placeholder="location name">
            </div>
              
                <button type="submit" class="signinBttn">Search</button>
        
        </div>

        <footer class="myFooter">
            <p>travel with QR gallery</p>
            <p><a href="mailto:QRgallery@gmail.com">QRgallery@gmail.com</a></p>
            <p><a href="https://QRgallery.com">something.com</a></p>
        </footer>
    </div>

</body>
</html>
