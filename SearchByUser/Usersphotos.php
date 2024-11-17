 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="users_photos_search.css"> 
</head>
<body>

    <div class="upperContainer">

        <header class="sign-in-header">

            <a href="../index.html">
                <img src="../images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
            </a>
        </header>

        <div class="form-container">
            <h1>WRITE USERNAME TO SEE THEIR QR GALLERY</h1>
            <p>(For TA put 'anan' as example username)</p>

            <form action = "dboUsersphotos.php" method = "POST">
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" required />
                </div>
                <button type="submit" class="signinBttn">Search</button>
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
