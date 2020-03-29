<?php

namespace App\DataFixtures;
// require_once '/path/to/Faker/src/autoload.php';

use Faker;
use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
  public const ARTICLE_ID = 'article_id';

  public function load(ObjectManager $manager)
  {
    // use the factory to create a Faker\Generator instance
    $faker = Faker\Factory::create();
    
    for($i = 0; $i <10; $i++) {

      $article = new Article();
      $article->setTitle($faker->sentence($nbWords = 3, $variableNbWords = false));
      $article->setSubtitle($faker->sentence($nbWords = 5, $variableNbWords = false));
      $article->setCreatedAt($faker->dateTime($max = 'now', $timezone = null));
      $article->setAuthor($faker->name($gender = 'female'));
      $article->setBody($faker->paragraph($nbSentences = 5, $variableNbSentences = true));
      $article->setImage("/img");
      
      $manager->persist($article);
    }
    $manager->flush();
    $this->addReference(self::ARTICLE_ID, $article);
  }
}
