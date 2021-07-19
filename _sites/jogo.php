<?php

require_once '../_php/authController.php';
require_once '../_php/questionController.php';

if (($_SESSION['id']) == "") {
    $errors['login'] = 'Para jogar é necessário fazer o login. Por favor, faça o seu login.';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../_css/style.css">

    <script>

    var contador = '600';

    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var tempo = setInterval(temporizador, 1000);

        function temporizador() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            document.getElementById('minutos').value = minutes;
            document.getElementById('segundos').value = seconds;
            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                document.getElementById("finished-time").classList.toggle("finished-show");
                document.getElementById("finished-time").classList.remove("finished-remove");
                clearInterval(tempo);
            }
        }

    }

    window.onload = function() {
        var count = parseInt(contador),
        display = document.querySelector('#time');
        startTimer(count, display);
    };
    </script>

</head>
<body>

<header class="game-header">
        <div class="game-header">
        
        <img src="../_img/logotipo.png" alt="">

        <nav role="navigation" class="game-header">
            <ul class="game-header">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../_sites/classificacao.php">Classificação</a></li>
                <li role="separator" class="navbar-highlight-white"></li>
                <li><div>O tempo termina em <span id="time">Carregando...</span>!</div></li>
            </ul>
        </nav>

    </div>
</header>


<div class="question-view">
    
    <div class="question-div">
    <form action="resultado.php" method="post">

    <?php

    $num = 1;
    
    for($i=0;$i<5;$i++) {
    $queryF = $conexao->query("SELECT * FROM question WHERE id = '{$questionF[$i]}'");
    $queryD = $conexao->query("SELECT * FROM question WHERE id = '{$questionD[$i]}'");

    if($queryF->num_rows > 0){
        while($rowF = $queryF->fetch_assoc()){
        $imageURLF = '../_img/uploads/'.$rowF["imagem"];
    ?>
    
    <div>
        <h2>Questão <?php echo '0'.$num .':'; ?></h2>
        <img src="<?php echo $imageURLF; ?>" alt="" />
        <div class="question-alt">
        <h3>Responder aqui:</h3>
        <?php echo '<div class="question-input">
            <div><input type="radio" name="questionF'. ($i+1) .'" value="a" id="altA'. $num .'" required><label for="altA'. $num .'"><div>A</div></label></div><br>
            <div><input type="radio" name="questionF'. ($i+1) .'" value="b" id="altB'. $num .'" required><label for="altB'. $num .'"><div>B</div></label></div><br>
            <div><input type="radio" name="questionF'. ($i+1) .'" value="c" id="altC'. $num .'" required><label for="altC'. $num .'"><div>C</div></label></div><br>
            <div><input type="radio" name="questionF'. ($i+1) .'" value="d" id="altD'. $num .'" required><label for="altD'. $num .'"><div>D</div></label></div><br>
            <div><input type="radio" name="questionF'. ($i+1) .'" value="e" id="altE'. $num .'" required><label for="altE'. $num .'"><div>E</div></label></div><br>
            '. $rowF['altC'] .' </div></div>'; }}?>
        <div align="right"><?php echo '<a class="link-question" href="#question'.$num.'">';?><div><span>Próxima Questão</span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M57.33333,35.83333v100.33333l78.83333,-50.16667z"></path></g></g></svg></div></a></div>
    </div>

    <hr <?php echo'id="question'.$num.'"'; $num++; ?>>

    <?php
    if($queryD->num_rows > 0){
        while($rowD = $queryD->fetch_assoc()){
        $imageURLD = '../uploads/'.$rowD["imagem"];
    ?>

    <div>
        <h2>Questão <?php if ($num<10){echo '0'.$num .':';}else{{echo $num .':';}} ?></h2>
        <img src="<?php echo $imageURLD; ?>" alt="" />
        <div class="question-alt">
        <h3>Responder aqui:</h3>
        <?php echo '<div class="question-input">
            <div><input type="radio" name="questionD'. ($i+1) .'" value="a" id="altA'. $num .'" required><label for="altA'. $num .'"><div>A</div></label></div><br>
            <div><input type="radio" name="questionD'. ($i+1) .'" value="b" id="altB'. $num .'" required><label for="altB'. $num .'"><div>B</div></label></div><br>
            <div><input type="radio" name="questionD'. ($i+1) .'" value="c" id="altC'. $num .'" required><label for="altC'. $num .'"><div>C</div></label></div><br>
            <div><input type="radio" name="questionD'. ($i+1) .'" value="d" id="altD'. $num .'" required><label for="altD'. $num .'"><div>D</div></label></div><br>
            <div><input type="radio" name="questionD'. ($i+1) .'" value="e" id="altE'. $num .'" required><label for="altE'. $num .'"><div>E</div></label></div><br>
            '. $rowD['altC'] .' </div></div>'; }}?>
        <div align="right"><?php if($num<10){echo '<a class="link-question" href="#question'.$num.'"><div><span>Próxima Questão</span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M57.33333,35.83333v100.33333l78.83333,-50.16667z"></path></g></g></svg></div></a>';}?></div>
    </div>
        
    <hr <?php echo'id="question'.$num.'"'; $num++; ?>>


    <?php } ?>

    <input type="number" id="minutos" name="minutos" readonly>
    <input type="number" id="segundos" name="segundos" readonly>
    <input type="submit" id="responder-game" value="Responder" name="Responder">

    </form>
    </div>
</div>

<?php if(count($errors) > 0): ?>
    <div class="error-play">
        <div>
        <?php foreach($errors as $error): ?>
            <h2>Error</h2>
            <p><?php echo $error; ?></p> 
            <a href="../index.php">Voltar</a>
        <?php endforeach ?>    
        </div>
    </div>
<?php endif ?>

<div id="finished-time" class="finished-alert finished-remove" >
    <div>
        <h2>Fim da partida</h2>
            <p>Infelizmente o tempo acabou :( agora você escolher reiniciar a partida ou voltar para a página inicial.</p>
            <a id="voltar" href="../index.php">Voltar</a>
            <a id="reiniciar" onClick="window.location.reload();">Reiniciar</a>

    </div>
</div>

</body>
</html>