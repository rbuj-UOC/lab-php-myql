<?php
// Classe de CONTROLADORS que s'encarrega de la gestió
// acadèmica dels estudiants
include_once("TEstudiant.php");
include_once("TAssignatura.php");
include_once("TCursa.php");
class TControlAcad
{
    private $servidor;
    private $usuari;
    private $paraula_pas;
    private $nom_bd;
    function __construct()
    {
        $this->servidor = getenv("MYSQL_HOSTNAME");
        $this->usuari = "root";
        $this->paraula_pas = getenv("MYSQL_ROOT_PASSWORD");
        $this->nom_bd = "bdprova";
    }
    public function alta_estudiant($DNI, $nom, $edat)
    {
        $e = new TEstudiant(
            $DNI,
            $nom,
            $edat,
            $this->servidor,
            $this->usuari,
            $this->paraula_pas,
            $this->nom_bd
        );
        $res = $e->alta_estudiant();
        return $res;
    }
    public function baixa_estudiant($DNI)
    {
        $e = new TEstudiant(
            $DNI,
            '',
            0,
            $this->servidor,
            $this->usuari,
            $this->paraula_pas,
            $this->nom_bd
        );
        $res = $e->baixa_estudiant();
        return $res;
    }
    public function consulta_assignatura(
        $codi_assig,
        &$nom,
        &$credits
    ) {
        $a = new TAssignatura(
            $codi_assig,
            '',
            0,
            $this->servidor,
            $this->usuari,
            $this->paraula_pas,
            $this->nom_bd
        );
        $res = $a->consulta_assignatura($nom, $credits);
        return $res;
    }
    public function llistat_estudiant($codi_assig)
    {
        $a = new TAssignatura(
            $codi_assig,
            '',
            0,
            $this->servidor,
            $this->usuari,
            $this->paraula_pas,
            $this->nom_bd
        );
        $res = $a->llistat_estudiants();
        return $res;
    }
    public function assignar($DNI, $codi_assig)
    {
        $c = new TCursa(
            $DNI,
            $codi_assig,
            null,
            $this->servidor,
            $this->usuari,
            $this->paraula_pas,
            $this->nom_bd
        );
        $res = $c->assignar();
        return $res;
    }
    public function desassignar($DNI, $codi_assig)
    {
        $c = new TCursa(
            $DNI,
            $codi_assig,
            null,
            $this->servidor,
            $this->usuari,
            $this->paraula_pas,
            $this->nom_bd
        );
        $res = $c->desassignar();
        return $res;
    }
    public function posar_nota($DNI, $codi_assig, $nota)
    {
        $c = new TCursa(
            $DNI,
            $codi_assig,
            $this->servidor,
            $this->usuari,
            $this->paraula_pas,
            $this->nom_bd
        );
        $res = $c->posar_nota($nota);
        return $res;
    }
}
