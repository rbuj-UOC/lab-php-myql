<?php
class TComptador
{
    protected $valor;
    protected $maxim;
    function __construct($max)
    {
        echo "<br> Creant TComptador <br>";
        if ($max < 0) {
            $this->maxim = 0;
        } else {
            $this->maxim = $max;
        }
        $this->valor = 0;
    }
    public function incrementa()
    {
        if ($this->valor < $this->maxim) {
            $this->valor = $this->valor + 1;
        }
    }
    public function consulta()
    {
        return $this->valor;
    }
    public function fi()
    {
        return ($this->valor == $this->maxim);
    }
    public function inicialitza()
    {
        $this->valor = 0;
    }
    function __destruct()
    {
        echo "<br> destruint TComptador <br>";
    }
}

class TComptaSalt extends TComptador
{
    private $salt;
    public function posar_salt($increment)
    {
        if ($increment <= 0) {
            $this->salt = 1;
        } else {
            $this->salt = $increment;
        }
    }
    public function incrementa()
    {
        if ($this->valor + $this->salt < $this->maxim) {
            $this->valor = $this->valor + $this->salt;
        } else {
            $this->valor = $this->maxim;
        }
    }
}
