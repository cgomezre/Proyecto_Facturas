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

    // Crear Persona
    public function guardar() {
        $sql = "INSERT INTO Persona (codigo, email, nombre, telefono) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssss", 
            $this->objPersona->getCodigo(), 
            $this->objPersona->getEmail(), 
            $this->objPersona->getNombre(), 
            $this->objPersona->getTelefono()
        );
        return $stmt->execute();
    }

    // Consultar Persona
    public function consultar() {
        $sql = "SELECT * FROM Persona WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $this->objPersona->getCodigo());
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($row = $resultado->fetch_assoc()) {
            $this->objPersona->setEmail($row['email']);
            $this->objPersona->setNombre($row['nombre']);
            $this->objPersona->setTelefono($row['telefono']);
        }
        return $this->objPersona;
    }

    // Modificar Persona
    public function modificar() {
        $sql = "UPDATE Persona SET email = ?, nombre = ?, telefono = ? WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssss", 
            $this->objPersona->getEmail(), 
            $this->objPersona->getNombre(), 
            $this->objPersona->getTelefono(), 
            $this->objPersona->getCodigo()
        );
        return $stmt->execute();
    }

    // Eliminar Persona
    public function borrar() {
        $sql = "DELETE FROM Persona WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $this->objPersona->getCodigo());
        return $stmt->execute();
    }
}
?>
