<?php

 namespace App\Controllers;

  use App\Core\App;

  class UsersController
  {
      public function index()
      {
          $users = App::get('database')->fetchAll('users');
          return view('users', compact('users'));
      }

      public function store()
      {
          $name = $_POST['name'];

          App::get('database')->insert('users', ['username' => $name]);

          return redirect('users');
      }
  }
