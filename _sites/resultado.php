<?php require_once '../_php/ScoreController.php'; 

if(!isset($_SESSION['id'])) {
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletroenem</title>
    <link rel="stylesheet" href="../_css/style.css">
</head>
<body>
    
    <header class="index-header">
        <div class="index-header">
        
        <img src="../_img/logotipo.png" alt="">

        <nav role="navigation" class="index-header">
            <ul class="index-header">
                <li><a href="../index.php">Home</a></li>
                <li><a href="classificacao.php">Classificação</a></li>
        </nav>

        </div>
    </header>
    
        <img src="../_img/bg5.png" id="background" alt="">
        
    <div class="resultado-section"> 
        <h1>Resultado do jogo <?php if(isset($recorde)){echo $recorde;} ?></h1>

        <div class="tables-resultados">

            <div class="table-resultado">

                <table class="table-resultado">
                    <tr>
                        <td class="td1">Pontuação: </td>
                        <td class="td2"><?php echo $_SESSION['pontuacao']; ?></td>
                    </tr>
                    <tr>
                        <td class="td1">Questões fáceis acertadas: </td>
                        <td class="td2"><?php echo $numF; ?></td>
                    </tr>
                    <tr>
                        <td class="td1">Questões difíceis acertadas: </td>
                        <td class="td2"><?php echo $numD; ?></td>
                    </tr>
                    <tr>
                        <td class="td1">Tempo de resolução: </td>
                        <td class="td2"><?php echo $tempoString ?></td>
                    </tr>
                    <tr>
                        <td class="td1">Multiplicador de pontos: </td>
                        <td class="td2"><?php echo $multiplicador.'x'; ?></td>
                    </tr>
                    <tr>
                        <td class="td1">Pontuação total: </td>
                        <td class="td2"><?php echo $pontuacao; ?></td>
                    </tr>
                </table>

            </div>

            <div role="separator" class="navbar-highlight-black"></div>

            <div class="table-clasificacao">
                <table class="table-clasificacao">
                    <tr>
                        <th class="td1">Posição</th>
                        <th class="td1">Jogador</th>
                        <th class="td1">Pontuação</th>
                        <th class="td1">Tempo</th>
                    </tr>
                
                    <?php
                        $sql = "SELECT id, username, pontuacao, tempo FROM user ORDER BY pontuacao desc, tempo asc";
                        $result = mysqli_query($conexao, $sql);
                        $num = 1;

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                if ($row['id']==$_SESSION['id']) {
                                    $player=$num;
                                    echo '<tr id="tr'.$player.'">
                                    <th class="td1 thUser">'.$num.'º</th>
                                    <td class="td2 tdUser">'.$row['username'].'</td>
                                    <td class="td2 tdUser">'.$row['pontuacao'].'</td>
                                    <td class="td2 tdUser">'.$row['tempo'].'</td>
                                    </tr>';
                                } else {
                                    echo '<tr>
                                    <th class="td1">'.$num.'º</th>
                                    <td class="td2">'.$row['username'].'</td>
                                    <td class="td2">'.$row['pontuacao'].'</td>
                                    <td class="td2">'.$row['tempo'].'</td>
                                    </tr>';
                                } $num++;
                            }
                        }  
                    ?>
                </table>
            </div>
        </div>

        <div class="link-game">
            <a id="link1" href="jogo.php">Jogar novamente</a>
            <a id="link2" href="../index.php">Ir para início</a>
        </div>
        
    </div>
    
</body>
</html>

<?php $_SESSION['pontuacao'] = 0;?>