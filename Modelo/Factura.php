<?php
class Factura {
    private int $codigo;
    private string $fecha;
    private float $total;
    private string $codigoCliente; // FK a Cliente
    private string $codigoVendedor; // FK a Vendedor
    private string $codigoEmpresa; // FK a Empresa

    public function __construct(
        int $codigo,
        string $fecha,
        float $total,
        string $codigoCliente,
        string $codigoVendedor,
        string $codigoEmpresa
    ) {
        $this->codigo = $codigo;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->codigoCliente = $codigoCliente;
        $this->codigoVendedor = $codigoVendedor;
        $this->codigoEmpresa = $codigoEmpresa;
    }

    // Métodos Getter
    public function getCodigo(): int {
        return $this->codigo;
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

}
?>


