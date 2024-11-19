<h1> Listar Usuários </h1>

<?php

$sql = "SELECT * FROM usuarios";

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
        print "<td>" . $registros->ID_Pedido . "</td>";
        print "<td>" . $registros->Num_Pedidos	 . "</td>";
        print "<td>" . $registros->Data . "</td>";
        print "<td>" . $registros->Cliente . "</td>";
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