<?php

$ligacao = new mysqli("localhost", "root", "", "bd_eventos");

/* verifica se ocorreu algum erro na ligação */
if ($ligacao->connect_errno) {
    echo "Falha na ligação: " . $ligacao->connect_error;   
}

?>