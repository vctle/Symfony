<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Comment;
use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {

    $faker = Faker\Factory::create();


    $article = $this->getReference(AppFixtures::ARTICLE_ID);
    for($i = 0; $i < 5 ; $i++ )
    {
      $comment = new Comment();
      $comment->setName($faker->name());
      $comment->setEmail($faker->safeEmail());
      $comment->setCreatedAt($faker->dateTime($max = 'now', $timezone = null));
      $comment->setComment($faker->paragraph($nbSentences = 2, $variableNbSentences = true));
      $article->addComment($comment);
      $manager->persist($comment);
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
