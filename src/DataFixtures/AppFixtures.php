<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\Articles;
use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create();
        $users = [];
        for ($i = 0; $i < 50; $i++) {
            $user = new Users();
            $user->setUsernames($faker->name());
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setLastname($faker->lastName());
            $user->setPasword($faker->password());
            $user->setCreatedAt(new \DateTime());
            $manager->persist($user);
            $users[] = $user;
        }

        $articles = [];
        for (
            $i = 0;
            $i < 100;
            $i++
        ) {
            $article = new Articles();
            $article->setTitre($faker->text(50));
            $article->setContenu($faker->text(6000));
            $article->setImg($faker->imageUrl());
            $article->setCreatedAt(new \DateTime());
            $manager->persist($article);

            $articles[] = $article;
        }
        $Categories = [];
        for ($i = 0; $i < 15; $i++) {
            $catgorie = new Categories();
            $catgorie->setTitle($faker->text(50));
            $catgorie->setDescription($faker->text(600));
            $catgorie->setImage($faker->imageUrl());
            $manager->persist($catgorie);
            $Categories[] = $catgorie;
        }

        for ($i = 0; $i < 100; $i++) {
            $article = new Articles();
            $article->setTitre($faker->text(50));
            $article->setContenu($faker->text(6000));
            $article->setImg($faker->imageUrl());
            $article->setCreatedAt(new \DateTime());
            $article->addCategory($Categories[$faker->numberBetween(0, 14)]);
            $article->setAuthor($users[$faker->numberBetween(0, 49)]);
            $manager->persist($article);
            $articles[] = $article;
        }




        $manager->flush();
    }
}
