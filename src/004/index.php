<?php
include_once("TComptador.php");
$i = new TComptador(4);
while (!($i->fi())) {
    echo "i = " . $i->consulta() . "<br>";
    $i->incrementa();
}
$s = new TComptaSalt(10);
$s->posar_salt(3);
while (!($s->fi())) {
    echo "s = " . $s->consulta() . "<br>";
    $s->incrementa();
}
