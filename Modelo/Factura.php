<?php
class Factura {
    private int $numero;
    private string $fecha;
    private float $total;
    private string $codigoCliente; // FK a Cliente
    private string $codigoVendedor; // FK a Vendedor
    private string $codigoEmpresa; // FK a Empresa
    private string $codigoPersona; // FK a Persona

    public function __construct(
        int $numero,
        string $fecha,
        float $total,
        string $codigoCliente,
        string $codigoVendedor,
        string $codigoEmpresa,
        string $codigoPersona
    ) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->codigoCliente = $codigoCliente;
        $this->codigoVendedor = $codigoVendedor;
        $this->codigoEmpresa = $codigoEmpresa;
        $this->codigoPersona = $codigoPersona;
    }

    // Métodos Getter
    public function getNumero(): int {
        return $this->numero;
    }

    public function getFecha(): string {
        return $this->fecha;
    }

    public function getTotal(): float {
        return $this->total;
    }

    public function getCodigoCliente(): string {
        return $this->codigoCliente;
    }

    public function getCodigoVendedor(): string {
        return $this->codigoVendedor;
    }

    public function getCodigoEmpresa(): string {
        return $this->codigoEmpresa;
    }

    public function getCodigoPersona(): string {
        return $this->codigoPersona;
    }

    // Métodos Setter
    public function setFecha(string $fecha): void {
        $this->fecha = $fecha;
    }

    public function setTotal(float $total): void {
        $this->total = $total;
    }

    public function setCodigoCliente(string $codigoCliente): void {
        $this->codigoCliente = $codigoCliente;
    }

    public function setCodigoVendedor(string $codigoVendedor): void {
        $this->codigoVendedor = $codigoVendedor;
    }

    public function setCodigoEmpresa(string $codigoEmpresa): void {
        $this->codigoEmpresa = $codigoEmpresa;
    }

    public function setCodigoPersona(string $codigoPersona): void {
        $this->codigoPersona = $codigoPersona;
    }
}
?>


