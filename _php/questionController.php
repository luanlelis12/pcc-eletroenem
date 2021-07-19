<?php
require_once 'conexao.php';

$_SESSION['q_facil'] = [];
$_SESSION['q_dificil'] = [];
$selectF = [];
$selectD = [];
$questionF = [];
$questionD = [];

$queryF = $conexao->query("SELECT id FROM question WHERE dificil = 0");
$queryD = $conexao->query("SELECT id FROM question WHERE dificil = 1");


if($queryF->num_rows > 0){
    while($rowF = $queryF->fetch_assoc()){
        array_push($selectF, $rowF['id']);
    }
}

if($queryD->num_rows > 0){
    while($rowD = $queryD->fetch_assoc()){
        array_push($selectD, $rowD['id']);
    }
}

$countF = count($selectF);

for($i=0; $i<5; $i++){
    $arrayF[$i] = rand(0,$countF-1);
    $j = $i-1;
    if($i>0) {
        do{
            if($arrayF[$j] == $arrayF[$i]){
                $j = $i-1;
                $arrayF[$i] = mt_rand(1,5);
            } else {
                $j--;
            }
        } while ($j>=0);
    }
}

$countD = count($selectD);

for($i=0; $i<5; $i++){
    $arrayD[$i] = rand(0,$countD-1);
    $j = $i-1;
    if($i>0) {
        do{
            if($arrayD[$j] == $arrayD[$i]){
                $j = $i-1;
                $arrayD[$i] = mt_rand(1,5);
            } else {
                $j--;
            }
        } while ($j>=0);
    }
}

for($i=0; $i<5; $i++){
    array_push($questionF, $selectF[$arrayF[$i]]);
    array_push($questionD, $selectD[$arrayD[$i]]);
}

$_SESSION['questionF'] = $questionF;
$_SESSION['questionD'] = $questionD;
$_SESSION['pontuacao'] = 0;

?>