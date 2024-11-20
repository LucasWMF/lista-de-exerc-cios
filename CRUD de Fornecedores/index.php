<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <title>Sistema de Pedidos</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <a class="navbar-brand p-2" href="index.php">Fornecedores</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=novo">Registrar Fornecedor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=listar">Listar Fornecedores</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col mt-5">
        <?php
          include("../config.php");
          switch(@$_REQUEST["page"]){
            case "novo":
              include("novo-usuario.php");
              break;
            case "listar":
              include("listar-usuarios.php");
              break;
            case "salvar":
              include("salvar-usuario.php");
              break;
            case "editar":
              include("editar-usuario.php");
              break;
            case "excluir":
              include("excluir-usuario.php");
              break;
            default:
              print "<h1>Cadastre seu Fornecedor!</h1>";
          }
        ?>
      </div>
    </div>
  </div>

  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>