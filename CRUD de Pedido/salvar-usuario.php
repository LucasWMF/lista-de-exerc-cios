<?php
if (!isset($_REQUEST['acao']) || empty($_REQUEST['acao'])) {
    // Página Personalizada 404
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

switch ($_REQUEST["acao"]) {
    case "cadastrar":
        $num_pedido = $_POST["num_pedido"];
        $data_pedido = $_POST["data_pedido"];
        $cliente = $_POST["cliente"];

        $sql = "INSERT INTO pedidos (num_pedido, data_pedido, cliente) VALUES ('{$num_pedido}', '{$data_pedido}', '{$cliente}')";

        $res = $connection->query($sql);

        if ($res == true) {
            echo "
                <div class='col-md-5'>
                <div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                    Pedido Registrado com Sucesso
                </div>
                <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Pedidos</a>
                <br><br>
                <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Registrar Novo Pedido</a>
            </div>
                ";
        } else {
            echo "
                <div class='col-md-5'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Não foi possível registrar seu pedido.
                    </div>
                    <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Pedidos</a>
                    <br><br>
                    <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Registrar Novo Pedido</a>
                </div>";
        }
        break;

    case "editar":
        $id = $_POST['id'];
        $num_pedido = $_POST["num_pedido"];
        $data_pedido = $_POST["data_pedido"];
        $cliente = $_POST["cliente"];

        // $sql = "INSERT INTO pedidos (num_pedido, data_pedido, cliente) VALUES ('{$num_pedido}', '{$data_pedido}', '{$cliente}')";

        $sql = "UPDATE pedidos SET num_pedido = '$num_pedido', data_pedido = '$data_pedido', cliente = '$cliente' WHERE id = $id";

        // if (!empty($_POST["senha"])) {
        //     $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
        //     $sql = "UPDATE usuarios SET num_pedido = '$num_pedido', email = '$email', senha = '$senha', data_nasc = '$data_nasc' WHERE id = $id";
        // } else {
        //     $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', data_nasc = '$data_nasc' WHERE id = $id";
        // }

        $res = $connection->query($sql);

        if ($res == true) {
            echo "
                <div class='col-md-5'>
                <div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                    Dados do Pedido Editados com Sucesso
                </div>
                <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Pedidos</a>
                <br><br>
                <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Registrar Novo Pedido</a>
            </div>
                ";
        } else {
            echo "
                <div class='col-md-5'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Não foi Possível Editar os Dados do Pedido.
                    </div>
                    <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Pedidos</a>
                    <br><br>
                    <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Registrar Novo Pedido</a>
                </div>";
        }
        break;
    case "excluir":
        $id = $_POST['id'];

        $sql = "DELETE FROM pedidos WHERE id = $id";

        $res = $connection->query($sql);

        if ($res == true) {
            echo "<div class='col-md-5'>
                <div class='alert alert-success mt-2 alert-dismissible fade show' role='alert'>
                    Pedido deletado com sucesso!
                </div>
                <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Pedidos</a>
                <br><br>
                <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Registrar Novo Pedido</a>
            </div>
                ";
        } else {
            echo "
                <div class='col-md-5'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Não foi Possível Deletar os Dados do Pedido.
                    </div>
                    <a href='?page=listar' class='btn btn-success btn-lg btn-block'>Listar Pedidos</a>
                    <br><br>
                    <a href='?page=novo' class='btn btn-warning btn-lg btn-block'>Registrar Novo Pedido</a>
                </div>";
        }
        break;

    default:
        // Página Personalizada 404
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
                    Listar Pedidos
                </a>
            </div>
        </div>";
        break;
}
