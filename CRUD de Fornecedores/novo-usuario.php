<h1>Novo Fornecedor</h1>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <input type="text" name="nome_fornecedor" class="form-control" placeholder="Nome do Fornecedor" required autofocus>
    </div>
    <div class="mb-3">
        <input type="text" name="cnpj_fornecedor" class="form-control" placeholder="CNPJ com FORMATAÇÃO do Fornecedor" required autofocus>
    </div>
    <div class="mb-3">
        <input type="tel" name="tel_fornecedor" class="form-control" placeholder="Telefone do Fornecedor" required autofocus>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
</form>