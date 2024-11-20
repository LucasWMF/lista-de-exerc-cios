<h1> Listar Pedidos </h1>

<div class="container-fluid d-flex" style="padding: 0;">
    <form method="POST" action="?page=listar">
        <button class="btn btn-white me-2 border border-dark" type="submit">Limpar</button>
    </form>
    <form class="d-flex align-items-center w-100" role="search" method="POST" action="?page=listar">
        <input type="hidden" name="acao" value="pesquisar">
        <label for="pedido" class="w-100 text-center form-label">Selecione um pedido:</label>
        <select id="campo" name="campo" class="form-select w-100">
            <option value="id">ID</option>
            <option value="num_pedido">Numero do Pedido</option>
            <option value="data_pedido">Data do Pedido</option>
            <option value="cliente">Cliente</option>
        </select>
        <label for="pesquisa" class="w-100 text-center form-label">Digite o que deseja pesquisar:</label>
        <input class="form-control me-2" style="width: max-content;" type="search" id="search" name="termo" placeholder="Digite sua busca" aria-label="Search" required>
        <button class="btn btn-primary" type="submit">Pesquisar</button>
    </form>
</div>

<hr>

<?php
if (!isset($_POST['acao']) || isset($_POST['acao']) === 'limpar') {
    echo "";
} else {
    echo "<h1>Dados Pesquisados</h1>";
    $termo = $connection->real_escape_string($_POST['termo']);
    $campo = $connection->real_escape_string($_POST['campo']);

    // echo $campo;
    // echo $termo;

    $sql2 = "SELECT * FROM pedidos WHERE $campo LIKE ?";
    $stmt = $connection->prepare($sql2);
    $searchTerm = "%" . $termo . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    // Evita erros ^

    if ($result->num_rows > 0) {
        print "<table class='table table-dark table-bordered table-hover text-center'>";
        print "<tr class='table-warning'>";
        print "<th>Id</th>";
        print "<th>Numero do Pedido</th>";
        print "<th>Data</th>";
        print "<th>Cliente</th>";
        print "<th>Ação</th>";
        print "</tr>";
        while ($row = $result->fetch_assoc()) {
            print "<tr>";
            print "<td>" . $row['id'] . "</td>";
            print "<td>" . $row['num_pedido'] . "</td>";
            print "<td>" . $row['data_pedido'] . "</td>";
            print "<td>" . $row['cliente'] . "</td>";
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
}

$sql = "SELECT * FROM pedidos";

$res = $connection->query($sql);

$qtd_registros = $res->num_rows;

if ($qtd_registros > 0) {
    print "<table class='table table-dark table-bordered table-hover text-center'>";
    print "<tr class='table-warning'>";
    print "<th>Id</th>";
    print "<th>Numero do Pedido</th>";
    print "<th>Data</th>";
    print "<th>Cliente</th>";
    print "<th>Ação</th>";
    print "</tr>";
    while ($registros = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $registros->id . "</td>";
        print "<td>" . $registros->num_pedido . "</td>";
        print "<td>" . $registros->data_pedido . "</td>";
        print "<td>" . $registros->cliente . "</td>";
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