<?php

session_start();

require __DIR__ . '/../database/conn.php';

$callbackMessage = "";
$statusCallback = "";

if(isset($_POST['register'])){
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $userName = trim($data['user_name']);
    $userEmail = trim($data['user_email']);
    $userPassword = trim($data['user_password']);

    if(!empty($userName) && !empty($userEmail) && !empty($userPassword)){
        $hashedPassword = password_hash($userPassword,PASSWORD_DEFAULT);

        $verifyExistsByEmailQuery = "SELECT user_email FROM tb_user WHERE user_email = ?";
        $verifyExistsByEmailStmt = $pdo->prepare($verifyExistsByEmailQuery);
        $verifyExistsByEmailStmt->bindParam(1,$userEmail,PDO::PARAM_STR);
        $verifyExistsByEmailStmt->execute();
    
        if($verifyExistsByEmailStmt->rowCount() === 0){
            $registerQuery = "INSERT INTO tb_user (user_name,user_email,user_password) VALUES (?,?,?)";
            $registerStmt = $pdo->prepare($registerQuery);
            $registerStmt->bindParam(1,$userName,PDO::PARAM_STR);
            $registerStmt->bindParam(2,$userEmail,PDO::PARAM_STR);
            $registerStmt->bindParam(3,$hashedPassword,PDO::PARAM_STR);
            $registerStmt->execute();
    
            if($registerStmt->rowCount() > 0){
                $callbackMessage = "Cadastrado com sucesso";
                $statusCallback = "success";
            }else{
                $callbackMessage = "Falha ao tentar se cadastrar";
                $statusCallback = "error";
            }
        }else{
            $callbackMessage = "Email ja ativo";
            $statusCallback = "error";
        }
    }else{
        $callbackMessage = "Dados obrigatórios não preenchidos";
        $statusCallback = "error";
    }

    $_SESSION['callbackMessage'] = $callbackMessage;
    $_SESSION['statusCallback'] = $statusCallback;
    header('Location: ../index.php');
    exit();
}