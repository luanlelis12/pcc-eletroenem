<?php
require_once '../_php/authController.php';

if ($_SESSION['id']!=1) {
    header('Location: ../index.php');
}

?>  

<!DOCTYPE html>  
<html>  
<head>
    <link rel="sortcut icon" href="../_img/atomo.png" type="image/png" />
    <title>Eletroenem</title>
    <link rel="stylesheet" href="../_css/style.css">
    <script src="../_js/css-add.js"></script>
</head>  
<body>  

    <header class="index-header">
        <div class="index-header">
        
        <img src="../_img/logotipo.png" alt="">

        <nav role="navigation" class="index-header">
            <ul class="index-header">
                <li><a href="../index.php">Home</a></li>
                <li><a href="classificacao.php">Classificação</a></li>
                <li><a href="#">Admin</a></li>
                <li role="separator" class="navbar-highlight-white"></li>
                <li><div class="dropdown">
                <button onclick="myFunction()" class="profile-button dropbtn"><div><span class="dropbtn" id="span-user">Perfil</span><svg class="dropbtn" viewBox="0 0 1024 1024" id="svg-user"><path d="M476.455 806.696L95.291 425.532Q80.67 410.911 80.67 390.239t14.621-34.789 35.293-14.117 34.789 14.117L508.219 698.8l349.4-349.4q14.621-14.117 35.293-14.117t34.789 14.117 14.117 34.789-14.117 34.789L546.537 800.142q-19.159 19.159-38.318 19.159t-31.764-12.605z"></path></svg></div></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a class="dropdown-link" href="../index.php?logout=1" class="logout">Sair</a>
                    </div>
                </div></li>
            </ul>
        </nav>

        </div>
    </header>

    <div class="admin-view">
    <div class="admin-div">
        <h1 align="center">Inserção e visualização de questões</h1>  
        <br>  
        
        <form action="../_php/upload.php" method="post" enctype="multipart/form-data">
            Selecione uma imagem para fazer Upload:
            <input type="file" name="file"> <br>
            <input type="radio" name="altC" value="a" id="A"><label for="A">A</label>
            <input type="radio" name="altC" value="b" id="B"><label for="B">B</label>
            <input type="radio" name="altC" value="c" id="C"><label for="C">C</label>
            <input type="radio" name="altC" value="d" id="D"><label for="D">D</label>
            <input type="radio" name="altC" value="e" id="E"><label for="E">E</label> <br>
            <input type="radio" name="dificuldade" value="1" id="dificil"><label for="dificil">Difícil</label>
            <input type="radio" name="dificuldade" value="0" id="facil"><label for="facil">Fácil</label> <br>
            <input type="submit" name="submit" value="Upload">
        </form>

        <br>  
        <br>  
        <table align="center">

            <?php
            $query = $conexao->query("SELECT * FROM question ORDER BY id DESC");
            
            if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
                $imageURL = '../_img/uploads/'.$row["imagem"];
            ?>
            <tr>
                <td class="td1"><img src="<?php echo $imageURL; ?>" alt="" /></td>
                <td class="td2"><?php echo '<p>ID: '.$row['id'].'</p><p>Alternativa certa: '.$row['altC'].'</p><p>Dificuldade: ';?> <?php if($row['dificil']==1){echo 'Dificil';}else{echo 'Fácil';}?></p></td>
            <?php }
            }else{ ?>
            <td>No image(s) found...</td>
            <?php } ?>
            </tr>

        </table> 

    </div>
    </div>

</body>  
</html>