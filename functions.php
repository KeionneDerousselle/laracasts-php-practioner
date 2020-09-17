<?php
  // FUNCTIONS
  function dd($data) {
    echo "<pre>";
    die(var_dump($data));
    echo "</pre>";
  }

  function allowedInClub($age) {
    return $age >= 21;
  }
?>