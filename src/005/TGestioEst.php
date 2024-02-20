<?php
// Classe de VISTA de gestió d'estudiants
// Pot fer alta i baixa d'estudiants
include_once("TControlAcad.php");
class TGestioEst
{
    private $DNI;
    private $nom;
    private $edat;
    function __construct($v_dni, $v_nom, $v_edat)
    {
        $this->DNI = $v_dni;
        $this->nom = $v_nom;
        $this->edat = $v_edat;
    }
    public function alta_estudiant()
    {
        $c = new TControlAcad();
        $res = $c->alta_estudiant($this->DNI, $this->nom, $this->edat);
        return $res;
    }
    public function baixa_estudiant()
    {
        $c = new TControlAcad();
        $res = $c->baixa_estudiant($this->DNI);
        return $res;
    }
}