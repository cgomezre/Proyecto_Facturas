<?php
include_once 'conexion.php';
include_once '../Modelos/ProductosPorFactura.php';

class CtrProductosPorFactura {
    private $conexion;
    private $objProductosPorFactura;

    public function __construct(ProductosPorFactura $objProductosPorFactura) {
        $this->conexion = Conexion::conectar();
        $this->objProductosPorFactura = $objProductosPorFactura;
    }

    // 🔹 **Agregar Producto a una Factura**
    public function guardar() {
        $sql = "INSERT INTO ProductosPorFactura (factura_numero, producto_codigo, cantidad, subtotal) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("isid", 
            $this->objProductosPorFactura->getFacturaNumero(), 
            $this->objProductosPorFactura->getProductoCodigo(), 
            $this->objProductosPorFactura->getCantidad(), 
            $this->objProductosPorFactura->getSubtotal()
        );
        return $stmt->execute();
    }

    // 🔹 **Obtener Productos de una Factura**
    public function obtenerPorFactura($facturaNumero) {
        $sql = "SELECT * FROM ProductosPorFactura WHERE factura_numero = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $facturaNumero);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // 🔹 **Actualizar Cantidad de Producto en una Factura**
    public function actualizarCantidad($facturaNumero, $productoCodigo, $nuevaCantidad, $nuevoSubtotal) {
        $sql = "UPDATE ProductosPorFactura SET cantidad = ?, subtotal = ? WHERE factura_numero = ? AND producto_codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("idis", $nuevaCantidad, $nuevoSubtotal, $facturaNumero, $productoCodigo);
        return $stmt->execute();
    }

    // 🔹 **Eliminar Producto de una Factura**
    public function borrar($facturaNumero, $productoCodigo) {
        $sql = "DELETE FROM ProductosPorFactura WHERE factura_numero = ? AND producto_codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("is", $facturaNumero, $productoCodigo);
        return $stmt->execute();
    }
}
?>
