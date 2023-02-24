<?php 

namespace App\Db;
use \PDO;
use PDOException;

class Database {
    const HOST = 'localhost';
    const NAME = 'scandiweb';
    const USER = 'root';
    const PASSWORD = '';

    //nome da tabela a ser manipulada
    private $table;
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
        //DADOS DA QUERY
        $fields = array_keys($values); // transformar os campos em um array com index numérico
        $binds = array_pad([], count($fields), '?');
        $query = 'INSERT INTO '.$this->table.'('.implode(",", $fields).') VALUES ('.implode(",", $binds).')';
        //executa o insert
        $this->execute($query, array_values($values));
        //retorna o id Inserido
        return $this->connection->lastInsertId();
    }
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        //MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        //EXECUTA A QUERY
        return $this->execute($query);
    }
    public function delete($where){
        //MONTA A QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        //EXECUTA A QUERY
        $this->execute($query);
        //RETORNA SUCESSO
        return true;
    }
    public function getCategories($where = null, $order = null, $limit = null, $fields = '*'){
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        //MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        //EXECUTA A QUERY
        return $this->execute($query);
    }
}