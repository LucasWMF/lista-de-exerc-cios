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

<form action="?page=salvar&id=<?php $registros->id ?>" method="post">
    <input type="hidden" name="acao" value="excluir">
    <input type="hidden" name="id" value="<?php print $registros->id; ?>">
    <input class='btn btn-danger btn-lg btn-block' type="submit" value="Concordo em Excluir">
</form>
<br>
<a href='?page=listar' class='btn btn-secondary btn-lg'>
    Cancelar e Voltar
</a>