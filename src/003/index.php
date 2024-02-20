<?php

header("Content-Type: text/html;charset=utf-8");

//paràmetres de connexió
$host     = getenv("MYSQL_HOSTNAME");
$user     = "root";
$password = getenv("MYSQL_ROOT_PASSWORD");
$dbname   = "estudis";

//realització de la connexió
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
  die("No s'ha pogut realitzar la connexió. ERROR: " . $conn->connect_error);
}
$conn->set_charset("utf8");

//inserció d'una dada
$instruccio = "insert into estudiant values (999, '52666666F','Toni Blanco Serra',23,1)";
$res = $conn->query($instruccio);
if ($conn->connect_errno != 0) //si error es finalitza
{
  die("No s'ha pogut inserir la dada<br>");
}
echo "Dada inserida<br>";

//modificació d'una dada
$instruccio = "update estudiant set edat = 25 where DNI = '52666666F'";
$res = $conn->query($instruccio);
if ($conn->connect_errno != 0) //si error es finalitza
{
  die("No s'ha pogut modificar la dada<br>");
}
echo "Dada modificada<br>";

//eliminació d'una dada
$instruccio = "delete from estudiant where DNI = '52666666F'";
$res = $conn->query($instruccio);
if ($conn->connect_errno != 0) //si error es finalitza
{
  die("No s'ha pogut eliminar la dada<br>");
}
echo "Dada eliminada<br>";

//consulta d'una dada simple
$instruccio = "select nom from estudiant where dni = '52222222B'";
$res = $conn->query($instruccio);
if ($conn->connect_errno != 0) //si error es finalitza
{
  die("No s'ha pogut consultar la dada<br>");
}
echo "Dada consultada<br>";
$fila = $res->fetch_assoc();
$camp = 'nom';
$dada = $fila['nom'];
echo $dada . "<br>";

//consulta de varies files de dades
$instruccio = "select nom, edat from estudiant";
$res = $conn->query($instruccio);
if ($res->num_rows > 0) {
  $fila = $res->fetch_assoc();
  while ($fila != null) {
    $nom = $fila['nom'];
    $edat = $fila['edat'];
    echo "Nom: " . $nom . " | edat: " . $edat . "<br>";
    $fila = $res->fetch_assoc();
  }
}

$conn->close();
