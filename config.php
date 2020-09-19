<?php
return [
  "database" => [
    "name" => "todoapp",
    "username" => "root",
    "password" => "mysupersecretdevpassword123!",
    "connection" => "mysql:host=localhost",
    "options" => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ]
  ]
];
