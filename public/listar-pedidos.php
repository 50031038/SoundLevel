<?php
include("connection.php");

$sql = "SELECT nome, email, telefone FROM eventos";
$result = $ligacao->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Nome: " . $row["nome"]. "<br>E-mail: " . $row["email"]."<br>Telefone:" . $row["telefone"]. "<br>";
  }
} else {
  echo "Não existem eventos na Base de Dados";
}
$ligacao->close();
?>