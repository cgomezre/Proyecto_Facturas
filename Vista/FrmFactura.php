<?php
include_once '../Control/CtrFactura.php';
include_once '../Modelos/Factura.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $fecha = $_POST["fecha"];
    $total = $_POST["total"];
    $codigoCliente = $_POST["codigoCliente"];
    $codigoVendedor = $_POST["codigoVendedor"];
    $codigoEmpresa = $_POST["codigoEmpresa"];
    $codigoPersona = $_POST["codigoPersona"];
    $accion = $_POST["accion"];

    $factura = new Factura($numero, $fecha, $total, $codigoCliente, $codigoVendedor, $codigoEmpresa, $codigoPersona);
    $ctrFactura = new CtrFactura($factura);

    switch ($accion) {
        case "Guardar":
            echo $ctrFactura->guardar();
            break;
        case "Consultar":
            print_r($ctrFactura->consultar());
            break;
        case "Modificar":
            echo $ctrFactura->modificar();
            break;
        case "Eliminar":
            echo $ctrFactura->borrar();
            break;
    }
}
?>

<form method="post">
    Número: <input type="number" name="numero" required>
    Fecha: <input type="date" name="fecha">
    Total: <input type="number" name="total" step="0.01">
    Cliente: <input type="text" name="codigoCliente">
    Vendedor: <input type="text" name="codigoVendedor">
    Empresa: <input type="text" name="codigoEmpresa">
    Persona: <input type="text" name="codigoPersona">
    <button type="submit" name="accion" value="Guardar">Guardar</button>
    <button type="submit" name="accion" value="Consultar">Consultar</button>
    <button type="submit" name="accion" value="Modificar">Modificar</button>
    <button type="submit" name="accion" value="Eliminar">Eliminar</button>
</form>
