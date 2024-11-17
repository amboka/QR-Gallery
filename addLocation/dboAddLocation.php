<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $locationName = $_POST["location-name"];

    try{
        require_once "../dbh.inc.php";

        $query = "INSERT INTO `location` (Location_name) VALUES (?);";

        $stmt = $pdo->prepare($query);
        $stmt -> execute([$locationName]);

        header("Location: ../success.html");
    }
    catch(PDOException $e)
    {
        die("query failed ". $e->getMessage());
    }

    $stmt = null;
    $pdo = null;

    die();
}