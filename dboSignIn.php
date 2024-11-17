<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $userName = $_POST["username"];
    $pwd = $_POST["password"];


    try{
        require_once "dbh.inc.php";
        require_once "Signin_model.inc.php";
        require_once "Signin_contr.inc.php";
        
        $result = get_user($pdo, $userName);

        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["password"])){
            $errors["login_incorrect"] = "Incorrect login info";
        }

        if($errors){
            header("Location: Signin.php");
            die();
        }
        
        session_start();

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . '_' . $result['person_id'];
        session_id($sessionId);

        $_SESSION['user_id'] = $result['person_id'];
        $_SESSION['username'] = $userName; 

        header("Location: index.html");
        die();
    }
    catch(PDOException $e)
    {
        die("query failed ". $e->getMessage());
    }

}
else 
{
    header("Location: index.php");
    die();
}