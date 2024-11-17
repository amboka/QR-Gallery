<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="upper-container">
        <div class="left-container">
            <div class="form-container">
                <form action="dboQRAndLocationRelation.php" method="post">
    
                    <div class="input-group">
                        <?php
                        
                        require_once '../dbh.inc.php'; 

                        try {
                            
                            $query = "SELECT id_location, Location_name FROM location;";
                            $stmt = $pdo->query($query); 

                            
                        
                            echo '<select name="person_type" id="personTypeSelect">'; 
                            echo '<option value="" disabled selected>Select Location</option>';
                            
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                           
                                echo '<option value="' . $row['id_location'] . '">' . $row['Location_name'] . '</option>';
                            }

                            echo "</select>";
                        } catch (PDOException $e) {
                            die("Query failed: " . $e->getMessage());
                        }
                        ?>

                    </div>
                    <div class="input-group" id="departmentGroup">
                        <?php
                            
                            require_once '../dbh.inc.php'; 

                            try {
                             
                                $query = "SELECT qr_id, qr_link FROM qr;";
                                $stmt = $pdo->query($query);

                            
                                echo '<select name="department" id="departmentSelect">'; 
                                echo '<option value="" disabled selected>Select QR_link</option>';
                             
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        
                                    echo '<option value="' . $row['qr_id'] . '">' . $row['qr_link'] . '</option>';
                                }

                                echo "</select>";
                            } catch (PDOException $e) {
                                die("Query failed: " . $e->getMessage());
                            }
                            ?>
                    </div>
                    
                    <button class="signup" type="submit">Submit</button>
                    <p class="signin">
                        Already Have An Account? <a href="signin.html">Sign In</a>
                    </p>
                </form>
            </div>
        </div>

        <div class="right-container">
            <div class="error-container">
                <p>If something is invalid, show errors here</p>           
                    <img src="../images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
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
