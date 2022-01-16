<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $article = new Article();
            $article->setName('Article ' . $i);
            $article->setCreatedAt($faker->dateTimeBetween('-100 days', 'now'));
            $article->setSummary($faker->realText('250'));
            $article->setBody($faker->realText('750'));
            $article->setPicture('https://fakeimg.pl/350x200/?text=Article ' . $i);
            $manager->persist($article);
        }
        $manager->flush();
    }
}
