<?php
class Vendedor {
    private string $codigo; // FK a Persona
    private int $carnet;
    private string $direccion;

    public function __construct(string $codigo, int $carnet, string $direccion) {
        $this->codigo = $codigo;
        $this->carnet = $carnet;
        $this->direccion = $direccion;
    }

    // Métodos Getter
    public function getCodigo(): string {
        return $this->codigo;
    }

    public function getCarnet(): int {
        return $this->carnet;
    }

    public function getDireccion(): string {
        return $this->direccion;
    }

    // Métodos Setter
    public function setCodigo(string $codigo): void {
        $this->codigo = $codigo;
    }

    public function setCarnet(int $carnet): void {
        $this->carnet = $carnet;
    }

    public function setDireccion(string $direccion): void {
        $this->direccion = $direccion;
    }
}
?>
