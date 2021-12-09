<?php
session_start();
include("connection.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$tipo_evento = filter_input(INPUT_POST, 'tipo_evento', FILTER_SANITIZE_STRING);
$data_evento = filter_input(INPUT_POST, 'data_evento', FILTER_SANITIZE_STRING);
$pedido = filter_input(INPUT_POST, 'pedido', FILTER_SANITIZE_STRING);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING);
$empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);

$inserir="INSERT INTO eventos (nome, email, telefone, tipo_evento, data_evento, pedido, latitude, longitude, empresa) 
VALUES ('$nome', '$email', '$telefone', '$tipo_evento', '$data_evento', '$pedido', '$latitude', '$longitude', '$empresa')"; 

$pedido_inserido=mysqli_query($ligacao, $inserir);
$_SESSION['msg'] = "Recebemos o seu pedido e vamos contactá-lo brevemente!";
header("location:/SIG/public/pedidos.php");
echo "O seu pedido foi inserido com sucesso!";

$ligacao->close();  // fechar a ligação 

?>