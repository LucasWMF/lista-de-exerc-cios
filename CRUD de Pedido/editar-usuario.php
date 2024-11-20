<h1>Editar Usuário</h1>

<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pedidos WHERE id = $id";
    $res = $connection->query($sql);

    if ($res && $res->num_rows > 0) {
        $registros = $res->fetch_object();
    } else {
        echo "Pedido não encontrado!";
        exit;
    }
} else {
    echo "ID não fornecido ou inválido!";
    exit;
}
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $registros->id; ?>">
    <div class="mb-3">
        <input type="number" name="num_pedido" class="form-control" placeholder="Numero do Pedido" value="<?php print $registros->num_pedido ?>" required autofocus>
    </div>
    <div class="mb-3">
        <input type="date" name="data_pedido" class="form-control" placeholder="Data" value="<?php print $registros->data_pedido ?>" required autofocus>
    </div>
    <div class="mb-3">
        <input type="text" name="cliente" class="form-control" placeholder="Cliente" value="<?php print $registros->cliente ?>" required autofocus>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
</form>