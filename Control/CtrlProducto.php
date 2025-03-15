<?php
include_once 'conexion.php';
include_once '../Modelos/Producto.php';

class CtrProducto {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    // Agregar Producto
    public function agregarProducto(Producto $producto) {
        $sql = "INSERT INTO Producto (codigo, nombre, stock, valorUnitario) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssdi", $producto->getCodigo(), $producto->getNombre(), $producto->getStock(), $producto->getValorUnitario());
        return $stmt->execute();
    }

    // Obtener todos los productos
    public function obtenerProductos() {
        $sql = "SELECT * FROM Producto";
        $resultado = $this->conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Actualizar Stock
    public function actualizarStock($codigo, $nuevoStock) {
        $sql = "UPDATE Producto SET stock = ? WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("is", $nuevoStock, $codigo);
        return $stmt->execute();
    }
}
?>
