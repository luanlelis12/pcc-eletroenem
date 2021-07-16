<?php

session_start();

require 'conexao.php';
require_once 'emailController.php';

$errors = array();
$nome = "";
$email = "";

if (isset($_POST['Cadastrar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaConf = $_POST['senha-conf'];
    
    if (empty($nome)) {
        $errors['nome'] = "O nome é requerido";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "O email é inválido";
    }
    if (empty($email)) {
        $errors['email'] = "O email é requerido";
    }
    if (empty($senha)) {
        $errors['senha'] = "A senha é requerida";
    }
    if ($senha !== $senhaConf) {
        $errors['senha'] = "As duas senhas não combinam";
    }

    $emailQuery = "SELECT * FROM user WHERE email=? LIMIT 1";
    $stmt = $conexao->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "Esse email já existe";
    }

    if (count($errors) === 0) {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;

        $sql = "INSERT INTO user (username, email, verified, token, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('ssbss', $nome, $email, $verified, $token, $senha);

        if ($stmt->execute()) {
            $user_id = $conexao->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;

            sendVerificationEmail($email, $token);

            header('Location: ../_sites/cadastro.php');
            exit();
        } else {
            $errors['db_error'] = "Database error: falha ao cadastrar";
        }
    }

}

if (isset($_POST['logar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($email)) {
        $errors['email'] = "O email é requerido";
    }
    if (empty($senha)) {
        $errors['senha'] = "A senha é requerida";
    }

    $sql = "SELECT * FROM user WHERE email=? LIMIT 1";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($senha, $user['password'])) {
        
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['verified'] = $user['verified'];

        header('location: ../index.php');
        wexit();
    } else {
        $errors['login_fail'] = "Credenciais erradas";
    }
    
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: index.php');
    exit();
}



function verifyUser($token)
{
    global $conexao;
    $sql = "SELECT * FROM user WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE user SET verified=1 WHERE token='$token'"; 

        if (mysqli_query($conexao, $update_query)) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;

            header('location: index.php');
            exit();
        } 

    }

}

?>