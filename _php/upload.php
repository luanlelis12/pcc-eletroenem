<?php
require_once 'conexao.php';
$statusMsg = '';

if(isset($_POST["submit"])){
    
    $targetDir = "../uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $altC = $_POST['altC'];
    $dificuldade = $_POST['dificuldade'];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $allowTypes = array('jpg','png','jpeg','pdf');
    if(!empty($_FILES["file"]["name"])){
    if(in_array($fileType, $allowTypes)){
    
    
            $sql = $conexao->query("INSERT into question (imagem, altC, dificil) VALUES ('".$fileName."', '".$altC."', '".$dificuldade."')");
    
            if($sql){
                $statusMsg = "O arquivo ".$fileName. " foi enviado para o BD com sucesso.";
            }else{
                $statusMsg = "Falha no upload, por favor tente novamente.";
            } 
    
      
    
    }else{
        $statusMsg = 'Desculpe, apenas JPG, JPEG, PNG & PDF são permitidos para upload.';
    }
}else{
    $statusMsg = 'Por favor, selecione um arquivo para upload.';
}
}

echo $statusMsg;
?>