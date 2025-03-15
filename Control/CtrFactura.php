<?php
include_once 'conexion.php';
include_once '../Modelos/Factura.php';

class CtrFactura {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    // Crear Factura
    public function agregarFactura(Factura $factura) {
        $sql = "INSERT INTO Factura (numero, fecha, total, cliente_codigo, vendedor_codigo, empresa_codigo, persona_codigo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("isdssss",
            $factura->getNumero(),
            $factura->getFecha(),
            $factura->getTotal(),
            $factura->getCodigoCliente(),
            $factura->getCodigoVendedor(),
            $factura->getCodigoEmpresa(),
            $factura->getCodigoPersona()
        );
        return $stmt->execute();
    }

    // Obtener Facturas
    public function obtenerFacturas() {
        $sql = "SELECT * FROM Factura";
        $resultado = $this->conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
?>
