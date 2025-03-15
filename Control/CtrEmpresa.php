<?php
include_once 'conexion.php';
include_once '../Modelos/Empresa.php';

class CtrEmpresa {
    private $conexion;
    private $objEmpresa;

    public function __construct(Empresa $objEmpresa) {
        $this->conexion = Conexion::conectar();
        $this->objEmpresa = $objEmpresa;
    }

    // Crear Empresa
    public function guardar() {
        $sql = "INSERT INTO Empresa (codigo, nombre) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss", 
            $this->objEmpresa->getCodigo(), 
            $this->objEmpresa->getNombre()
        );
        return $stmt->execute();
    }

    // Consultar Empresa
    public function consultar() {
        $sql = "SELECT * FROM Empresa WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $this->objEmpresa->getCodigo());
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($row = $resultado->fetch_assoc()) {
            $this->objEmpresa->setNombre($row['nombre']);
        }
        return $this->objEmpresa;
    }

    // Modificar Empresa
    public function modificar() {
        $sql = "UPDATE Empresa SET nombre = ? WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss", 
            $this->objEmpresa->getNombre(), 
            $this->objEmpresa->getCodigo()
        );
        return $stmt->execute();
    }

    // Eliminar Empresa
    public function borrar() {
        $sql = "DELETE FROM Empresa WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $this->objEmpresa->getCodigo());
        return $stmt->execute();
    }
}
?>
