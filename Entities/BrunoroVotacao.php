<?php
require_once 'core/PDOConnection.php';

class BrunoroVotacao extends PDOConnection
{

    protected $tableName = 'brunoro_votacao';

    protected $primary = "id";

    protected $fillable = [
        'id_usuario',
        'id_votacao',
        'created_at'
    ];

    public function __construct(
        $fields = []
    )
    {
        parent::__construct();
        if ($fields) $this->fillableManage = $fields;
    }

    public function salvarVotacao($id_candidato)
    {
        $this->prepare(
            sprintf(
                'INSERT INTO `%s` (`id_usuario`, `id_candidato`, `created_at`) VALUES (:id_usuario, :id_candidato, NOW())',
                $this->getTableName()
            )
        );
        $this->statement->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $this->statement->bindValue(':id_candidato', $id_candidato);

        return $this->statement->execute();
    }

    public function jaVotou()
    {
        $this->prepare(
            sprintf(
                'SELECT * FROM `%s` WHERE id_usuario = %s ',
                $this->getTableName(),
                $_SESSION['id_usuario']
            )
        )->execute();

        return $this->statement->rowCount() > 0;
    }

}
