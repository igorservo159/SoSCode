<?php
require "../app_soscode/connection.php";

$acao = $_GET['acao'];

if($acao == 'registrar'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if (empty($name) || empty($email) || empty($password) || empty($passwordConfirm)) {
        header('Location: signup.php?erro=0');
    } else {
        if($passwordConfirm != $password){
            header('Location: signup.php?erro=1');
        }
        else{
            $connection = new Connection();
            $query = $connection->connect()->prepare("SELECT id FROM tb_users WHERE email = :email");
            $query->bindValue(':email', $email);
            $query->execute();
            if ($query->fetch()) {
                header('Location: signup.php?erro=2');
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
                $query = $connection->connect()->prepare("INSERT INTO tb_users (name, email, pass) VALUES (:name, :email, :password)");
                $query->bindValue(':name', $name);
                $query->bindValue(':email', $email);
                $query->bindValue(':password', $hashed_password);
                $result = $query->execute();
    
                if ($result) {
                    header('Location: index.php?registro=1');
                } else {
                    header('Location: signup.php?erro=3');
                }
            }
        }
    }
}

?>