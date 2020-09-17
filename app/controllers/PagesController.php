<?php
  namespace App\Controllers;

  class PagesController {
    public function home() {
      return view('index');
    }

    public function about() {
      $companyName = "Test Company";
      return view('about', [ 'companyName' => $companyName ]);
    }

    public function aboutCulture() {
      return view('about-culture');
    }

    public function contact() {
      return view('contact');
    }
  }
?>