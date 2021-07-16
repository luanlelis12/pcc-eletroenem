<?php

require 'constantes.php';

$conexao = mysqli_connect(DB_HOST, DB_USUARIO, DB_SENHA, DB_NAME) or die('Não foi possível conectar');