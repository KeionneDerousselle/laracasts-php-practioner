<?php
class DBConnection
{
  protected static $instance;

  protected function __construct()
  {
  }

  public static function getConnection($config)
  {
    if (empty(self::$instance)) {
      try {
        self::$instance = new PDO(
          $config["connection"] . ";dbname=" . $config["name"],
          $config["username"],
          $config["password"],
          $config["options"]
        );
      } catch (PDOException $e) {
        die($e->getMessage());
      }
    }

    return self::$instance;
  }
}
