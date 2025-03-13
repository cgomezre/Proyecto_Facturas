<?php
class Producto{
    var $codigo;
    var $nombre;
    int $stock;
    double $valorUnitario;

    function __construct($codigo, $nombre, $stock, $valorUnitario){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->valorUnitario = $valorUnitario;
    }

    function setcodigo($codigo){
        $this->codigo = $codigo;
    }

    function getCodigo(){
        return $this->codigo;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getNombre(){
    return $this->nombre;
    }

    function setStock($stock){
        $this->stock = $stock;
    }

    function getStock(){
    return $this->stock;
    }

    function setValorUnitario($valorUnitario){
        $this->valorUnitario = $valorUnitario;
    }

    function getValorUnitario(){
    return $this->stock;
    }
}

?>
