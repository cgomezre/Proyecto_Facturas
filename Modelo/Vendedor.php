<?php
class Vendedor {
    private string $codigo; // FK a Persona
    private int $carnet;
    private string $direccion;

    public function __construct(string $codigo, int $carnet, string $direccion, string $persona_codigo) {
        $this->codigo = $codigo;
        $this->carnet = $carnet;
        $this->direccion = $direccion;
        $this->persona_codigo = $persona_codigo;
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

    public function getPersonaCodigo(): string {
        return $this->persona_codigo;
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

    public function setPersonaCodigo(string $persona_codigo): void {
        $this->persona_codigo = $persona_codigo;
    }
}
?>
