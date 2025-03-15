<?php
include_once 'conexion.php';
include_once '../Modelos/Cliente.php';

class CtrCliente {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    // Crear Cliente
    public function agregarCliente(Cliente $cliente) {
        $sql = "INSERT INTO Cliente (codigo, credito) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sd", $cliente->getCodigo(), $cliente->getCredito());
        return $stmt->execute();
    }

    // Obtener todos los clientes
    public function obtenerClientes() {
        $sql = "SELECT * FROM Cliente";
        $resultado = $this->conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Obtener un cliente por código
    public function obtenerClientePorCodigo($codigo) {
        $sql = "SELECT * FROM Cliente WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $codigo);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Actualizar Cliente
    public function actualizarCliente(Cliente $cliente) {
        $sql = "UPDATE Cliente SET credito = ? WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ds", $cliente->getCredito(), $cliente->getCodigo());
        return $stmt->execute();
    }

    // Eliminar Cliente
    public function eliminarCliente($codigo) {
        $sql = "DELETE FROM Cliente WHERE codigo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $codigo);
        return $stmt->execute();
    }
}
?>
