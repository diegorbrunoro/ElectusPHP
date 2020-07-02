<?php

class PDOConnection {


    protected $connect;

    protected $tableName;

    protected $fillable;

    protected $statement;

    private $where = [];

    public $fillableManage;

    public function __construct()
    {
        $this->setTableName($this->tableName);
        $this->setConnect(new PDO('mysql:host=140.238.181.93;dbname=fdb', 'fdb', 'fdb'));
    }

    /**
     * @param $key
     * @param $condition
     * @param $value
     */
    public function setWhere($key, $condition, $value)
    {
        $this->where[] = [
            'key' => $key,
            'condition' => $condition,
            'value' => $value
        ];

        return $this;
    }

    public function getWhere()
    {
        $where = "WHERE";
        foreach ($this->where as $w) {
            $where .= " $w[key] $w[condition] :$w[key]";
        }

        return $where;
    }

    public function prepareWhere()
    {
        foreach ($this->where as $w) {
            $this->statement->bindValue(":$w[key]", $w['value']);
        }
        return $this;
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

    public function all()
    {
        try {

            $query = sprintf('SELECT * FROM `%s` %s',
                $this->getTableName(),
                $this->getWhere()
            );

            $st = $this->prepare($query);

            $this->prepareWhere();

            $st->execute();

            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            return false;
        }
    }

}
