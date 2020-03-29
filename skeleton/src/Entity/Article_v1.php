<?php
  namespace App\Entity;

  class Article_v1 {
    
    private $title;
    private $subtitle;
    private $createdAt;
    private $author;
    private $body;
    private $image;

    function __construct() {

    }

    // GETTER
    function getTitle() {
      return $this->title;
    }
    function getSubtitle() {
      return $this->subtitle;
    }
    function getCreatedAt() {
      return $this->createdAt;
    }
    function getAuthor() {
      return $this->author;
    }
    function getBody() {
      return $this->body;
    }
    function getImage() {
      return $this->image;
    }

    // SETTER
    function setTitle($title) {
      $this->title = $title;
    }
    function setSubtitle($subtitle) {
      $this->subtitle = $subtitle;
    }
    function setCreatedAt($createdAt) 
    { $this->createdAt = $createdAt; }

    function setAuthor($author) {
      $this->author = $author;
    }
    function setBody($body) {
      $this->body = $body;
    }
    function setImage($image) {
      $this->image = $image;
    }
  }