<?php 

session_start(); 


if ($_SESSION['usuario_logado'] != 1){

    header('Location: /error?mensagem=Por favor, faça login para acessar essa página.');
    exit();
}

?>

<!-- TODO -->
