<?php
  return [
    "database" => [
      "name" => "todoapp",
      "username" => "root",
      "password" => "",
      "connection" => "mysql:host=localhost",
      "options" => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
      ]
    ]
  ];
?>