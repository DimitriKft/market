<?php

namespace App\DataFixtures;

use App\Entity\Type;
use App\Entity\Aliment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $t1 = new Type();
        $t1->setLibelle("Fruits")
           ->setImage("fruit.png");
        $manager->persist($t1); 

        $t2 = new Type();
        $t2->setLibelle("Legumes")
           ->setImage("legumes.png");
        $manager->persist($t2); 

        $alimentRepository = $manager->getRepository(Aliment::class);

        $a1 = $alimentRepository->findOneBy(["nom" => "Carotte"]);
        $a1->setType($t2);
        $manager->persist($a1);

        $a2 = $alimentRepository->findOneBy(["nom" => "Patate"]);
        $a2->setType($t2);
        $manager->persist($a2);

        $a3 = $alimentRepository->findOneBy(["nom" => "Tomate"]);
        $a3->setType($t1);
        $manager->persist($a3);
      
        $a4 = $alimentRepository->findOneBy(["nom" => "Pomme"]);
        $a4->setType($t1);
        $manager->persist($a4);

        $a5 = $alimentRepository->findOneBy(["nom" => "Citron"]);
        $a5->setType($t1);
        $manager->persist($a5);

        $a6 = $alimentRepository->findOneBy(["nom" => "Aubergine"]);
        $a6->setType($t2);
        $manager->persist($a6);

        $a7 = $alimentRepository->findOneBy(["nom" => "Banane"]);
        $a7->setType($t1);
        $manager->persist($a7);

        $a8 = $alimentRepository->findOneBy(["nom" => "Poivron"]);
        $a8->setType($t2);
        $manager->persist($a8);

        $a9 = $alimentRepository->findOneBy(["nom" => "Piment vert"]);
        $a9->setType($t2);
        $manager->persist($a9);

        $a10 = $alimentRepository->findOneBy(["nom" => "Piment rouge"]);
        $a10->setType($t2);
        $manager->persist($a10);

        $a11 = $alimentRepository->findOneBy(["nom" => "Orange"]);
        $a11->setType($t1);
        $manager->persist($a11);

        $a12 = $alimentRepository->findOneBy(["nom" => "Avocat"]);
        $a12->setType($t2);
        $manager->persist($a12);

        $a13 = $alimentRepository->findOneBy(["nom" => "Cerise"]);
        $a13->setType($t1);
        $manager->persist($a13);

        $manager->flush();
    }
}
