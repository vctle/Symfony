<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HelloController extends AbstractController
{
  /**
   * @Route("/hello", name="hello")
   */
  public function index()
  {
      // return $this->json([
      //     'message' => 'Welcome to your new controller!',
      //     'path' => 'src/Controller/HelloController.php',
      // ]);
      $user = [
          'name' => 'Vincent',
          'place' => 'Lens'
      ];

      return $this->render("hello/index.html.twig", [
          'user' => $user
      ]); 

  }

  /**
   * @Route("/hello/{name}", name="hello_name")
   */
  public function helloNameAction($name)
  {
      return new Response("Hello !" . $name);
  }
}
