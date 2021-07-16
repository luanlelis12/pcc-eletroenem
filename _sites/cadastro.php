<?php require_once '../_php/authController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../_css/style.css">
</head>
<body class="cadastro">
    
    <div class="cadastro">

        <div class="cadastro-error">
            <div id="link"><a href="../index.php"><img src="../_img/voltar.png" alt=""></a><a href="../index.php"><span>Voltar</span></a></div>

            <?php if(count($errors) > 0): ?>
                <div class="alert-error">
                    <br>
                    <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li> <br>
                    <?php endforeach ?>
                </div>
            <?php endif ?>


        </div>

        <div class="cadastro-form">

            <div class="cadastro-entrar-conta"><span>Já tem uma conta?</span> <a href="login.php">Logar-se</a></div>

            <div class="cadastro-form-article">
            <h1>Cadastro</h1>

            <form action="cadastro.php" method="post">

                <label for="nome-cadastro">Nome</label>
                <input type="text" name="nome" id="nome-cadastro" value="<?php echo $nome ?>">
                <label for="email-cadastro">Email</label>
                <input type="text" name="email" id="email-cadastro" value="<?php echo $email ?>">
                <label for="senha-cadastro">Senha</label>
                <input type="password" id="senha-cadastro" name="senha">
                <label for="conf-senha-cadastro">Confirmar senha</label>
                <input type="password" id="conf-senha-cadastro" name="senha-conf">
                <input type="submit" value="Cadastrar" name="Cadastrar">

            </form>

        </div>


        </div>

    </div>


</body>
</html>