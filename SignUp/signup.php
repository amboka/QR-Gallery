<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js"></script> 
</head>
<body>
    <div class="upper-container">
        <div class="left-container">
            <div class="form-container">
                <form action="dboSignUp.php" method="post">
                    <div class="input-group">
                        <input type="text" name="full-name" placeholder="Full Name" required />
                    </div>
                    <div class="input-group">
                        <input type="text" name="username" placeholder="@Username" required />
                    </div>
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email Address" required />
                    </div>
                    <div class="input-group">
                        <input type="tel" name="PhoneNumber" placeholder="Phone Number" pattern="[0-9\- ]{10,15}" required />
                    </div>
                    <div class="input-group">
                        <select name="person_type" id="personTypeSelect">
                            <option value="" disabled selected>Select Person Type</option>
                            <option value="employee">Employee</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="input-group" id="departmentGroup" style="display: none;">
                        <select name="department" id="departmentSelect">
                            <option value="" disabled selected>Select Department</option>
                            <option value="IT-support">IT-Support</option>
                            <option value="Costumer-Support">Costumer-Support</option>
                            <option value="administration">Administration</option>
                        </select>
                    </div>
                    
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="input-group checkbox-group">
                        <input type="checkbox" name="agreement" required />
                        <label for="agreement">Terms and Conditions</label>
                    </div>
                    <button class="signup" type="submit">Create Account</button>
                    <p class="signin">
                        Already Have An Account? <a href="signin.html">Sign In</a>
                    </p>
                </form>
            </div>
        </div>

        <div class="right-container">
            <div class="error-container">
                <p>If something is invalid, show errors here</p>           
                    <img src="./images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
            </div>


            
        </div>
        <div class="signup-footer">
            <footer class="myFooter">
                <p>Travel with QR Gallery</p>
                <p><a href="mailto:QRgallery@gmail.com">QRgallery@gmail.com</a></p>
                <p><a href="https://QRGallery.com">QRGallery.com</a></p>
            </footer>
        </div>
      
    </div>

    
</body>
</html>
