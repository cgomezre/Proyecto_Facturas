<?php
include_once 'conexion.php';
include_once '../Modelo/Vendedor.php';

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
            if (empty($this->objVendedor->getCodigo()) || empty($this->objVendedor->getCarnet()) || empty($this->objVendedor->getDireccion()) || empty($this->objVendedor->getPersonaCodigo())) {
                throw new Exception("Todos los campos son obligatorios.");
            }

            $sql = "INSERT INTO Vendedor (codigo, carnet, direccion, persona_codigo) VALUES (?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("siss",
                $this->objVendedor->getCodigo(),
                $this->objVendedor->getCarnet(),
                $this->objVendedor->getDireccion(),
                $this->objVendedor->getPersonaCodigo()
            );
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al guardar vendedor: " . $e->getMessage();
        }
    }

    // 🔹 **Consultar Vendedor**
    public function consultar() {
        try {
            $sql = "SELECT * FROM Vendedor WHERE codigo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $this->objVendedor->getCodigo());
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($row = $resultado->fetch_assoc()) {
                $this->objVendedor->setCarnet($row['carnet']);
                $this->objVendedor->setDireccion($row['direccion']);
                $this->objVendedor->setPersonaCodigo($row['persona_codigo']);
            } else {
                throw new Exception("Vendedor no encontrado.");
            }
            return $this->objVendedor;
        } catch (Exception $e) {
            return "Error al consultar vendedor: " . $e->getMessage();
        }
    }

    // 🔹 **Modificar Vendedor**
    public function modificar() {
        try {
            if (empty($this->objVendedor->getCarnet()) || empty($this->objVendedor->getDireccion())) {
                throw new Exception("Carnet y dirección son obligatorios.");
            }

            $sql = "UPDATE Vendedor SET carnet = ?, direccion = ?, persona_codigo = ? WHERE codigo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("isss", 
                $this->objVendedor->getCarnet(),
                $this->objVendedor->getDireccion(),
                $this->objVendedor->getPersonaCodigo(),
                $this->objVendedor->getCodigo()
            );
            $stmt->execute();
            return "Vendedor modificado correctamente.";
        } catch (Exception $e) {
            return "Error al modificar vendedor: " . $e->getMessage();
        }
    }

    // 🔹 **Eliminar Vendedor**
    public function borrar() {
        try {
            $sql = "DELETE FROM Vendedor WHERE codigo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $this->objVendedor->getCodigo());
            if (!$stmt->execute()) {
                throw new Exception("Error al eliminar el vendedor.");
            }
            return "Vendedor eliminado correctamente.";
        } catch (Exception $e) {
            return "Error al eliminar vendedor: " . $e->getMessage();
        }
    }
}
?>

