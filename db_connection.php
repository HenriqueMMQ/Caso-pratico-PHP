<?php

// host, username, password, database
$dbname = 'casopraticophp';
$connection = mysqli_connect('localhost', 'root', 'root', $dbname);

/* if (!$connection) {
    echo "<p style='color:red;'>Erro: Não foi possível conectar ao MySQL.</p>" . PHP_EOL;
    echo "<p>Erro: </p>" . mysqli_connect_errno() . "<br/><br/>" . PHP_EOL;
    exit;
}

echo "<p style='color:green;'>A conexão foi feita com sucesso!</p>" . PHP_EOL; */