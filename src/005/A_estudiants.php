<?php
// codi associat a la pàgina HTML d'entrada de dades de l'alta d'estudiant
include_once("TGestioEst.php");
$g_e = new TGestioEst($_POST['DNI'], $_POST['nom'], $_POST['edat']);
if ($g_e->alta_estudiant()) {
    echo "Alta realitzada correctament";
} else {
    echo "Error en realitzar l'alta";
}
