<?php
include_once 'conexion.php';
include_once '../Modelo/ProductosPorFactura.php';

class CtrProductosPorFactura {
    private $conexion;
    private $objProductosPorFactura;

    public function __construct(ProductosPorFactura $objProductosPorFactura) {
        $this->conexion = Conexion::conectar();
        $this->objProductosPorFactura = $objProductosPorFactura;
    }

    // 🔹 **Validación antes de insertar**
    private function validarDatos() {
        if ($this->objProductosPorFactura->getCantidad() <= 0) {
            throw new Exception("Error: La cantidad debe ser mayor a 0.");
        }
        if ($this->objProductosPorFactura->getSubtotal() < 0) {
            throw new Exception("Error: El subtotal no puede ser negativo.");
        }
    }

    // 🔹 **Guardar Producto en Factura**
    public function guardar() {
        try {
            $this->validarDatos();
            $sql = "INSERT INTO ProductosPorFactura (factura_codigo, producto_codigo, cantidad, subtotal) VALUES (?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("isid", 
                $this->objProductosPorFactura->getfacturaCodigo(), 
                $this->objProductosPorFactura->getProductoCodigo(), 
                $this->objProductosPorFactura->getCantidad(), 
                $this->objProductosPorFactura->getSubtotal()
            );
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al agregar producto a factura: " . $e->getMessage();
        }
    }
}
?>

