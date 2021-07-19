<?php require_once '../_php/authController.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletroenem</title>
    <link rel="stylesheet" href="../_css/style.css">
    <script src="../_js/css-add.js"></script>
</head>
<body>
    
    <header class="index-header">
        <div class="index-header">
        
        <img src="../_img/logotipo.png" alt="">

        <nav role="navigation" class="index-header">
            <ul class="index-header"><li><a href="../index.php">Home</a></li><li><a href="#">Classificação</a></li><li role="separator" class="navbar-highlight-white"></li>
            <li>
            <?php if (isset($_SESSION['id'])) { ?>
                <div class="dropdown">
                <button onclick="myFunction()" class="profile-button dropbtn"><div><span class="dropbtn" id="span-user">Perfil</span><svg class="dropbtn" viewBox="0 0 1024 1024" id="svg-user"><path d="M476.455 806.696L95.291 425.532Q80.67 410.911 80.67 390.239t14.621-34.789 35.293-14.117 34.789 14.117L508.219 698.8l349.4-349.4q14.621-14.117 35.293-14.117t34.789 14.117 14.117 34.789-14.117 34.789L546.537 800.142q-19.159 19.159-38.318 19.159t-31.764-12.605z"></path></svg></div></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a class="dropdown-link" href="../index.php?logout=1" class="logout">Sair</a>
                    </div>
                </div>
            <?php } else { ?>
                <a href="../_sites/cadastro.php">Inscrever-se</a></li><li><a href="../_sites/login.php">Entrar</a>
            <?php } ?></li>
            </ul>
        </nav>

        </div>
    </header>
    
        <img src="../_img/bg5.png" id="background" alt="">
        
    <div class="resultado-section"> 
        <h1>Classificação geral</h1>

        <div class="table-clasificacao geral">
            <table class="table-clasificacao geral">
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
                            if (isset($_SESSION['id'])) {
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
                                }
                            } else { 
                                echo '<tr>
                                <th class="td1">'.$num.'º</th>
                                <td class="td2">'.$row['username'].'</td>
                                <td class="td2">'.$row['pontuacao'].'</td>
                                <td class="td2">'.$row['tempo'].'</td>
                                </tr>';
                            }
                            $num++;
                        }
                    }  
                ?>
            </table>
        </div>

        <div class="search-player">
            <a href="#tr<?php echo $player;?>">Procurar sua classificação</a>
        </div>
        
    </div>
    
</body>
</html>