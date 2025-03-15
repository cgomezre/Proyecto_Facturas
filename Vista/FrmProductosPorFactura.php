<?php
include_once '../Control/CtrProductosPorFactura.php';
include_once '../Modelos/ProductosPorFactura.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $facturaNumero = $_POST["facturaNumero"];
    $productoCodigo = $_POST["productoCodigo"];
    $cantidad = $_POST["cantidad"];
    $subtotal = $_POST["subtotal"];
    $accion = $_POST["accion"];

    $productosPorFactura = new ProductosPorFactura($facturaNumero, $productoCodigo, $cantidad, $subtotal);
    $ctrProductosPorFactura = new CtrProductosPorFactura($productosPorFactura);

    switch ($accion) {
        case "Guardar":
            echo $ctrProductosPorFactura->guardar();
            break;
        case "Consultar":
            print_r($ctrProductosPorFactura->obtenerPorFactura($facturaNumero));
            break;
        case "Modificar":
            echo $ctrProductosPorFactura->actualizarCantidad($facturaNumero, $productoCodigo, $cantidad, $subtotal);
            break;
        case "Eliminar":
            echo $ctrProductosPorFactura->borrar($facturaNumero, $productoCodigo);
            break;
    }
}
?>

<form method="post">
    Número de Factura: <input type="number" name="facturaNumero" required>
    Código del Producto: <input type="text" name="productoCodigo" required>
    Cantidad: <input type="number" name="cantidad" min="1" required>
    Subtotal: <input type="number" name="subtotal" step="0.01" required>
    <button type="submit" name="accion" value="Guardar">Guardar</button>
    <button type="submit" name="accion" value="Consultar">Consultar</button>
    <button type="submit" name="accion" value="Modificar">Modificar</button>
    <button type="submit" name="accion" value="Eliminar">Eliminar</button>
</form>
