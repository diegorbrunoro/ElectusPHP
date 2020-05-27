<?php

class PDOConnection {


    protected $connect;

    protected $tableName;

    protected $fillable;

    protected $statement;

    public $fillableManage;

    public function __construct()
    {
        $this->setTableName($this->tableName);
        $this->setConnect(new PDO('mysql:host=140.238.181.93;dbname=fdb', 'fdb', 'fdb'));
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function setConnect($connect)
    {
        $this->connect = $connect;
    }

    public function getConnect()
    {
        return $this->connect;
    }

    public function fieldsToString()
    {
        $toString = [];

        foreach ($this->fillable as $fieldName) {
            $toString[] = $fieldName;
        }

        return implode(',', $toString);
    }

    public function fieldsToMark()
    {
        $toString = [];

        foreach ($this->fillable as $fieldName) {
            $toString[] = ':' . $fieldName;
        }

        return implode(',', $toString);
    }

    public function prepare(
        $query
    )
    {
        $this->statement = $this->getConnect()->prepare($query);

        return $this;
    }

    public function insertString()
    {
        return sprintf('INSERT INTO `%s` (%s) VALUES (%s)',
            $this->getTableName(),
            $this->fieldsToString(),
            $this->fieldsToMark()
        );
    }

    public function bindParams()
    {
        foreach ($this->fillableManage as $fillableName => $fillableValue) {
            $this->statement->bindValue(':' . $fillableName, $fillableValue);
        }

        return $this;
    }

    public function execute()
    {
        return $this->statement->execute();
    }

    /**
     * [fieldName => value, fieldName2 => value]
     * @param array $fieldAndValues
     */
    public function create(
        $fieldAndValues = []
    )
    {
        try {
            $this->prepare($this->insertString())
                ->bindParams()
                ->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function save()
    {
        try {
            $this->prepare($this->insertString())
                ->bindParams()
                ->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
