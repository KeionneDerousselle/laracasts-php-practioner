<?php
  namespace App\Core;

  class Post {
    public $title;
    public $published;

    public function __construct($title, $published) {
      $this->title = $title;
      $this->published = $published;
    }
  }

  $posts = [
    new Post('My First Post', true),
    new Post('My Second Post', true),
    new Post('My Third Post', true),
    new Post('My Fourth Post', false)
  ];
  var_dump($posts, "<br><br><br>");

  $unpublished = array_filter($posts, function($post){ return !$post->published; });
  var_dump($unpublished, "<br><br><br>");

  $published = array_filter($posts, function($post){ return $post->published; });
  var_dump($published, "<br><br><br>");

  $modified = array_map(function($post){
    $post->published = true;
    return $post;
  }, $posts);
  var_dump($modified, "<br><br><br>");

  foreach($posts as $post) {
    $post->published = true;
  }

  $modified2 = array_map(function($post){
    return (array) $post;
  }, $posts);
  var_dump($modified2, "<br><br><br>");

  $subset = array_map(function($post){
    return ['title' => $post->title];
  }, $posts);
  var_dump($subset, "<br><br><br>");

  // only work with public fields
  $titles = array_column($posts, "title");
  var_dump($titles, "<br><br><br>");

  $newKeys = array_column($posts, 'published', 'title');
  var_dump($newKeys, "<br><br><br>");
?>