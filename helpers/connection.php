<?php

function connect_mysqli () {
    $connect = new mysqli("140.238.181.93", "fdb", "fdb", "fdb");

    if ($connect->connect_error) die("Problema de conexao: " . $connect->connect_error);

    return $connect;
}

function close_mysqli ($link) {
    return mysqli_close($link);
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
