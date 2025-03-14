<?php
class Factura {
    private int $numero;
    private string $fecha;
    private string $codigoCliente; // FK a Cliente
    private float $total;

    public function __construct(int $numero, string $fecha, string $codigoCliente, float $total = 0.0) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->codigoCliente = $codigoCliente;
        $this->total = $total;
    }

    // Métodos Getter
    public function getNumero(): int {
        return $this->numero;
    }

    public function getFecha(): string {
        return $this->fecha;
    }

    public function getCodigoCliente(): string {
        return $this->codigoCliente;
    }

    public function getTotal(): float {
        return $this->total;
    }

    // Métodos Setter
    public function setFecha(string $fecha): void {
        $this->fecha = $fecha;
    }

    public function setCodigoCliente(string $codigoCliente): void {
        $this->codigoCliente = $codigoCliente;
    }

    public function setTotal(float $total): void {
        $this->total = $total;
    }
}
?>
