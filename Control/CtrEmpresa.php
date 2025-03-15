<?php
include_once 'conexion.php';
include_once '../Modelo/Empresa.php';

class CtrEmpresa {
    private $conexion;
    private $objEmpresa;

    public function __construct(Empresa $objEmpresa) {
        $this->conexion = Conexion::conectar();
        $this->objEmpresa = $objEmpresa;
    }

    // 🔹 **Guardar Empresa**
    public function guardar() {
        try {
            if (empty($this->objEmpresa->getCodigo()) || empty($this->objEmpresa->getNombre())) {
                throw new Exception("Código y nombre son obligatorios.");
            }

            $sql = "INSERT INTO Empresa (codigo, nombre) VALUES (?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ss",
                $this->objEmpresa->getCodigo(),
                $this->objEmpresa->getNombre()
            );
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al guardar empresa: " . $e->getMessage();
        }
    }
}
?>

