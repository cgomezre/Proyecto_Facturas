<?php
class ProductosPorFactura {
    private int $id;
    private string $facturaNumero; // FK a Factura
    private string $productoCodigo; // FK a Producto
    private int $cantidad;
    private float $subtotal;

    public function __construct(string $facturaNumero, string $productoCodigo, int $cantidad, float $subtotal) {
        $this->facturaNumero = $facturaNumero;
        $this->productoCodigo = $productoCodigo;
        
        $this->cantidad = $cantidad;
        $this->subtotal = $subtotal;
    }

    // Métodos Getter
    public function getId(): int {
        return $this->id;
    }

    public function getFacturaNumero(): string {
        return $this->facturaNumero;
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
    public function setFacturaNumero(string $facturaNumero): void {
        $this->facturaNumero = $facturaNumero;
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
