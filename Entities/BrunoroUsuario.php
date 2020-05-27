<?php
include 'core/PDOConnection.php';

class BrunoroUsuario extends PDOConnection
{

    protected $tableName = 'brunoro_usuario';

    protected $primary = "id_usuario";

    protected $fillable = [
        'usu_nome',
        'usu_endereco',
        'usu_nmae',
        'usu_cargo',
        'usu_centro_custo',
        'usu_unidade',
        'usu_gintrucao',
        'usu_npai',
        'usu_pais',
        'usu_estado',
        'usu_cidade',
        'usu_uf',
        'usu_ecivil',
        'usu_ginstrucao',
        'usu_id_unidade',
        'usu_senha',
        'usu_login',
    ];

    public function __construct(
        $fields = []
    )
    {
        parent::__construct();
        if ($fields) $this->fillableManage = $fields;
    }

}
