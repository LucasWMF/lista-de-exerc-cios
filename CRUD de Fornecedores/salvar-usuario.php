<?php
if (!isset($_REQUEST['acao']) || empty($_REQUEST['acao'])) {
    // Exibe a página 404 se a ação não estiver definida ou for inválida
    echo "
    <div class='d-flex flex-column align-items-center justify-content-center vh-100 bg-light'>
        <div class='text-center'>
            <h1 class='display-1 fw-bold text-danger'>404</h1>
            <p class='fs-3'>
                <span class='text-danger'>Oops!</span> Página não encontrada.
            </p>
            <p class='lead'>
                A página que você está tentando acessar não existe ou foi movida.
            </p>
            <a href='index.php' class='btn btn-primary btn-lg'>
                Voltar ao Início
            </a>
            <br><br>
            <a href='?page=listar' class='btn btn-secondary btn-lg'>
                Listar Fornecedores
            </a>
        </div>
    </div>";
    exit;
}

// Processa as ações
switch ($_REQUEST["acao"]) {
    case "cadastrar":
        $nome_fornecedor = $_POST["nome_fornecedor"];
        $cnpj_fornecedor = $_POST["cnpj_fornecedor"];
        $tel_fornecedor = $_POST["tel_fornecedor"];

        $sql = "INSERT INTO fornecedores (nome_fornecedor, cnpj_fornecedor, tel_fornecedor) VALUES ('{$nome_fornecedor}', '{$cnpj_fornecedor}', '{$tel_fornecedor}')";

        $res = $connection->query($sql);

        if ($res == true) {
            echo "
            <div class='col-md-5'>
                <div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                    Cadastro do Fornecedor Realizado com Sucesso
                </div>
                <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Fornecedores</a>
                <br><br>
                <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Fornecedor</a>
            </div>
                ";
        } else {
            echo "
                <div class='col-md-5'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Não foi possível realizar o cadastro do fornecedor.
                    </div>
                    <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Fornecedores</a>
                    <br><br>
                    <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Fornecedor</a>
                </div>";
        }
        break;

    case "editar":
        // Processa o formulário
        $id = $_POST["id"];
        $nome_fornecedor = $_POST["nome_fornecedor"];
        $cnpj_fornecedor = $_POST["cnpj_fornecedor"];
        $tel_fornecedor = $_POST["tel_fornecedor"];

        $sql = "UPDATE fornecedores SET nome_fornecedor = '$nome_fornecedor', cnpj_fornecedor = '$cnpj_fornecedor', tel_fornecedor = '$tel_fornecedor' WHERE id = $id";

        $res = $connection->query($sql);

        if ($res == true) {
            echo "
                <div class='col-md-5'>
                <div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                    Dados do Fornecedor Editados com Sucesso
                </div>
                    <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Fornecedores</a>
                    <br><br>
                    <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Fornecedor</a>
            </div>
                ";
        } else {
            echo "
                <div class='col-md-5'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Não foi Possível Editar os Dados do Fornecedor.
                    </div>
                    <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Fornecedores</a>
                    <br><br>
                    <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Fornecedor</a>
                </div>";
        }
        break;
    case "excluir":
        $id = $_POST['id'];

        $sql = "DELETE FROM fornecedores WHERE id = $id";

        $res = $connection->query($sql);

        if ($res == true) {
            echo "<div class='col-md-5'>
                <div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                    Fornecedor deletado com sucesso!
                </div>
                <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Fornecedores</a>
                <br><br>
                <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Fornecedor</a>
            </div>
                ";
        } else {
            echo "
                <div class='col-md-5'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Não foi Possível Deletar os Dados do Fornecedor.
                    </div>
                <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Fornecedores</a>
                <br><br>
                <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Fornecedor</a>
                </div>";
        }
        break;

    default:
        // Exibe erro 404 para ações desconhecidas
        echo "
        <div class='d-flex flex-column align-items-center justify-content-center vh-100 bg-light'>
            <div class='text-center'>
                <h1 class='display-1 fw-bold text-danger'>404</h1>
                <p class='fs-3'>
                    <span class='text-danger'>Oops!</span> Página não encontrada.
                </p>
                <p class='lead'>
                    A página que você está tentando acessar não existe ou foi movida.
                </p>
                <a href='index.php' class='btn btn-primary btn-lg'>
                    Voltar ao Início
                </a>
                <a href='?page=listar' class='btn btn-secondary btn-lg'>
                    Listar Fornecedores
                </a>
            </div>
        </div>";
        break;
}
