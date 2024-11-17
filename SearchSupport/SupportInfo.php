<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="employee_info.css"> 
</head>
<body>

    <div class="upperContainer">

        <header class="sign-in-header">

            <a href="../index.html">
                <img src="../images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
            </a>
        </header>

        <div class="form-container">    
            <h1>CHOOSE DEPARTMENT TO SEE EMPLOYEES INFO</h1>

            <form action="dboSupportInfo.php" method="post">
                <div class="input-group">
                    <select name="department" id="departmentSelect">
                        <option value="" disabled selected>Select Department</option>
                        <option value="it_support">IT-Support</option>
                        <option value="custommer_support">Costumer-Support</option>
                        <option value="administration">Administration</option>
                    </select>
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

