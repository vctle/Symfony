<?php

namespace App\DataFixtures;
// require_once '/path/to/Faker/src/autoload.php';

use Faker;
use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

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
        $article->addComment($this->getReference(CommentFixtures::ARTICLE_ID));
        $manager->persist($article);
      }
      $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CommentFixtures::class,
        );
    }
}
