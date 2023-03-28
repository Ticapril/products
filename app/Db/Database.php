<?php 

namespace App\Db;
use \PDO;
use PDOException;

class Database {
    const HOST = 'localhost';
    const NAME = 'scandiweb';
    const USER = 'root';
    const PASSWORD = '';

     
    private $table; //name of the table
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }
    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER, self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR:".$e->getMessage());
        }
    }
    public function execute($query, $params = []) {
        try {
           $statement = $this->connection->prepare($query);
           $statement->execute($params);
           return $statement;
        } catch (PDOException $e) {
            die("ERROR:".$e->getMessage());
        }
    }
    public function insert($values){
        //Query DATA
        $fields = array_keys($values); // transform fields into an array with numeric index
        $binds = array_pad([], count($fields), '?');
        $query = 'INSERT INTO '.$this->table.'('.implode(",", $fields).') VALUES ('.implode(",", $binds).')';
        //execute the insert
        $this->execute($query, array_values($values));
        //return id inserted
        return $this->connection->lastInsertId();
    }
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //QUERY DATA
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        //MOUNT QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        //EXECUTE QUERY
        return $this->execute($query);
    }
    public function delete($where){
        //MOUNT QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        //EXECUTE QUERY
        $this->execute($query);
        //RETURN SUCCESS
        return true;
    }
    public function getCategories($where = null, $order = null, $limit = null, $fields = '*'){
        //QUERY DATA
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        //MOUNT QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        //EXECUTE QUERY
        return $this->execute($query);
    }
}