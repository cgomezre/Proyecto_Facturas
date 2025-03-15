<?php
include_once 'conexion.php';
include_once '../Modelos/Vendedor.php';

class CtrVendedor {
    private $conexion;
    private $objVendedor;

    public function __construct(Vendedor $objVendedor) {
        $this->conexion = Conexion::conectar();
        $this->objVendedor = $objVendedor;
    }

    // 🔹 **Guardar Vendedor**
    public function guardar() {
        try {
            if (empty($this->objVendedor->getCodigo()) || empty($this->objVendedor->getCarnet()) || empty($this->objVendedor->getDireccion())) {
                throw new Exception("Todos los campos son obligatorios.");
            }

            $sql = "INSERT INTO Vendedor (codigo, carnet, direccion) VALUES (?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("sis",
                $this->objVendedor->getCodigo(),
                $this->objVendedor->getCarnet(),
                $this->objVendedor->getDireccion()
            );
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al guardar vendedor: " . $e->getMessage();
        }
    }
}
?>

