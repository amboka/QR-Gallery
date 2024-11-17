<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullName = $_POST["full-name"];
    $userName = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["PhoneNumber"];
    $personType = $_POST["person_type"];
    $department = isset($_POST["department"]) ? $_POST["department"] : "Unknown";

    try{
        require_once "../dbh.inc.php";

        $query = "INSERT INTO `people` (name, email, phone, username, password) VALUES (?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);
        $stmt -> execute([$fullName, $email, $phone, $userName, $password]);


    }
    catch(PDOException $e)
    {
        die("query failed ". $e->getMessage());
    }
    

    if ($personType == "user"){
        try{
            require_once "../dbh.inc.php";

            $query = "SELECT person_id FROM `people` WHERE email = ?;";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$email]);
    
            // Fetch the result as an associative array
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {  // Check if the result exists
                $perID = $result["person_id"];     
    
                // Insert the new employee record using the retrieved person_id
                $query = "INSERT INTO `users` (person_id) VALUES (?);";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$perID]);
            }
        }
        catch(PDOException $e)
        {
            die("query failed ". $e->getMessage());
        }

    }
    else 
    {
        try{
            require_once "../dbh.inc.php";

            $query = "SELECT person_id FROM `people` WHERE email = ?;";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$email]);
    
            // Fetch the result as an associative array
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {  // Check if the result exists
                $perID = $result["person_id"];
                $empID = sprintf("EMP%u", $perID);  // Generate employee ID using person_id
    
                
    
                // Insert the new employee record using the retrieved person_id
                $query = "INSERT INTO `employees` (person_id, employee_id) VALUES (?, ?);";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$perID, $empID]);
            }
        }
        catch(PDOException $e)
        {
            die("query failed ". $e->getMessage());
        }

        if ($department == "administration"){
            try{
                require_once "../dbh.inc.php";
    
                $query = "SELECT person_id FROM `people` WHERE email = ?;";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$email]);
        
                // Fetch the result as an associative array
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($result) {  // Check if the result exists
                    $perID = $result["person_id"];
                    $empID = sprintf("EMP%u", $perID);     
        
                    // Insert the new employee record using the retrieved person_id
                    $query = "INSERT INTO `administration` (person_id, employee_id) VALUES (?, ?);";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$perID, $empID]);
                }
            }
            catch(PDOException $e)
            {
                die("query failed ". $e->getMessage());
            }
        }
            else{
                try{
                    require_once "../dbh.inc.php";
    
                $query = "SELECT person_id FROM `people` WHERE email = ?;";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$email]);
        
                // Fetch the result as an associative array
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($result) {  // Check if the result exists
                    $perID = $result["person_id"];
                    $empID = sprintf("EMP%u", $perID);     
        
                    // Insert the new employee record using the retrieved person_id
                    $query = "INSERT INTO `support` (person_id, employee_id) VALUES (?, ?);";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$perID, $empID]);
                }
                }
                catch(PDOException $e)
                {
                    die("query failed ". $e->getMessage());
                }
                
                if ($department == "IT-support"){
                    try{
                        require_once "../dbh.inc.php";
    
                        $query = "SELECT person_id FROM `people` WHERE email = ?;";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute([$email]);
                
                        // Fetch the result as an associative array
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                        if ($result) {  // Check if the result exists
                            $perID = $result["person_id"];
                            $empID = sprintf("EMP%u", $perID);     
                
                            // Insert the new employee record using the retrieved person_id
                            $query = "INSERT INTO `it_support` (person_id, employee_id) VALUES (?, ?);";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute([$perID, $empID]);
                }
                    }
                    catch(PDOException $e)
                    {
                        die("query failed ". $e->getMessage());
                    }
                }
                else {
                    try{
                        require_once "../dbh.inc.php";
    
                        $query = "SELECT person_id FROM `people` WHERE email = ?;";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute([$email]);
                
                        // Fetch the result as an associative array
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                        if ($result) {  // Check if the result exists
                            $perID = $result["person_id"];
                            $empID = sprintf("EMP%u", $perID);     
                
                            // Insert the new employee record using the retrieved person_id
                            $query = "INSERT INTO `custommer_support` (person_id, employee_id) VALUES (?, ?);";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute([$perID, $empID]);
                }
                    }
                    catch(PDOException $e)
                    {
                        die("query failed ". $e->getMessage());
                    }
                }




            }


    }


    $pdo = null;
    $stmt = null;

    header("Location: ../success.html");

    die();
}
else 
{
    header("Location: index.php");
}