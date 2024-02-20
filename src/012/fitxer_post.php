<?php

header("Content-Type: text/html; charset=utf9");
// codi PHP que rep les dades via POST del formulari
$DNI = '';
$nom = '';
$pass = '';
$comentaris = '';
$assignatures = [];
if (isset($_POST['DNI'])) $DNI = $_POST['DNI'];
if (isset($_POST['nom'])) $nom = $_POST['nom'];
if (isset($_POST['password'])) $pass = $_POST['password'];
if (isset($_POST['comentaris'])) $comentaris = $_POST['comentaris'];
if (isset($_POST['assignatures'])) $assignatures = $_POST['assignatures'];
echo 'DNI: ' . $DNI . '<br>';
echo 'Nom: ' . $nom . '<br>';
echo 'Password: ' . $pass . '<br>';
echo 'Comentaris: ' . $comentaris . '<br>';
echo 'Assignatures: ';
foreach ($assignatures as $assignatura) echo $assignatura;
