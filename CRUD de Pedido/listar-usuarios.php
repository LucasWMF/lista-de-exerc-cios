<h1> Listar Pedidos </h1>

<div class="container-fluid w-auto d-flex row" style="padding: 0;">
    <button class="btn btn-white" style="width: min-content;" href="index.php?page=listar">Limpar</button>
    <form class="d-flex align-items-center" role="search" method="POST" action="?page=listar">
        <input type="hidden" name="acao" value="pesquisar">
        <input class="form-control me-2" style="width: max-content;" type="search" id="search" name="termo" placeholder="Digite sua busca" aria-label="Search" required>
        <button class="btn btn-primary" type="submit">Pesquisar</button>
    </form>
</div>

<hr>

<?php
if (!isset($_POST['acao'])) {
    echo "";
} else {
    echo "<h1>Dados Pesquisados</h1>";
    $termo = $connection->real_escape_string($_POST['termo']);

    $sql2 = "SELECT * FROM pedidos WHERE id LIKE '%$termo%' or num_pedido LIKE '%$termo%' or data_pedido LIKE '%$termo%' or cliente LIKE '%$termo%' ORDER BY id DESC";
    $result = $connection->query($sql2);

    if ($result->num_rows > 0) {
        print "<table class='table table-dark table-bordered table-hover text-center'>";
        print "<tr class='table-warning'>";
        print "<th>Id</th>";
        print "<th>Numero do Pedido</th>";
        print "<th>Data</th>";
        print "<th>Cliente<th>";
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
    print "<th>Cliente<th>";
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