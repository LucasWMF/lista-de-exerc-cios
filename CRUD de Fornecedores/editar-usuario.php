<h1>Editar Fornecedores</h1>

<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM fornecedores WHERE id = $id";
    $res = $connection->query($sql);

    if ($res && $res->num_rows > 0) {
        $registros = $res->fetch_object();
    } else {
        echo "Fornecedor não encontrado!";
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
        <input type="text" name="nome_fornecedor" value="<?php print $registros->nome_fornecedor; ?>" class="form-control"
            placeholder="Nome" required autofocus>
    </div>
    <div class="mb-3">
        <input type="text" name="cnpj_fornecedor" value="<?php print $registros->cnpj_fornecedor; ?>" class="form-control"
            placeholder="Seu email" required autofocus>
    </div>
    <div class="mb-3">
        <input type="tel" name="tel_fornecedor" value="<?php print $registros->tel_fornecedor; ?>" class="form-control"
            placeholder="Seu email" required autofocus>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
</form>
<br>
<a href='?page=listar' class='btn btn-secondary btn-lg'>
    Cancelar e Voltar
</a>