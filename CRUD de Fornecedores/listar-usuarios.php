<h1> Listar Usuários </h1>

<?php

$sql = "SELECT * FROM usuarios";

$res = $connection->query($sql);

$qtd_registros = $res->num_rows;

if ($qtd_registros > 0) {
    print "<table class='table table-dark table-bordered table-hover text-center'>";
    print "<tr class='table-warning'>";
    print "<th>Id</th>";
    print "<th>Nome</th>";
    print "<th>E-mail</th>";
    print "<th>Data de Nascimento</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while ($registros = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $registros->id . "</td>";
        print "<td>" . $registros->nome . "</td>";
        print "<td>" . $registros->email . "</td>";
        print "<td>" . $registros->data_nasc . "</td>";
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