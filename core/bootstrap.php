<?php
  use App\Core\App;

  App::bind('config', $config = require "config.php");
  App::bind('database', new Db(DBConnection::getConnection($config["database"])));

  function view($viewName, $data = [])
  {
      extract($data);
      return require "app/views/$viewName.view.php";
  }

  function redirect($path)
  {
      header("Location: /$path");
  }
