<?php 
require_once '_php/authController.php'; 

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletroenem</title>
    <link rel="stylesheet" href="_css/style.css">
    <script src="_js/css-add.js"></script>
    <link rel="sortcut icon" href="_img/atomo.png" type="image/png" />
</head>
<body class="without-overflow">
    
    <header class="index-header">
        <div class="index-header">
        
        <img src="_img/logotipo.png" alt="">

        <nav role="navigation" class="index-header">
            <ul class="index-header"><li><a>Home</a></li><li><a href="_sites/classificacao.php">Classificação</a></li><?php if(isset($_SESSION['id'])){if($_SESSION['id']==1){?><li><a href="_sites/admin.php">Admin</a></li><?php }} ?><li role="separator" class="navbar-highlight-white"></li>
            <?php if (isset($_SESSION['id'])) { ?>
                <li><div class="dropdown">
                <button onclick="myFunction()" class="profile-button dropbtn"><div><span class="dropbtn" id="span-user">Perfil</span><svg class="dropbtn" viewBox="0 0 1024 1024" id="svg-user"><path d="M476.455 806.696L95.291 425.532Q80.67 410.911 80.67 390.239t14.621-34.789 35.293-14.117 34.789 14.117L508.219 698.8l349.4-349.4q14.621-14.117 35.293-14.117t34.789 14.117 14.117 34.789-14.117 34.789L546.537 800.142q-19.159 19.159-38.318 19.159t-31.764-12.605z"></path></svg></div></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a class="dropdown-link" href="index.php?logout=1" class="logout">Sair</a>
                    </div>
                </div></li>
            <?php } else { ?>
                <li id="cadastro"><a href="_sites/cadastro.php">Inscrever-se</a></li><li><a href="_sites/login.php">Entrar</a>
            <?php } ?></li>
            </ul>
        </nav>

        </div>
    </header>
    
        
    <div class="index-section"> 
        <div id="titulo">
            <h1>ELETROENEM</h1>
            <div><span>Um novo site feito para lhe ensinar eletromagnetismo de uma maneira mais fácil e divertida!</span></div>
        </div>
        <?php if (isset($_SESSION['id'])) { ?>
            <div id="jogo"><a href="_sites/jogo.php"><img src="_img/botao-play.png" alt=""/><h2>Jogar</h2></a></div>
        <?php } ?>
        <img id="background" src="_img/bg3.png" alt="">
    </div>
    

</body>
</html>