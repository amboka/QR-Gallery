<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $personType = $_POST["person_type"];
    $department = $_POST["department"];

    try{
        require_once "../dbh.inc.php";

        $query = "UPDATE qr SET location_id = (?) WHERE qr_id = (?);";

        $stmt = $pdo->prepare($query);
        $stmt -> execute([$personType, $department]);


    }
    catch(PDOException $e)
    {
        die("query failed ". $e->getMessage());
    }
    
    try{
        require_once "../dbh.inc.php";

        $query = "UPDATE location SET QR_id = (?) WHERE id_location = (?);";

        $stmt = $pdo->prepare($query);
        $stmt -> execute([$department, $personType]);


    }
    catch(PDOException $e)
    {
        die("query failed ". $e->getMessage());
    }

    header("Location: ../success.html");

    $pdo = null;
    $stmt = null;

    die();
}
else 
{
    header("Location: index.php");
}