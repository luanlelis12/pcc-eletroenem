<?php require_once '../_php/authController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletroenem</title>
    <link rel="stylesheet" href="../_css/style.css">
    <link rel="sortcut icon" href="../_img/atomo.png" type="image/png" />
</head>
<body class="login">
    
    <div class="login">

        <div class="login-error">
            <div id="link"><a href="../index.php"><img src="../_img/voltar.png" alt=""></a><a href="../index.php"><span>Voltar</span></a></div>

            <?php if(count($errors) > 0): ?>
                <div class="alert-error">
                    <?php foreach($errors as $error): ?>
                        <li><span><?php echo $error; ?></span>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            
        </div>

        <div class="login-form">

            <div class="login-criar-conta"><span>Não tem uma conta?</span> <a href="cadastro.php">Inscrever-se</a></div>

            <div class="login-form-article">
            <h1>Login</h1>

            <form action="login.php" method="post">
                <label for="email-login">Email</label>
                <input type="text" name="email" id="email-login">
                <label for="senha-login">Senha</label>
                <input type="password" name="senha" id="senha-login">
                <div class="esqueceu-senha"><a href="">Esqueceu sua senha?</a></div>
                
                <input type="submit" value="Fazer Login" name="logar">

            </form>
            
        </div>


        </div>

    </div>


</body>
</html>