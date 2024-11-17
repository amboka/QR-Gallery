<?php

declare(strict_types = 1);

function get_user(object $pdo, string $username){

    $query = "SELECT * FROM `people` WHERE username = ?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);

    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;
}