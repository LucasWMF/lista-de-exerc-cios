<h1> Listar Fornecedores </h1>

<hr>
<div class="d-flex p-2">
    <a class="btn btn-info mh-100 me-2" style="width: 100%;" href="./dowload-csv.php">Baixar CSV</a>
    <form class="w-100 me-2" action="?page=listar" method="post">
        <input type="hidden" name="acao" value="code">
        <button class="btn btn-success mh-100 me-2" type="submit" style="width: 100%;">Visualizar no Código</button>
    </form>
</div>
<hr>

<div class="container-fluid d-flex" style="padding: 0;">
    <form method="POST" action="?page=listar">
        <button class="btn btn-white me-2 border border-dark" type="submit">Limpar</button>
    </form>
    <form class="d-flex align-items-center w-100" role="search" method="POST" action="?page=listar">
        <input type="hidden" name="acao" value="pesquisar">
        <label for="pedido" class="w-100 text-center form-label">Selecione um pedido:</label>
        <select id="campo" name="campo" class="form-select w-100">
            <option value="id">ID</option>
            <option value="nome_fornecedor">Nome</option>
            <option value="cnpj_fornecedor">CNPJ</option>
            <option value="tel_fornecedor">Telefone</option>
        </select>
        <label for="pesquisa" class="w-100 text-center form-label">Digite o que deseja pesquisar:</label>
        <input class="form-control me-2" style="width: max-content;" type="search" id="search" name="termo" placeholder="Digite sua busca" aria-label="Search" required>
        <button class="btn btn-primary" type="submit">Pesquisar</button>
    </form>
</div>

<hr>

<?php
switch ($_REQUEST['acao'] ?? '') {
    case 'pesquisar':
        echo "<h1>Dados Pesquisados</h1>";
        $termo = $connection->real_escape_string($_POST['termo']);
        $campo = $connection->real_escape_string($_POST['campo']);

        // echo $campo;
        // echo $termo;

        $sql2 = "SELECT * FROM fornecedores WHERE $campo LIKE ?";
        $stmt = $connection->prepare($sql2);
        $searchTerm = "%" . $termo . "%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            print "<table class='table table-dark table-bordered table-hover text-center'>";
            print "<tr class='table-warning'>";
            print "<th>Id</th>";
            print "<th>Nome do Fornecedor</th>";
            print "<th>CNPJ</th>";
            print "<th>Telefone</th>";
            print "<th>Ação</th>";
            print "</tr>";
            while ($row = $result->fetch_assoc()) {
                print "<tr>";
                print "<td>" . $row['id'] . "</td>";
                print "<td>" . $row['nome_fornecedor'] . "</td>";
                print "<td>" . $row['cnpj_fornecedor'] . "</td>";
                print "<td>" . $row['tel_fornecedor'] . "</td>";
                print "
                <td>
                    <a href='?page=editar&id=" . $row['id'] . "' class='btn btn-success'>Editar</a>
                    <a href='?page=excluir&id=" . $row['id'] . "' class='btn btn-danger'>Excluir</a>
                </td>
                ";
                print "</tr>";
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }

        echo "</table>";
        echo "<hr>";
        echo "<h1> Restantes dos dados </h1>";
        break;
    case 'code':
        echo "<h1> Código CSV </h1>";

        $sql = "SELECT * FROM fornecedores";
        $result = $connection->query($sql);

        $clientes = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        } else {
            echo "Nenhum registro encontrado.";
        }

        echo "<pre>";
        print_r($clientes);
        echo "</pre>";
        echo "<hr>";
        echo "<h1> Dados </h1>";
        break;
    case 'limpar':
    default:
        echo "";
        echo "";
        break;
}

$sql = "SELECT * FROM fornecedores";
$res = $connection->query($sql);

$qtd_registros = $res->num_rows;

if ($qtd_registros > 0) {
    print "<table class='table table-dark table-bordered table-hover text-center'>";
    print "<tr class='table-warning'>";
    print "<th>Id</th>";
    print "<th>Nome do Fornecedor</th>";
    print "<th>CNPJ</th>";
    print "<th>Telefone</th>";
    print "<th>Ação</th>";
    print "</tr>";
    while ($registros = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $registros->id . "</td>";
        print "<td>" . $registros->nome_fornecedor . "</td>";
        print "<td>" . $registros->cnpj_fornecedor . "</td>";
        print "<td>" . $registros->tel_fornecedor . "</td>";
        print "
        <td>
            <a href='?page=editar&id=" . $registros->id . "' class='btn btn-success'>Editar</a>
            <a href='?page=excluir&id=" . $registros->id . "' class='btn btn-danger'>Excluir</a>
        </td>
        ";
        print "</tr>";
    }
} else {
    print "<p class'alert alert-danger'>Não há registros no banco de dados</p>";
}
?>