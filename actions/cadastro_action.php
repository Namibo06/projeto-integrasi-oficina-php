<?php

session_start();

require __DIR__ . '/../database/conn.php';

$callbackMessage = "";
$statusCallback = "";
unset($_SESSION['callbackMessage'], $_SESSION['statusCallback']);

if(isset($_POST['register'])){
    $data = filter_input_array(INPUT_POST, [
        'user_name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 
        'user_email' => FILTER_SANITIZE_EMAIL, 
        'user_password' => FILTER_UNSAFE_RAW
    ]);

    $userName = trim($data['user_name']);
    $userEmail = trim($data['user_email']);
    $userPassword = trim($data['user_password']);

    if(!empty($userName) && !empty($userEmail) && !empty($userPassword)){
        
        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['callbackMessage'] = "E-mail inválido!";
            $_SESSION['statusCallback'] = "error";
            header('Location: ../index.php');
            exit();
        }

        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        $verifyExistsByEmailQuery = "SELECT user_email FROM tb_user WHERE user_email = ?";
        $verifyExistsByEmailStmt = $pdo->prepare($verifyExistsByEmailQuery);
        $verifyExistsByEmailStmt->bindParam(1, $userEmail, PDO::PARAM_STR);
        $verifyExistsByEmailStmt->execute();
    
        if($verifyExistsByEmailStmt->rowCount() === 0){
            $registerQuery = "INSERT INTO tb_user (user_name, user_email, user_password) VALUES (?, ?, ?)";
            $registerStmt = $pdo->prepare($registerQuery);
            $registerStmt->bindParam(1, $userName, PDO::PARAM_STR);
            $registerStmt->bindParam(2, $userEmail, PDO::PARAM_STR);
            $registerStmt->bindParam(3, $hashedPassword, PDO::PARAM_STR);
            $registerStmt->execute();
    
            if($registerStmt->rowCount() > 0){
                $callbackMessage = "Cadastrado com sucesso";
                $statusCallback = "success";
            }else{
                $callbackMessage = "Falha ao tentar se cadastrar";
                $statusCallback = "error";
            }
        }else{
            $callbackMessage = "E-mail já está cadastrado";
            $statusCallback = "error";
        }
    }else{
        $callbackMessage = "Todos os campos são obrigatórios";
        $statusCallback = "error";
    }

    $_SESSION['callbackMessage'] = $callbackMessage;
    $_SESSION['statusCallback'] = $statusCallback;
    header('Location: ../index.php');
    exit();
}
