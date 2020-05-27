<?php

function connect_mysqli () {
    $connect = new mysqli("140.238.181.93", "fdb", "fdb", "fdb");

    if ($connect->connect_error) die("Problema de conexao: " . $connect->connect_error);

    return $connect;
}

function close_mysqli ($link) {
    return mysqli_close($link);
}

function count_table ($table_name) {
    $link = connect_mysqli();

    $query = "SELECT COUNT(*) as count FROM {$table_name}";

    $run = $link->query($query);
    $row = mysqli_fetch_assoc($run);

    mysqli_close($link);

    return isset($row['count']) ? $row['count'] : 0;
}

function paginate ($table_name, $limit = 5) {
    $count = count_table($table_name);

    return round($count / 5);
}

function list_table ($table_name, $limit = 5, $page = 0) {
    $link = connect_mysqli();

    $page = $page > 1 ? $page - 1 : $page;

    $offset = ($page * $limit) === 5 ? 0 : ($page) * $limit;
    $query = "SELECT * FROM {$table_name} LIMIT {$offset},{$limit}";

    $run = $link->query($query);
    $rows = [];
    while($row = $run->fetch_assoc()) {
        $rows[] = $row;
    }

    mysqli_close($link);

    return $rows;
}

function user_exists ($email) {
    $link = connect_mysqli();

    $query = sprintf("SELECT * FROM `brunoro_usuario` WHERE `usu_login` = '%s'",
        $email
    );

    $run = $link->query($query);
    $row = mysqli_fetch_assoc($run);

    mysqli_close($link);

    return $row;
}

function create_user(
    $name,
    $address,
    $mother_name,
    $daddy_name,
    $country,
    $state,
    $civil_state,
    $instruction
)
{

    $link = connect_mysqli();

    $insert = sprintf("INSERT INTO brunoro_usuario(usu_nome, usu_endereco, usu_nmae, usu_npai, usu_pais, usu_uf, usu_ecivil ,usu_ginstrucao) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
        $name,
        $address,
        $mother_name,
        $daddy_name,
        $country,
        $state,
        $civil_state,
        $instruction
    );

    $status = $link->query($insert);

    close_mysqli($link);

    return $status;
}
