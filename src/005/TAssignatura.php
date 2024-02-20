<?php
include_once("TAccesBD.php");
class TAssignatura
{
    private $codi;
    private $nom;
    private $credits;
    private $abd;
    function __construct(
        $v_codi,
        $v_nom,
        $v_credits,
        $servidor,
        $usuari,
        $paraula_pas,
        $nom_bd
    ) {
        $this->codi = $v_codi;
        $this->nom = $v_nom;
        $this->credits = $v_credits;
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
    public function existeix_assignatura()
    {
        $res = false;
        if ($this->abd->consulta_SQL("select count(*) as quants from assignatura where codi = '" .
            $this->abd->escapar_dada($this->codi) . "'")) {
            if ($this->abd->consulta_fila()) {
                $res = ($this->abd->consulta_dada('quants') > 0);
            }
        }
        return $res;
    }
    public function consulta_assignatura(&$v_nom, &$v_credits)
    {
        $res = false;
        if ($this->existeix_assignatura()) {
            if ($this->abd->consulta_SQL("select nom, credits from assignatura where codi = '" .
                $this->abd->escapar_dada($this->codi) . "'")) {
                if ($this->abd->consulta_fila()) {
                    $v_nom = $this->abd->consulta_dada('nom');
                    $v_credits = $this->abd->consulta_dada('credits');
                    $res = true;
                }
            }
        }
        return $res;
    }
    public function llistat_estudiants()
    {
        $res = false;
        // Es comprova si existeix l'assignatura
        if ($this->abd->consulta_SQL("select count(*) as quants from cursa where codi_assig = '" .
            $this->abd->escapar_dada($this->codi) . "'")) {
            if ($this->abd->consulta_fila()) {
                if ($this->abd->consulta_dada('quants') != 0) {
                    // Existeix l'assignatura i te alumnes-> fem el llistat
                    $res = true;
                    echo "<br><br>LLISTAT D'ALUMNES DE L'ASSIGNATURA AMB CODI " . $this->codi;
                    echo "<br> -------------------------------------------------";
                    if ($this->abd->consulta_SQL("SELECT E.DNI, E.NOM as nom_est, A.NOM as nom_as, A.CREDITS, C.NOTA " .
                        "FROM (ESTUDIANT E INNER JOIN CURSA C ON E.DNI = C.DNI) " .
                        "INNER JOIN ASSIGNATURA A ON C.CODI_ASSIG = A.CODI WHERE A.CODI = '" .
                        $this->abd->escapar_dada($this->codi) . "'")) {
                        $fila = $this->abd->consulta_fila();
                        while ($fila != null) {
                            echo "<br>-----------------------";
                            echo "<br>DNI:         " . $this->abd->consulta_dada('DNI');
                            echo "<br>NOM:         " . $this->abd->consulta_dada('nom_est');
                            echo "<br>Assignatura: " . $this->abd->consulta_dada('nom_as');
                            echo "<br>Credits:     " . $this->abd->consulta_dada('CREDITS');
                            echo "<br>Nota:        " . $this->abd->consulta_dada('NOTA');
                            echo "<br>";
                            $fila = $this->abd->consulta_fila();
                        }
                        $quants = $this->abd->files_afectades();
                        echo "<br> ------------------------------------------------------------------------------";
                        echo "<br> TOTAL ESTUDIANTS DE L'ASSIGNATURA = " . $quants . "<br>";
                    }
                    $this->abd->tancar_consulta();
                }
            }
        }
        return $res;
    }
}
