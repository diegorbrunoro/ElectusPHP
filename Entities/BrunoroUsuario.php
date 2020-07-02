<?php
require_once 'core/PDOConnection.php';

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

    public function candidatos()
    {
        $this->prepare(sprintf(
            'SELECT * FROM `%s` WHERE usu_candidato = 1',
            $this->getTableName()
        ))->execute();

        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function nao_candidatos()
    {
        $this->prepare(sprintf(
            'SELECT * FROM `%s` WHERE usu_candidato = 0',
            $this->getTableName()
        ))->execute();

        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function virarCandidato()
    {
        $this->prepare(sprintf(
            'UPDATE `%s` SET `usu_candidato` = 1 WHERE id_usuario = :id_usuario',
            $this->getTableName()
        ));

        $this->statement->bindValue(':id_usuario', $_SESSION['id_usuario']);

        return $this->statement->execute();
    }

    public function jaECandidato($id_usuario)
    {
        $this->prepare(sprintf(
            'SELECT * FROM `%s` WHERE id_usuario = :id_usuario',
            $this->getTableName()
        ));

        $this->statement->bindValue(':id_usuario', $id_usuario);
        $this->statement->execute();

        return $this->statement->rowCount() > 0;
    }

    public function contadorParaOGrafico($id_usuario)
    {
        $this->prepare(sprintf(
            'SELECT COUNT(id) as count FROM `%s` WHERE id_candidato = :id_usuario',
            'brunoro_votacao'
        ));

        $this->statement->bindValue(':id_usuario', $id_usuario);
        $this->statement->execute();

        $fetch = $this->statement->fetch();

        return isset($fetch['count']) ? $fetch['count'] : 0;
    }

    public function candidatos_chart()
    {
        $labels = [];
        $colors = [];
        $count = [];
        $candidatos = $this->candidatos();
        foreach ($candidatos as $candidato) {
            $labels[] = $candidato->usu_nome;
            $colors[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            $count[] = $this->contadorParaOGrafico($candidato->id_usuario);
        }
        return [
            'labels' => json_encode($labels),
            'counts' => json_encode($count),
            'colors' => json_encode($colors)
        ];
    }

}
