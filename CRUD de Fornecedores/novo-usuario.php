<h1>Novo Pedido</h1>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <input type="number" name="Nome" class="form-control" placeholder="Nome" required autofocus>
    </div>
    <div class="mb-3">
        <input type="date" name="Data" class="form-control" placeholder="Data" required autofocus>
    </div>
    <div class="mb-3">
        <input type="text" name="Cliente" class="form-control" placeholder="Cliente" required autofocus>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
</form>