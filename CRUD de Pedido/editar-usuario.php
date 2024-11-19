<h1>Editar Usuário</h1>

<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $res = $connection->query($sql);

    if ($res && $res->num_rows > 0) {
        $registros = $res->fetch_object();
    } else {
        echo "Usuário não encontrado!";
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
        <input type="text" name="nome" value="<?php print $registros->nome; ?>" class="form-control"
            placeholder="Nome" required autofocus>
    </div>
    <div class="mb-3">
        <input type="email" name="email" value="<?php print $registros->email; ?>" class="form-control"
            placeholder="Seu email" required autofocus>
    </div>
    <div class="mb-3">
        <input type="password" name="senha" class="form-control"
            placeholder="Coloque sua senha atual ou cadastre nova senha " required>
    </div>

    <div class="mb-3">
    </div>

    <input type="date" name="data_nasc" value="<?php print $registros->data_nasc; ?>" class="form-control" placeholder="Data de Nascimento" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
</form>