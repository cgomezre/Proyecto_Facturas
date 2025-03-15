<?php
include_once 'conexion.php';
include_once '../Modelos/Factura.php';

class CtrFactura {
    private $conexion;
    private $objFactura;

    public function __construct(Factura $objFactura) {
        $this->conexion = Conexion::conectar();
        $this->objFactura = $objFactura;
    }

    // 🔹 **Validar Datos Antes de Insertar o Modificar**
    private function validarDatos() {
        if (empty($this->objFactura->getNumero()) || empty($this->objFactura->getFecha()) || empty($this->objFactura->getCodigoCliente()) || empty($this->objFactura->getCodigoVendedor()) || empty($this->objFactura->getCodigoEmpresa())) {
            throw new Exception("Error: Todos los campos son obligatorios.");
        }
        if ($this->objFactura->getTotal() < 0) {
            throw new Exception("Error: El total de la factura no puede ser negativo.");
        }
    }

    // 🔹 **Guardar Factura**
    public function guardar() {
        try {
            $this->validarDatos();
            $sql = "INSERT INTO Factura (numero, fecha, total, cliente_codigo, vendedor_codigo, empresa_codigo, persona_codigo) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("isdssss",
                $this->objFactura->getNumero(),
                $this->objFactura->getFecha(),
                $this->objFactura->getTotal(),
                $this->objFactura->getCodigoCliente(),
                $this->objFactura->getCodigoVendedor(),
                $this->objFactura->getCodigoEmpresa(),
                $this->objFactura->getCodigoPersona()
            );
            $stmt->execute();
            return "Factura guardada correctamente.";
        } catch (Exception $e) {
            return "Error al guardar factura: " . $e->getMessage();
        }
    }

    // 🔹 **Consultar Factura**
    public function consultar() {
        try {
            $sql = "SELECT * FROM Factura WHERE numero = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i", $this->objFactura->getNumero());
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($row = $resultado->fetch_assoc()) {
                $this->objFactura->setFecha($row['fecha']);
                $this->objFactura->setTotal($row['total']);
                $this->objFactura->setCodigoCliente($row['cliente_codigo']);
                $this->objFactura->setCodigoVendedor($row['vendedor_codigo']);
                $this->objFactura->setCodigoEmpresa($row['empresa_codigo']);
                $this->objFactura->setCodigoPersona($row['persona_codigo']);
            } else {
                throw new Exception("Factura no encontrada.");
            }
            return $this->objFactura;
        } catch (Exception $e) {
            return "Error al consultar factura: " . $e->getMessage();
        }
    }

    // 🔹 **Modificar Factura**
    public function modificar() {
        try {
            $this->validarDatos();
            $sql = "UPDATE Factura SET fecha = ?, total = ?, cliente_codigo = ?, vendedor_codigo = ?, empresa_codigo = ?, persona_codigo = ? WHERE numero = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("sdssssi",
                $this->objFactura->getFecha(),
                $this->objFactura->getTotal(),
                $this->objFactura->getCodigoCliente(),
                $this->objFactura->getCodigoVendedor(),
                $this->objFactura->getCodigoEmpresa(),
                $this->objFactura->getCodigoPersona(),
                $this->objFactura->getNumero()
            );
            $stmt->execute();
            return "Factura modificada correctamente.";
        } catch (Exception $e) {
            return "Error al modificar factura: " . $e->getMessage();
        }
    }

    // 🔹 **Eliminar Factura**
    public function borrar() {
        try {
            $sql = "DELETE FROM Factura WHERE numero = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i", $this->objFactura->getNumero());
            if (!$stmt->execute()) {
                throw new Exception("Error al eliminar la factura.");
            }
            return "Factura eliminada correctamente.";
        } catch (Exception $e) {
            return "Error al eliminar factura: " . $e->getMessage();
        }
    }
}
?>
