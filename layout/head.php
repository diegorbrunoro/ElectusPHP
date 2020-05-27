<?php include "helpers/auth.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Electus</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="<?=link_to('css/estilo.css')?>" rel="stylesheet">
</head>
<body>

<?php if (is_authenticated()) { ?>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            Electus
        </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=link_to('lista_usuarios.php')?>">Listar Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=link_to('cadastro_usuario.php')?>">Cadastrar Usuário</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=link_to('sair.php')?>">Sair</a>
            </li>
        </ul>
    </nav>
<?php } ?>
