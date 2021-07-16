<?php

require '../_php/conexao.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table border="1px solid #000">

        <tr>
            <th>Posição</th>
            <th>Jogador</th>
            <th>Pontuação</th>
        </tr>

    
        <?php
        
            


            
            $sql = "SELECT id, username, pontuacao FROM user ORDER BY pontuacao desc";
            $result = mysqli_query($conexao, $sql);
            $i = 1;

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result))   
                    {  
                        echo '
                        <tr>
                            <td>
                                '. $i .'º        
                            </td>
                            <td>  
                                '. $row['username'] .'
                            </td>
                            <td> 
                                '. $row['pontuacao'] .'
                            </td>
                        </tr>';
                        $i++;
                    }
                }  
            
        
        ?>
    
    </table>

</body>
</html>