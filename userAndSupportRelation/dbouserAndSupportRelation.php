<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $personType = $_POST["person_type"];
    $department = $_POST["department"];

    try{
        require_once "../dbh.inc.php";

        $query = "UPDATE users SET assistant_ID = (?) WHERE person_id = (?);";

        $stmt = $pdo->prepare($query);
        $stmt -> execute([$department, $personType]);


    }
    catch(PDOException $e)
    {
        die("query failed ". $e->getMessage());
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