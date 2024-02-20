<?php
class TCursa
{
    private $DNI;
    private $codi_assig;
    private $nota;

    function __construct($v_dni, $v_codi_assig)
    {
        $this->DNI = $v_dni;
        $this->codi_assig = $v_codi_assig;
        $this->nota = NULL;
    }
    public function existeix_assignacio()
    {
        $res = false;
        return $res;
    }
    public function assignar()
    {
        $res = false;
        return $res;
    }
    public function desassignar()
    {
        $res = false;
        return $res;
    }
    public function posar_nota($v_nota)
    {
        $res = false;
        return $res;
    }
}