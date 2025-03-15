<?php
class ProductosPorFactura {
    private int $codigo;
    private string $facturaCodigo; // FK a Factura
    private string $productoCodigo; // FK a Producto
    private int $cantidad;
    private float $subtotal;

    public function __construct(string $facturaCodigo, string $productoCodigo, int $cantidad, float $subtotal) {
        $this->facturaCodigo = $facturaCodigo;
        $this->productoCodigo = $productoCodigo;
        
        $this->cantidad = $cantidad;
        $this->subtotal = $subtotal;
    }

    // Métodos Getter
    public function getCodigo(): int {
        return $this->codigo;
    }

    public function getfacturaCodigo(): string {
        return $this->facturaCodigo;
    }

    public function getProductoCodigo(): string {
        return $this->productoCodigo;
    }

    public function getCantidad(): int {
        return $this->cantidad;
    }

    public function getSubtotal(): float {
        return $this->subtotal;
    }

    // Métodos Setter
    public function setfacturaCodigo(string $facturaCodigo): void {
        $this->facturaCodigo = $facturaCodigo;
    }

    public function setProductoCodigo(string $productoCodigo): void {
        $this->productoCodigo = $productoCodigo;
    }

    public function setCantidad(int $cantidad): void {
        $this->cantidad = $cantidad;
    }

    public function setSubtotal(float $subtotal): void {
        $this->subtotal = $subtotal;
    }
}
?>
