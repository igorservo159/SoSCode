<?php
require "../app_soscode/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = new Connection();
    $stmt = $connection->connect()->prepare("SELECT id, name, email, pass FROM tb_users WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result !==  false) {
        if (isset($result['pass']) && password_verify($password, $result['pass'])) {
            session_start();
            $_SESSION['user_id'] = $id;
            header('Location: home.php');
            exit();
        } else{
            header('Location: index.php?erro=1');
            exit();
        }
    } else {
        header('Location: index.php?erro=2');
        exit();
    }
}
?>
