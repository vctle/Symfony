<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture
{

  public const ARTICLE_ID = 'article_id';

    public function load(ObjectManager $manager)
    {

      $faker = Faker\Factory::create();
      for($i = 0; $i < 20 ; $i++ )
      {
        $comment = new Comment();
        $comment->setName($faker->name());
        $comment->setEmail($faker->safeEmail());
        $comment->setCreatedAt($faker->dateTime($max = 'now', $timezone = null));
        $comment->setComment($faker->paragraph($nbSentences = 2, $variableNbSentences = true));
        // $article->addComment($comment);
        $manager->persist($comment);
      }

      $manager->flush();
      $this->addReference(self::ARTICLE_ID, $comment);
    }
}
