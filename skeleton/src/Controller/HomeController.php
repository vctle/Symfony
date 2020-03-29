<?php

namespace App\Controller;

require_once(dirname(dirname(__FILE__)).'/Entity/Article.php');

use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\DataFixtures\AppFixtures;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  private $articleRepository;

  public function __construct(ArticleRepository $articleRepository)
  {
      $this->articleRepository = $articleRepository;
  }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        // $article1 = new Article();
        // $article1->setTitle('Title 1');
        // $article1->setSubtitle('SubTitle 1');
        // $article1->setCreatedAt(new DateTime());
        // $article1->setAuthor('John Doe');
        // $article1->setBody('Lorem ipsum dolor sit amet');
        // $article1->setImage('img/post-bg.jpg');

        // $article2 = new Article();
        // $article2->setTitle('Title 2');
        // $article2->setSubtitle('SubTitle 2');
        // $article2->setCreatedAt(new DateTime());
        // $article2->setAuthor('John Doe');
        // $article2->setBody('Lorem ipsum dolor sit amet');
        // $article2->setImage('img/post-bg.jpg');

        // $test = $this->getDoctrine()
        // ->getRepository(Article::class)
        // ->findAll();
        // print_r($article1);
        // die();

        // from symfony doc

      return $this->render('home/index.html.twig', [
          'articles' => $this->getDoctrine()
          ->getRepository(Article::class)
          ->findLast(2)
      ]);

    }
}
