<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntegraSI - Cadastro</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="callback__message">
        <p class="<?php echo isset($_SESSION['statusCallback']) && $_SESSION['statusCallback'] === 'error' ? 'error' : (isset($_SESSION['statusCallback']) && $_SESSION['statusCallback'] === 'success' ? 'success' : ''); ?>">
            <?php
                if (isset($_SESSION['callbackMessage'])) {
                    echo $_SESSION['callbackMessage'];
                    unset($_SESSION['callbackMessage']);
                }
            ?>
            <script>
                setTimeout(() => {
                    <?php unset($_SESSION['statusCallback']); ?>    
                }, 5000);
            </script>
        </p>
    </div><!--callback__message-->

    <div class="container">
        <h2>Cadastro</h2>

        <form action="actions/cadastro_action.php" method="post">
            <div class="camp">
                <label>Nome Completo</label>
                <input type="text" name="user_name">
            </div><!--camp-->

            <div class="camp">
                <label>E-mail</label>
                <input type="email" name="user_email">
            </div><!--camp-->
            
            <div class="camp">
                <label>Senha</label>
                <input type="password" name="user_password">

                <!--TODO: Colocar botão com ícone de olho para visualizar senha, dever de casa deles-->
            </div><!--camp-->

            <button type="submit" name="register">Enviar</button>
        </form>
    </div><!--container-->

    <script>
        setTimeout(() => {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'actions/cadastro_action.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.querySelector('.callback__message > p').style.display = 'none'; 
            }
        };
        xhr.send();
    }, 5000);
    </script>
</body>
</html>