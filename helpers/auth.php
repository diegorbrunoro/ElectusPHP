<?php
function password($string) {
    return md5(sha1((string)$string));
}

function check ($email, $password) {

    $link = connect_mysqli();

    $password = password($password);
    $query = sprintf("SELECT * FROM `brunoro_usuario` WHERE `usu_login` = '%s' AND `usu_senha` = '%s'",
        $email,
        $password
    );

    $run = $link->query($query);
    $row = mysqli_fetch_assoc($run);

    mysqli_close($link);

    return $row;
}

function is_authenticated () {
    if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
        return true;
    }
    return false;
}