<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $department = $_POST["department"];
    echo $department;

    require_once '../dbh.inc.php'; 

    try {

                             
        $query = "SELECT person_id, name FROM people WHERE person_id IN (SELECT person_id FROM $department);";
        
        $stmt = $pdo->prepare($query);
        $stmt -> execute();

        $people = $stmt->fetchAll(PDO::FETCH_ASSOC);
                             
        }
        catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
}  
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="employees_list.css"> 
</head>
<body>

    <div class="upperContainer">

        <header class="sign-in-header">

            <a href="../index.html">
                <img src="../images/Logo.jpg" alt="Camera Icon" class="camera-icon" />
            </a>
        </header>

        <div class="form-container">
            <h1> Employees in <?php echo htmlspecialchars($department); ?></h1>
            <ul>
                <?php if (!empty($people)) { ?>
                <?php foreach ($people as $person) { ?>
                <?php echo '<li><a href="PersonPage.php? id='.htmlspecialchars($person['person_id']).'"'; ?>
                <!-- Image tag showing the photo -->
                <?php echo $person['name']; ?>
            <!-- Correct the href to pass the photo id as a parameter to PersonPage.php -->                                                                                                                                                                                                                                                                                                                                                                                      
                </a></li>
                <?php } ?>
                <?php } else { ?>
                <p style="text-align: center;">No photos found for this user.</p>  
                <?php } ?>
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
