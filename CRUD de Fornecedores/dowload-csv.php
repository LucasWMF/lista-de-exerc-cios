<?php
include('../config.php');

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=fornecedores.csv');

// Abrindo um "arquivo" em memória para o CSV
$output = fopen('php://output', 'w');

// Escrevendo o cabeçalho do CSV
fputcsv($output, ['Id', 'Nome do Fornecedor', 'CNPJ', 'Telefone']);

// Consultando os dados do banco
$sql = "SELECT * FROM fornecedores";
$result = $connection->query($sql);

// Escrevendo os dados no CSV
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

fclose($output);
exit; 
?>
