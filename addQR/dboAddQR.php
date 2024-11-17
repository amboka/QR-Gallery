<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $QRlink = $_POST["location-name"];

    try{
        require_once "../dbh.inc.php";

        $query = "INSERT INTO `qr` (qr_link) VALUES (?);";

        $stmt = $pdo->prepare($query);
        $stmt -> execute([$QRlink]);

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