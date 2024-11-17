<?php

if (isset($_POST['submit']))
{
    $locationName = $_POST['location_name'];    
    $userName = $_POST['username'];
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');


    if (in_array($fileActualExt, $allowed))
    {
        if ($fileError === 0)
        {
            $fileNameNew = uniqid("", true).".".$fileActualExt;
            $fileDirectory = "../uploadedImages/".$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDirectory);

             
            try{
                require_once "../dbh.inc.php";

                $query = "SELECT person_id FROM people WHERE username = ?;";

                $stmt = $pdo->prepare($query);
                $stmt -> execute([$userName]);

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $person_id = $row["person_id"];

            }
            catch(PDOException $e)
            {
                die("query failed ". $e->getMessage());
            }

            try{
                require_once "../dbh.inc.php";

                $query = "SELECT id_location FROM location WHERE Location_name = ?;";

                $stmt = $pdo->prepare($query);
                $stmt -> execute([$locationName]);

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $location_id = $row["id_location"];

            }
            catch(PDOException $e)
            {
                die("query failed ". $e->getMessage());
            }

            try{
                require_once "../dbh.inc.php";

                $query = "INSERT INTO photos (upload_date, location_id, user_id, dir) VALUES (NOW(), ?, ?, ?);";
                
                $stmt = $pdo->prepare($query);
                $stmt -> execute([$location_id, $person_id, $fileDirectory]);

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

            }
            catch(PDOException $e)
            {
                die("query failed ". $e->getMessage());
            }

            header("Location: ../success.html");

/*

            try{
                require_once "dbh.inc.php";

                $query = "INSERT INTO `photos` (name, email, phone, username, password) VALUES (?, ?, ?, ?, ?);";

                $stmt = $pdo->prepare($query);
                $stmt -> execute([$fullName, $email, $phone, $userName, $password]);


            }
            catch(PDOException $e)
            {
                die("query failed ". $e->getMessage());
            }
    
*/

        }
        else {
            echo "Error arises while uploading the photo";
        }
    }
    else{
        echo "You cannot upload files of this type";
    }

}