<?php
//definició de variables
$num1 = 8;
$num2 = 2;
$res = 0;
//Mostra el resultat d'una operació
echo "8 + 2 = ";
echo 8 + 2;
echo "<br>";
//mostra el resultat d'una operació amb valors guardats a variables
$res = $num1 + $num2;
echo "8 + 2 = ";
echo $res;
//mostra un salt de línia
echo "<br>";
//mostra una combinació de lletres i números. Per a concatenar es fa servir '.'
echo "Resultat = " . $res;
//mostra una combinació de lletres i números d'una altre manera, amb la instrucció 'printf'
printf("<br> Resultat = %d <br>", $res);
echo "FIN";
