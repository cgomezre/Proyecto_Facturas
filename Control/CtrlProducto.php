<?php
include_once 'conexion.php';
include_once '../Modelos/Producto.php';

class CtrProducto {
    private $conexion;
    private $objProducto;

    public function __construct(Producto $objProducto) {
        $this->conexion = Conexion::conectar();
        $this->objProducto = $objProducto;
    }

    // 🔹 **Validación de Datos**
    private function validarDatos() {
        if (empty($this->objProducto->getCodigo()) || empty($this->objProducto->getNombre()) || $this->objProducto->getStock() < 0 || $this->objProducto->getValorUnitario() < 0) {
            throw new Exception("Error: Datos inválidos. Verifique stock y precio.");
        }
    }

    // 🔹 **Guardar Producto**
    public function guardar() {
        try {
            $this->validarDatos();
            $sql = "INSERT INTO Producto (codigo, nombre, stock, valorUnitario) VALUES (?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ssdi", 
                $this->objProducto->getCodigo(), 
                $this->objProducto->getNombre(), 
                $this->objProducto->getStock(), 
                $this->objProducto->getValorUnitario()
            );
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al guardar producto: " . $e->getMessage();
        }
    }

    // 🔹 **Actualizar Stock con Validación**
    public function actualizarStock($nuevoStock) {
        try {
            if ($nuevoStock < 0) {
                throw new Exception("El stock no puede ser negativo.");
            }
            $sql = "UPDATE Producto SET stock = ? WHERE codigo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("is", $nuevoStock, $this->objProducto->getCodigo());
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al actualizar stock: " . $e->getMessage();
        }
    }
}
?>

