<?php

require_once __DIR__ . '/../Control/Conexion.php';
include_once __DIR__ . '/../Modelo/Persona.php'; 



class CtrPersona {
    private $conexion;
    private $objPersona;

    public function __construct(Persona $objPersona) {
        $this->conexion = Conexion::conectar();
        $this->objPersona = $objPersona;
    }

    // 🔹 **Guardar Persona**
    public function guardar() {
        try {
            if (empty($this->objPersona->getCodigo()) || empty($this->objPersona->getNombre())) {
                throw new Exception("El código y el nombre son obligatorios.");
            }

            $sql = "INSERT INTO Persona (codigo, email, nombre, telefono) VALUES (?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ssss",
                $this->objPersona->getCodigo(),
                $this->objPersona->getEmail(),
                $this->objPersona->getNombre(),
                $this->objPersona->getTelefono()
            );
            $stmt->execute();
            return "Persona guardada correctamente.";
        } catch (Exception $e) {
            return "Error al guardar persona: " . $e->getMessage();
        }
    }

    // 🔹 **Consultar Persona**
    public function consultar() {
        try {
            $sql = "SELECT * FROM Persona WHERE codigo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $this->objPersona->getCodigo());
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($row = $resultado->fetch_assoc()) {
                $this->objPersona->setEmail($row['email']);
                $this->objPersona->setNombre($row['nombre']);
                $this->objPersona->setTelefono($row['telefono']);
            } else {
                throw new Exception("Persona no encontrada.");
            }
            return $this->objPersona;
        } catch (Exception $e) {
            return "Error al consultar persona: " . $e->getMessage();
        }
    }

    // 🔹 **Modificar Persona**
    public function modificar() {
        try {
            $sql = "UPDATE Persona SET email = ?, nombre = ?, telefono = ? WHERE codigo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ssss", 
                $this->objPersona->getEmail(),
                $this->objPersona->getNombre(),
                $this->objPersona->getTelefono(),
                $this->objPersona->getCodigo()
            );
            $stmt->execute();
            return "Persona modificada correctamente.";
        } catch (Exception $e) {
            return "Error al modificar persona: " . $e->getMessage();
        }
    }

    // 🔹 **Eliminar Persona**
    public function borrar() {
        try {
            $sql = "DELETE FROM Persona WHERE codigo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $this->objPersona->getCodigo());
            if (!$stmt->execute()) {
                throw new Exception("Error al eliminar la persona.");
            }
            return "Persona eliminada correctamente.";
        } catch (Exception $e) {
            return "Error al eliminar persona: " . $e->getMessage();
        }
    }
}
?>

