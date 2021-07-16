<?php
require_once 'conexao.php';
session_start();

$_SESSION['pontuacao'] = 0;

$id_user = $_SESSION['id'];

for($j=0; $j<5; $j++){
    $queryF = $conexao->query("SELECT * FROM question WHERE id = '{$_SESSION['questionF'][$j]}'");
    if($queryF->num_rows > 0){
        while($rowF = $queryF->fetch_assoc()){
            $reposta = strtolower($_POST['questionF'.($j+1)]);
            $altc = strtolower($rowF['altC']);
            if ($reposta == $altc) {
                $_SESSION['pontuacao'] += 15;
            }
        }
    }    
}

for($j=0; $j<5; $j++){
    $queryD = $conexao->query("SELECT * FROM question WHERE id = '{$_SESSION['questionD'][$j]}'");
    if($queryD->num_rows > 0){
        while($rowD = $queryD->fetch_assoc()){
            $reposta = strtolower($_POST['questionD'.($j+1)]);
            $altc = strtolower($rowD['altC']);
            if ($reposta == $altc) {
                $_SESSION['pontuacao'] += 25;
            }
        }
    }    
}

$minutos = $_POST['minutos'];
$segundos = $_POST['segundos'];

$total = 600-(($minutos*60) + $segundos); 

$pontuacao = $_SESSION['pontuacao'];

if($total<60) {
    $pontuacao = $pontuacao * 2;
} elseif ($total<120) {
    $pontuacao = $pontuacao * 1.9;
} elseif ($total<180) {
    $pontuacao = $pontuacao * 1.8;
} elseif ($total<240) {
    $pontuacao = $pontuacao * 1.7;
} elseif ($total<300) {
    $pontuacao = $pontuacao * 1.6;
} elseif ($total<360) {
    $pontuacao = $pontuacao * 1.5;
} elseif ($total<420) {
    $pontuacao = $pontuacao * 1.4;
} elseif ($total<480) {
    $pontuacao = $pontuacao * 1.3;
} elseif ($total<540) {
    $pontuacao = $pontuacao * 1.2;
} elseif ($total<600) {
    $pontuacao = $pontuacao * 1.1;
}

// echo $minutos.':'.$segundos.'<br>'.$total; 

// $queryScore = sprintf("SELECT * FROM user WHERE id = '{$_SESSION['id']}'");
// $resultScore = mysqli_query($conexao, $queryScore);

// while($rowScore = mysqli_fetch_array($resultScore))
// {
//     if ($pontuacao > $rowScore['pontuacao']) {
//         $sql = "UPDATE user SET pontuacao=(?) WHERE id = '{$_SESSION['id']}'";
//         $stmt = $conexao->prepare($sql);
//         $stmt->bind_param('i', $_SESSION['pontuacao']);
//         $stmt->execute();
//     }
// }  


?>