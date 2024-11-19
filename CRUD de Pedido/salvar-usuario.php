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
                Listar Usuários
            </a>
        </div>
    </div>";
    exit;
}

// Processa as ações
switch ($_REQUEST["acao"]) {
    case "cadastrar":
        $num_pedido = $_POST["num_pedido"];
        $data_pedido = $_POST["data"];
        $cliente = $_POST["cliente"];

        $sql = "INSERT INTO pedidos (num_pedido, data_pedido, cliente) VALUES ('{$num_pedido}', '{$data_pedido}', '{$cliente}')";

        $res = $connection->query($sql);

        if ($res == true) {
            echo "
                <div class='col-md-5'>
                <div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                    Cadastro Realizado com Sucesso
                </div>
                <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Usuários</a>
                <br><br>
                <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Usuário</a>
            </div>
                ";
        } else {
            echo "
                <div class='col-md-5'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Não foi possível realizar seu cadastro.
                    </div>
                    <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Usuários</a>
                    <br><br>
                    <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Usuário</a>
                </div>";
        }
        break;

    case "editar":
        // Processa o formulário
        $num_pedido = $_POST["num_pedido"];
        $date = $_POST["date"];
        $cliente = $_POST["cliente"];

        // Atualiza senha apenas se fornecida
        if (!empty($_POST["senha"])) {
            $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', data_nasc = '$data_nasc' WHERE id = $id";
        } else {
            $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', data_nasc = '$data_nasc' WHERE id = $id";
        }

        $res = $connection->query($sql);

        if ($res == true) {
            echo "
                <div class='col-md-5'>
                <div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                    Dados do Usuário Editados com Sucesso
                </div>
                <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Usuários</a>
                <br><br>
                <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Usuário</a>
            </div>
                ";
        } else {
            echo "
                <div class='col-md-5'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Não foi Possível Editar os Dados do Usuário.
                    </div>
                    <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Usuários</a>
                    <br><br>
                    <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Usuário</a>
                </div>";
        }
        break;
    case "excluir":
        $id = $_POST['id'];

        $sql = "DELETE FROM usuarios WHERE id = $id";

        $res = $connection->query($sql);

        if ($res == true) {
            echo "<div class='col-md-5'>
                <div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                    Usuário deletado com sucesso!
                </div>
                <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Usuários</a>
                <br><br>
                <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Usuário</a>
            </div>
                ";
        } else {
            echo "
                <div class='col-md-5'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Não foi Possível Deletar os Dados do Usuário.
                    </div>
                    <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Usuários</a>
                    <br><br>
                    <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Cadastrar Novo Usuário</a>
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
                    Listar Usuários
                </a>
            </div>
        </div>";
        break;
}
