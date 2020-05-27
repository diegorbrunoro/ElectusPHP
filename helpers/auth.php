<?php
if (!function_exists('url')) {
    function url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}

if (!function_exists('link_to')) {
    function link_to ($to = "") {
        return url() . $to;
    }
}

if (!function_exists('password')) {
    function password($string) {
        return md5(sha1((string)$string));
    }
}

if (!function_exists('check')) {
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
}

if (!function_exists('is_authenticated')) {
    function is_authenticated () {
        if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
            return true;
        }
        return false;
    }
}
