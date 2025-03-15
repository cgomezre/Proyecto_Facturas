<?php
include_once '../Control/CtrFactura.php';
include_once '../Modelo/Factura.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $fecha = $_POST["fecha"];
    $total = $_POST["total"];
    $codigoCliente = $_POST["codigoCliente"];
    $codigoVendedor = $_POST["codigoVendedor"];
    $codigoEmpresa = $_POST["codigoEmpresa"];
    $accion = $_POST["accion"];

    $factura = new Factura($codigo, $fecha, $total, $codigoCliente, $codigoVendedor, $codigoEmpresa);
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
    Número: <input type="number" name="codigo" required>
    Fecha: <input type="date" name="fecha">
    Total: <input type="number" name="total" step="0.01">
    Codigo Cliente: <input type="text" name="codigoCliente">
    Codigo Vendedor: <input type="text" name="codigoVendedor">
    Codigo Empresa: <input type="text" name="codigoEmpresa">
    <button type="submit" name="accion" value="Guardar">Guardar</button>
    <button type="submit" name="accion" value="Consultar">Consultar</button>
    <button type="submit" name="accion" value="Modificar">Modificar</button>
    <button type="submit" name="accion" value="Eliminar">Eliminar</button>
</form>
