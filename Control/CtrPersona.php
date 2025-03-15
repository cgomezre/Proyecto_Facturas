<?php
include_once 'conexion.php';
include_once '../Modelos/Persona.php';

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
            return true;
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
}
?>

