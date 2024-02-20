<?php
// Classe de MODEL encarregada de la gestió de la taula ESTUDIANT de la base de dades
include_once("TAccesBD.php");
class TEstudiant
{
    private $DNI;
    private $nom;
    private $edat;
    private $abd;
    function __construct($v_dni, $v_nom, $v_edat, $servidor, $usuari, $paraula_pas, $nom_bd)
    {
        $this->DNI = $v_dni;
        $this->nom = $v_nom;
        $this->edat = $v_edat;
        $var_abd = new TAccesBD($servidor, $usuari, $paraula_pas, $nom_bd);
        $this->abd = $var_abd;
        $this->abd->connectar_BD();
    }
    function __destruct()
    {
        if (isset($this->abd)) {
            unset($this->abd);
        }
    }
    public function existeix_estudiant()
    {
        $res = false;
        if ($this->abd->consulta_SQL("select count(*) as quants from estudiant where DNI = '" .
            $this->abd->escapar_dada($this->DNI) . "'")) {
            if ($this->abd->consulta_fila()) {
                $res = ($this->abd->consulta_dada('quants') > 0);
            }
        }
        return $res;
    }
    public function alta_estudiant()
    {
        $res = false;
        // Es comprova que l'estudiant no està ja a la base de dades
        if (!($this->existeix_estudiant())) {   // si efectivament no hi és, s'insereix
            if ($this->abd->consulta_SQL("insert into estudiant values ('" .
                $this->abd->escapar_dada($this->DNI) . "','" .
                $this->abd->escapar_dada($this->nom) . "'," .
                $this->abd->escapar_dada($this->edat) . ")")) {
                $res = true;
            }
        }
        return $res;
    }
    public function baixa_estudiant()
    {
        $res = false;
        if ($this->existeix_estudiant()) {
            // Es comprova que l'estudiant no te cap assignatura assignada
            if ($this->abd->consulta_SQL("select count(*) as quants from cursa where DNI = '" .
                $this->abd->escapar_dada($this->DNI) . "'")) {
                if ($this->abd->consulta_fila()) {
                    if ($this->abd->consulta_dada('quants') == 0) {
                        // l'estudiant no te assignatures, l'eliminem
                        if ($this->abd->consulta_SQL("delete from estudiant where DNI = '" .
                            $this->abd->escapar_dada($this->DNI) . "'")); {
                            $res = true;
                        }
                    }
                }
            }
        }
        return $res;
    }
}
