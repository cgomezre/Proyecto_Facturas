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

    // Crear Vendedor
    public function guardar() {
        $sql = "INSERT INTO Vendedor (codigo, carnet, direccion) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sis", 
            $this->objVendedor->getCodigo(), 
            $this->objVendedor->getCarnet(), 
            $this->objVendedor->getDireccion()
        );
        return $stmt->execute();
    }

    // Consultar Vendedor
    public function consultar() {
        $sql = "SELECT * FROM Vendedor WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $this->objVendedor->getCodigo());
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($row = $resultado->fetch_assoc()) {
            $this->objVendedor->setCarnet($row['carnet']);
            $this->objVendedor->setDireccion($row['direccion']);
        }
        return $this->objVendedor;
    }

    // Modificar Vendedor
    public function modificar() {
        $sql = "UPDATE Vendedor SET carnet = ?, direccion = ? WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("iss", 
            $this->objVendedor->getCarnet(), 
            $this->objVendedor->getDireccion(), 
            $this->objVendedor->getCodigo()
        );
        return $stmt->execute();
    }

    // Eliminar Vendedor
    public function borrar() {
        $sql = "DELETE FROM Vendedor WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $this->objVendedor->getCodigo());
        return $stmt->execute();
    }
}
?>
