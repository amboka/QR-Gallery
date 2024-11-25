<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="signin.css"> <!-- Link to your CSS file -->
</head>
<body>

    <div class="upperContainer">

        <header class="sign-in-header">

            <a href="index.html">
                <img src="./images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
            </a>
        </header>

        <div class="form-container">
            <h1>Sign in</h1>
            <p>Welcome back!</p>

            <form action="dbosignIn.php" method="post">
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" required />
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required />
                </div>

                <h2 id="noAccount1">Do not have an account?</h2>
                <a href="signup.html">
                    <h2 id="noAccount2">Sign Up!</h2>
                </a>

                <button type="submit" class="signinBttn">Log in</button>
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
