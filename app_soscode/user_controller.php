<?php
require "../app_soscode/connection.php";

$acao = $_GET['acao'];

if($acao == 'registrar'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if (empty($name) || empty($email) || empty($password) || empty($passwordConfirm)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        if($passwordConfirm != $password){
            echo "As senhas não coincidem";
        }
        else{
            $connection = new Connection();
            $query = $connection->connect()->prepare("SELECT id FROM tb_users WHERE email = :email");
            $query->bindValue(':email', $email);
            $query->execute();
            if ($query->fetch()) {
                echo "O email já está em uso. Escolha outro.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
                $query = $connection->connect()->prepare("INSERT INTO tb_users (name, email, pass) VALUES (:name, :email, :password)");
                $query->bindValue(':name', $name);
                $query->bindValue(':email', $email);
                $query->bindValue(':password', $hashed_password);
                $result = $query->execute();
    
                if ($result) {
                    echo "Registro bem-sucedido. <a href='index.php'>Faça login</a>.";
                } else {
                    echo "Ocorreu um erro durante o registro. Tente novamente.";
                }
            }
        }
    }
}

?>