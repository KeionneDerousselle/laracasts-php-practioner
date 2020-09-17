<?php
  class Db {
    protected $db_connection;

    public function __construct(PDO $db_connection) {
      $this->db_connection = $db_connection;
    }

    public function fetchAll($tableName) {
      $statement = $this->db_connection->prepare("SELECT * from $tableName");
      $statement->execute();
      
      // CAUTION: You don't want to always fetch all data into memory.
      // THIS CAN BE EXPENSIVE.
      $objects = $statement->fetchAll(PDO::FETCH_CLASS);

      return $objects;
    }

    public function insert($tableName, $parameters) {
      $insertQuery = sprintf(
        'INSERT INTO %s (%s) VALUES (%s)', $tableName,
        implode(', ', array_keys($parameters)),
        ':'.implode(', :', array_keys($parameters))
      );

      try {
        $statement = $this->db_connection->prepare($insertQuery);
        $statement->execute($parameters);
      } catch (Exception $e) {
        die('Whoops, something went wrong!');
      }
    }
  }
?>