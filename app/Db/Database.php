<?php

namespace App\Db;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    public const HOST = 'localhost';
    public const NAME = 'scandiweb';
    public const USER = 'root';
    public const PASSWORD = '';

    private $table;
    private $connection;

    public function __construct(string $table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }
    private function setConnection(): void
    {
        try{
            $this->connection = new PDO('mysql:host=' .self::HOST. ';dbname=' .self::NAME, self::USER, self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR:".$e->getMessage());
        }
    }
    public function execute($query, $params = []): PDOStatement
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die("ERROR:".$e->getMessage());
        }
    }
    public function insert(array $values): int
    {
        //QUERY DATA
        $fields = array_keys($values); // transform fields into an array with numeric index
        $binds = array_pad([], count($fields), '?');
        //MOUNT QUERY
        $query = 'INSERT INTO '.$this->table.'('.implode(",", $fields).') VALUES ('.implode(",", $binds).')';
        //EXECUTE QUERY
        $this->execute($query, array_values($values));
        //RETURN ID
        return $this->connection->lastInsertId();
    }
    public function select(string $where = null, string $order = null, string $limit = null, string $fields = '*'): PDOStatement
    {
        //QUERY DATA
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        //MOUNT QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        //EXECUTE QUERY
        return $this->execute($query);
    }
    public function delete(string$where): bool
    {
        //MOUNT QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        //EXECUTE QUERY
        $this->execute($query);
        //RETURN SUCCESS
        return true;
    }
}