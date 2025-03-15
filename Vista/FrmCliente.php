<?php
include_once '../Control/CtrCliente.php';
include_once '../Modelo/Cliente.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $credito = $_POST["credito"];
    $persona_codigo = $_POST["persona_codigo"];
    $accion = $_POST["accion"];

    $cliente = new Cliente($codigo, $credito, $persona_codigo);
    $ctrCliente = new CtrCliente($cliente);

    switch ($accion) {
        case "Guardar":
            echo $ctrCliente->guardar();
            break;
        case "Consultar":
            print_r($ctrCliente->consultar());
            break;
        case "Modificar":
            echo $ctrCliente->modificar();
            break;
        case "Eliminar":
            echo $ctrCliente->borrar();
            break;
    }
}
?>

<form method="post">
    Código: <input type="text" name="codigo" required>
    Crédito: <input type="number" name="credito" step="0.01">
    Código persona: <input type="text" name="persona_codigo">
    <button type="submit" name="accion" value="Guardar">Guardar</button>
    <button type="submit" name="accion" value="Consultar">Consultar</button>
    <button type="submit" name="accion" value="Modificar">Modificar</button>
    <button type="submit" name="accion" value="Eliminar">Eliminar</button>
</form>
