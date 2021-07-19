<?php
require_once '../_php/authController.php';

if ($_SESSION['id']!=1) {
    header('Location: ../index.php');
}

?>  

<!DOCTYPE html>  
<html>  
    <head>
    </head>  
    <body>  
        
        <h3 align="center">Inserção e visualização de questões</h3>  
        <br>  
        
        <form action="../_php/upload.php" method="post" enctype="multipart/form-data">
            Select Image File to Upload:
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
        <table border="1px solid black" align="center" class="table table-bordered">  
            <tr>  
                <th>Image</th>  
            </tr>

            <?php
            $query = $conexao->query("SELECT * FROM question ORDER BY id DESC");
            
            if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
                $imageURL = '../uploads/'.$row["imagem"];
            ?>
            <tr>
                <td><img src="<?php echo $imageURL; ?>" alt="" /></td>
                <td><?php echo '<p>ID: '.$row['id'].'</p><p>Alternativa certa: '.$row['altC'].'</p><p>Dificuldade: ';?> <?php if($row['dificil']==1){echo 'Dificil';}else{echo 'Fácil';}?></p></td>
            
            <?php }
            }else{ ?>
            <td>No image(s) found...</td>
            <?php } ?>
            </tr>


        </table>  
        </body>  
</html>