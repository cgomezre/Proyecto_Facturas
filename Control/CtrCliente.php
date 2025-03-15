<?php
include_once 'conexion.php';
include_once '../Modelos/Cliente.php';

class CtrCliente {
    private $conexion;
    private $objCliente;

    public function __construct(Cliente $objCliente) {
        $this->conexion = Conexion::conectar();
        $this->objCliente = $objCliente;
    }

    // 🔹 **Validación antes de Insertar**
    private function validarDatos() {
        if (empty($this->objCliente->getCodigo()) || empty($this->objCliente->getCredito())) {
            throw new Exception("Error: Código y Crédito son obligatorios.");
        }
        if ($this->objCliente->getCredito() < 0) {
            throw new Exception("Error: El crédito no puede ser negativo.");
        }
    }

    // 🔹 **Guardar Cliente**
    public function guardar() {
        try {
            $this->validarDatos();
            $sql = "INSERT INTO Cliente (codigo, credito) VALUES (?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("sd", $this->objCliente->getCodigo(), $this->objCliente->getCredito());
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al guardar cliente: " . $e->getMessage();
        }
    }

    // 🔹 **Consultar Cliente**
    public function consultar() {
        try {
            $sql = "SELECT * FROM Cliente WHERE codigo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $this->objCliente->getCodigo());
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($row = $resultado->fetch_assoc()) {
                $this->objCliente->setCredito($row['credito']);
            } else {
                throw new Exception("Cliente no encontrado.");
            }
            return $this->objCliente;
        } catch (Exception $e) {
            return "Error al consultar cliente: " . $e->getMessage();
        }
    }

    // 🔹 **Eliminar Cliente con Validación**
    public function borrar() {
        try {
            $sql = "DELETE FROM Cliente WHERE codigo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $this->objCliente->getCodigo());
            if (!$stmt->execute()) {
                throw new Exception("Error al eliminar el cliente.");
            }
            return true;
        } catch (Exception $e) {
            return "Error al eliminar cliente: " . $e->getMessage();
        }
    }
}
?>

