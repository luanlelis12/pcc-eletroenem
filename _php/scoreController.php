<?php
require_once 'conexao.php';
session_start();

$_SESSION['pontuacao'] = 0;
$id_user = $_SESSION['id'];
$numF = 0;
$numD = 0;
$game = 1;

for($j=0; $j<5; $j++){
    $queryF = $conexao->query("SELECT * FROM question WHERE id = '{$_SESSION['questionF'][$j]}'");
    if($queryF->num_rows > 0){
        while($rowF = $queryF->fetch_assoc()){
            $reposta = strtolower($_POST['questionF'.($j+1)]);
            $altc = strtolower($rowF['altC']);
            if ($reposta == $altc) {
                $_SESSION['pontuacao'] += 15;
                $numF++;
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
                $numD++;
            }
        }
    }    
}

$minutos = $_POST['minutos'];
$segundos = $_POST['segundos'];

$total = 600-(($minutos*60) + $segundos); 

if($total<60) {
    $multiplicador = 2;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
} elseif ($total<120) {
    $multiplicador = 1.9;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
} elseif ($total<180) {
    $multiplicador = 1.8;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
} elseif ($total<240) {
    $multiplicador = 1.7;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
} elseif ($total<300) {
    $multiplicador = 1.6;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
} elseif ($total<360) {
    $multiplicador = 1.5;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
} elseif ($total<420) {
    $multiplicador = 1.4;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
} elseif ($total<480) {
    $multiplicador = 1.3;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
} elseif ($total<540) {
    $multiplicador = 1.2;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
} elseif ($total<600) {
    $multiplicador = 1.1;
    $pontuacao = $_SESSION['pontuacao'] * $multiplicador;
}

if ($segundos==0) {
    $tempo = (10-$minutos)."00";
    $tempoString = (10-$minutos).":00";
} else {
    $tempo = (9-$minutos).(60-$segundos);
    $tempoString = "0".(9-$minutos).":".(60-$segundos);
}

$query = "SELECT * FROM user WHERE id = '{$_SESSION['id']}'";
$score = mysqli_query($conexao, $query);

while($row = mysqli_fetch_array($score))
{
    if ($pontuacao > $row['pontuacao']) {
        $sql = "UPDATE user SET pontuacao=(?) WHERE id = '{$_SESSION['id']}'";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('i', $pontuacao);
        $stmt->execute();
        $sql = "UPDATE user SET tempo=(?) WHERE id = '{$_SESSION['id']}'";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('i', $tempo);
        $stmt->execute();
        $recorde = "Novo recorde!";
    }
}

?>